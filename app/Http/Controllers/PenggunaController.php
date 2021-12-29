<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MohonPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Refgeneral;
use App\Models\Permohanan;
use App\Models\Tugas;
use App\Models\Perkhidmatan;
use App\Helpers\Hrmis\GetDataXMLbyIC;
use App\Mail\PenggunaDidaftar;
use Illuminate\Support\Facades\Mail;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('updated_at', 'desc')->get();

        $user_pengawas = User::where('user_group_id', '=', '4')->orderBy('updated_at', 'desc')->get();

        $current_user = Auth::user()->user_group_id;
        // dd($current_user);
        return view('pengurusanpengguna.index', [
            'users' => $users,
            'user_pengawas' => $user_pengawas,
            'current_user' => $current_user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kementerian = Refgeneral::where('MASTERCODE', 10028)->get();
        $role = Role::all();
        return view('pengurusanpengguna.create', [
            'kementerians' => $kementerian,
            'role'=>$role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nric' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'user_group_id' => 'required'
        ]);

        $user = new User;
        $user->name = strtoupper($request->name);
        $user->email = $request->email;
        $user->nric = $request->nric;
        if (!empty($request->ministry_code)) {
            $user->ministry_code = $request->ministry_code;
        }
        $user->office_number = $request->office_number;
        $user->fax_number = $request->fax_number;
        $user->telephone_number = $request->telephone_number;
        $user->user_group_id = $request->user_group_id; 
        $roles = Role::find($request->user_group_id);
        $user->assignRole($roles->name);
        $user->password = Hash::make($request->password);
        $user->save();

        if($roles->name == 'calon'){
            $GetDataXMLbyIC = new GetDataXMLbyIC();
        $hrmisData = $GetDataXMLbyIC->getDataHrmis($request->nric);
        if (gettype($hrmisData) == "object") {
            // To get reference of JANTINA from table refgeneral
            $jantina = Refgeneral::where('MASTERCODE', 10004)->where('DESCRIPTION1', $hrmisData->Jantina)->get()->toArray();

            // To get reference of GELARAN from table refgeneral
            $gelaran = Refgeneral::where('MASTERCODE', 10009)->where('DESCRIPTION1', $hrmisData->Gelaran)->get()->toArray();

            // To get reference of NEGERI from table refgeneral
            $negeri = Refgeneral::where('MASTERCODE', 10021)->where('DESCRIPTION1', $hrmisData->Negeri)->get()->toArray();

            // To get reference of KLASIFIKASI_PERKHIDMATAN from table refgeneral
            $klasifikasiPerkhidmatan = Refgeneral::where('MASTERCODE', 10024)->where('DESCRIPTION1', 'like', '(' . str_replace(' ', '', $hrmisData->KlasifikasiPerkhidmatan) . ')%')->get()->toArray();

            // To get reference of GRED_JAWATAN from table refgeneral
            $gredJawatan = Refgeneral::where('MASTERCODE', 10025)->where('DESCRIPTION1', 'like', '%' . substr($hrmisData->GredGaji, 1, 2) . '%')->get()->toArray();

            // To get reference of TARAF_JAWATAN from table refgeneral
            $tarafJawatan = Refgeneral::where('MASTERCODE', 10026)->where('DESCRIPTION1', 'like', $hrmisData->StatusPerkhidmatan)->get()->toArray();

            // select * from users
            // join pro_peserta on users.id = pro_peserta.user_id
            // join pro_tempat_tugas on pro_peserta.ID_PESERTA = pro_tempat_tugas.ID_PESERTA
            // join pro_perkhidmatan on pro_peserta.ID_PESERTA = pro_perkhidmatan.ID_PESERTA;

            $peserta = Permohanan::create([
                'KOD_GELARAN' => count($gelaran) == 1 ? $gelaran[0]['REFERENCECODE'] : NULL,
                'NAMA_PESERTA' => $hrmisData->Nama,
                'TARIKH_LAHIR' => substr($hrmisData->TarikhLahir, 0, 10),
                'KOD_JANTINA' => count($jantina) == 1 ? $jantina[0]['REFERENCECODE'] : NULL,
                'EMEL_PESERTA' => $hrmisData->Emel,
                'KOD_KATEGORI_PESERTA' => '01', // 01 - Individu, 02 - Kumpulan
                'NO_KAD_PENGENALAN' => $hrmisData->NoKP,
                'NO_TELEFON_BIMBIT' => $hrmisData->TelBimbit,
                'NO_TELEFON_PEJABAT' => $hrmisData->TelPejabat,
                'user_id' => $user->id,
            ]);

            $tempat_tugas = Tugas::create([
                'ID_PESERTA' => $peserta->ID_PESERTA,
                'GELARAN_KETUA_JABATAN' => NULL,
                'KOD_KEMENTERIAN' => NULL, // problem
                'KOD_JABATAN' => NULL, // problem
                'BAHAGIAN' => $hrmisData->Bahagian,
                'ALAMAT_1' => NULL, // must ask user about hrmis retrieve data
                'ALAMAT_2' => NULL,
                'ALAMAT_3' => NULL,
                'POSKOD' => $hrmisData->Poskod,
                'BANDAR' => $hrmisData->Bandar,
                'KOD_NEGERI' => count($negeri) == 1 ? $negeri[0]['REFERENCECODE'] : NULL,
                'KOD_NEGARA' => 'MYS',
                'NAMA_PENYELIA' => $hrmisData->NamaPPP,
                'EMEL_PENYELIA' => $hrmisData->Email_PPP,
                'NO_TELEFON_PENYELIA' => NULL, // must ask user about hrmis retrieve data
                'NO_FAX_PENYELIA' => NULL, // must ask user about hrmis retrieve data
            ]);

            $perkhidmatan = Perkhidmatan::create([
                'KOD_GELARAN_JAWATAN' => $hrmisData->Jawatan,
                'KOD_PERINGKAT' => NULL, // must ask SA about this
                'KOD_KLASIFIKASI_PERKHIDMATAN' => count($klasifikasiPerkhidmatan) == 1 ? $klasifikasiPerkhidmatan[0]['REFERENCECODE'] : NULL,
                'KOD_GRED_JAWATAN' => count($gredJawatan) == 1 ? $gredJawatan[0]['REFERENCECODE'] : NULL, // must ask client about GredGaji format
                'KOD_TARAF_PERJAWATAN' => count($tarafJawatan) == 1 ? $tarafJawatan[0]['REFERENCECODE'] : NULL, // must ask client about StatusPerkhidmatan format
                'KOD_JENIS_PERKHIDMATAN' => NULL, // must ask user about hrmis retrieve data
                'TARIKH_LANTIKAN' => NULL, // must ask user about hrmis retrieve data
                'ID_PESERTA' => $peserta->ID_PESERTA,
            ]);
        } else {
            $peserta = Permohanan::create([
                'KOD_GELARAN' => NULL,
                'NAMA_PESERTA' => $request->name,
                'TARIKH_LAHIR' => NULL,
                'KOD_JANTINA' => NULL,
                'EMEL_PESERTA' => $request->email,
                'KOD_KATEGORI_PESERTA' => NULL,
                'NO_KAD_PENGENALAN' => $request->nric,
                'NO_TELEFON_BIMBIT' => NULL,
                'NO_TELEFON_PEJABAT' => NULL,
                'user_id' => $user->id,
            ]);

            $tempat_tugas = Tugas::create([
                'ID_PESERTA' => $peserta->ID_PESERTA,
            ]);

            $perkhidmatan = Perkhidmatan::create([
                'ID_PESERTA' => $peserta->ID_PESERTA,
            ]);
        }

        $user->name = strtoupper($peserta->NAMA_PESERTA);
        // dd($user->name);
        
        $user->save();

        $current_user = $request->user();
        Mail::to($user->email)->send(new PenggunaDidaftar($user));
        }
        return redirect('/pengurusanpengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pengurusanpengguna.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = User::find($user);
        $role = Role::all();
        $role_name = Role::where('id', $user->user_group_id)->first();
        $kementerian = Refgeneral::where('MASTERCODE', 10028)->get();
        return view('pengurusanpengguna.edit', [
            'user' => $user,
            'kementerians' => $kementerian,
            'role'=>$role,
            'role_name'=>$role_name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $request->validate([
            'user_group_id' => 'required'
        ]);

        $user = User::find($user);
        $user->name = strtoupper($request->name);
        $user->email = $request->email;
        $user->nric = $request->nric;
        $user->ministry_code = $request->ministry_code;
        $user->office_number = $request->office_number;
        // $user->fax_number = $request->fax_number;
        // $user->telephone_number = $request->telephone_number;

        $role = Role::where('id', $user->user_group_id)->first();
        $user->removeRole($role->name);

        // if($user->user_group_id == "1"){
        //     $user->removeRole('pentadbir sistem');
        // }elseif($user->user_group_id == "2"){
        //     $user->removeRole('pentadbir penilaian');
        // }elseif($user->user_group_id == "3"){
        //     $user->removeRole('penyelaras');
        // }elseif($user->user_group_id == "4"){
        //     $user->removeRole('pengawas');
        // }elseif($user->user_group_id == "5"){
        //     $user->removeRole('calon');
        // }elseif($user->user_group_id == "6"){
        //     $user->removeRole('pegawai korporat');
        // }

        $user->user_group_id = $request->user_group_id;

        $role_update = Role::where('id', $request->user_group_id)->first();
        $user->assignRole($role_update->name);

        // if($request->user_group_id == "1"){
        //     $user->assignRole('pentadbir sistem');
        // }elseif($request->user_group_id == "2"){
        //     $user->assignRole('pentadbir penilaian');
        // }elseif($request->user_group_id == "3"){
        //     $user->assignRole('penyelaras');
        // }elseif($request->user_group_id == "4"){
        //     $user->assignRole('pengawas');
        // }elseif($request->user_group_id == "5"){
        //     $user->assignRole('calon');
        // }elseif($request->user_group_id == "6"){
        //     $user->assignRole('pegawai korporat');
        // }
        // $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/pengurusanpengguna');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = User::find($user);
        $ic = $user->nric;
        $pro_peserta = Permohanan::where('NO_KAD_PENGENALAN', $ic)->first();
        $pro_peserta->delete();
        $pro_tempat_tugas = Tugas::where('ID_PESERTA', $pro_peserta->ID_PESERTA)->first();
        $pro_tempat_tugas->delete();
        $pro_perkhidmatan = Perkhidmatan::where('ID_PESERTA', $pro_peserta->ID_PESERTA)->first();
        $pro_perkhidmatan->delete();
        $permohonan = MohonPenilaian::where('no_ic', $ic)->get();
        foreach($permohonan as $permohonan){
            $permohonan->delete();
        }

        $user->delete();
        return redirect('/pengurusanpengguna')->with('success', 'Berjaya dihapus!');
    }
}

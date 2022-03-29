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
use App\Models\Bankjawapanpengetahuan;
use App\Helpers\Hrmis\GetDataXMLbyIC;
use App\Mail\PenggunaDidaftar;
use App\Models\Bankjawapancalon;
use App\Models\Jadual;
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
        $users = User::orderBy('name', 'asc')->paginate(20);

        $user_pengawas = User::where('user_group_id', '=', '4')->orderBy('updated_at', 'desc')->get();

        $current_user = Auth::user()->user_group_id;
        // dd($users);
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
            'role' => $role
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

        if ($roles->name == 'calon') {
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
        $user_info = User::find($user);

        $role = Role::all();
        $role_name = Role::where('id', $user_info->user_group_id)->first();

        $kod_gelaran = Refgeneral::where('MASTERCODE', 10009)->orderBy('DESCRIPTION1', 'asc')
            ->get();

        $peringkat = Refgeneral::where('MASTERCODE', 10023)->orderBy('DESCRIPTION1', 'asc')->get();

        $klasifikasi_perkhidmatan = Refgeneral::where('MASTERCODE', 10024)->orderBy('DESCRIPTION1', 'asc')->get();

        $gred_jawatan = Refgeneral::where('MASTERCODE', 10025)->orderBy('DESCRIPTION1', 'asc')->get();

        $taraf_perjawatan = Refgeneral::where('MASTERCODE', 10026)->orderBy('DESCRIPTION1', 'asc')->get();

        $jenis_perkhidmatan = Refgeneral::where('MASTERCODE', 10027)->orderBy('DESCRIPTION1', 'asc')->get();

        $kementerian = Refgeneral::where('MASTERCODE', 10028)->orderBy('DESCRIPTION1', 'asc')->get();

        $negeri = Refgeneral::where('MASTERCODE', 10021)->orderBy('DESCRIPTION1', 'asc')->get();

        $jabatan = Refgeneral::where('MASTERCODE', 10029)->orderBy('DESCRIPTION1', 'asc')->get();

        if ($user_info->user_group_id == '5') {
            $user_profil = User::where('id', $user_info->id)
                ->join('pro_peserta', 'users.id', 'pro_peserta.user_id')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->join('pro_perkhidmatan', 'pro_tempat_tugas.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->get()->first();
        } else {
            $user_profil = User::where('id', $user_info->id)->get()->first();
        }
        return view('pengurusanpengguna.edit', [
            'user_profils' => $user_profil,
            'kod_gelarans' => $kod_gelaran,
            'peringkats' => $peringkat,
            'klasifikasi_perkhidmatans' => $klasifikasi_perkhidmatan,
            'gred_jawatans' => $gred_jawatan,
            'taraf_perjawatans' => $taraf_perjawatan,
            'jenis_perkhidmatans' => $jenis_perkhidmatan,
            'kementerians' => $kementerian,
            'negeris' => $negeri,
            'jabatans' => $jabatan,
            'role' => $role,
            'role_name' => $role_name
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

        $user_info = User::find($user);
        if ($user_info->user_group_id == '5') {
            $user_profils1 = User::where('id', $user_info->id)->first();
            $user_profils1->email = $request->email;
            $user_profils1->nric = $request->nric;
            $role = Role::where('id', $user_info->user_group_id)->first();
            $user_profils1->removeRole($role->name);
            $user_profils1->user_group_id = $request->user_group_id;
            $role_update = Role::where('id', $request->user_group_id)->first();
            $user_profils1->assignRole($role_update->name);

            $user_profils2 = Permohanan::where('NO_KAD_PENGENALAN', $user_info->nric)->first();
            // $user_profils2->ID_PESERTA = $request->ID_PESERTA;
            $user_profils2->NAMA_PESERTA = strtoupper($request->name);
            $user_profils2->NO_KAD_PENGENALAN = $request->nric;
            $user_profils2->EMEL_PESERTA = $request->email;
            $user_profils2->NO_TELEFON_BIMBIT = $request->NO_TELEFON_BIMBIT;
            $user_profils2->NO_TELEFON_PEJABAT = $request->NO_TELEFON_PEJABAT;
            $user_profils2->KOD_JANTINA = $request->KOD_JANTINA;
            $user_profils2->TARIKH_LAHIR = $request->TARIKH_LAHIR;
            // $user_profils2->ID_PESERTA = $request->ID_PESERTA;
            $user_profils2->KOD_GELARAN = $request->KOD_GELARAN;

            $user_profils3 = Tugas::where('ID_PESERTA', $user_profils2->ID_PESERTA)->first();
            $user_profils3->ALAMAT_1 = $request->ALAMAT_1;
            $user_profils3->ALAMAT_2 = $request->ALAMAT_2;
            $user_profils3->POSKOD = $request->POSKOD;
            $user_profils3->KOD_NEGERI = $request->KOD_NEGERI;
            $user_profils3->KOD_NEGARA = $request->KOD_NEGARA;
            $user_profils3->NAMA_PENYELIA = $request->NAMA_PENYELIA;
            $user_profils3->EMEL_PENYELIA = $request->EMEL_PENYELIA;
            $user_profils3->NO_TELEFON_PENYELIA = $request->NO_TELEFON_PENYELIA;
            $user_profils3->KOD_KEMENTERIAN = $request->KOD_KEMENTERIAN;
            $user_profils3->KOD_JABATAN = $request->KOD_JABATAN;
            $user_profils3->GELARAN_KETUA_JABATAN = strtoupper($request->GELARAN_KETUA_JABATAN);
            $user_profils3->BAHAGIAN = $request->BAHAGIAN;
            $user_profils3->BANDAR = $request->BANDAR;

            $user_profils4 = Perkhidmatan::where('ID_PESERTA', $user_profils2->ID_PESERTA)->first();
            $user_profils4->KOD_KLASIFIKASI_PERKHIDMATAN = $request->KOD_KLASIFIKASI_PERKHIDMATAN;
            $user_profils4->TARIKH_LANTIKAN = $request->TARIKH_LANTIKAN;
            $user_profils4->KOD_GELARAN_JAWATAN = $request->KOD_GELARAN_JAWATAN;
            $user_profils4->KOD_TARAF_PERJAWATAN = $request->KOD_TARAF_PERJAWATAN;
            $user_profils4->KOD_PERINGKAT = $request->KOD_PERINGKAT;
            $user_profils4->KOD_JENIS_PERKHIDMATAN = $request->KOD_JENIS_PERKHIDMATAN;
            $user_profils4->KOD_GRED_JAWATAN = $request->KOD_GRED_JAWATAN;
            // dd($user_profils1, $user_profils2, $user_profils3, $user_profils4);

            $user_profils1->save();
            $user_profils2->save();
            $user_profils3->save();
            $user_profils4->save();
        } else {
            $user_profil = User::where('id', $user_info->id)->get()->first();

            $user_profil->name = strtoupper($request->name);
            $user_profil->email = $request->email;
            $user_profil->nric = $request->nric;
            $user_profil->ministry_code = $request->ministry_code;
            $user_profil->office_number = $request->office_number;

            $role = Role::where('id', $user_profil->user_group_id)->first();
            $user_profil->removeRole($role->name);

            $user_profil->user_group_id = $request->user_group_id;

            $role_update = Role::where('id', $request->user_group_id)->first();
            $user_profil->assignRole($role_update->name);

            $user_profil->save();
        }

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
        $pro_peserta = MohonPenilaian::where('no_ic', $ic)->first();
        if ($pro_peserta != null) {
            $pro_peserta->delete();
        }

        $pro_peserta_2 = Permohanan::where('NO_KAD_PENGENALAN', $ic)->first();
        if ($pro_peserta_2 != null) {
            $pro_tempat_tugas = Tugas::where('ID_PESERTA', $pro_peserta_2->ID_PESERTA)->first();
            if ($pro_tempat_tugas != null) {
                $pro_tempat_tugas->delete();
            }
            $pro_perkhidmatan = Perkhidmatan::where('ID_PESERTA', $pro_peserta_2->ID_PESERTA)->first();
            if ($pro_perkhidmatan != null) {
                $pro_perkhidmatan->delete();
            }
            $pro_peserta_2->delete();
        }

        $permohonan = MohonPenilaian::where('no_ic', $ic)->get();
        foreach ($permohonan as $pmh) {
            $kekosongan = Jadual::where('ID_PENILAIAN', $pmh->id_sesi)->get();
            foreach ($kekosongan as $kosong) {
                $kosong->BILANGAN_CALON = $kosong->BILANGAN_CALON - 1;
                $kosong->KEKOSONGAN = $kosong->JUMLAH_KESELURUHAN - $kosong->BILANGAN_CALON;

                $kosong->save();
            }

            $pmh->delete();
        }

        $pengetahuan = Bankjawapanpengetahuan::where('id_calon', $ic)->get();
        if ($pengetahuan != null) {
            foreach ($pengetahuan as $pengetahuan) {
                $pengetahuan->delete();
            }
        }

        $kemahiran = Bankjawapancalon::where('ic_calon', $ic)->get();
        if ($kemahiran != null) {
            foreach ($kemahiran as $kemahiran) {
                $kemahiran->delete();
            }
        }

        $user->delete();
        // alert()->success('Berjaya dihapus!');
        return redirect('/pengurusanpengguna');
    }

    public function set_semula_kata_laluan(Request $request, $user)
    {
        $reset_pass = User::find($user);

        $reset_pass->password = Hash::make($request->password);
        $reset_pass->save();

        echo '<script language="javascript">';
        echo 'alert("Kata laluan berjaya disetkan semula.");';
        echo "window.location.href='/pengurusanpengguna';";
        echo '</script>';
        // return redirect('/pengurusanpengguna');
    }
}

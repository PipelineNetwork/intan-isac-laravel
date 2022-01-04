<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Jadual;
use App\Models\Refgeneral;
use Illuminate\Support\Facades\Auth;
use App\Models\Permohanan;
use App\Models\Tugas;
use App\Models\Perkhidmatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Helpers\Hrmis\GetDataXMLbyIC;

class PermohananController extends Controller
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
        $icnumb = Auth::user()->nric;
        // dd($icnumb);
        $GetDataXMLbyIC = new GetDataXMLbyIC();
        // $hrmisData = $GetDataXMLbyIC->getDataHrmis($icnumb);
        $hrmisData = $GetDataXMLbyIC->getDataHrmis('860331236086');
        // dd($hrmisData);

        $gelarans = Refgeneral::where('MASTERCODE', '10009')->get();
        $peringkats = Refgeneral::where('MASTERCODE', '10023')->get();
        $gred_jawatans = Refgeneral::where('MASTERCODE', '10025')->get();
        $taraf_jawatans = Refgeneral::where('MASTERCODE', '10026')->get();
        $jenis_jawatans = Refgeneral::where('MASTERCODE', '10027')->get();
        $kementerians = Refgeneral::where('MASTERCODE', '10028')->get();
        $negeris = Refgeneral::where('MASTERCODE', '10021')->get();

        // JADUAL_PENYELIA
        $id_penyelia = Auth::id();
        $jadual_penyelia = Jadual::where('user_id', $id_penyelia)->get();

        // 
        $jaduals = Jadual::all();
        $group_users = User::where('user_group_id','3')->get();
        $pro_peserta=Permohanan::all();
        $users = DB::table('users')
        ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
        ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
        ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
        ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*','pro_perkhidmatan.*')
        ->get();
        
        return view('permohanan.index',[
            'group_users'=> $group_users,
            'pro_peserta' => $pro_peserta,
            'users'=>$users,     
            'jaduals'=>$jaduals,
            'gelarans'=>$gelarans,
            'peringkats'=>$peringkats,
            'gred_jawatans'=>$gred_jawatans,
            'taraf_jawatans'=>$taraf_jawatans,
            'jenis_jawatans'=>$jenis_jawatans,
            'kementerians'=>$kementerians,
            'negeris'=>$negeris,
            'jadual_penyelia'=>$jadual_penyelia,
            'hrmisData'=>$hrmisData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permohanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User;
        // $user ->user_group_id = "3";
        $user ->name= strtoupper($request->name);
        $user ->email= $request->email;
        $user ->password= $request->password;
        $user ->nric= $request->nric;
        $user ->save(); 

        $pro_peserta = new Permohanan;
        $pro_peserta ->user_id= $user->id;
        $pro_peserta ->NAMA_PESERTA= $request->NAMA_PESERTA;
        $pro_peserta ->NO_TELEFON_PEJABAT= $request->NO_TELEFON_PEJABAT;
        $pro_peserta ->NO_TELEFON_BIMBIT= $request->NO_TELEFON_BIMBIT;
        $pro_peserta ->KOD_JANTINA= $request->KOD_JANTINA;
        $pro_peserta ->TARIKH_LAHIR= $request->TARIKH_LAHIR;
        $pro_peserta->save(); 

        $pro_tempat_tugas= new Tugas;
        $pro_tempat_tugas ->id_peserta= $request->id_peserta;
        $pro_tempat_tugas ->ALAMAT_1= $request->ALAMAT_1;
        $pro_tempat_tugas ->ALAMAT_2= $request->ALAMAT_2;
        $pro_tempat_tugas ->POSKOD= $request->POSKOD;
        $pro_tempat_tugas ->KOD_NEGERI= $request->KOD_NEGERI;
        $pro_tempat_tugas ->KOD_NEGARA= $request->KOD_NEGARA;
        $pro_tempat_tugas  ->NAMA_PENYELIA= $request->NAMA_PENYELIA;
        $pro_tempat_tugas  ->EMEL_PENYELIA= $request->EMEL_PENYELIA;
        $pro_tempat_tugas  ->NO_TELEFON_PENYELIA= $request->NO_TELEFON_PENYELIA;
        $pro_tempat_tugas ->GELARAN_KETUA_JABATAN= $request->GELARAN_KETUA_JABATAN;
        $pro_tempat_tugas->save(); 
        
        $pro_perkhidmatan= new Perkhidmatan;
        $pro_perkhidmatan ->id_peserta= $request->id_peserta;
        $pro_perkhidmatan ->KOD_KLASIFIKASI_PERKHIDMATAN= $request->KOD_KLASIFIKASI_PERKHIDMATAN;
        $pro_perkhidmatan ->TARIKH_LANTIKAN= $request->TARIKH_LANTIKAN;
        $pro_perkhidmatan ->KOD_TARAF_PERJAWATAN= $request->KOD_TARAF_PERJAWATAN;
        $pro_perkhidmatan->save(); 
         
        return redirect('/permohanans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Use  $permohanan
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('permohanan.show', [
            'user'=> $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $permohanan
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {

        $user=User::all();

        return view('permohonan.edit', [
            'user'=> $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $permohanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user, $pro_peserta, $pro_tempat_tugas, $pro_perkhidmatan)
    {
        $user ->user_group_id = "3";
        $user -> nric= $request->nric;
        $user->save(); 

        $pro_peserta ->user_id= $user->id;
        $pro_peserta ->NAMA_PESERTA= $request->NAMA_PESERTA;
        $pro_peserta ->NO_TELEFON_PEJABAT= $request->NO_TELEFON_PEJABAT;
        $pro_peserta ->NO_TELEFON_BIMBIT= $request->NO_TELEFON_BIMBIT;
        $pro_peserta ->KOD_JANTINA= $request->KOD_JANTINA;
        $pro_peserta ->TARIKH_LAHIR= $request->TARIKH_LAHIR;
        $pro_peserta->save(); 

        $pro_tempat_tugas ->id_peserta= $request->id_peserta;
        $pro_tempat_tugas ->ALAMAT_1= $request->ALAMAT_1;
        $pro_tempat_tugas ->ALAMAT_2= $request->ALAMAT_2;
        $pro_tempat_tugas ->POSKOD= $request->POSKOD;
        $pro_tempat_tugas ->KOD_NEGERI= $request->KOD_NEGERI;
        $pro_tempat_tugas ->KOD_NEGARA= $request->KOD_NEGARA;
        $pro_tempat_tugas  ->NAMA_PENYELIA= $request->NAMA_PENYELIA;
        $pro_tempat_tugas  ->EMEL_PENYELIA= $request->EMEL_PENYELIA;
        $pro_tempat_tugas  ->NO_TELEFON_PENYELIA= $request->NO_TELEFON_PENYELIA;
        $pro_tempat_tugas ->GELARAN_KETUA_JABATAN= $request->GELARAN_KETUA_JABATAN;
        $pro_tempat_tugas->save(); 
        
        $pro_perkhidmatan ->id_peserta= $request->id_peserta;
        $pro_perkhidmatan ->KOD_KLASIFIKASI_PERKHIDMATAN= $request->KOD_KLASIFIKASI_PERKHIDMATAN;
        $pro_perkhidmatan ->TARIKH_LANTIKAN= $request->TARIKH_LANTIKAN;
        $pro_perkhidmatan ->KOD_TARAF_PERJAWATAN= $request->KOD_TARAF_PERJAWATAN;
        $pro_perkhidmatan->save(); 
        
        return redirect('/permohanans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $permohanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $users = User::find($user)->where('user_group_id','3');
            $user->delete();
            return redirect('/permohanan');
        
    }
}
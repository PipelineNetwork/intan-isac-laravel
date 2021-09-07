<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Permohanan;
use App\Models\Tugas;
use App\Models\Perkhidmatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermohananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $user ->user_group_id = "3";
        $user ->name= $request->name;
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
    public function update(Request $request, $user)
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
        
        $permohanan->save(); 
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
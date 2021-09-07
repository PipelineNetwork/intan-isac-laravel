<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Permohanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function kemaskini(Request $request)
    {   
        $user = $request->user();
        $users = DB::table('users')
            ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
            ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
            ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
            ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*','pro_perkhidmatan.*')
            ->toSql();

        return view('profil.index',[
            'user'=> $user,
            'users'=> $users,
        ]);

    }

    public function kemaskiniform(Request $request){
        $user = $request ->user();

        return view ('profil.edit', [
            'user'=> $user ]);

    }
 
    public function kemaskiniprofil(Request $request)
    { 
       
        $name= $request -> name;
        $email=$request->email;
        $nric=$request->nric;
        $ministry_code = $request->ministry_code;
        $telephone_number = $request->telephone_number;
        $office_number = $request->office_number;
        $fax_number = $request->fax_number;
        


        $user= User::find($request->user()->id);
        $user->name=$name;
        $user->email=$email;
        $user->nric=$nric;
        $user ->ministry_code = $request->ministry_code;
        $user ->office_number = $request->office_number;
        $user ->fax_number = $request->fax_number;
        $user ->telephone_number = $request->telephone_number;
        $user->save();
        return redirect('/profil');
    }

    public function edit(Profil $profil){

        return view ('profil.edit');
        
    }


}
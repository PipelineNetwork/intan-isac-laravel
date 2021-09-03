<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Permohanan;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function kemaskini(Request $request)
    {   
        $user = $request->user();
        // $pro_peserta = Permohanan::with('perkhidmatan','perkhidmatan1','perkhidmatan2')
        // ->right
        // ->get();
        // dd($pro_peserta);

        return view('profil.index',[
            'user'=> $user,
            // 'pro_peserta'=>$pro_peserta
        ]);

    }

    public function kemaskiniform(Request $request){
        $user = $request ->user();


        # confuse return view but parameter url
        return view ('profil.edit', 
        ['user'=> $user ]);

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


}
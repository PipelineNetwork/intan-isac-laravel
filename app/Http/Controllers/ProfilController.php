<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function kemaskini(Request $request)
    {   
        $user = $request -> user();
        
        return view('profil.show',[
            'user'=> $user,
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
        $ministry_code = $request->ministry_code;
        $office_number = $request->office_number;
        $fax_number = $request->fax_number;
        $telephone_number = $request->telephone_number;

        $user= User::find($request->user()->id);
        $user->name=$name;
        $user->email=$email;
        $user ->ministry_code = $request->ministry_code;
        $user ->office_number = $request->office_number;
        $user ->fax_number = $request->fax_number;
        $user ->telephone_number = $request->telephone_number;
        $user->save();
        return redirect('/profil');
    }


}
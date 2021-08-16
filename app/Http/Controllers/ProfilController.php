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

        $user= User::find($request->user()->id);
        $user->name=$name;
        $user->email=$email;
        $user->save();
        return redirect('/profil');
    }


}
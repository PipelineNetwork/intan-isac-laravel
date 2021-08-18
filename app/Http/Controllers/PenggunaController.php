<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
            
        return view('pengurusanpengguna.index',[
             'users'=> $users,
        
        ]);
    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengurusanpengguna.create');
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
    
            'name'=> 'required', 
            'email'=> 'required',
            'ministry_code' => 'string|nullable',
            'office_number' => 'string|nullable',
            'fax_number' => 'string|nullable',
            'telephone_number' => 'string|nullable',
            'password'=> 'required',
            'user_group_id'=> 'required',

        ]);
        $user = new User;
        $user ->name = $request->name;
        $user ->email = $request->email;
        $user ->ministry_code = $request->ministry_code;
        $user ->office_number = $request->office_number;
        $user ->fax_number = $request->fax_number;
        $user ->telephone_number = $request->telephone_number;
        $user ->user_group_id = $request->user_group_id;
        $user ->password = Hash::make($request->password);
        $user ->save();
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
            'user'=> $user,
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
        return view('pengurusanpengguna.edit', [
            'user'=> $user,
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
        // dd($request->all());
        $user = User::find($user);
        $user ->name = $request->name;
        $user ->email = $request->email;
        $user ->ministry_code = $request->ministry_code;
        $user ->office_number = $request->office_number;
        $user ->fax_number = $request->fax_number;
        $user ->telephone_number = $request->telephone_number;
        $user ->user_group_id = $request->user_group_id;
        $user ->password = Hash::make($request->password);
        $user ->save();

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
        $user->delete();
        return redirect('/pengurusanpengguna');
    }
}
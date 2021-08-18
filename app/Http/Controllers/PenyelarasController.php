<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PenyelarasPengguna;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class PenyelarasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('user_group_id',4)->get();   
        return view('penyelaraspengguna.index',[
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
        return view('penyelaraspengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
    
            'name'=> 'required', 
            'email'=> 'required',
            'password'=> 'required',
            'user_group_id'=> 'required',
        ]);
        $user = new User;
        $user ->name = $request->name;
        $user ->email = $request->email;
        $user ->user_group_id = 4;
        $user ->password = Hash::make($request->password);
        $user ->save();

        $penyelaras = new PenyelarasPengguna;
        $penyelaras->NAMA_PENYELARAS = $request->name;
        $penyelaras->EMEL_PENYELARAS = $request->email;
        $penyelaras->USERID = $user->id;
        $penyelaras->save();
        return redirect('/penyelaraspengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('penyelaraspengguna.edit', [
            'user'=> $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::find($user);
        return view('penyelaraspengguna.edit', [
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
    public function update(Request $request, User $user)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/penyelaraspengguna');
    }
    
}

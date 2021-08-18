<?php

namespace App\Http\Controllers;
use App\Models\PengawasPengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengawasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('user_group_id',9)->get(); ;
            
        return view('pengawaspengguna.index',[
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
        return view('pengawaspengguna.create');
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
        $user ->user_group_id = 9;
        $user ->password = Hash::make($request->password);
        $user ->save();

        $pengawas = new PengawasPengguna;
        $pengawas->NAMA_PENGAWAS = $request->name;
        $pengawas->EMEL_PENGAWAS = $request->email;
        $pengawas->USERID = $user->id;
        $pengawas->save();
        return redirect('/pengawaspengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pengawaspengguna.edit', [
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
        return view('pengawaspengguna.edit', [
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
    public function destroy($user)
    {
        // First delete dulu data dari table child 

        // Then delete data dari table parent
        $user = User::find($user);
        $user->delete();
        return redirect('/pengawaspengguna');
    }
}

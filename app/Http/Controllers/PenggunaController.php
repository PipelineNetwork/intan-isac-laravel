<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Refgeneral;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('updated_at', 'desc')->get();

        $user_pengawas = User::where('user_group_id', '=', '4')->orderBy('updated_at', 'desc')->get();

        $current_user = Auth::user()->user_group_id;
        // dd($current_user);
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
            'role'=>$role
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
        $user->name = $request->name;
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
        dd($roles); //check role
        $user->assignRole($roles->name);
        
        $user->password = Hash::make($request->password);

        // dd($user);
        $user->save();
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
        $user = User::find($user);
        $role = Role::all();
        $kementerian = Refgeneral::where('MASTERCODE', 10028)->get();
        return view('pengurusanpengguna.edit', [
            'user' => $user,
            'kementerians' => $kementerian,
            'role'=>$role
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
        // dd($request->all());
        $user = User::find($user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nric = $request->nric;
        $user->ministry_code = $request->ministry_code;
        $user->office_number = $request->office_number;
        // $user->fax_number = $request->fax_number;
        // $user->telephone_number = $request->telephone_number;

        if($user->user_group_id == "1"){
            $user->removeRole('pentadbir sistem');
        }elseif($user->user_group_id == "2"){
            $user->removeRole('pentadbir penilaian');
        }elseif($user->user_group_id == "3"){
            $user->removeRole('penyelaras');
        }elseif($user->user_group_id == "4"){
            $user->removeRole('pengawas');
        }elseif($user->user_group_id == "5"){
            $user->removeRole('calon');
        }elseif($user->user_group_id == "6"){
            $user->removeRole('pegawai korporat');
        }

        $user->user_group_id = $request->user_group_id;

        if($request->user_group_id == "1"){
            $user->assignRole('pentadbir sistem');
        }elseif($request->user_group_id == "2"){
            $user->assignRole('pentadbir penilaian');
        }elseif($request->user_group_id == "3"){
            $user->assignRole('penyelaras');
        }elseif($request->user_group_id == "4"){
            $user->assignRole('pengawas');
        }elseif($request->user_group_id == "5"){
            $user->assignRole('calon');
        }elseif($request->user_group_id == "6"){
            $user->assignRole('pegawai korporat');
        }
        // $user->password = Hash::make($request->password);
        $user->save();
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
        return redirect('/pengurusanpengguna')->with('success', 'Berjaya dihapus!');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\KumpulanPengguna;
use App\Models\KebenaranPengguna;
use App\Models\PerananDanKebenaran;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class KumpulanPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $roles = Role::all();

        // dd($jawapan_calon);
        return view('kawalan_sistem.kumpulan_pengguna.index',[
            'roles'=>$roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kawalan_sistem.kumpulan_pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::create(['name' => $request->DESCRIPTION]);
        
        return redirect('/kebenaran_pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KumpulanPengguna  $lamanUtama
     * @return \Illuminate\Http\Response
     */
    public function show(KumpulanPengguna $KumpulanPengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KumpulanPengguna  $lamanUtama
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peranan = Role::find($id);
        $kebenaran = Permission::all();
        
        return view('kawalan_sistem.kumpulan_pengguna.edit',[
            'peranan'=>$peranan,
            'kebenaran'=>$kebenaran,
            'id_kumpulan'=>$id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KumpulanPengguna  $lamanUtama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nama_role = Role::where('id', $id)->first();
        $nama_role = $nama_role->name;
        $role = Role::findByName($nama_role);
        $kebenaran = Permission::get();

        foreach($kebenaran as $kebenaran){
            $role->revokePermissionTo($kebenaran->name);
            $nama = str_replace(" ","_",$kebenaran->name);
            if($request->$nama == "1"){
                $role->givePermissionTo($kebenaran->name);
            }
        }
        
        return redirect('/kebenaran_pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KumpulanPengguna  $lamanUtama
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {
        $role = Role::find($role);
        $role->delete();

        return redirect('/kebenaran_pengguna');

    }

    public function edit_menu($role_id, $permission_id){
        $kebenaran = Permission::where('id', $permission_id)->first();
        return view('kawalan_sistem.kumpulan_pengguna.edit_menu',[
            'kebenaran'=>$kebenaran,
            'peranan'=>$role_id
        ]);
    }

    public function update_kebenaran(Request $request, $role_id, $permission_id){
        $kebenaran = Permission::where('id', $permission_id)->first();
        $kebenaran->name = $request->name;
        $kebenaran->save();
        return redirect('/kebenaran_pengguna/'.$role_id.'/edit');
    }
}

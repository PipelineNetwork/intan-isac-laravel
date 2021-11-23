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
        $roles = KumpulanPengguna::all();

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
        $peranan = KumpulanPengguna::find($id);
        $kebenaran = KebenaranPengguna::all();
        
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
        $kebenaran = KebenaranPengguna::get();

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
    public function destroy(KumpulanPengguna $lamanUtama)
    {
        //
    }

    public function edit_menu($id_kumpulan, $id_menu){
        $peranan = KumpulanPengguna::find($id_kumpulan);
        $kebenaran = KebenaranPengguna::all();
        return view('kawalan_sistem.kumpulan_pengguna.edit_menu',[
            'peranan'=>$peranan,
            'kebenaran'=>$kebenaran,
            'id_kumpulan'=>$id_kumpulan,
            'id_menu'=>$id_menu
        ]);
    }

    public function update_kebenaran(Request $request, $id_kumpulan, $menu_id){
// dd($request);
    }
}

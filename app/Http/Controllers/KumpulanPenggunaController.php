<?php

namespace App\Http\Controllers;
use App\Models\KumpulanPengguna;
use App\Models\KebenaranPengguna;

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
        $pengguna = new KumpulanPengguna;
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
        $kumpulan_pengguna = KumpulanPengguna::find($id);
        $id_kumpulan = $id;
        $kump_pengguna = $kumpulan_pengguna->GROUP_ID;
        // dd($kumpulan_pengguna);
        $kebenaran = KebenaranPengguna::where('MENUPARENT', 0)->get();
        return view('kawalan_sistem.kumpulan_pengguna.edit',[
            'kumpulan_pengguna'=>$kumpulan_pengguna,
            'kebenaran'=>$kebenaran,
            'kump_pengguna'=>$kump_pengguna,
            'id_kumpulan'=>$id_kumpulan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KumpulanPengguna  $lamanUtama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KumpulanPengguna $KumpulanPengguna)
    {
        //
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
        $kumpulan_pengguna = KumpulanPengguna::find($id_kumpulan);
        $kebenaran_title = KebenaranPengguna::where('MENUID', $id_menu)->first();
        $kebenaran = KebenaranPengguna::where('MENUPARENT', $id_menu)->get();
        return view('kawalan_sistem.kumpulan_pengguna.edit_menu',[
            'kumpulan_pengguna'=>$kumpulan_pengguna,
            'kebenaran'=>$kebenaran,
            'id_kumpulan'=>$id_kumpulan,
            'kebenaran_title'=>$kebenaran_title,
            'id_menu'=>$id_menu
        ]);
    }

    public function update_kebenaran(Request $request, $id_kumpulan, $menu_id){
// dd($request);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\LamanUtama;
use Illuminate\Http\Request;

class LamanUtamaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laman_utama = LamanUtama::all();

        return view('kawalan_sistem.laman_utama.index',[
            'laman_utama'=>$laman_utama
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LamanUtama  $lamanUtama
     * @return \Illuminate\Http\Response
     */
    public function show(LamanUtama $lamanUtama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LamanUtama  $lamanUtama
     * @return \Illuminate\Http\Response
     */
    public function edit(LamanUtama $laman_utama)
    {
        return view('kawalan_sistem.laman_utama.edit',[
            'laman_utama'=>$laman_utama
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LamanUtama  $lamanUtama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LamanUtama $laman_utama)
    {
        $laman_utama->TAJUK = $request->TAJUK;
        $laman_utama->KETERANGAN = $request->KETERANGAN;
        $laman_utama->STATUS = $request->STATUS;

        $laman_utama->save();
        return redirect('/laman_utama');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LamanUtama  $lamanUtama
     * @return \Illuminate\Http\Response
     */
    public function destroy(LamanUtama $lamanUtama)
    {
        //
    }
}

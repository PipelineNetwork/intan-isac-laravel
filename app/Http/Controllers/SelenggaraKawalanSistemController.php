<?php

namespace App\Http\Controllers;

use App\Models\SelenggaraKawalanSistem;
use Illuminate\Http\Request;

class SelenggaraKawalanSistemController extends Controller
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
        $kawalan = SelenggaraKawalanSistem::first();
        return view('kawalan_sistem.selenggara.index',[
            'kawalan'=>$kawalan
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
     * @param  \App\Models\SelenggaraKawalanSistem  $selenggaraKawalanSistem
     * @return \Illuminate\Http\Response
     */
    public function show(SelenggaraKawalanSistem $selenggaraKawalanSistem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SelenggaraKawalanSistem  $selenggaraKawalanSistem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kawalan = SelenggaraKawalanSistem::where('ID_KAWALAN_SISTEM', $id)->first();
        return view('kawalan_sistem.selenggara.edit',[
            'kawalan'=>$kawalan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SelenggaraKawalanSistem  $selenggaraKawalanSistem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kawalan)
    {
        $kawalan = SelenggaraKawalanSistem::where('ID_KAWALAN_SISTEM', $kawalan)->first();
        $kawalan->OPTION_PAPAR_KEPUTUSAN = $request->OPTION_PAPAR_KEPUTUSAN;
        $kawalan->TEMPOH_MASA_KESELURUHAN_PENILAIAN = $request->TEMPOH_MASA_KESELURUHAN_PENILAIAN;
        $kawalan->TEMPOH_MASA_PERINGATAN_TAMAT_SOALAN_PENGETAHUAN = $request->TEMPOH_MASA_PERINGATAN_TAMAT_SOALAN_PENGETAHUAN;
        $kawalan->TEMPOH_MASA_PERINGATAN_SEBELUM_TAMAT_PENILAIAN = $request->TEMPOH_MASA_PERINGATAN_SEBELUM_TAMAT_PENILAIAN;
        $kawalan->TEMPOH_KEBENARAN_PERMOHONAN_PESERTA_GAGAL = $request->TEMPOH_KEBENARAN_PERMOHONAN_PESERTA_GAGAL;
        $kawalan->TEMPOH_KEBENARAN_PERMOHONAN_PESERTA_BLACKLIST = $request->TEMPOH_KEBENARAN_PERMOHONAN_PESERTA_BLACKLIST;
        $kawalan->TEMPOH_TUTUP_TARIKH_PENILAIAN_INDIVIDU = $request->TEMPOH_TUTUP_TARIKH_PENILAIAN_INDIVIDU;
        $kawalan->TEMPOH_TUTUP_TARIKH_PENILAIAN_KUMPULAN = $request->TEMPOH_TUTUP_TARIKH_PENILAIAN_KUMPULAN;

        $kawalan->save();

        return redirect('/selenggara_kawalan_sistem')->with('success', 'Maklumat telah dikemaskini.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SelenggaraKawalanSistem  $selenggaraKawalanSistem
     * @return \Illuminate\Http\Response
     */
    public function destroy(SelenggaraKawalanSistem $selenggaraKawalanSistem)
    {
        //
    }
}

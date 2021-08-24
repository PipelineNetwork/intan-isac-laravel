<?php

namespace App\Http\Controllers;
use App\Models\Jadual;
use Illuminate\Http\Request;

class JadualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jaduals = Jadual::all();
        return view('jadual.index',[
            'jaduals'=> $jaduals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadual.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadual = new Jadual;
        $jadual ->KOD_SESI_PENILAIAN= $request->KOD_SESI_PENILAIAN;
        $jadual ->KOD_TAHAP= $request->KOD_TAHAP;
        $jadual ->KOD_MASA_MULA= $request->KOD_MASA_MULA;
        $jadual ->KOD_MASA_TAMAT= $request->KOD_MASA_TAMAT;
        $jadual ->TARIKH_SESI= $request->TARIKH_SESI;
        $jadual ->JUMLAH_KESELURUHAN= $request->JUMLAH_KESELURUHAN;
        $jadual ->platform= $request->platform;
        $jadual ->KOD_KATEGORI_PESERTA= $request->KOD_KATEGORI_PESERTA;
        $jadual ->KOD_KEMENTERIAN= $request->KOD_KEMENTERIAN;
        $jadual ->LOKASI= $request->LOKASI;
        $jadual ->status= $request->status;
        $jadual->save(); 
        return redirect('/jaduals');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jadual $jadual)
    {
        return view('jadual.show', [
            'jadual'=> $jadual
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_SESI)
    {
        $jadual = Jadual::where('ID_SESI', $ID_SESI)->first();
        return view('jadual.edit', ['jadual' => $jadual, 'ID_SESI' => $ID_SESI]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadual $jadual)
    {
        $jadual ->KOD_SESI_PENILAIAN= $request->KOD_SESI_PENILAIAN;
        $jadual ->KOD_TAHAP= $request->KOD_TAHAP;
        $jadual ->KOD_MASA_MULA= $request->KOD_MASA_MULA;
        $jadual ->KOD_MASA_TAMAT= $request->KOD_MASA_TAMAT;
        $jadual ->TARIKH_SESI= $request->TARIKH_SESI;
        $jadual ->JUMLAH_KESELURUHAN= $request->JUMLAH_KESELURUHAN;
        $jadual ->platform= $request->platform;
        $jadual ->KOD_KATEGORI_PESERTA= $request->KOD_KATEGORI_PESERTA;
        $jadual ->KOD_KEMENTERIAN= $request->KOD_KEMENTERIAN;
        $jadual ->LOKASI= $request->LOKASI;
        $jadual ->status= $request->status;
        $jadual->save(); 
        return redirect('/jaduals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadual $jadual)
    {
        $jadual = Jadual::find($jadual);
        $jadual->delete();
        return redirect('/jaduals');
    }
}

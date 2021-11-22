<?php

namespace App\Http\Controllers;

use App\Models\VideoDanNota;
use Illuminate\Http\Request;

class VideoDanNotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videodannotas = VideoDanNota::all();
        return view('kawalan_sistem.VideoDanNota.index',[
            'videodannotas'=>$videodannotas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kawalan_sistem.VideoDanNota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $videodannota = new VideoDanNota;
        $videodannota->tajuk = $request->tajuk;
        $videodannota->video = $request->file('video')->store('videodannota');
        $videodannota->nota = $request->nota;
        $videodannota->jenis = $request->jenis;

        $videodannota->save();
        return redirect('/videodannota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoDanNota  $videoDanNota
     * @return \Illuminate\Http\Response
     */
    public function show(VideoDanNota $videoDanNota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoDanNota  $videoDanNota
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoDanNota $videodannota, $id)
    {
        $videodannota = VideoDanNota::find($id);

        return view('kawalan_sistem.VideoDanNota.edit',[
            'videodannota'=>$videodannota
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoDanNota  $videoDanNota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $videodannota)
    {
        //
        $videodannota = VideoDanNota::find($videodannota);
        $videodannota->tajuk = $request->tajuk;
        if ($request->hasFile('video')){
            $videodannota->video = $request->file('video')->store('videodannota');
        }
        $videodannota->nota = $request->nota;

        $videodannota->save();
        return redirect('/videodannota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoDanNota  $videoDanNota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $videodannota = VideoDanNota::find($id);
        $videodannota->delete();
        return redirect('/videodannota');
    }
}

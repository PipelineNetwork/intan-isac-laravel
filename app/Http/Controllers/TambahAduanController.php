<?php

namespace App\Http\Controllers;

use App\Models\TambahAduan;
use Illuminate\Http\Request;

class TambahAduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tambahaduans = TambahAduan::all();
        return view('tambahaduan.index',[
            'tambahaduans'=> $tambahaduans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahaduan.create');
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
            'tajuk'=> 'required',

        ]);
 
        $file_aduan_send = $request ->file('file_aduan_send')->store('dokumen');
        $tambahaduan = new TambahAduan;
        $tambahaduan ->file_aduan_send = $file_aduan_send;
        $tambahaduan ->id= $request->id;
        $tambahaduan ->tajuk= $request->tajuk;
        $tambahaduan ->keterangan_aduan_send = $request->keterangan_aduan_send;
        $tambahaduan-> status = "baru";
        $tambahaduan->save(); 
        return redirect('/tambahaduans'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TambahAduan  $tambahAduan
     * @return \Illuminate\Http\Response
     */
    public function show(TambahAduan $tambahAduan)
    {
        return view('tambahaduan.show', [
            'tambahaduan'=> $tambahaduan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TambahAduan  $tambahAduan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tambahAduan = TambahAduan::where('id', $id)->first();
        return view('tambahaduan.edit', ['tambahaduan' => $tambahAduan, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TambahAduan  $tambahAduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TambahAduan $tambahAduan)
    {
        $tambahaduan = TambahAduan::where('id', $request->id)-> first();
        $file_aduan_reply = $request ->file('file_aduan_reply')->store('dokumen');
        $tambahaduan ->keterangan_aduan_reply = $request->keterangan_aduan_reply;
        $tambahaduan ->file_aduan_reply = $file_aduan_reply;
        $tambahaduan-> status = "dibalas";
        $tambahaduan->save(); 
        return redirect('/tambahaduans'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TambahAduan  $tambahAduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TambahAduan $tambahAduan)
    {
        //
    }
}
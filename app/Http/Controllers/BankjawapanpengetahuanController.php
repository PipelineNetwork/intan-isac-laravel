<?php

namespace App\Http\Controllers;

use App\Models\Bankjawapanpengetahuan;
use Illuminate\Http\Request;

class BankjawapanpengetahuanController extends Controller
{
    public function jawapan_calon(Request $request, $id_penilaian){
        // dd($request->all(), $id_penilaian);
        // $jawapans = $request->all();
        // dd($jawapan);
        // foreach($jawapans as $key=>$jawapan){
        //     dd($jawapans[$key]);
        // }
        return redirect('/kemasukan-id')->with('success', 'Tahniah, anda selesai menjawab');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Bankjawapanpengetahuan  $bankjawapanpengetahuan
     * @return \Illuminate\Http\Response
     */
    public function show(Bankjawapanpengetahuan $bankjawapanpengetahuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bankjawapanpengetahuan  $bankjawapanpengetahuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bankjawapanpengetahuan $bankjawapanpengetahuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bankjawapanpengetahuan  $bankjawapanpengetahuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bankjawapanpengetahuan $bankjawapanpengetahuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bankjawapanpengetahuan  $bankjawapanpengetahuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bankjawapanpengetahuan $bankjawapanpengetahuan)
    {
        //
    }
}

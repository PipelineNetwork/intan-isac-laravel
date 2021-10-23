<?php

namespace App\Http\Controllers;

use App\Models\Bankjawapanpengetahuan;
use App\Models\Banksoalanpengetahuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BankjawapanpengetahuanController extends Controller
{
    public function jawapan_calon(Request $request, $id_penilaian){
        // dd($request->all());
        
        $jawapans = $request->all();
        $bilangan = count($jawapans);

        // for($i=0;$i<$bilangan-1; $i++){
        //     $simpan_jawapan = new Bankjawapanpengetahuan;
        //     if($jawapans['soalan_'.$i]){
        //         $jawapans = $jawapans['soalan_'.$i];
        //         foreach($jawapans as $key=>$jawapan){
        //             if($key == 0){
        //                 $simpan_jawapan->id_soalan_pengetahuan = $jawapan;
        //             }else{
        //                 $simpan_jawapan->pilihan_jawapan = $jawapan;
        //             }
        //         }
        //     }
        //     $simpan_jawapan->id_calon = Auth::user()->nric;
        //     $jawapan_betul = Banksoalanpengetahuan::where('id', $simpan_jawapan->id_soalan_pengetahuan)->first();
        //     $jawapan_betul = $jawapan_betul->jawapan;
        //     if($simpan_jawapan->pilihan_jawapan == $jawapan_betul){
        //         $simpan_jawapan->markah = 1;
        //     }else{
        //         $simpan_jawapan->markah = 0;
        //     }
        // }
        // dd($simpan_jawapan);
        
        
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

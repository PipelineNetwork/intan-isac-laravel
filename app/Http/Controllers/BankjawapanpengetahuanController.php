<?php

namespace App\Http\Controllers;

use App\Models\Bankjawapanpengetahuan;
use App\Models\Banksoalanpengetahuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BankjawapanpengetahuanController extends Controller
{
    public function jawapan_calon(Request $request, $id_penilaian){
        // dd($request->all());
        
        $jawapans = $request->all();
        $bilangan = count($jawapans);
        // dd($jawapans);

        for($i=0;$i<$bilangan-3; $i++){
            $simpan_jawapan = new Bankjawapanpengetahuan;
            if($jawapans['soalan_'.$i]){
                $jawapans_calon = $jawapans['soalan_'.$i];
                foreach($jawapans_calon as $key=>$jawapan){
                    if($key == 0){
                        $simpan_jawapan->id_soalan_pengetahuan = $jawapan;
                    }else{
                        $simpan_jawapan->pilihan_jawapan = $jawapan;
                    }
                }
            }
            $simpan_jawapan->id_penilaian = $request->id_penilaian; 
            $simpan_jawapan->id_calon = Auth::user()->nric;
            $jawapan_betul = Banksoalanpengetahuan::where('id', $simpan_jawapan->id_soalan_pengetahuan)->first();
            $jawapan_betul = $jawapan_betul->jawapan;
            $simpan_jawapan->jawapan = $jawapan_betul;
            if($simpan_jawapan->pilihan_jawapan == $jawapan_betul){
                $simpan_jawapan->markah = 1;
            }else{
                $simpan_jawapan->markah = 0;
            }

            // $rules = [
            //     'pilihan_jawapan' => 'required',
            // ];
            // $messages = [
            //     'pilihan_jawapan.required' => 'Sila jawab semua soalan.',
            // ];

            // Validator::make($request->input(), $rules, $messages)->validate();
            $simpan_jawapan->save();
        }


        $masa_tamat_a = time();

        $range_masa = $masa_tamat_a - $request->masa_mula;
        
        return redirect('/soalan-kemahiran-internet')->with('success', 'Tahniah, anda selesai menjawab soalan pengetahuan. Sila jawab soalan kemahiran.');
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

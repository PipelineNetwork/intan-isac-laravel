<?php

namespace App\Http\Controllers;

use App\Models\Bankjawapanpengetahuan;
use App\Models\Banksoalanpengetahuan;
use App\Models\KeputusanPenilaian;
use App\Models\MohonPenilaian;
use App\Models\PemilihanSoalan;
use App\Models\Jadual;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BankjawapanpengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jawapan_calon = MohonPenilaian::distinct()->get(['no_ic', 'nama']);

        // dd($jawapan_calon);
        return view('proses_penilaian.keputusan_penilaian.semak_keputusan_admin',[
            'jawapan_calon'=>$jawapan_calon
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

    public function jawapan_calon(Request $request, $id_penilaian){
        // dd($request->all());
        
        $jawapans = $request->all();
        $bilangan = count($jawapans);
        // dd($jawapans);

        for($i=0;$i<$bilangan-4; $i++){
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
            $simpan_jawapan->save();
        }
        
        if($request->timer == null){
            return redirect('/soalan-kemahiran-internet/'.$id_penilaian)->with('success', 'Tahniah, anda selesai menjawab soalan pengetahuan. Sila jawab soalan kemahiran.');
        }else{
            return view('kemasukan_id.masa_tamat');
        }

        
    }

    public function senarai_penilaian($ic){
        $penilaian = MohonPenilaian::where('no_ic', $ic)->get();
        $ic = $ic;
        return view('proses_penilaian.keputusan_penilaian.senarai_penilaian', [
            'penilaian'=>$penilaian,
            'ic'=>$ic
        ]);
    }

    public function check_jawapan($ic, $id){
        $jawapan = Bankjawapanpengetahuan::where('id_calon', $ic)
        ->where('id_penilaian', $id)
        ->get();

        $ic = $ic;
        return view('proses_penilaian.keputusan_penilaian.senarai_jawapan',[
            'jawapan'=>$jawapan,
            'ic'=>$ic
        ]);
    }
}

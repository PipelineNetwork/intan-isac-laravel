<?php

namespace App\Http\Controllers;

use App\Models\Bankjawapanpengetahuan;
use App\Models\Banksoalanpengetahuan;
use App\Models\KeputusanPenilaian;
use App\Models\MohonPenilaian;
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
        $jawapan_calon = Bankjawapanpengetahuan::distinct()->get(['id_calon','id_penilaian']);

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
            $simpan_jawapan->save();
        }

        $ic = Auth::user()->nric;
        $peserta = MohonPenilaian::where('no_ic', $ic)->first();
        $jadual = Jadual::where('ID_PENILAIAN', $request->id_penilaian)->first();

        $keputusan = Bankjawapanpengetahuan::where('id_calon', $ic)
        ->where('id_penilaian', $id_penilaian)
        ->get();

        $markah = 0;
        foreach($keputusan as $keputusan){
            $markah = $markah + $keputusan->markah;
        }

        $keputusan = new KeputusanPenilaian;
        $keputusan->id_peserta = $peserta->id_calon;
        $keputusan->id_penilaian = $request->id_penilaian;
        $keputusan->nama_peserta = $peserta->nama;
        $keputusan->ic_peserta = $ic;
        $keputusan->tarikh_penilaian = $jadual->TARIKH_SESI;
        if($jadual->LOKASI != null){
            $keputusan->lokasi = $jadual->LOKASI;
        }else{
            $keputusan->lokasi = "Atas Talian";
        }
        $keputusan->markah_pengetahuan = $markah;
        $keputusan->markah_kemahiran = 0;
        $keputusan->markah_keseluruhan = $keputusan->markah_pengetahuan+$keputusan->markah_kemahiran;
        if($keputusan->markah_keseluruhan >= 0){
            $keputusan->keputusan = "Lulus";
        }else{
            $keputusan->keputusan = "Gagal";
        }
        $keputusan->save();

        $rekodtarikh = KeputusanPenilaian::where('id_penilaian', $request->id_penilaian)
        ->get();
        $bilangan_rekod = count($rekodtarikh);
        $bilangan = $bilangan_rekod-1;
        // dd($rekodtarikh[0]);

        if($bilangan == -1 || $bilangan == 0){
            $bilangan= 0;
            $no_sijil_latest = $rekodtarikh[$bilangan]->no_sijil;
        }else{
            $no_sijil_latest = $rekodtarikh[$bilangan-1]->no_sijil;
        }
        // dd($bilangan);
        // $no_sijil_latest = $rekodtarikh[$bilangan]->no_sijil;
        // dd($rekodtarikh);
        if($no_sijil_latest == null){
            // dd('sini null');
            $no_sijil = 00000+1;
            $keputusan->no_sijil = sprintf("%'.05d", $no_sijil);
        }else{
            // dd('sini tak null');
            $no_sijil = $no_sijil_latest+00001;
            $keputusan->no_sijil = sprintf("%'.05d", $no_sijil);
        }
        
        $keputusan->save();        

        return redirect('/soalan-kemahiran-internet')->with('success', 'Tahniah, anda selesai menjawab soalan pengetahuan. Sila jawab soalan kemahiran.');
    }

    public function check_jawapan($ic, $id){
        $jawapan = Bankjawapanpengetahuan::where('id_calon', $ic)
        ->where('id_penilaian', $id)
        ->get();

        return view('proses_penilaian.keputusan_penilaian.senarai_jawapan',[
            'jawapan'=>$jawapan
        ]);
    }
}

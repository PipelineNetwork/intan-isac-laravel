<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadual;
use App\Models\MohonPenilaian;
use App\Models\Banksoalanpengetahuan;
use App\Models\Bankjawapanpengetahuan;
use App\Models\PemilihanSoalanKumpulan;
use Illuminate\Support\Facades\Auth;
use App\Models\SelenggaraKawalanSistem;

class KemasukanPenilaianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function kemasukan_id(Request $request){

        // check availability ID_PENILAIAN
        $id_penilaian = $request->id_penilaian;
        $jadual = Jadual::where("ID_PENILAIAN", $id_penilaian)->first();
        if($jadual == null){
            // dd("tidak sah");
            alert("Id Penilaian tidak sah");
            return redirect('/kemasukan-id');
        }

        // check calon match dgn id
        $nric = Auth::user()->nric;
        $check_id = MohonPenilaian::where('no_ic', $nric)->where('id_sesi', $id_penilaian)->first();
        if($check_id == null){
            alert("Anda tiada dalam senarai calon penilaian untuk sesi ini");
            return redirect('/kemasukan-id');
        }

        // check calon dah jawab ke belum
        $id_penilaian_done = Bankjawapanpengetahuan::where('id_calon', $nric)->where('id_penilaian', $id_penilaian)->first();
        if($id_penilaian_done != null){
            alert("Anda telah menjawab penilaian ini.");
            return redirect('/kemasukan-id');
        }

        //semua check passed, baru exam
        $calon = MohonPenilaian::where("id_sesi", $id_penilaian)->where('no_ic', $nric)->first();
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $masa = date('H:i');
        $masa_mula = $jadual->KOD_MASA_MULA;
        $masa_tamat = $jadual->KOD_MASA_TAMAT;

        $tarikh = date('d-m-Y');
        $tarikh_penilaian = date('d-m-Y', strtotime($jadual->TARIKH_SESI));
        return view('kemasukan_id.paparan_maklumat_penilaian',[
            
            'calon'=>$calon,
            'id_penilaian'=>$id_penilaian,
            'masa'=>$masa,
            'masa_mula'=>$masa_mula,
            'masa_tamat'=>$masa_tamat,
            'tarikh'=>$tarikh,
            'tarikh_penilaian'=>$tarikh_penilaian
        ]);
    }

    public function kemasukan_penilaian($id_penilaian, $soalan){
        $sesi = Jadual::where('ID_PENILAIAN', $id_penilaian)->first();
        $tahap = $sesi->KOD_TAHAP;
        $soalan_penilaian = Banksoalanpengetahuan::where('id_tahap_soalan', $tahap)->get();
        $pemilihan_soalan = PemilihanSoalanKumpulan::all();

       
        $set_soalan = [];
        foreach($pemilihan_soalan as $ps){
            $soalan = Banksoalanpengetahuan::where('id_tahap_soalan', $tahap)->where('id_kategori_pengetahuan', $ps->KOD_KATEGORI_SOALAN)->inRandomOrder()->limit($ps->NILAI_JUMLAH_SOALAN)->get();
            if(count($soalan)!=0){
                array_push($set_soalan, $soalan);    
            }
        }

        $s_penilaian = [];
        foreach ($set_soalan as $set) {
            foreach ($set as $s) {
                array_push($s_penilaian, $s);
            }
        }
        $masa_mula = time();
        $soalan_penilaian = collect($s_penilaian);

        $masa_penilaian = SelenggaraKawalanSistem::where('ID_KAWALAN_SISTEM', '1')->first();
        $masa_keseluruhan = $masa_penilaian->TEMPOH_MASA_KESELURUHAN_PENILAIAN;
        $masa_keseluruhan = $masa_keseluruhan*60;

        $masa_pengetahuan = $masa_penilaian->TEMPOH_MASA_PERINGATAN_TAMAT_SOALAN_PENGETAHUAN;
        $masa_pengetahuan = $masa_pengetahuan*60000;
        // dd($masa_pengetahuan);
        return view('kemasukan_id.kemasukan_penilaian',[
            'soalan_penilaian'=>$soalan_penilaian,
            'id_penilaian'=>$id_penilaian,
            'masa_mula'=>$masa_mula,
            'masa_keseluruhan'=>$masa_keseluruhan,
            'masa_pengetahuan'=>$masa_pengetahuan
        ]);
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadual;
use App\Models\MohonPenilaian;
use App\Models\Banksoalanpengetahuan;
use App\Models\Bankjawapanpengetahuan;
use App\Models\PemilihanSoalanKumpulan;
use Illuminate\Support\Facades\Auth;

class KemasukanPenilaianController extends Controller
{
    public function kemasukan_id(Request $request){
        $id_penilaian = $request->id_penilaian;
        $jadual = Jadual::where("ID_PENILAIAN", $id_penilaian)->first();

        // check availability ID_PENILAIAN
        if($jadual == null){
            // dd("tidak sah");
            alert("Id Penilaian tidak sah");
            return redirect('/kemasukan-id');
        }

        $calon = MohonPenilaian::where("id_sesi", $id_penilaian)->get();
        $nric = Auth::user()->nric;

        // check calon match dengan id penilaian
        foreach($calon as $calon){
            $ic_calon = $calon->no_ic;
            
            // check calon dah jawab ke belum
            // $id_penilaian_done = Bankjawapanpengetahuan::where('id_penilaian', $id_penilaian)->get();
            // foreach($id_penilaian_done as $check_id){
            //     $id_calon_done = $check_id->id_calon;
            //     if($id_calon_done == $ic_calon){
            //         alert("Anda telah menjawab pernilaian ini.");
            //         return redirect('/kemasukan-id');
            //     }
            // }

            $masa = date('H:i');
            $masa_mula = $jadual->KOD_MASA_MULA;


            if($nric == $ic_calon){
                // dd('jadi');
                return view('kemasukan_id.paparan_maklumat_penilaian',[
                    'jadual'=>$jadual,
                    'calon'=>$calon,
                    'id_penilaian'=>$id_penilaian,
                    'masa'=>$masa,
                    'masa_mula'=>$masa_mula
                ]);
            }
        }

        alert("Anda tiada dalam senarai calon penilaian untuk id ini");
        return redirect('/kemasukan-id');
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

        return view('kemasukan_id.kemasukan_penilaian',[
            'soalan_penilaian'=>$soalan_penilaian,
            'id_penilaian'=>$id_penilaian,
            'masa_mula'=>$masa_mula
        ]);
    }

    
}

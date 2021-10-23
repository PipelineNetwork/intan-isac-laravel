<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadual;
use App\Models\MohonPenilaian;
use App\Models\Banksoalanpengetahuan;
use App\Models\Bankjawapanpengetahuan;
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
            $id_penilaian_done = Bankjawapanpengetahuan::where('id_penilaian', $id_penilaian)->get();
            foreach($id_penilaian_done as $check_id){
                $id_calon_done = $check_id->id_calon;
                if($id_calon_done == $ic_calon){
                    alert("Anda telah menjawab pernilaian ini.");
                    return redirect('/kemasukan-id');
                }
            }


            if($nric == $ic_calon){
                // dd('jadi');
                return view('kemasukan_id.paparan_maklumat_penilaian',[
                    'jadual'=>$jadual,
                    'calon'=>$calon,
                    'id_penilaian'=>$id_penilaian
                ]);
            }
        }

        alert("Anda tiada dalam senarai calon penilaian untuk id ini");
        return redirect('/kemasukan-id');
    }

    public function kemasukan_penilaian($id_penilaian, $soalan){
        // dd($id_penilaian, $soalan);
        $sesi = Jadual::where('ID_PENILAIAN', $id_penilaian)->first();
        $tahap = $sesi->KOD_TAHAP;
        $tahap = str_replace('0', '', $tahap);
        $soalan_penilaian = Banksoalanpengetahuan::where('id_tahap_soalan', $tahap)->get();

        return view('kemasukan_id.kemasukan_penilaian',[
            'soalan_penilaian'=>$soalan_penilaian,
            'id_penilaian'=>$id_penilaian
        ]);
    }

    
}

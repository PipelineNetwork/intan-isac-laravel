<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadual;
use App\Models\MohonPenilaian;
use App\Models\Banksoalanpengetahuan;
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
            return false;
        }

        $calon = MohonPenilaian::where("id_sesi", $id_penilaian)->get();
        $nric = Auth::user()->nric;

        // check calon match dengan id penilaian
        foreach($calon as $calon){
            $ic_calon = $calon->no_ic;
            if($nric == $ic_calon){
                // dd('jadi');
                return view('kemasukan_id.paparan_maklumat_penilaian',[
                    'jadual'=>$jadual,
                    'calon'=>$calon,
                    'id_penilaian'=>$id_penilaian
                ]);
            }else{
                alert("Anda tiada dalam");
                return false;
            }
        }
    }

    public function kemasukan_penilaian($id_penilaian, $soalan){
        // dd($id_penilaian, $soalan);
        $sesi = Jadual::where('ID_PENILAIAN', $id_penilaian)->first();
        $tahap = $sesi->KOD_TAHAP;
        $tahap = str_replace('0', '', $tahap);
        $soalan_penilaian = Banksoalanpengetahuan::where('id_tahap_soalan', $tahap)->get();

        return view('kemasukan_id.kemasukan_penilaian',[
            'soalan_penilaian'=>$soalan_penilaian
        ]);
    }
}

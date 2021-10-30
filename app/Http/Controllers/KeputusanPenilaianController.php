<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeputusanPenilaian;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Models\Bankjawapanpengetahuan;

class KeputusanPenilaianController extends Controller
{

    public function index(){

        $keputusans = KeputusanPenilaian::all();
        return view('proses_penilaian.keputusan_penilaian.semakan_penilaian',[
            'keputusans'=>$keputusans
        ]);

    }
    public function semak_keputusan(Request $request){
        $ic = $request->ic;
        $id_penilaian = $request->id_penilaian;

        $keputusan = Bankjawapanpengetahuan::where('id_calon', $ic)
        ->where('id_penilaian', $id_penilaian)
        ->get();

        $bilangan = count($keputusan);
        if ($bilangan == 0) {
            alert('Maaf, tiada dalam rekod.');
            return view('proses_penilaian.keputusan_penilaian.semakan_penilaian');
        }else{
            $markah = 0;
            foreach($keputusan as $keputusan){
                $markah = $markah + $keputusan->markah;
            }
            
            return view('proses_penilaian.keputusan_penilaian',[
                'markah'=>$markah,
                'semua'=>$bilangan
            ]);
        }
    }

    public function slip_keputusan(){
        $nama = Auth::user()->name;
        $ic = Auth::user()->nric;
        $tarikh = date("d-m-Y");

        $pdf = PDF::loadView('pdf.slip_keputusan',[
            'nama'=>$nama,
            'ic'=>$ic,
            'tarikh'=>$tarikh,
        ]);
         return $pdf->download('Slip_keputusan_'.$ic.'.pdf');

    }
    public function sijil_isac(){
        $nama = Auth::user()->name;
        $ic = Auth::user()->nric;
        $tarikh = date("d-m-Y");

        $pdf = PDF::loadView('pdf.sijil_isac',[
            'nama'=>$nama,
            'ic'=>$ic,
            'tarikh'=>$tarikh,
        ]);
         return $pdf->download('Sijil_ISAC_'.$ic.'.pdf');

    }
}

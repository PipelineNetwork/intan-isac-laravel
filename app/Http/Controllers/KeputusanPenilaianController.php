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
        return view('proses_penilaian.senarai_slip',[
            'keputusans'=>$keputusans
        ]);

    }

    public function senarai_sijil(){

        $keputusans = KeputusanPenilaian::where('keputusan', 'Lulus')->get();
        return view('proses_penilaian.senarai_sijil',[
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
            return view('proses_penilaian.senarai_slip');
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

    public function slip_keputusan($id){
        $rekod_sijil = KeputusanPenilaian::find($id);
        $nama = $rekod_sijil->nama_peserta;
        $ic = $rekod_sijil->ic_peserta;
        $tarikh = $rekod_sijil->tarikh_penilaian;

        $pdf = PDF::loadView('pdf.slip_keputusan',[
            'nama'=>$nama,
            'ic'=>$ic,
            'tarikh'=>$tarikh,
        ]);
         return $pdf->download('Slip_keputusan_'.$ic.'.pdf');

    }
    public function sijil_isac($id){
        $rekod_sijil = KeputusanPenilaian::find($id);
        $nama = $rekod_sijil->nama_peserta;
        $ic = $rekod_sijil->ic_peserta;
        $tarikh = $rekod_sijil->tarikh_penilaian;
        $no_sijil = $rekod_sijil->no_sijil; 

        $pdf = PDF::loadView('pdf.sijil_isac',[
            'nama'=>$nama,
            'ic'=>$ic,
            'tarikh'=>$tarikh,
            'no_sijil'=>$no_sijil
        ]);
         return $pdf->download('Sijil_ISAC_'.$ic.'.pdf');

    }
}

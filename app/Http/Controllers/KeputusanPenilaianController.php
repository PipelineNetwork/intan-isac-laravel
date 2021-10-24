<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class KeputusanPenilaianController extends Controller
{
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

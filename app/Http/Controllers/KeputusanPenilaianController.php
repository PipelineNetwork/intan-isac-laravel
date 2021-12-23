<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeputusanPenilaian;
use App\Models\MohonPenilaian;
use App\Models\Jadual;
use App\Models\PemilihanSoalan;
use Illuminate\Support\Facades\Auth;
use App\Models\Bankjawapancalon;
use PDF;
use App\Models\Bankjawapanpengetahuan;

class KeputusanPenilaianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
    
    public function semak_keputusan($ic, $id_penilaian){

        $keputusans = KeputusanPenilaian::where('id_penilaian', $id_penilaian)
        ->where('ic_peserta', $ic)->first();

        if ($keputusans == null) {
            alert('Tiada dalam rekod penilaian');
            return redirect('/semakan_keputusan_calon');
        }
        return view('proses_penilaian.keputusan_penilaian.keputusan_calon',[
            'keputusan'=>$keputusans
        ]);
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

        $text_qr = "No. Kad Pengenalan: ".$ic."
No. Sijil: ".sprintf("%'.05d\n", $no_sijil);
        $qr_encode = urlencode($text_qr);

        $pdf = PDF::loadView('pdf.sijil_isac',[
            'nama'=>$nama,
            'ic'=>$ic,
            'tarikh'=>$tarikh,
            'no_sijil'=>$no_sijil,
            'qr'=>$qr_encode
        ]);
         return $pdf->download('Sijil_ISAC_'.$ic.'.pdf');

    }

    public function senarai_penilaian_calon(){
        $calon = Auth::user();
        $penilaian = MohonPenilaian::where('no_ic', $calon->nric)->get();
// dd($penilaian);
        return view('proses_penilaian.keputusan_penilaian.semak_keputusan_calon',[
            'calon'=>$calon,
            'penilaian'=>$penilaian
        ]);
    }

    public function markah_semua($id_penilaian){
        $ic = Auth::user()->nric;
        $peserta = MohonPenilaian::where('no_ic', $ic)->first();
        $jadual = Jadual::where('ID_PENILAIAN', $id_penilaian)->first();

        $keputusan = Bankjawapanpengetahuan::where('id_calon', $ic)
        ->where('id_penilaian', $id_penilaian)
        ->get();

        $markah = 0;
        foreach($keputusan as $keputusan){
            $markah = $markah + $keputusan->markah;
        }

        $m_kemahiran = Bankjawapancalon::where('id_penilaian', $id_penilaian)->where('ic_calon', $ic)->get();
        foreach($m_kemahiran as $m_kemahiran){
            if ($m_kemahiran->markah_kemahiran != null) {
                $markah_kem = $m_kemahiran->markah_kemahiran;
            }else{
                $markah_kem = 0;
            }
        }

        $keputusan = new KeputusanPenilaian;
        $keputusan->id_peserta = $peserta->id_calon;
        $keputusan->id_penilaian = $id_penilaian;
        $keputusan->nama_peserta = $peserta->nama;
        $keputusan->ic_peserta = $ic;
        $keputusan->tarikh_penilaian = $jadual->TARIKH_SESI;
        if($jadual->LOKASI != null){
            $keputusan->lokasi = $jadual->LOKASI;
        }else{
            $keputusan->lokasi = "Atas Talian";
        }
        $keputusan->markah_pengetahuan = $markah;
        $keputusan->markah_kemahiran = $markah_kem;
        $keputusan->markah_keseluruhan = $keputusan->markah_pengetahuan+$keputusan->markah_kemahiran;

        $gred_lulus = PemilihanSoalan::where('ID_PEMILIHAN_SOALAN', '70')->first();
        $lulus = $gred_lulus->NILAI_MARKAH_LULUS;

        if($keputusan->markah_keseluruhan >= $lulus){
            $keputusan->keputusan = "Lulus";
        }else{
            $keputusan->keputusan = "Gagal";
        }
        $m_penilaian = MohonPenilaian::where('no_ic', $ic)->where('id_sesi', $id_penilaian)->first();
        $m_penilaian->status_penilaian = $keputusan->keputusan;
        $m_penilaian->save();
        $keputusan->save();

        $rekodtarikh = KeputusanPenilaian::where('id_penilaian', $id_penilaian)
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
            $no_sijil = $no_sijil_latest+00001;
            $keputusan->no_sijil = sprintf("%'.05d", $no_sijil);
        }
        
        $keputusan->save();

        return redirect('/tamat-penilaian');
    }
}

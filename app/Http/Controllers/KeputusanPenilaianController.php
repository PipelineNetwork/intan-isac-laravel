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

    public function index()
    {

        $keputusans = KeputusanPenilaian::orderBy('created_at', 'desc')->get();
        return view('proses_penilaian.senarai_slip', [
            'keputusans' => $keputusans
        ]);
    }

    public function create(){
        return view('testing');
    }

    public function destroy($id){
        $keputusan = KeputusanPenilaian::find($id);
        $keputusan->delete();
        
        return redirect('/keputusan_penilaian');
    }

    public function store(Request $request){
        $ic = $request->ic;
        $id_penilaian = $request->id_penilaian;
        $peserta = MohonPenilaian::where('no_ic', $ic)->first();
        $jadual = Jadual::where('ID_PENILAIAN', $id_penilaian)->first();

        $keputusan = Bankjawapanpengetahuan::where('id_calon', $ic)
            ->where('id_penilaian', $id_penilaian)
            ->get();

        $markah = 0;
        foreach ($keputusan as $keputusan) {
            $markah = $markah + $keputusan->markah;
        }

        $m_kemahiran = Bankjawapancalon::where('id_penilaian', $id_penilaian)
            ->where('ic_calon', $ic)
            ->where('jumlah_markah_internet', '!=', null)
            ->where('jumlah_markah_word', '!=', null)
            ->where('jumlah_markah_email', '!=', null)
            ->get()->first();

        // dd($m_kemahiran);
        $markah_internet = $m_kemahiran->jumlah_markah_internet;
        $markah_word = $m_kemahiran->jumlah_markah_word;
        $markah_email = $m_kemahiran->jumlah_markah_email;

        $markah_kem = $markah_internet +  $markah_word + $markah_email + $markah_email;
        $keputusan = new KeputusanPenilaian;
        $keputusan->id_peserta = $peserta->id_calon;
        $keputusan->id_penilaian = $id_penilaian;
        $keputusan->nama_peserta = $peserta->nama;
        $keputusan->ic_peserta = $ic;
        $keputusan->tarikh_penilaian = $jadual->TARIKH_SESI;
        if ($jadual->LOKASI != null) {
            $keputusan->lokasi = $jadual->LOKASI;
        } else {
            $keputusan->lokasi = "Atas Talian";
        }

        $gred_lulus = PemilihanSoalan::where('ID_PEMILIHAN_SOALAN', '70')->first();
        $lulus_pengetahuan = $gred_lulus->NILAI_MARKAH_LULUS;

        $keputusan->markah_pengetahuan = $markah;
        if ($keputusan->markah_pengetahuan >= $lulus_pengetahuan) {
            $keputusan->keputusan_pengetahuan = "Melepasi";
        } else {
            $keputusan->keputusan_pengetahuan = "Tidak Melepasi";
        }

        $keputusan->markah_internet = $markah_internet;
        // if ($keputusan->markah_internet == 2) {
        if ($keputusan->markah_internet >= 1) {
            $keputusan->keputusan_internet = "Melepasi";
        } else {
            $keputusan->keputusan_internet = "Tidak Melepasi";
        }

        $keputusan->markah_word = $markah_word;
        // if ($keputusan->markah_word == 9) {
        if ($keputusan->markah_word >= 1) {
            $keputusan->keputusan_word = "Melepasi";
        } else {
            $keputusan->keputusan_word = "Tidak Melepasi";
        }

        $keputusan->markah_email = $markah_email;
        if ($keputusan->markah_email >= 1) {
            $keputusan->keputusan_email = "Melepasi";
        } else {
            $keputusan->keputusan_email = "Tidak Melepasi";
        }

        $keputusan->markah_kemahiran = $markah_kem;

        $keputusan->markah_keseluruhan = $keputusan->markah_pengetahuan + $keputusan->markah_kemahiran;

        if (($keputusan->keputusan_pengetahuan == "Melepasi") && ($keputusan->keputusan_internet == "Melepasi") && ($keputusan->keputusan_word == "Melepasi") && ($keputusan->keputusan_email == "Melepasi")) {
            $keputusan->keputusan = "Lulus";
        } else {
            $keputusan->keputusan = "Gagal";
        }

        $m_penilaian = MohonPenilaian::where('no_ic', $ic)->where('id_sesi', $id_penilaian)->first();
        $m_penilaian->status_penilaian = $keputusan->keputusan;
        $m_penilaian->save();
        $keputusan->save();

        $rekodtarikh = KeputusanPenilaian::where('id_penilaian', $id_penilaian)
            ->get();
        $bilangan_rekod = count($rekodtarikh);
        $bilangan = $bilangan_rekod - 1;
        // dd($rekodtarikh[0]);

        if ($bilangan == -1 || $bilangan == 0) {
            $bilangan = 0;
            $no_sijil_latest = $rekodtarikh[$bilangan]->no_sijil;
        } else {
            $no_sijil_latest = $rekodtarikh[$bilangan - 1]->no_sijil;
        }
        if ($no_sijil_latest == null) {
            $no_sijil = 00000 + 1;
            $keputusan->no_sijil = sprintf("%'.03d", $no_sijil);
        } else {
            $no_sijil = $no_sijil_latest + 00001;
            $keputusan->no_sijil = sprintf("%'.03d", $no_sijil);
        }

        $keputusan->save();

        return redirect('/tamat-penilaian');
    }

    public function senarai_sijil()
    {

        $keputusans = KeputusanPenilaian::where('keputusan', 'Lulus')->get();
        return view('proses_penilaian.senarai_sijil', [
            'keputusans' => $keputusans
        ]);
    }

    public function semak_keputusan($ic, $id_penilaian)
    {

        $keputusans = KeputusanPenilaian::where('id_penilaian', $id_penilaian)
            ->where('ic_peserta', $ic)->first();

        $tahap = Jadual::where('id_penilaian', $id_penilaian)->first();

        if ($keputusans == null) {
            alert('Tiada dalam rekod penilaian');
            return redirect('/semakan_keputusan_calon');
        }
        return view('proses_penilaian.keputusan_penilaian.keputusan_calon', [
            'keputusan' => $keputusans,
            'tahap' => $tahap
        ]);
    }

    public function slip_keputusan($ic, $id_penilaian)
    {
        $rekod_sijil = KeputusanPenilaian::where('ic_peserta', $ic)->where('id_penilaian', $id_penilaian)->first();
        $nama = $rekod_sijil->nama_peserta;
        $ic = $rekod_sijil->ic_peserta;
        $tarikh = $rekod_sijil->tarikh_penilaian;

        $tahap = Jadual::where('id_penilaian', $id_penilaian)->first();

        $pdf = PDF::loadView('pdf.slip_keputusan', [
            'nama' => $nama,
            'ic' => $ic,
            'tarikh' => $tarikh,
            'rekod' => $rekod_sijil,
            'tahap' => $tahap
        ]);
        return $pdf->download('Slip_keputusan_' . $ic . '.pdf');
    }
    public function sijil_isac($ic, $id_penilaian)
    {
        $rekod_sijil = KeputusanPenilaian::where('ic_peserta', $ic)->where('id_penilaian', $id_penilaian)->first();
        $nama = $rekod_sijil->nama_peserta;
        $ic = $rekod_sijil->ic_peserta;
        $tarikh = $rekod_sijil->tarikh_penilaian;
        $no_sijil = $rekod_sijil->no_sijil;

        $text_qr = "No. Kad Pengenalan: " . $ic . "
No. Sijil: ISAC/" . date('m/Y', strtotime($tarikh)) . "/" . $id_penilaian . "/" . sprintf("%'.03d\n", $no_sijil);
        $qr_encode = urlencode($text_qr);

        $pdf = PDF::loadView('pdf.sijil_isac', [
            'nama' => $nama,
            'ic' => $ic,
            'tarikh' => $tarikh,
            'no_sijil' => $no_sijil,
            'qr' => $qr_encode,
            'id_penilaian' => $id_penilaian
        ]);
        return $pdf->download('Sijil_ISAC_' . $ic . '.pdf');
    }

    public function view_sijil_penilaian($id_keputusan)
    { {

            $rekod_sijil = KeputusanPenilaian::where('id', $id_keputusan)->first();
            $nama = $rekod_sijil->nama_peserta;
            $ic = $rekod_sijil->ic_peserta;
            $tarikh = $rekod_sijil->tarikh_penilaian;
            $no_sijil = $rekod_sijil->no_sijil;
            $id_penilaian = $rekod_sijil->id_penilaian;

            $text_qr = "No. Kad Pengenalan: " . $ic . "
    No. Sijil: ISAC/" . date('m/Y', strtotime($tarikh)) . "/" . $id_penilaian . "/" . sprintf("%'.03d\n", $no_sijil);
            $qr_encode = urlencode($text_qr);

            $pdf = PDF::loadView('pdf.sijil_isac', [
                'nama' => $nama,
                'ic' => $ic,
                'tarikh' => $tarikh,
                'no_sijil' => $no_sijil,
                'qr' => $qr_encode,
                'id_penilaian' => $id_penilaian
            ]);
            return $pdf->download('Sijil_ISAC_' . $ic . '.pdf');
        }
    }

    public function senarai_penilaian_calon()
    {
        $ic = Auth::user()->nric;
        $prof = KeputusanPenilaian::where('ic_peserta', $ic)->first();
        $nama = $prof->nama_peserta;
        $penilaian = MohonPenilaian::where('no_ic', $ic)->orderBy('created_at', 'desc')->get();
        // dd($penilaian);
        return view('proses_penilaian.keputusan_penilaian.semak_keputusan_calon', [
            'calon' => $ic,
            'penilaian' => $penilaian,
            'nama' => $nama
        ]);
    }

    public function markah_semua($id_penilaian)
    {
        $ic = Auth::user()->nric;
        $peserta = MohonPenilaian::where('no_ic', $ic)->first();
        $jadual = Jadual::where('ID_PENILAIAN', $id_penilaian)->first();

        $keputusan = Bankjawapanpengetahuan::where('id_calon', $ic)
            ->where('id_penilaian', $id_penilaian)
            ->get();

        $markah = 0;
        foreach ($keputusan as $keputusan) {
            $markah = $markah + $keputusan->markah;
        }

        $m_kemahiran = Bankjawapancalon::where('id_penilaian', $id_penilaian)
            ->where('ic_calon', $ic)
            ->where('jumlah_markah_internet', '!=', null)
            ->where('jumlah_markah_word', '!=', null)
            ->where('jumlah_markah_email', '!=', null)
            ->get()->first();

        // dd($m_kemahiran);
        $markah_internet = $m_kemahiran->jumlah_markah_internet;
        $markah_word = $m_kemahiran->jumlah_markah_word;
        $markah_email = $m_kemahiran->jumlah_markah_email;

        $markah_kem = $markah_internet +  $markah_word + $markah_email + $markah_email;
        $keputusan = new KeputusanPenilaian;
        $keputusan->id_peserta = $peserta->id_calon;
        $keputusan->id_penilaian = $id_penilaian;
        $keputusan->nama_peserta = $peserta->nama;
        $keputusan->ic_peserta = $ic;
        $keputusan->tarikh_penilaian = $jadual->TARIKH_SESI;
        if ($jadual->LOKASI != null) {
            $keputusan->lokasi = $jadual->LOKASI;
        } else {
            $keputusan->lokasi = "Atas Talian";
        }

        $gred_lulus = PemilihanSoalan::where('ID_PEMILIHAN_SOALAN', '70')->first();
        $lulus_pengetahuan = $gred_lulus->NILAI_MARKAH_LULUS;

        $keputusan->markah_pengetahuan = $markah;
        if ($keputusan->markah_pengetahuan >= $lulus_pengetahuan) {
            $keputusan->keputusan_pengetahuan = "Melepasi";
        } else {
            $keputusan->keputusan_pengetahuan = "Tidak Melepasi";
        }

        $keputusan->markah_internet = $markah_internet;
        // if ($keputusan->markah_internet == 2) {
        if ($keputusan->markah_internet >= 1) {
            $keputusan->keputusan_internet = "Melepasi";
        } else {
            $keputusan->keputusan_internet = "Tidak Melepasi";
        }

        $keputusan->markah_word = $markah_word;
        // if ($keputusan->markah_word == 9) {
        if ($keputusan->markah_word >= 1) {
            $keputusan->keputusan_word = "Melepasi";
        } else {
            $keputusan->keputusan_word = "Tidak Melepasi";
        }

        $keputusan->markah_email = $markah_email;
        if ($keputusan->markah_email >= 1) {
            $keputusan->keputusan_email = "Melepasi";
        } else {
            $keputusan->keputusan_email = "Tidak Melepasi";
        }

        $keputusan->markah_kemahiran = $markah_kem;

        $keputusan->markah_keseluruhan = $keputusan->markah_pengetahuan + $keputusan->markah_kemahiran;

        if (($keputusan->keputusan_pengetahuan == "Melepasi") && ($keputusan->keputusan_internet == "Melepasi") && ($keputusan->keputusan_word == "Melepasi") && ($keputusan->keputusan_email == "Melepasi")) {
            $keputusan->keputusan = "Lulus";
        } else {
            $keputusan->keputusan = "Gagal";
        }

        $m_penilaian = MohonPenilaian::where('no_ic', $ic)->where('id_sesi', $id_penilaian)->first();
        $m_penilaian->status_penilaian = $keputusan->keputusan;
        $m_penilaian->save();
        $keputusan->save();

        $rekodtarikh = KeputusanPenilaian::where('id_penilaian', $id_penilaian)
            ->get();
        $bilangan_rekod = count($rekodtarikh);
        $bilangan = $bilangan_rekod - 1;
        // dd($rekodtarikh[0]);

        if ($bilangan == -1 || $bilangan == 0) {
            $bilangan = 0;
            $no_sijil_latest = $rekodtarikh[$bilangan]->no_sijil;
        } else {
            $no_sijil_latest = $rekodtarikh[$bilangan - 1]->no_sijil;
        }
        if ($no_sijil_latest == null) {
            $no_sijil = 00000 + 1;
            $keputusan->no_sijil = sprintf("%'.03d", $no_sijil);
        } else {
            $no_sijil = $no_sijil_latest + 00001;
            $keputusan->no_sijil = sprintf("%'.03d", $no_sijil);
        }

        $keputusan->save();

        return redirect('/tamat-penilaian');
    }
}

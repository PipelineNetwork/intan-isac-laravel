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
use App\Models\MarkahSoalanKemahiran;
use App\Models\SelenggaraKawalanSistem;
use App\Models\User;

class KeputusanPenilaianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('proses_penilaian.carian_slip');
    }

    public function result_search(Request $request)
    {
        if (!empty($request->nama)) {
            $keputusans = KeputusanPenilaian::where('nama_peserta', 'like', '%' . $request->nama . '%')->orderBy('created_at', 'desc')->get();
        } elseif (!empty($request->no_ic)) {
            $keputusans = KeputusanPenilaian::where('ic_peserta', 'like', '%' . $request->no_ic . '%')->orderBy('created_at', 'desc')->get();
        } elseif (!empty($request->id_penilaian)) {
            $keputusans = KeputusanPenilaian::where('id_penilaian', 'like', '%' . $request->id_penilaian . '%')->orderBy('created_at', 'desc')->get();
        } elseif (!empty($request->nama) && !empty($request->no_ic)) {
            $keputusans = KeputusanPenilaian::where('nama_peserta', 'like', '%' . $request->nama . '%')
                ->where('ic_peserta', 'like', '%' . $request->no_ic . '%')
                ->orderBy('created_at', 'desc')->get();
        } elseif (!empty($request->nama) && !empty($request->id_penilaian)) {
            $keputusans = KeputusanPenilaian::where('nama_peserta', 'like', '%' . $request->nama . '%')
                ->where('id_penilaian', 'like', '%' . $request->id_penilaian . '%')
                ->orderBy('created_at', 'desc')->get();
        } elseif (!empty($request->no_ic) && !empty($request->id_penilaian)) {
            $keputusans = KeputusanPenilaian::where('ic_peserta', 'like', '%' . $request->no_ic . '%')
                ->where('id_penilaian', 'like', '%' . $request->id_penilaian . '%')
                ->orderBy('created_at', 'desc')->get();
        } else {
            $keputusans = KeputusanPenilaian::get();
        }

        return view('proses_penilaian.senarai_slip', [
            'keputusans' => $keputusans
        ]);
    }

    public function destroy($id)
    {
        $keputusan = KeputusanPenilaian::find($id);
        $keputusan->delete();
        // alert()->success('Maklumat telah dihapus');
        return redirect('/keputusan_penilaian');
    }

    public function store(Request $request)
    {
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
        if ($m_kemahiran == null) {
            $markah_internet = 0;
            $markah_word = 0;
            $markah_email = 0;
        } else {
            $markah_internet = $m_kemahiran->jumlah_markah_internet;
            $markah_word = $m_kemahiran->jumlah_markah_word;
            $markah_email = $m_kemahiran->jumlah_markah_email;
        }

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

        $markah_kemahiran = MarkahSoalanKemahiran::first();

        $keputusan->markah_internet = $markah_internet;
        // if ($keputusan->markah_internet == 2) {
        if ($keputusan->markah_internet >= $markah_kemahiran->markah_internet) {
            $keputusan->keputusan_internet = "Melepasi";
        } else {
            $keputusan->keputusan_internet = "Tidak Melepasi";
        }

        $keputusan->markah_word = $markah_word;
        // if ($keputusan->markah_word == 9) {
        if ($keputusan->markah_word >= $markah_kemahiran->markah_word) {
            $keputusan->keputusan_word = "Melepasi";
        } else {
            $keputusan->keputusan_word = "Tidak Melepasi";
        }

        $keputusan->markah_email = $markah_email;
        if ($keputusan->markah_email >= $markah_kemahiran->markah_email) {
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

        $tempoh_blacklist = SelenggaraKawalanSistem::first();
        if ((int)$tempoh_blacklist->TEMPOH_KEBENARAN_PERMOHONAN_PESERTA_GAGAL > 0) {
            $calon_blacklist = User::where('nric', $ic)->first();
            if ($keputusan->keputusan == "Gagal") {
                $calon_blacklist->status_blacklist = "Gagal";
                $calon_blacklist->tarikh_penilaian = $jadual->TARIKH_SESI;
            } else {
                $calon_blacklist->status_blacklist = "Tidak";
                $calon_blacklist->tarikh_penilaian = null;
            }
            $calon_blacklist->save();
        }

        return redirect('/tamat-penilaian');
    }

    public function carian_sijil()
    {
        return view('proses_penilaian.carian_sijil');
    }

    public function senarai_sijil(Request $request)
    {
        if (!empty($request->nama)) {
            $keputusans = KeputusanPenilaian::where('keputusan', 'Lulus')->where('nama_peserta', 'like', '%' . $request->nama . '%')->orderBy('updated_at', 'desc')->get();
        } elseif (!empty($request->no_ic)) {
            $keputusans = KeputusanPenilaian::where('keputusan', 'Lulus')->where('ic_peserta', 'like', '%' . $request->no_ic . '%')->orderBy('updated_at', 'desc')->get();
        } elseif (!empty($request->tarikh_penilaian)) {
            $keputusans = KeputusanPenilaian::where('keputusan', 'Lulus')->where('tarikh_penilaian', 'like', '%' . $request->tarikh_penilaian . '%')->orderBy('updated_at', 'desc')->get();
        } elseif (!empty($request->nama) && !empty($request->no_ic)) {
            $keputusans = KeputusanPenilaian::where('keputusan', 'Lulus')->where('nama_peserta', 'like', '%' . $request->nama . '%')
                ->where('ic_peserta', 'like', '%' . $request->no_ic . '%')
                ->orderBy('updated_at', 'desc')->get();
        } elseif (!empty($request->nama) && !empty($request->tarikh_penilaian)) {
            $keputusans = KeputusanPenilaian::where('keputusan', 'Lulus')->where('nama_peserta', 'like', '%' . $request->nama . '%')
                ->where('tarikh_penilaian', 'like', '%' . $request->tarikh_penilaian . '%')
                ->orderBy('updated_at', 'desc')->get();
        } elseif (!empty($request->no_ic) && !empty($request->tarikh_penilaian)) {
            $keputusans = KeputusanPenilaian::where('keputusan', 'Lulus')->where('ic_peserta', 'like', '%' . $request->no_ic . '%')
                ->where('tarikh_penilaian', 'like', '%' . $request->tarikh_penilaian . '%')
                ->orderBy('updated_at', 'desc')->get();
        } else {
            $keputusans = KeputusanPenilaian::where('keputusan', 'Lulus')->where('nama_peserta', 'like', '%' . $request->nama . '%')
                ->where('ic_peserta', 'like', '%' . $request->no_ic . '%')
                ->where('tarikh_penilaian', 'like', '%' . $request->tarikh_penilaian . '%')
                ->orderBy('updated_at', 'desc')->get();
        }
        return view('proses_penilaian.senarai_sijil', [
            'keputusans' => $keputusans
        ]);
    }

    public function semak_keputusan($ic, $id_penilaian)
    {

        $keputusans = KeputusanPenilaian::where('id_penilaian', $id_penilaian)
            ->where('ic_peserta', $ic)->first();

        $tahap = Jadual::where('ID_PENILAIAN', $id_penilaian)->first();
        if ($tahap == null) {
            echo '<script language="javascript">';
            echo 'alert("Jadual telah dihapuskan. Sila hubungi pihak yang bertugas.");';
            echo "window.location.href='/semakan_keputusan_calon';";
            echo '</script>';
        } else {
            $tahap->KOD_TAHAP;
        }

        if ($keputusans == null) {
            echo '<script language="javascript">';
            echo 'alert("Tiada dalam rekod penilaian.");';
            echo "window.location.href='/semakan_keputusan_calon';";
            echo '</script>';
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

        $tahap = Jadual::where('ID_PENILAIAN', $id_penilaian)->first();

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
No. Sijil: ISAC/" . date('m/Y', strtotime($tarikh)) . "/" . $id_penilaian . "/" . sprintf("%'.03d\n", $no_sijil) .
            "Keputusan: LULUS";
        $qr_encode = urlencode($text_qr);

        $pdf = PDF::loadView('pdf.sijil_isac', [
            'nama' => $nama,
            'ic' => $ic,
            'tarikh' => $tarikh,
            'no_sijil' => $no_sijil,
            'qr' => $qr_encode,
            'id_penilaian' => $id_penilaian
        ]);
        return $pdf->download('Sijil_ISAC_' . $ic . '_Lulus' . '.pdf');
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
        $nama = Auth::user()->name;
        $penilaian = KeputusanPenilaian::where('ic_peserta', $ic)->orderBy('created_at', 'desc')->get();
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
        if ($m_kemahiran == null) {
            $markah_internet = 0;
            $markah_word = 0;
            $markah_email = 0;
        } else {
            $markah_internet = $m_kemahiran->jumlah_markah_internet;
            $markah_word = $m_kemahiran->jumlah_markah_word;
            $markah_email = $m_kemahiran->jumlah_markah_email;
        }

        $markah_kem = $markah_internet +  $markah_word + $markah_email + $markah_email;

        $keputusan = KeputusanPenilaian::where('id_penilaian', $id_penilaian)->where('ic_peserta',  $ic)->first();

        if (!empty($keputusan)) {
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

            $markah_kemahiran = MarkahSoalanKemahiran::first();

            $keputusan->markah_internet = $markah_internet;
            // if ($keputusan->markah_internet == 2) {
            if ($keputusan->markah_internet >= $markah_kemahiran->markah_internet) {
                $keputusan->keputusan_internet = "Melepasi";
            } else {
                $keputusan->keputusan_internet = "Tidak Melepasi";
            }

            $keputusan->markah_word = $markah_word;
            // if ($keputusan->markah_word == 9) {
            if ($keputusan->markah_word >= $markah_kemahiran->markah_word) {
                $keputusan->keputusan_word = "Melepasi";
            } else {
                $keputusan->keputusan_word = "Tidak Melepasi";
            }

            $keputusan->markah_email = $markah_email;
            if ($keputusan->markah_email >= $markah_kemahiran->markah_email) {
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

            // $keputusan->save();
        } else {
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

            $markah_kemahiran = MarkahSoalanKemahiran::first();

            $keputusan->markah_internet = $markah_internet;
            // if ($keputusan->markah_internet == 2) {
            if ($keputusan->markah_internet >= $markah_kemahiran->markah_internet) {
                $keputusan->keputusan_internet = "Melepasi";
            } else {
                $keputusan->keputusan_internet = "Tidak Melepasi";
            }

            $keputusan->markah_word = $markah_word;
            // if ($keputusan->markah_word == 9) {
            if ($keputusan->markah_word >= $markah_kemahiran->markah_word) {
                $keputusan->keputusan_word = "Melepasi";
            } else {
                $keputusan->keputusan_word = "Tidak Melepasi";
            }

            $keputusan->markah_email = $markah_email;
            if ($keputusan->markah_email >= $markah_kemahiran->markah_email) {
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
        }

        $keputusan->save();

        $tempoh_blacklist = SelenggaraKawalanSistem::first();
        if ((int)$tempoh_blacklist->TEMPOH_KEBENARAN_PERMOHONAN_PESERTA_GAGAL > 0) {
            $calon_blacklist = User::where('nric', $ic)->first();
            if ($keputusan->keputusan == "Gagal") {
                $calon_blacklist->status_blacklist = "Gagal";
                $calon_blacklist->tarikh_penilaian = $jadual->TARIKH_SESI;
            } else {
                $calon_blacklist->status_blacklist = "Tidak";
                $calon_blacklist->tarikh_penilaian = null;
            }
            $calon_blacklist->save();
        }

        return redirect('/tamat-penilaian');
    }
}

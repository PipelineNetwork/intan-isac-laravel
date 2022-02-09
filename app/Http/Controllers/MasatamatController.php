<?php

namespace App\Http\Controllers;

use App\Models\Bankjawapancalon;
use App\Models\Bankjawapanpengetahuan;
use App\Models\Jadual;
use App\Models\KeputusanPenilaian;
use App\Models\MohonPenilaian;
use App\Models\PemilihanSoalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasatamatController extends Controller
{
    public function display_tamat_penilaian($ic, $id_penilaian)
    {
        return view('kemasukan_id.masa_tamat', [
            'ic' => $ic,
            'id_penilaian' => $id_penilaian
        ]);
    }
    public function kira_markah($ic, $id_penilaian)
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
        return redirect('/semakan_keputusan_calon');
    }
}

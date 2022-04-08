<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankjawapancalon;
use App\Models\Soalankemahiranemail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Bankjawapanpengetahuan;
use App\Models\Banksoalanpengetahuan;
use App\Models\KeputusanPenilaian;
use App\Models\MohonPenilaian;
use App\Models\PemilihanSoalan;
use App\Models\Jadual;
use App\Models\MarkahSoalanKemahiran;

class SoalankemahiranemailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_penilaian)
    {
        $jawapancalon = Bankjawapancalon::all();

        $soalankemahiranemail = Soalankemahiranemail::where('status_soalan', 1)->inRandomOrder()->limit(1)->get();

        $id_penilaian = $id_penilaian;
        return view('proses_penilaian.soalan_kemahiran.email', [
            'jawapancalons' => $jawapancalon,
            'soalankemahiranemails' => $soalankemahiranemail,
            'id_penilaian' => $id_penilaian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('proses_penilaian.soalan_kemahiran.email1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id_penilaian, $id_emel)
    {
        $soalankemahiranemail = Soalankemahiranemail::where('id', $id_emel)->get()->first();

        $current_user = $request->user();
        $markah_internet = Bankjawapancalon::where('id_penilaian', $id_penilaian)->where('ic_calon', $current_user->nric)->select(DB::raw('markah_urlteks + markah_carianteks as total'))->get()->first();
        if ($markah_internet == null) {
            $total_markah_internet = 0;
        } else {
            $total_markah_internet = $markah_internet;
        }

        $markah_word = Bankjawapancalon::where('id_penilaian', $id_penilaian)->where('ic_calon', $current_user->nric)->select('jumlah_markah_word')->get()->first();
        if ($markah_word == null) {
            $total_markah_word = 0;
        } else {
            $total_markah_word = $markah_word;
        }
        // dd($markah_internet);
        $id_penilaian = $id_penilaian;
        return view('proses_penilaian.soalan_kemahiran.email1', [
            'soalankemahiranemails' => $soalankemahiranemail,
            'markah_internets' => $total_markah_internet,
            'markah_words' => $total_markah_word,
            'id_penilaian' => $id_penilaian
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function savepage1(Request $request, $id_penilaian, $id_emel)
    {

        $current_user = $request->user();

        $jawapancalon = Bankjawapancalon::where('id_penilaian', $id_penilaian)->where('ic_calon', $current_user->nric)->first();

        $jawapancalon->input_to = $request->input_to;
        if ($request->input_to != null) {
            $jawapancalon->markah_inputto = 1;
        } else {
            $jawapancalon->markah_inputto = 0;
        }
        $jawapancalon->input_subject = $request->input_subject;
        if ($request->input_subject != null) {
            $jawapancalon->markah_inputsubject = 1;
        } else {
            $jawapancalon->markah_inputsubject = 0;
        }
        $jawapancalon->input_mesej = $request->input_mesej;
        if ($request->input_mesej != null) {
            $jawapancalon->markah_inputmesej = 1;
        } else {
            $jawapancalon->markah_inputmesej = 0;
        }
        $jawapancalon->id_soalankemahiranemail = $request->id_soalankemahiranemail;
        $jawapancalon->user_id = $current_user->id;
        if ($request->has('fail_upload')) {
            $jawapancalon['fail_upload'] = '/img/intan.png';
        } else {
            $jawapancalon['fail_upload'] = 'Tiada Gambar';
        }
        if ($jawapancalon->fail_upload == 'Tiada Gambar') {
            $jawapancalon->markah_failupload = 0;
        } elseif ($jawapancalon->fail_upload == null) {
            $jawapancalon->markah_failupload = 0;
        } else {
            $jawapancalon->markah_failupload = 1;
        }

        // if (!empty($request->file('fail_upload'))) {
        //     $muat_naik_fail = $request->file('fail_upload')->store('jawapancalon');
        //     $jawapancalon->fail_upload = $muat_naik_fail;
        // }
        // if (!empty($request->file('fail_upload'))) {
        //     $jawapancalon->markah_failupload = 1;
        // } else {
        //     $jawapancalon->markah_failupload = 0;
        // }

        // $jawapancalon->jumlah_markah_internet = (int)$request->markah_internet;

        // $jawapancalon->jumlah_markah_word = (int)$request->markah_word;

        $jawapancalon->jumlah_markah_email = $jawapancalon->markah_inputto + $jawapancalon->markah_inputsubject + $jawapancalon->markah_inputmesej + $jawapancalon->markah_failupload;

        $jawapancalon->markah_kemahiran = $jawapancalon->jumlah_markah_internet + $jawapancalon->jumlah_markah_word + $jawapancalon->jumlah_markah_email;

        $jawapancalon->id_penilaian = $id_penilaian;
        $jawapancalon->ic_calon = Auth::user()->nric;

        $jawapancalon->status_jawab_email = '1';
        // dd($jawapancalon);

        $jawapancalon->save();

        if ($request->timer == null) {
            return redirect('/soalan-kemahiran-email-page2/' . $id_penilaian);
        } else {
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
            return redirect('/penilaian_tamat/' . $ic . '/' . $id_penilaian);
        }
    }

    public function test($id_penilaian)
    {

        return view('proses_penilaian.soalan_kemahiran.email2', [
            'id_penilaian' => $id_penilaian
        ]);
    }
}

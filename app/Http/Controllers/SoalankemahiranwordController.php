<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankjawapancalon;
use App\Models\Soalankemahiranword;
use Illuminate\Support\Facades\Auth;
use App\Models\Bankjawapanpengetahuan;
use App\Models\Banksoalanpengetahuan;
use App\Models\KeputusanPenilaian;
use App\Models\MohonPenilaian;
use App\Models\PemilihanSoalan;
use App\Models\Jadual;

class SoalankemahiranwordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_penilaian)
    {
        $jawapancalon = Bankjawapancalon::where('user_id', Auth::user());

        $soalankemahiranword = Soalankemahiranword::where('status_soalan', 1)->inRandomOrder()->limit(1)->get();

        $id_penilaian = $id_penilaian;
        // dd($soalankemahiranword);
        return view('proses_penilaian.soalan_kemahiran.mic_word', [
            'jawapancalons' => $jawapancalon,
            'soalankemahiranwords' => $soalankemahiranword,
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
        // return view('proses_penilaian.soalan_kemahiran.mic_word1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_penilaian)
    {
        $current_user = $request->user();

        // $jawapancalon = new Bankjawapancalon();

        $jawapancalon = Bankjawapancalon::where('id_penilaian', $id_penilaian)->where('ic_calon', $current_user->nric)->first();

        if ($jawapancalon->status_jawab_internet == 0) {

            $jawapancalon->markah_urlteks = 0;
            $jawapancalon->markah_carianteks = 0;
            $jawapancalon->status_jawab_internet = '1';
            $jawapancalon->jawapan_word =  $request->jawapan_word;

            $jawapan = Soalankemahiranword::all();

            foreach ($jawapan as $j) {
                if (str_contains($request->jawapan_word, $j->jawapan_1) && isset($j->jawapan_1)) {
                    $markah_1 = $j->markah_1;
                } else {
                    $markah_1 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_2) && isset($j->jawapan_2)) {
                    $markah_2 = $j->markah_2;
                } else {
                    $markah_2 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_3) && isset($j->jawapan_3)) {
                    $markah_3 = $j->markah_3;
                } else {
                    $markah_3 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_4) && isset($j->jawapan_4)) {
                    $markah_4 = $j->markah_4;
                } else {
                    $markah_4 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_5) && isset($j->jawapan_5)) {
                    $markah_5 = $j->markah_5;
                } else {
                    $markah_5 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_6) && isset($j->jawapan_6)) {
                    $markah_6 = $j->markah_6;
                } else {
                    $markah_6 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_7) && isset($j->jawapan_7)) {
                    $markah_7 = $j->markah_7;
                } else {
                    $markah_7 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_8) && isset($j->jawapan_8)) {
                    $markah_8 = $j->markah_8;
                } else {
                    $markah_8 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_9) && isset($j->jawapan_9)) {
                    $markah_9 = $j->markah_9;
                } else {
                    $markah_9 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_10) && isset($j->jawapan_10)) {
                    $markah_10 = $j->markah_10;
                } else {
                    $markah_10 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_11) && isset($j->jawapan_11)) {
                    $markah_11 = $j->markah_11;
                } else {
                    $markah_11 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_12) && isset($j->jawapan_12)) {
                    $markah_12 = $j->markah_12;
                } else {
                    $markah_12 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_13) && isset($j->jawapan_13)) {
                    $markah_13 = $j->markah_13;
                } else {
                    $markah_13 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_14) && isset($j->jawapan_14)) {
                    $markah_14 = $j->markah_14;
                } else {
                    $markah_14 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_15) && isset($j->jawapan_15)) {
                    $markah_15 = $j->markah_15;
                } else {
                    $markah_15 = 0;
                }
            }

            $jawapancalon->jumlah_markah_word = $markah_1 + $markah_2 + $markah_3 + $markah_4 + $markah_5 + $markah_6 + $markah_7 + $markah_8 + $markah_9 + $markah_10 + $markah_11 + $markah_12 + $markah_13 + $markah_14 + $markah_15;

            $jawapancalon->user_id = $current_user->id;
            $jawapancalon->id_soalankemahiranword = $request->id_soalankemahiranword;

            $jawapancalon->id_penilaian = $id_penilaian;
            $jawapancalon->ic_calon = Auth::user()->nric;

            $jawapancalon->status_jawab_word = '1';
        } else {
            $jawapancalon->jawapan_word =  $request->jawapan_word;

            $jawapan = Soalankemahiranword::all();

            foreach ($jawapan as $j) {
                if (str_contains($request->jawapan_word, $j->jawapan_1) && isset($j->jawapan_1)) {
                    $markah_1 = $j->markah_1;
                } else {
                    $markah_1 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_2) && isset($j->jawapan_2)) {
                    $markah_2 = $j->markah_2;
                } else {
                    $markah_2 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_3) && isset($j->jawapan_3)) {
                    $markah_3 = $j->markah_3;
                } else {
                    $markah_3 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_4) && isset($j->jawapan_4)) {
                    $markah_4 = $j->markah_4;
                } else {
                    $markah_4 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_5) && isset($j->jawapan_5)) {
                    $markah_5 = $j->markah_5;
                } else {
                    $markah_5 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_6) && isset($j->jawapan_6)) {
                    $markah_6 = $j->markah_6;
                } else {
                    $markah_6 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_7) && isset($j->jawapan_7)) {
                    $markah_7 = $j->markah_7;
                } else {
                    $markah_7 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_8) && isset($j->jawapan_8)) {
                    $markah_8 = $j->markah_8;
                } else {
                    $markah_8 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_9) && isset($j->jawapan_9)) {
                    $markah_9 = $j->markah_9;
                } else {
                    $markah_9 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_10) && isset($j->jawapan_10)) {
                    $markah_10 = $j->markah_10;
                } else {
                    $markah_10 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_11) && isset($j->jawapan_11)) {
                    $markah_11 = $j->markah_11;
                } else {
                    $markah_11 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_12) && isset($j->jawapan_12)) {
                    $markah_12 = $j->markah_12;
                } else {
                    $markah_12 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_13) && isset($j->jawapan_13)) {
                    $markah_13 = $j->markah_13;
                } else {
                    $markah_13 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_14) && isset($j->jawapan_14)) {
                    $markah_14 = $j->markah_14;
                } else {
                    $markah_14 = 0;
                }
                if (str_contains($request->jawapan_word, $j->jawapan_15) && isset($j->jawapan_15)) {
                    $markah_15 = $j->markah_15;
                } else {
                    $markah_15 = 0;
                }
            }

            $jawapancalon->jumlah_markah_word = $markah_1 + $markah_2 + $markah_3 + $markah_4 + $markah_5 + $markah_6 + $markah_7 + $markah_8 + $markah_9 + $markah_10 + $markah_11 + $markah_12 + $markah_13 + $markah_14 + $markah_15;

            $jawapancalon->user_id = $current_user->id;
            $jawapancalon->id_soalankemahiranword = $request->id_soalankemahiranword;

            $jawapancalon->id_penilaian = $id_penilaian;
            $jawapancalon->ic_calon = Auth::user()->nric;

            $jawapancalon->status_jawab_word = '1';
        }

        // dd($jawapancalon);
        $jawapancalon->save();

        if ($request->timer == null) {
            return redirect('/soalan-kemahiran-word-page2/' . $id_penilaian);
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
            // return view('kemasukan_id.masa_tamat', [
            //     'ic' => $ic,
            //     'id_penilaian' => $id_penilaian
            // ]);
            return redirect('/penilaian_tamat/' . $ic . '/' . $id_penilaian);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_penilaian, $id_word)
    {
        // $jawapancalon = Bankjawapancalon::where('user_id', Auth::user());

        $soalankemahiranword = Soalankemahiranword::where('id', $id_word)->first();
        $id_penilaian = $id_penilaian;
        // dd($soalankemahiranword);
        return view('proses_penilaian.soalan_kemahiran.mic_word1', [
            'soalankemahiranwords' => $soalankemahiranword,
            'id_penilaian' => $id_penilaian
            // 'jawapancalons' => $jawapancalon
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
        // return view('proses_penilaian.soalan_kemahiran.mic_word2');
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

    public function test($id_penilaian)
    {

        return view('proses_penilaian.soalan_kemahiran.mic_word2', [
            'id_penilaian' => $id_penilaian
        ]);
    }
}

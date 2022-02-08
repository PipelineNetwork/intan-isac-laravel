<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankjawapancalon;
use App\Models\Soalankemahiraninternet;
use Illuminate\Support\Facades\Auth;
use App\Models\Bankjawapanpengetahuan;
use App\Models\Banksoalanpengetahuan;
use App\Models\KeputusanPenilaian;
use App\Models\MohonPenilaian;
use App\Models\PemilihanSoalan;
use App\Models\Jadual;

class SoalankemahiraninternetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_penilaian)
    {
        $jawapancalon = Bankjawapancalon::all();
        $soalankemahiraninternet = Soalankemahiraninternet::where('status_soalan', 1)->inRandomOrder()->limit(1)->get();
        $id_penilaian = $id_penilaian;
        // dd($id_penilaian);
        // dd($soalankemahiraninternet);
        return view('proses_penilaian.soalan_kemahiran.internet', [
            'jawapancalons' => $jawapancalon,
            'soalankemahiraninternets' => $soalankemahiraninternet,
            'id_penilaian' => $id_penilaian
        ]);
    }

    public function page1($id_penilaian, $id_internet)
    {
        $soalankemahiraninternet = Soalankemahiraninternet::where('id', $id_internet)->get()->first();
        $id_penilaian = $id_penilaian;

        // dd($soalankemahiraninternet);
        return view('proses_penilaian.soalan_kemahiran.internet1', [
            'soalankemahiraninternets' => $soalankemahiraninternet,
            'id_penilaian' => $id_penilaian,
            'id_internet' => $id_internet
        ]);
    }

    public function savepage1(Request $request, $id_penilaian, $id_internet)
    {
        $current_user = $request->user();

        // $jawapancalon = new Bankjawapancalon();

        // $jawapancalon->url_teks = $request->url_teks;
        // $jawapancalon->jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
        // if ($jawapancalon->url_teks == $jawapancalon->jawapansebenar_urlteks) {
        //     $jawapancalon->markah_urlteks = 1;
        // } else {
        //     $jawapancalon->markah_urlteks = 0;
        // }
        // $jawapancalon->jawapansebenar_carianteks = strtolower($request->jawapansebenar_carianteks);
        // $jawapancalon->user_id = $current_user->id;
        // $jawapancalon->id_soalankemahiraninternet = $id_internet;
        // $jawapancalon->id_penilaian = $id_penilaian;
        // $jawapancalon->ic_calon = Auth::user()->nric;
        // $jawapancalon->save();

        $url_teks = $request->url_teks;
        $jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
        if ($url_teks == $jawapansebenar_urlteks) {
            $markah_urlteks = 1;
        } else {
            $markah_urlteks = 0;
        }
        $jawapansebenar_carianteks = strtolower($request->jawapansebenar_carianteks);
        $user_id = $current_user->id;
        $id_soalankemahiraninternet = $id_internet;
        $ic_calon = Auth::user()->nric;
        $url_wikipedia = $request->url_wikipedia;

        $id_penilaian = $id_penilaian;

        // dd($url_teks,$jawapansebenar_urlteks,$markah_urlteks,$jawapansebenar_carianteks,$user_id,$id_soalankemahiraninternet,$ic_calon,$id_penilaian, $url_wikipedia);
        return view('proses_penilaian.soalan_kemahiran.internet2', [
            // 'jawapancalons' => $jawapancalon,
            'url_teks' => $url_teks,
            'jawapansebenar_urlteks' => $jawapansebenar_urlteks,
            'markah_urlteks' => $markah_urlteks,
            'jawapansebenar_carianteks' => $jawapansebenar_carianteks,
            'user_id' => $user_id,
            'url_wikipedia' => $url_wikipedia,
            'id_soalankemahiraninternet' => $id_soalankemahiraninternet,
            'ic_calon' => $ic_calon,
            'id_penilaian' => $id_penilaian,
            'id_internet' => $id_internet
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function page2($id)
    // {
    //     $jawapancalon = Bankjawapancalon::find($id);

    //     return view('proses_penilaian.soalan_kemahiran.internet2', [
    //         'jawapancalons' => $jawapancalon,
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function savepage2(Request $request, $id_penilaian, $id_internet)
    {
        // $current_user = $request->user();
        // $jawapancalon = Bankjawapancalon::where('id_soalankemahiraninternet', $id_internet)->first();
        // $jawapancalon = Bankjawapancalon::where('id_penilaian', $id_penilaian)->where('ic_calon', $current_user->nric)->first();
        // dd($jawapancalon);
        $tukar_lowercase = $request->carianteks;
        // $jawapancalon->carian_teks = strtolower($tukar_lowercase);
        // if ($jawapancalon->carian_teks == $jawapancalon->jawapansebenar_carianteks) {
        //     $jawapancalon->markah_carianteks = 1;
        // } else {
        //     $jawapancalon->markah_carianteks = 0;
        // }
        // $jawapancalon->save();
        $url_teks = $request->url_teks;
        $jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
        $markah_urlteks = $request->markah_urlteks;
        $markah_urlteks = $request->markah_urlteks;
        $jawapansebenar_carianteks = $request->jawapansebenar_carianteks;
        $url_wikipedia = $request->url_wikipedia;
        $user_id = $request->user_id;
        $id_internet = $id_internet;
        $ic_calon = Auth::user()->nric;
        $carian_teks = strtolower($tukar_lowercase);
        if ($carian_teks == $jawapansebenar_carianteks) {
            $markah_carianteks = 1;
        } else {
            $markah_carianteks = 0;
        }
        $url_wikipedia = $request->url_wikipedia;

        // dd($url_teks, $jawapansebenar_urlteks, $markah_urlteks, $carian_teks, $jawapansebenar_carianteks, $markah_carianteks, $user_id, $id_internet, $ic_calon, $id_penilaian);
        return view('proses_penilaian.soalan_kemahiran.internet3', [
            'id_penilaian' => $id_penilaian,
            'id_internet' => $id_internet,
            'url_teks' => $url_teks,
            'jawapansebenar_urlteks' => $jawapansebenar_urlteks,
            'markah_urlteks' => $markah_urlteks,
            'carian_teks' => $carian_teks,
            'jawapansebenar_carianteks' => $jawapansebenar_carianteks,
            'user_id' => $user_id,
            'ic_calon' => $ic_calon,
            'markah_carianteks' => $markah_carianteks,
            'url_wikipedia' => $url_wikipedia
        ]);
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

    public function page3(Request $request, $id_penilaian, $id_internet)
    {
        // $jawapancalon = Bankjawapancalon::join('soalankemahiraninternets', 'bankjawapancalons.id_soalankemahiraninternet', 'soalankemahiraninternets.id')
        //     ->where('id_soalankemahiraninternet', $id_internet)
        //     ->get()->first();

        $url_teks = $request->url_teks;
        $jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
        $markah_urlteks = $request->markah_urlteks;
        $markah_urlteks = $request->markah_urlteks;
        $jawapansebenar_carianteks = $request->jawapansebenar_carianteks;
        $url_wikipedia = $request->url_wikipedia;
        $user_id = $request->user_id;
        $id_internet = $id_internet;
        $ic_calon = Auth::user()->nric;
        $carian_teks = $request->carian_teks;
        $markah_carianteks = $request->markah_carianteks;
        $url_wikipedia = $request->url_wikipedia;

        // dd($url_teks, $jawapansebenar_urlteks, $markah_urlteks, $carian_teks, $jawapansebenar_carianteks, $markah_carianteks, $user_id, $id_internet, $ic_calon, $id_penilaian);
        return view('proses_penilaian.soalan_kemahiran.internet4', [
            // 'jawapancalons' => $jawapancalon,
            'id_penilaian' => $id_penilaian,
            'id_internet' => $id_internet,
            'url_teks' => $url_teks,
            'jawapansebenar_urlteks' => $jawapansebenar_urlteks,
            'markah_urlteks' => $markah_urlteks,
            'carian_teks' => $carian_teks,
            'jawapansebenar_carianteks' => $jawapansebenar_carianteks,
            'user_id' => $user_id,
            'ic_calon' => $ic_calon,
            'markah_carianteks' => $markah_carianteks,
            'url_wikipedia' => $url_wikipedia
        ]);
    }

    public function page4(Request $request, $id_penilaian, $id_internet)
    {
        // $jawapancalon = Bankjawapancalon::join('soalankemahiraninternets', 'bankjawapancalons.id_soalankemahiraninternet', 'soalankemahiraninternets.id')
        //     ->where('id_soalankemahiraninternet', $id_internet)
        //     ->get()->first();

        $url_teks = $request->url_teks;
        $jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
        $markah_urlteks = $request->markah_urlteks;
        $markah_urlteks = $request->markah_urlteks;
        $jawapansebenar_carianteks = $request->jawapansebenar_carianteks;
        $url_wikipedia = $request->url_wikipedia;
        $user_id = $request->user_id;
        $id_internet = $id_internet;
        $ic_calon = Auth::user()->nric;
        $carian_teks = $request->carian_teks;
        $markah_carianteks = $request->markah_carianteks;
        $url_wikipedia = $request->url_wikipedia;

        // dd($url_teks, $jawapansebenar_urlteks, $markah_urlteks, $carian_teks, $jawapansebenar_carianteks, $markah_carianteks, $user_id, $id_internet, $ic_calon, $id_penilaian);
        return view('proses_penilaian.soalan_kemahiran.internet5', [
            // 'jawapancalons' => $jawapancalon,
            'id_penilaian' => $id_penilaian,
            'id_internet' => $id_internet,
            'url_teks' => $url_teks,
            'jawapansebenar_urlteks' => $jawapansebenar_urlteks,
            'markah_urlteks' => $markah_urlteks,
            'carian_teks' => $carian_teks,
            'jawapansebenar_carianteks' => $jawapansebenar_carianteks,
            'user_id' => $user_id,
            'ic_calon' => $ic_calon,
            'markah_carianteks' => $markah_carianteks,
            'url_wikipedia' => $url_wikipedia
        ]);
    }

    public function page5(Request $request, $id_penilaian, $id_internet)
    {
        $jawapancalon = Bankjawapancalon::where('id_penilaian', $id_penilaian)->where('ic_calon', Auth::user()->nric)->first();

        if ($jawapancalon == null) {
            $jawapancalon = new Bankjawapancalon();

            $jawapancalon->url_teks = $request->url_teks;
            $jawapancalon->jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
            $jawapancalon->markah_urlteks = $request->markah_urlteks;
            $jawapancalon->carian_teks = $request->carian_teks;
            $jawapancalon->jawapansebenar_carianteks = $request->jawapansebenar_carianteks;
            $jawapancalon->markah_carianteks = $request->markah_carianteks;
            $jawapancalon->jumlah_markah_internet = (int)$jawapancalon->markah_urlteks + (int)$jawapancalon->markah_carianteks;
            $jawapancalon->user_id = $request->user_id;
            $jawapancalon->id_soalankemahiraninternet = $id_internet;
            $jawapancalon->id_penilaian = $id_penilaian;
            $jawapancalon->ic_calon = Auth::user()->nric;
            $jawapancalon->status_jawab_internet = '1';
        } else {
            $jawapancalon->url_teks = $request->url_teks;
            $jawapancalon->jawapansebenar_urlteks = $request->jawapansebenar_urlteks;
            $jawapancalon->markah_urlteks = $request->markah_urlteks;
            $jawapancalon->carian_teks = $request->carian_teks;
            $jawapancalon->jawapansebenar_carianteks = $request->jawapansebenar_carianteks;
            $jawapancalon->markah_carianteks = $request->markah_carianteks;
            $jawapancalon->jumlah_markah_internet = (int)$jawapancalon->markah_urlteks + (int)$jawapancalon->markah_carianteks;
            $jawapancalon->user_id = $request->user_id;
            $jawapancalon->id_soalankemahiraninternet = $id_internet;
            $jawapancalon->id_penilaian = $id_penilaian;
            $jawapancalon->ic_calon = Auth::user()->nric;
            $jawapancalon->status_jawab_internet = '1';
        }

        // dd($url_teks, $jawapansebenar_urlteks, $markah_urlteks, $carian_teks, $jawapansebenar_carianteks, $markah_carianteks, $user_id, $id_internet, $ic_calon, $id_penilaian);
        $jawapancalon->save();

        if ($request->timer == null) {
            return view('proses_penilaian.soalan_kemahiran.internet6', [
                'jawapancalons' => $jawapancalon,
                'id_penilaian' => $id_penilaian,
                'id_internet' => $id_internet,
            ]);
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
            return view('kemasukan_id.masa_tamat');
        }
    }
}

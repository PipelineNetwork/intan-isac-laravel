<?php

namespace App\Http\Controllers;

use App\Models\Bankjawapancalon;
use App\Models\Bankjawapanpengetahuan;
use App\Models\Banksoalanpengetahuan;
use App\Models\KeputusanPenilaian;
use App\Models\MohonPenilaian;
use App\Models\PemilihanSoalan;
use App\Models\Jadual;
use App\Models\MarkahSoalanKemahiran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BankjawapanpengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jawapan_calon = MohonPenilaian::join('pro_sesi', 'mohon_penilaians.id_sesi', 'pro_sesi.ID_PENILAIAN')->distinct()->orderBy('mohon_penilaians.updated_at', 'desc')->get(['no_ic', 'nama', 'mohon_penilaians.updated_at', 'status_penilaian', 'pro_sesi.KOD_SESI_PENILAIAN', 'pro_sesi.TARIKH_SESI']);

        // dd($jawapan_calon);
        return view('proses_penilaian.keputusan_penilaian.semak_keputusan_admin', [
            'jawapan_calon' => $jawapan_calon
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Bankjawapanpengetahuan  $bankjawapanpengetahuan
     * @return \Illuminate\Http\Response
     */
    public function show(Bankjawapanpengetahuan $bankjawapanpengetahuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bankjawapanpengetahuan  $bankjawapanpengetahuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bankjawapanpengetahuan $bankjawapanpengetahuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bankjawapanpengetahuan  $bankjawapanpengetahuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bankjawapanpengetahuan $bankjawapanpengetahuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bankjawapanpengetahuan  $bankjawapanpengetahuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bankjawapanpengetahuan $bankjawapanpengetahuan)
    {
        //
    }

    public function jawapan_calon(Request $request, $id_penilaian)
    {
        // dd($request->all());

        $jawapans = $request->all();
        $bilangan = count($jawapans);
        // dd($jawapans);

        for ($i = 0; $i < $bilangan - 4; $i++) {
            $simpan_jawapan = new Bankjawapanpengetahuan;
            if ($jawapans['soalan_' . $i]) {
                $jawapans_calon = $jawapans['soalan_' . $i];
                foreach ($jawapans_calon as $key => $jawapan) {
                    if ($key == 0) {
                        $simpan_jawapan->id_soalan_pengetahuan = $jawapan;
                    } else {
                        $simpan_jawapan->pilihan_jawapan = $jawapan;
                    }
                }
            }
            $simpan_jawapan->id_penilaian = $request->id_penilaian;
            $simpan_jawapan->id_calon = Auth::user()->nric;
            $jawapan_betul = Banksoalanpengetahuan::where('id', $simpan_jawapan->id_soalan_pengetahuan)->first();
            $jawapan_betul = $jawapan_betul->jawapan;
            $simpan_jawapan->jawapan = $jawapan_betul;
            if ($simpan_jawapan->pilihan_jawapan == $jawapan_betul) {
                if ($jawapan_betul == null) {
                    $simpan_jawapan->markah = 0;
                } else {
                    $simpan_jawapan->markah = 1;
                }
            } else {
                $simpan_jawapan->markah = 0;
            }
            $simpan_jawapan->save();
        }

        $ic = Auth::user()->nric;
        $jawapan_kemahiran = Bankjawapancalon::where('ic_calon', $ic)->where('id_penilaian', $id_penilaian)->first();

        if ($jawapan_kemahiran == null) {
            $jawapan_kemahiran = new Bankjawapancalon();

            $jawapan_kemahiran->markah_urlteks = '0';
            $jawapan_kemahiran->markah_carianteks = '0';
            $jawapan_kemahiran->markah_inputto = '0';
            $jawapan_kemahiran->markah_inputsubject = '0';
            $jawapan_kemahiran->markah_inputmesej = '0';
            $jawapan_kemahiran->markah_failupload = '0';
            $jawapan_kemahiran->jumlah_markah_word = '0';
            $jawapan_kemahiran->jumlah_markah_internet = '0';
            $jawapan_kemahiran->jumlah_markah_email = '0';
            $jawapan_kemahiran->status_jawab_internet = '0';

            $jawapan_kemahiran->status_jawab_internet = '0';
            $jawapan_kemahiran->status_jawab_word = '0';
            $jawapan_kemahiran->status_jawab_email = '0';
            $jawapan_kemahiran->id_penilaian = $request->id_penilaian;
            $jawapan_kemahiran->ic_calon = $ic;

            $jawapan_kemahiran->save();
        } else {
            $jawapan_kemahiran->markah_urlteks = '0';
            $jawapan_kemahiran->markah_carianteks = '0';
            $jawapan_kemahiran->markah_inputto = '0';
            $jawapan_kemahiran->markah_inputsubject = '0';
            $jawapan_kemahiran->markah_inputmesej = '0';
            $jawapan_kemahiran->markah_failupload = '0';
            $jawapan_kemahiran->jumlah_markah_word = '0';
            $jawapan_kemahiran->jumlah_markah_internet = '0';
            $jawapan_kemahiran->jumlah_markah_email = '0';
            $jawapan_kemahiran->status_jawab_internet = '0';

            $jawapan_kemahiran->status_jawab_internet = '0';
            $jawapan_kemahiran->status_jawab_word = '0';
            $jawapan_kemahiran->status_jawab_email = '0';
            $jawapan_kemahiran->id_penilaian = $request->id_penilaian;
            $jawapan_kemahiran->ic_calon = $ic;

            $jawapan_kemahiran->save();
        }

        if ($request->timer == null) {
            // alert()->success('Tahniah, anda selesai menjawab soalan pengetahuan. Sila jawab soalan kemahiran.');
            return redirect('/soalan-kemahiran-internet/' . $id_penilaian);
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
            return view('kemasukan_id.masa_tamat');
        }
    }

    public function senarai_penilaian($ic)
    {
        $penilaian = MohonPenilaian::where('no_ic', $ic)->orderBy('updated_at', 'desc')->get();
        $ic = $ic;
        return view('proses_penilaian.keputusan_penilaian.senarai_penilaian', [
            'penilaian' => $penilaian,
            'ic' => $ic
        ]);
    }

    public function check_jawapan($ic, $id)
    {
        $jawapan = Bankjawapanpengetahuan::where('id_calon', $ic)
            ->where('id_penilaian', $id)
            ->get();

        $jawapan_kemahiran = Bankjawapancalon::where('ic_calon', $ic)
            ->where('id_penilaian', $id)
            ->get()->first();

        $keputusan_calon = KeputusanPenilaian::where('ic_peserta', $ic)
            ->where('id_penilaian', $id)
            ->get()->first();

        // $markah_keseluruhan_pengetahuan = PemilihanSoalanKumpulan::sum('NILAI_JUMLAH_SOALAN');

        $markah_keseluruhan_pengetahuan = PemilihanSoalan::get()->first();
        // dd($jawapan_kemahiran);
        $ic = $ic;
        return view('proses_penilaian.keputusan_penilaian.senarai_jawapan', [
            'jawapan' => $jawapan,
            'ic' => $ic,
            'id' => $id,
            'jawapan_kemahiran' => $jawapan_kemahiran,
            'keputusan_calons' => $keputusan_calon,
            'markah_keseluruhan_pengetahuans' => $markah_keseluruhan_pengetahuan
        ]);
    }

    public function kemaskini_keputusan_kemahiran($ic, $id)
    {
        $keputusan = KeputusanPenilaian::where('ic_peserta', $ic)->where('id_penilaian', $id)->first();
        // dd($keputusan);
        return view('proses_penilaian.keputusan_penilaian.kemaskini_keputusan', [
            'ic' => $ic,
            'id' => $id,
            'keputusan' => $keputusan,
        ]);
    }

    public function simpan_keputusan_kemahiran(Request $request, $ic, $id)
    {
        $keputusan = KeputusanPenilaian::where('ic_peserta', $ic)->where('id_penilaian', $id)->first();

        $keputusan->markah_pengetahuan = $request->markah_pengetahuan;
        $keputusan->markah_internet = $request->markah_internet;
        $keputusan->markah_word = $request->markah_word;
        $keputusan->markah_email = $request->markah_email;
        $keputusan->keputusan_pengetahuan = $request->keputusan_pengetahuan;
        $keputusan->keputusan_internet = $request->keputusan_internet;
        $keputusan->keputusan_word = $request->keputusan_word;
        $keputusan->keputusan_email = $request->keputusan_email;
        $keputusan->markah_kemahiran = (int)$request->markah_internet + (int)$request->markah_word + (int)$request->markah_email;
        $keputusan->markah_keseluruhan = $keputusan->markah_pengetahuan + $keputusan->markah_kemahiran;
        if (($keputusan->keputusan_pengetahuan == 'Melepasi') && ($keputusan->keputusan_internet == 'Melepasi') && ($keputusan->keputusan_word == 'Melepasi') && ($keputusan->keputusan_email == 'Melepasi')) {
            $keputusan->keputusan = "Lulus";
        } else {
            $keputusan->keputusan = "Gagal";
        }

        $keputusan->save();

        return redirect('/semak_jawapan/' . $ic . '/' . $id);
    }
}

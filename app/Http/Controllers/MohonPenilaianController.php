<?php

namespace App\Http\Controllers;

use App\Models\MohonPenilaian;
use App\Models\Jadual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Refgeneral;
use App\Helpers\Hrmis\GetDataXMLbyIC;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\DaftarPeserta;

class MohonPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $peserta = MohonPenilaian::all();
        return view('mohonPenilaian.senarai_permohonan', [
            'peserta' => $peserta
        ]);

        // $id_group_user = Auth::user()->user_group_id;
        // if ($id_group_user == "3") {
        //     // dd("Penyelaras");
        //     // JADUAL_PENYELIA
        //     $id_penyelia = Auth::id();
        //     $jadual_penyelia = Jadual::where('user_id', $id_penyelia)->get();

        //     return view('mohonPenilaian.penyelaras.pilih_jadual', [
        //         'jadual_penyelia' => $jadual_penyelia
        //     ]);
        // } elseif ($id_group_user == "5") {
        //     return view('mohonPenilaian.calon.kemaskini_maklumat');
        // } else {
        //     // dd("lain2");

        // }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_group_user = Auth::user()->user_group_id;
        if ($id_group_user == "3") {
            // dd("Penyelaras");
            // JADUAL_PENYELIA
            $id_penyelia = Auth::id();
            $jadual_penyelia = Jadual::where('user_id', $id_penyelia)->get();

            return view('mohonPenilaian.penyelaras.pilih_jadual', [
                'jadual_penyelia' => $jadual_penyelia
            ]);
        } elseif ($id_group_user == "5") {
            return view('mohonPenilaian.calon.kemaskini_maklumat');
        }

        // $peserta = MohonPenilaian::all();
        // return view('mohonPenilaian.senarai_permohonan', [
        //     'peserta' => $peserta
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permohonan = new MohonPenilaian;

        $permohonan->id_sesi = $request->id_sesi;
        $permohonan->id_calon = $request->id_calon;
        $permohonan->tarikh_sesi = $request->tarikh_sesi;
        $permohonan->no_ic = $request->no_ic;
        $permohonan->nama = $request->nama;
        $permohonan->tarikh_lahir = $request->tarikh_lahir;
        $permohonan->jantina = $request->jantina;
        $permohonan->jawatan_ketua_jabatan = $request->jawatan_ketua_jabatan;
        $permohonan->taraf_jawatan = $request->taraf_jawatan;
        $permohonan->tarikh_lantikan = $request->tarikh_lantikan;
        $permohonan->klasifikasi_perkhidmatan = $request->klasifikasi_perkhidmatan;
        $permohonan->no_telefon_pejabat = $request->no_telefon_pejabat;
        $permohonan->alamat1_pejabat = $request->alamat1_pejabat;
        $permohonan->alamat2_pejabat = $request->alamat2_pejabat;
        $permohonan->poskod_pejabat = $request->poskod_pejabat;
        $permohonan->nama_penyelia = $request->nama_penyelia;
        $permohonan->emel_penyelia = $request->emel_penyelia;
        $permohonan->no_telefon_penyelia = $request->no_telefon_penyelia;

        $permohonan->save();

        $emel_pendaftar = Auth::user()->email;
        $recipient = [$emel_pendaftar,"najhan.mnajib@gmail.com"];
        Mail::to($recipient)->send(new DaftarPeserta());

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Contoh surat</h1>');
        return $pdf->download('surat.pdf');

        return redirect('/mohonpenilaian')->with('success', 'Berjaya didaftar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MohonPenilaian  $mohonPenilaian
     * @return \Illuminate\Http\Response
     */
    public function show(MohonPenilaian $mohonPenilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MohonPenilaian  $mohonPenilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(MohonPenilaian $mohonPenilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MohonPenilaian  $mohonPenilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MohonPenilaian $mohonPenilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MohonPenilaian  $mohonPenilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(MohonPenilaian $mohonPenilaian)
    {
        //
    }

    public function pilih_jadual(Request $request)
    {
        $sesi = $request->sesi;
        return view('mohonPenilaian.penyelaras.pilih_calon', [
            'sesi' => $sesi
        ]);
    }

    public function pilih_calon(Request $request)
    {
        $sesi = $request->sesi;
        $calon = $request->ic_calon;

        $sesi_id = Jadual::where('ID_SESI', $sesi)->first();

        $GetDataXMLbyIC = new GetDataXMLbyIC();
        $details = $GetDataXMLbyIC->getDataHrmis($calon);
        // dd($details);

        if ($details == 'Tiada maklumat HRMIS dijumpai') {
            // buat form
            return view('mohonPenilaian.penyelaras.isi_maklumat', [
                'sesi' => $sesi,
                'calon' => $calon,
                'sesi_id' => $sesi_id
            ]);
        } else {
            // papar maklumat
            return view('mohonPenilaian.penyelaras.papar_maklumat', [
                'details' => $details,
                'sesi' => $sesi,
                'calon' => $calon,
                'sesi_id' => $sesi_id
            ]);
        }
    }

    public function kemaskini_maklumat_calon(Request $request)
    {
        $no_ic = $request->no_ic;
        $nama = $request->nama;
        $tarikh_lahir = $request->tarikh_lahir;
        $jantina = $request->jantina;
        $jawatan_ketua_jabatan = $request->jawatan_ketua_jabatan;
        $taraf_jawatan = $request->taraf_jawatan;
        $tarikh_lantikan = $request->tarikh_lantikan;
        $klasifikasi_perkhidmatan = $request->klasifikasi_perkhidmatan;
        $no_telefon_pejabat = $request->no_telefon_pejabat;
        $alamat1_pejabat = $request->alamat1_pejabat;
        $alamat2_pejabat = $request->alamat2_pejabat;
        $poskod_pejabat = $request->poskod_pejabat;
        $nama_penyelia = $request->nama_penyelia;
        $emel_penyelia = $request->emel_penyelia;
        $no_telefon_penyelia = $request->no_telefon_penyelia;

        // $penyelaras = null;
        $jadual = Jadual::where('user_id', null)
        ->orderBy('TARIKH_SESI', 'desc')
        ->get();

        return view('mohonPenilaian.calon.pilih_jadual', [
            'no_ic' => $no_ic,
            'nama' => $nama,
            'tarikh_lahir' => $tarikh_lahir,
            'jantina' => $jantina,
            'jawatan_ketua_jabatan' => $jawatan_ketua_jabatan,
            'taraf_jawatan' => $taraf_jawatan,
            'tarikh_lantikan' => $tarikh_lantikan,
            'klasifikasi_perkhidmatan' => $klasifikasi_perkhidmatan,
            'no_telefon_pejabat' => $no_telefon_pejabat,
            'alamat1_pejabat' => $alamat1_pejabat,
            'alamat2_pejabat' => $alamat2_pejabat,
            'poskod_pejabat' => $poskod_pejabat,
            'nama_penyelia' => $nama_penyelia,
            'emel_penyelia' => $emel_penyelia,
            'no_telefon_penyelia' => $no_telefon_penyelia,
            'jadual' => $jadual
        ]);
    }

    public function pilih_jadual_calon(Request $request)
    {
        $sesi = $request->sesi;
        $sesi_id = Jadual::where('ID_SESI', $sesi)->first();
        $tarikh = $sesi_id->TARIKH_SESI;

        $no_ic = $request->no_ic;
        $nama = $request->nama;
        $tarikh_lahir = $request->tarikh_lahir;
        $jantina = $request->jantina;
        $jawatan_ketua_jabatan = $request->jawatan_ketua_jabatan;
        $taraf_jawatan = $request->taraf_jawatan;
        $tarikh_lantikan = $request->tarikh_lantikan;
        $klasifikasi_perkhidmatan = $request->klasifikasi_perkhidmatan;
        $no_telefon_pejabat = $request->no_telefon_pejabat;
        $alamat1_pejabat = $request->alamat1_pejabat;
        $alamat2_pejabat = $request->alamat2_pejabat;
        $poskod_pejabat = $request->poskod_pejabat;
        $nama_penyelia = $request->nama_penyelia;
        $emel_penyelia = $request->emel_penyelia;
        $no_telefon_penyelia = $request->no_telefon_penyelia;

        $calon = $no_ic;

        $jadual = Jadual::all();

        return view('mohonPenilaian.calon.maklumat', [
            'no_ic' => $no_ic,
            'nama' => $nama,
            'tarikh_lahir' => $tarikh_lahir,
            'jantina' => $jantina,
            'jawatan_ketua_jabatan' => $jawatan_ketua_jabatan,
            'taraf_jawatan' => $taraf_jawatan,
            'tarikh_lantikan' => $tarikh_lantikan,
            'klasifikasi_perkhidmatan' => $klasifikasi_perkhidmatan,
            'no_telefon_pejabat' => $no_telefon_pejabat,
            'alamat1_pejabat' => $alamat1_pejabat,
            'alamat2_pejabat' => $alamat2_pejabat,
            'poskod_pejabat' => $poskod_pejabat,
            'nama_penyelia' => $nama_penyelia,
            'emel_penyelia' => $emel_penyelia,
            'no_telefon_penyelia' => $no_telefon_penyelia,
            'jadual' => $jadual,
            'tarikh' => $tarikh,
            'sesi' => $sesi,
            'calon' => $calon,
            'sesi_id' => $sesi_id
        ]);
    }
}

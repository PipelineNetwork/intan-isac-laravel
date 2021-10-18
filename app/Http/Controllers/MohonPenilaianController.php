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
// use Barryvdh\DomPDF\PDF;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\DaftarPeserta;
use App\Models\Permohanan;
use App\Models\Tugas;
use App\Models\Perkhidmatan;
use Illuminate\Support\Facades\Validator;

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
    public function create(Request $request)
    {
        $id_group_user = Auth::user()->user_group_id;
        // dd($id_group_user);
        if ($id_group_user == "3") {
            // dd("Penyelaras");
            // JADUAL_PENYELIA
            $id_penyelia = Auth::id();
            $jadual_penyelia = Jadual::where('user_id', $id_penyelia)->get();

            return view('mohonPenilaian.penyelaras.pilih_jadual', [
                'jadual_penyelia' => $jadual_penyelia
            ]);
        } elseif ($id_group_user == "5") {
            $status = Auth::user()->nric;
            $check_status = MohonPenilaian::where('id_calon', $status)->first();

            if ($check_status == null) {
                $current_user = Auth::user()->user_group_id;
                $checkid = Auth::id();
                $checkid2 = Auth::user()->id;
                $gelaran_user = Refgeneral::where('MASTERCODE', 10009)
                    ->join('pro_peserta', 'refgeneral.REFERENCECODE', 'pro_peserta.KOD_GELARAN')
                    ->select('refgeneral.MASTERCODE', 'refgeneral.REFERENCECODE', 'refgeneral.DESCRIPTION1', 'pro_peserta.KOD_GELARAN')
                    ->where('pro_peserta.user_id', $checkid2)
                    ->get()->first();

                $kod_gelaran = Refgeneral::where('MASTERCODE', 10009)
                    ->get();

                $peringkat = Refgeneral::where('MASTERCODE', 10023)->get();

                $klasifikasi_perkhidmatan = Refgeneral::where('MASTERCODE', 10024)->get();

                $gred_jawatan = Refgeneral::where('MASTERCODE', 10025)->get();

                $taraf_perjawatan = Refgeneral::where('MASTERCODE', 10026)->get();

                $jenis_perkhidmatan = Refgeneral::where('MASTERCODE', 10027)->get();

                $kementerian = Refgeneral::where('MASTERCODE', 10028)->get();

                $negeri = Refgeneral::where('MASTERCODE', 10021)->get();

                if ($current_user == 5) {
                    $user_profils = User::where('id', $checkid2)
                        ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
                        ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
                        ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
                        ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                        ->get()->first();
                        // dd($user_profils);
                } else {
                    $user_profils = $request->user();
                }
            } else {
                alert("calon telah mendaftar");
            }

            return view('mohonPenilaian.calon.kemaskini_maklumat', [
                'user_profils' => $user_profils,
                'current_user' => $current_user,
                'kod_gelarans' => $kod_gelaran,
                'gelaran_user' => $gelaran_user,
                'peringkats' => $peringkat,
                'klasifikasi_perkhidmatans' => $klasifikasi_perkhidmatan,
                'gred_jawatans' => $gred_jawatan,
                'taraf_perjawatans' => $taraf_perjawatan,
                'jenis_perkhidmatans' => $jenis_perkhidmatan,
                'kementerians' => $kementerian,
                'negeris' => $negeri,
            ]);
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
        $permohonan->id_calon = $request->id_peserta;
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
        // $permohonan->save();

        $kekosongan = Jadual::where('ID_PENILAIAN', $permohonan->id_sesi)->first();
        $kekosongan->KEKOSONGAN = $kekosongan->KEKOSONGAN - 1;
        // $kekosongan->save();

        // $emel_pendaftar = Auth::user()->email;
        // $recipient = [$emel_pendaftar, "najhan.mnajib@gmail.com"];
        // Mail::to($recipient)->send(new DaftarPeserta());

        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Contoh surat</h1>');
        // return $pdf->download('surat.pdf');

        $pdf = PDF::loadView('pdf.pendaftaran_calon',[
            'masa' => time(),
            'nama' => $permohonan->nama,
            'ic' => $permohonan->no_ic,
            'tarikh'=>$permohonan->tarikh_sesi,

        ]);
         return $pdf->download('Surat_tawaran_'.$permohonan->no_ic.'.pdf');

        // if ($pdf->download('Surat_tawaran.pdf')){
        //     return redirect('/mohonpenilaian')->with('success', 'Berjaya didaftar');
        // }

        // return redirect('/mohonpenilaian')->with('success', 'Berjaya didaftar');
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

        $sesi_id = Jadual::where('ID_PENILAIAN', $sesi)->first();

        $GetDataXMLbyIC = new GetDataXMLbyIC();
        $details = $GetDataXMLbyIC->getDataHrmis($calon);
        // dd($details);
        return view('mohonPenilaian.penyelaras.isi_maklumat', [
            'sesi' => $sesi,
            'calon' => $calon,
            'sesi_id' => $sesi_id
        ]);

        // if ($details == 'Tiada maklumat HRMIS dijumpai') {
        //     // buat form
        //     return view('mohonPenilaian.penyelaras.isi_maklumat', [
        //         'sesi' => $sesi,
        //         'calon' => $calon,
        //         'sesi_id' => $sesi_id
        //     ]);
        // } else {
        //     // papar maklumat
        //     return view('mohonPenilaian.penyelaras.papar_maklumat', [
        //         'details' => $details,
        //         'sesi' => $sesi,
        //         'calon' => $calon,
        //         'sesi_id' => $sesi_id
        //     ]);
        // }
    }

    public function kemaskini_maklumat_calon(Request $request)
    {
        // dd($request->KOD_KLASIFIKASI_PERKHIDMATAN);
        // code from profile
        $user_profils1 = User::find($request->user()->id);

        $user_profils2 = Permohanan::where('user_id', $user_profils1->id)->first();
        $user_profils2->NAMA_PESERTA = $request->NAMA_PESERTA;
        $user_profils2->NO_KAD_PENGENALAN = $request->NO_KAD_PENGENALAN;
        $user_profils2->EMEL_PESERTA = $request->EMEL_PESERTA;
        $user_profils2->NO_TELEFON_BIMBIT = $request->NO_TELEFON_BIMBIT;
        $user_profils2->NO_TELEFON_PEJABAT = $request->NO_TELEFON_PEJABAT;
        $user_profils2->KOD_JANTINA = $request->KOD_JANTINA;
        $user_profils2->TARIKH_LAHIR = $request->TARIKH_LAHIR;
        $user_profils2->ID_PESERTA = $request->ID_PESERTA;
        $user_profils2->KOD_GELARAN = $request->KOD_GELARAN;
        
        $user_profils3 = Tugas::where('ID_PESERTA', $user_profils2->ID_PESERTA)->first();
        $user_profils3->ALAMAT_1 = $request->ALAMAT_1;
        $user_profils3->ALAMAT_2 = $request->ALAMAT_2;
        $user_profils3->POSKOD = $request->POSKOD;
        $user_profils3->KOD_NEGERI = $request->KOD_NEGERI;
        $user_profils3->KOD_NEGARA = $request->KOD_NEGARA;
        $user_profils3->NAMA_PENYELIA = $request->NAMA_PENYELIA;
        $user_profils3->EMEL_PENYELIA = $request->EMEL_PENYELIA;
        $user_profils3->NO_TELEFON_PENYELIA = $request->NO_TELEFON_PENYELIA;
        $user_profils3->KOD_KEMENTERIAN = $request->KOD_KEMENTERIAN;
        $user_profils3->GELARAN_KETUA_JABATAN = $request->GELARAN_KETUA_JABATAN;
        $user_profils3->BAHAGIAN = $request->BAHAGIAN;
        $user_profils3->BANDAR = $request->BANDAR;

        $user_profils4 = Perkhidmatan::where('ID_PESERTA', $user_profils2->ID_PESERTA)->first();
        // dd($user_profils4);
        $user_profils4->KOD_KLASIFIKASI_PERKHIDMATAN = $request->KOD_KLASIFIKASI_PERKHIDMATAN;
        $user_profils4->TARIKH_LANTIKAN = $request->TARIKH_LANTIKAN;
        $user_profils4->KOD_GELARAN_JAWATAN = $request->KOD_GELARAN_JAWATAN;
        $user_profils4->KOD_TARAF_PERJAWATAN = $request->KOD_TARAF_PERJAWATAN;
        $user_profils4->KOD_PERINGKAT = $request->KOD_PERINGKAT;
        $user_profils4->KOD_JENIS_PERKHIDMATAN = $request->KOD_JENIS_PERKHIDMATAN;
        $user_profils4->KOD_GRED_JAWATAN = $request->KOD_GRED_JAWATAN;

        // najhan punya code
        $no_ic = $request->NO_KAD_PENGENALAN;
        $id_peserta = $request->ID_PESERTA;
        $nama = $request->NAMA_PESERTA;
        $tarikh_lahir = $request->TARIKH_LAHIR;
        $jantina = $request->KOD_JANTINA;
        $jawatan_ketua_jabatan = $request->GELARAN_KETUA_JABATAN;
        $taraf_jawatan = $request->KOD_TARAF_PERJAWATAN;
        $tarikh_lantikan = $request->TARIKH_LANTIKAN;
        $klasifikasi_perkhidmatan = $request->KOD_KLASIFIKASI_PERKHIDMATAN;
        $no_telefon_pejabat = $request->NO_TELEFON_PEJABAT;
        $alamat1_pejabat = $request->ALAMAT_1;
        $alamat2_pejabat = $request->ALAMAT_2;
        $poskod_pejabat = $request->POSKOD;
        $nama_penyelia = $request->NAMA_PENYELIA;
        $emel_penyelia = $request->EMEL_PENYELIA;
        $no_telefon_penyelia = $request->NO_TELEFON_PENYELIA;

        $rules = [
            'NO_KAD_PENGENALAN' => 'required',
            'NAMA_PESERTA' => 'required',
            'ID_PESERTA' => 'required',
            'TARIKH_LAHIR' => 'required',
            'KOD_JANTINA' => 'required',
            'GELARAN_KETUA_JABATAN' => 'required',
            'KOD_TARAF_PERJAWATAN' => 'required',
            'TARIKH_LANTIKAN' => 'required',
            'KOD_KLASIFIKASI_PERKHIDMATAN' => 'required',
            'NO_TELEFON_PEJABAT' => 'required',
            'ALAMAT_1' => 'required',
            'POSKOD' => 'required',
            'NAMA_PENYELIA' => 'required',
            'EMEL_PENYELIA' => 'required',
            'NO_TELEFON_PENYELIA' => 'required',
        ];

        $messages = [

            'required' => 'Sila masukkan maklumat yang disediakan.',
        ];

        Validator::make($request->input(), $rules, $messages)->validate();

        $user_profils2->save();
        $user_profils3->save();
        $user_profils4->save();
        // $penyelaras = null;
        $jadual = Jadual::where('user_id', null)
            ->orderBy('TARIKH_SESI', 'desc')
            ->get();

        return view('mohonPenilaian.calon.pilih_jadual', [
            'no_ic' => $no_ic,
            'nama' => $nama,
            'id_peserta' => $id_peserta,
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
        // dd($request);
        $sesi = $request->sesi;
        $sesi_id = Jadual::where('ID_PENILAIAN', $sesi)->first();
        $tarikh = $sesi_id->TARIKH_SESI;

        $no_ic = $request->no_ic;
        $nama = $request->nama;
        $id_peserta = $request->id_peserta;
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
            'id_peserta' => $id_peserta,
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

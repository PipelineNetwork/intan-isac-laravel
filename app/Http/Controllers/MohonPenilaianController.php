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
use Spatie\Permission\Models\Role;

class MohonPenilaianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ic = Auth::user()->nric;
        $calon_3 = MohonPenilaian::where('no_ic', $ic)->where('status_penilaian', 'Baru')->orderBy('created_at', 'desc')->get();

        $peserta = MohonPenilaian::orderBy('created_at', 'desc')->get();
        return view('mohonPenilaian.senarai_permohonan', [
            'peserta' => $peserta,
            'calon_3' => $calon_3
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
        $status_ic = Auth::user()->nric;
        $status_lulus = MohonPenilaian::where('no_ic', $status_ic)->where('status_penilaian', 'Lulus')->first();
        $status_baru = MohonPenilaian::where('no_ic', $status_ic)->where('status_penilaian', 'Baru')->first();

        // dd($status_pen);
        if ($status_lulus != null) {
            alert('Anda telah lulus penilaian ID ' . $status_lulus->id_sesi . '. Anda tidak dibenarkan untuk daftar penilaian lain.');
            return redirect('/mohonpenilaian');
        }
        if ($status_baru != null) {
            alert('Anda telah mendaftar untuk penilaian ID ' . $status_baru->id_sesi);
            return redirect('/mohonpenilaian');
        }
        $id_group_user = Auth::user()->user_group_id;
        $role = Role::where('id', $id_group_user)->first();
        $role = $role->name;

        if ($role == 'penyelaras') {
            $id_penyelia = Auth::id();
            $jadual_penyelia = Jadual::where('user_id', $id_penyelia)->get();

            return view('mohonPenilaian.penyelaras.pilih_jadual', [
                'jadual_penyelia' => $jadual_penyelia
            ]);
        } elseif ($role == 'calon') {
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

            $user_profils = User::where('id', $checkid2)
                ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
                ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->get()->first();

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
        $permohonan->status_penilaian = 'Baru';
        $permohonan->save();

        $kekosongan = Jadual::where('ID_PENILAIAN', $permohonan->id_sesi)->first();
        $maklumat_calon = Tugas::where('ID_PESERTA', $permohonan->id_calon)->first();

        $kekosongan->KEKOSONGAN = $kekosongan->KEKOSONGAN - 1;
        $kekosongan->save();

        $tahap = $kekosongan->KOD_TAHAP;
        if ($tahap == "01") {
            $tahap = "Asas";
        } else {
            $tahap = "Lanjutan";
        }

        $masa_mula = $kekosongan->KOD_MASA_MULA;
        $masa_tamat = $kekosongan->KOD_MASA_TAMAT;

        $emel_pendaftar = Auth::user()->email;
        $recipient = [$emel_pendaftar];
        Mail::to($recipient)->send(new DaftarPeserta());

        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Contoh surat</h1>');
        // return $pdf->download('surat.pdf');

        $pdf = PDF::loadView('pdf.pendaftaran_calon', [
            'jkj' => $permohonan->jawatan_ketua_jabatan,
            'kementerian' => $maklumat_calon->KOD_KEMENTERIAN,
            'al1' => $permohonan->alamat1_pejabat,
            'al2' => $permohonan->alamat2_pejabat,
            'poskod' => $permohonan->poskod_pejabat,
            'bandar' => $maklumat_calon->BANDAR,
            'negeri' => $maklumat_calon->KOD_NEGERI,
            'nama_penyelaras' => $permohonan->nama_penyelia,
            'hari' => date('d - m - Y'),
            'nama' => $permohonan->nama,
            'ic' => $permohonan->no_ic,
            'tarikh' => $permohonan->tarikh_sesi,
            'tahap' => $tahap,
            'masa_mula' => $masa_mula,
            'masa_tamat' => $masa_tamat,
            'id_sesi' => $request->id_sesi
        ]);
        return $pdf->download('Surat_tawaran_' . $permohonan->no_ic . '.pdf');

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
    public function edit($id)
    {
        $penjadualan = MohonPenilaian::where('id', $id)->first();
        $penilaian = Jadual::where('ID_PENILAIAN', $penjadualan->id_sesi)->first();
        $jadual = Jadual::where('user_id', null)
            ->orderBy('TARIKH_SESI', 'desc')
            ->get();
        return view('mohonPenilaian.calon.edit', [
            'penjadualan' => $penjadualan,
            'jadual' => $jadual,
            'penilaian' => $penilaian
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MohonPenilaian  $mohonPenilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MohonPenilaian  $mohonPenilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy($mohonPenilaian)
    {
        $mohonPenilaian = MohonPenilaian::find($mohonPenilaian);
        $id_penilaian = $mohonPenilaian->id_sesi;
        $kekosongan = Jadual::where('ID_PENILAIAN', $id_penilaian)->first();

        $kekosongan->KEKOSONGAN = $kekosongan->KEKOSONGAN + 1;
        $kekosongan->BILANGAN_CALON = $kekosongan->JUMLAH_KESELURUHAN - $kekosongan->KEKOSONGAN;
        $kekosongan->save();
        $mohonPenilaian->delete();
        return redirect('/mohonpenilaian')->with('success', 'Berjaya dihapus!');
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

        $kod_gelaran = Refgeneral::where('MASTERCODE', 10009)->get();

        $peringkat = Refgeneral::where('MASTERCODE', 10023)->get();

        $klasifikasi_perkhidmatan = Refgeneral::where('MASTERCODE', 10024)->get();

        $gred_jawatan = Refgeneral::where('MASTERCODE', 10025)->get();

        $taraf_perjawatan = Refgeneral::where('MASTERCODE', 10026)->get();

        $jenis_perkhidmatan = Refgeneral::where('MASTERCODE', 10027)->get();

        $kementerian = Refgeneral::where('MASTERCODE', 10028)->get();

        $negeri = Refgeneral::where('MASTERCODE', 10021)->get();

        if ($details == 'Tiada maklumat HRMIS dijumpai') {
            // buat form
            $details = DB::table('users')
                ->where('nric', '=', $calon)
                ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
                ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->get()->first();
            // dd($details);
            return view('mohonPenilaian.penyelaras.isi_maklumat', [
                'sesi' => $sesi,
                'calon' => $calon,
                'sesi_id' => $sesi_id,
                'details' => $details,

                'kod_gelarans' => $kod_gelaran,
                'peringkats' => $peringkat,
                'klasifikasi_perkhidmatans' => $klasifikasi_perkhidmatan,
                'gred_jawatans' => $gred_jawatan,
                'taraf_perjawatans' => $taraf_perjawatan,
                'jenis_perkhidmatans' => $jenis_perkhidmatan,
                'kementerians' => $kementerian,
                'negeris' => $negeri,
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


        $user_profils2->save();
        $user_profils3->save();
        $user_profils4->save();

        $jadual = Jadual::where('user_id', null)
            ->orderBy('TARIKH_SESI', 'desc')
            ->get();

        alert('Maklumat berjaya dikemaskini.');

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
        ])->with('success', 'Maklumat berjaya dikemaskini');
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

    public function cetak_surat($id)
    {

        $id_permohonan = MohonPenilaian::where('id', $id)->first();
        $id_peserta = $id_permohonan->id_calon;
        $id_penilaian = $id_permohonan->id_sesi;

        $maklumat_calon = Tugas::where('ID_PESERTA', $id_peserta)->first();
        $jadual = Jadual::where('ID_PENILAIAN', $id_penilaian)->first();

        if ($jadual->KOD_TAHAP == "01") {
            $tahap = "Asas";
        } else {
            $tahap = "Lanjutan";
        }

        $permohonan = MohonPenilaian::where('id', $id)->first();
        $ic_num = $permohonan->no_ic;
        $user_profils1 = User::where('nric', $ic_num)->first();
        $user_profils2 = Permohanan::where('user_id', $user_profils1->id)->first();
        $user_profils3 = Tugas::where('ID_PESERTA', $user_profils2->ID_PESERTA)->first();
        $user_profils4 = Perkhidmatan::where('ID_PESERTA', $user_profils2->ID_PESERTA)->first();

        $kekosongan = Jadual::where('ID_PENILAIAN', $permohonan->id_sesi)->first();
        $maklumat_calon = Tugas::where('ID_PESERTA', $permohonan->id_calon)->first();

        $kekosongan->KEKOSONGAN = $kekosongan->KEKOSONGAN - 1;
        $kekosongan->save();

        $tahap = $kekosongan->KOD_TAHAP;
        if ($tahap == "01") {
            $tahap = "Asas";
        } else {
            $tahap = "Lanjutan";
        }

        $masa_mula = $kekosongan->KOD_MASA_MULA;
        $masa_tamat = $kekosongan->KOD_MASA_TAMAT;
        
        if($masa_mula >"12:00"){
            $mula = (float)$masa_mula;
            $masa_mula = $mula - 12;
            $masa_mula =number_format((float)$masa_mula, 2, '.', '');
            $mula = $masa_mula.' PM';
        }else{
            $mula = $masa_mula.' AM';
        }

        if($masa_tamat >"12:00"){
            $tamat = (float)$masa_tamat;
            $masa_tamat = $tamat - 12;
            $masa_tamat =number_format((float)$masa_tamat, 2, '.', '');
            $tamat = $masa_tamat.' PM';
        }else{
            $tamat = $masa_tamat.' AM';
        }

        $pdf = PDF::loadView('pdf.pendaftaran_calon', [
            'jkj' => $permohonan->jawatan_ketua_jabatan,
            'kementerian' => $user_profils3->KOD_KEMENTERIAN,
            'al1' => $permohonan->alamat1_pejabat,
            'al2' => $permohonan->alamat2_pejabat,
            'poskod' => $permohonan->poskod_pejabat,
            'bandar' => ucfirst(strtolower($user_profils3->BANDAR)),
            'negeri' => $user_profils3->KOD_NEGERI,
            'nama_penyelaras' => $permohonan->nama_penyelia,
            'hari' => date('d - m - Y'),
            'nama' => $permohonan->nama,
            'ic' => $permohonan->no_ic,
            'tarikh' => $permohonan->tarikh_sesi,
            'tahap' => $tahap,
            'masa_mula' => $mula,
            'masa_tamat' => $tamat,
            'id_sesi' => $permohonan->id_sesi
        ]);

        // $pdf = PDF::loadView('pdf.pendaftaran_calon', [
        //     'jkj' => $id_permohonan->jawatan_ketua_jabatan,
        //     'kementerian' => $maklumat_calon->KOD_KEMENTERIAN,
        //     'al1' => $id_permohonan->alamat1_pejabat,
        //     'al2' => $id_permohonan->alamat2_pejabat,
        //     'poskod' => $id_permohonan->poskod_pejabat,
        //     'bandar' => $maklumat_calon->BANDAR,
        //     'negeri' => $maklumat_calon->KOD_NEGERI,
        //     'nama_penyelaras' => $id_permohonan->nama_penyelia,
        //     'hari' => date('d - m - Y'),
        //     'nama' => $id_permohonan->nama,
        //     'ic' => $id_permohonan->no_ic,
        //     'tarikh' => $id_permohonan->tarikh_sesi,
        //     'tahap' => $tahap,
        //     'masa_mula' => $jadual->KOD_MASA_MULA,
        //     'masa_tamat' => $jadual->KOD_MASA_TAMAT,
        //     'id_sesi' => $id_penilaian
        // ]);
        return $pdf->download('Surat_tawaran_' . $id_permohonan->no_ic . '.pdf');
    }

    public function penjadualan_semula(Request $request)
    {
        $permohonan_semasa = MohonPenilaian::where('id_sesi', $request->sesi_semasa)->first();
        $permohonan_semasa->id_sesi = $request->sesi_baru;
        $permohonan_semasa->tarikh_sesi = $request->tarikh_baru;

        $jadual_semasa = Jadual::where('ID_PENILAIAN', $request->sesi_semasa)->first();
        $jadual_semasa->KEKOSONGAN = $jadual_semasa->KEKOSONGAN + 1;

        $jadual_baru = Jadual::where('ID_PENILAIAN', $request->sesi_baru)->first();
        $jadual_baru->KEKOSONGAN = $jadual_baru->KEKOSONGAN - 1;

        $permohonan_semasa->save();
        $jadual_semasa->save();
        $jadual_baru->save();

        return redirect('/mohonpenilaian')->with('success', 'Penjadualan Semula telah berjaya');
    }

    public function jadual_dashboard(Request $request)
    {
        $id_penilaian = $request->sesi;
        $status_ic = Auth::user()->nric;
        $status_lulus = MohonPenilaian::where('no_ic', $status_ic)->where('status_penilaian', 'Lulus')->first();
        $status_baru = MohonPenilaian::where('no_ic', $status_ic)->where('status_penilaian', 'Baru')->first();

        // dd($status_pen);
        if ($status_lulus != null) {
            alert('Anda telah lulus penilaian ID ' . $status_lulus->id_sesi . '. Anda tidak dibenarkan untuk daftar penilaian lain.');
            return redirect('/dashboard');
        }
        if ($status_baru != null) {
            alert('Anda telah mendaftar untuk penilaian ID ' . $status_baru->id_sesi);
            return redirect('/dashboard');
        }

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

        $user_profils = User::where('id', $checkid2)
            ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
            ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
            ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
            ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
            ->get()->first();

        return view('mohonPenilaian.calon.jadual_dashboard_update_profile', [
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
            'id_penilaian'=>$id_penilaian
        ]);
    }

    public function daftar_permohonan_calon(Request $request){
        // kemaskini profil
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

        $user_profils2->save();
        $user_profils3->save();
        $user_profils4->save();

        // daftar permohonan
        $sesi_id = Jadual::where('ID_PENILAIAN', $request->id_sesi)->first();

        $permohonan = new MohonPenilaian;

        $permohonan->id_sesi = $request->id_sesi;
        $permohonan->id_calon = $request->id_peserta;
        $permohonan->tarikh_sesi = $sesi_id->TARIKH_SESI;
        $permohonan->no_ic = $request->NO_KAD_PENGENALAN;
        $permohonan->nama = $request->NAMA_PESERTA;
        $permohonan->tarikh_lahir = $request->TARIKH_LAHIR;
        if($request->KOD_JANTINA == '01'){
            $jantina = 'Lelaki';
        }else{
            $jantina = 'Perempuan';
        }
        $permohonan->jantina = $jantina;
        $permohonan->jawatan_ketua_jabatan = $request->GELARAN_KETUA_JABATAN;
        $permohonan->taraf_jawatan = $request->KOD_TARAF_PERJAWATAN;
        $permohonan->tarikh_lantikan = $request->TARIKH_LANTIKAN;
        $permohonan->klasifikasi_perkhidmatan = $request->KOD_KLASIFIKASI_PERKHIDMATAN;
        $permohonan->no_telefon_pejabat = $request->NO_TELEFON_PEJABAT;
        $permohonan->alamat1_pejabat = $request->ALAMAT_1;
        $permohonan->alamat2_pejabat = $request->ALAMAT_2;
        $permohonan->poskod_pejabat = $request->POSKOD;
        $permohonan->nama_penyelia = $request->NAMA_PENYELIA;
        $permohonan->emel_penyelia = $request->EMEL_PENYELIA;
        $permohonan->no_telefon_penyelia = $request->NO_TELEFON_PENYELIA;
        $permohonan->status_penilaian = 'Baru';
        $permohonan->save();

        $kekosongan = Jadual::where('ID_PENILAIAN', $permohonan->id_sesi)->first();
        $maklumat_calon = Tugas::where('ID_PESERTA', $permohonan->id_calon)->first();

        $kekosongan->KEKOSONGAN = $kekosongan->KEKOSONGAN - 1;
        $kekosongan->BILANGAN_CALON = $kekosongan->JUMLAH_KESELURUHAN - $kekosongan->KEKOSONGAN;
        $kekosongan->save();

        $tahap = $kekosongan->KOD_TAHAP;
        if ($tahap == "01") {
            $tahap = "Asas";
        } else {
            $tahap = "Lanjutan";
        }

        $masa_mula = $kekosongan->KOD_MASA_MULA;
        $masa_tamat = $kekosongan->KOD_MASA_TAMAT;

        $emel_pendaftar = Auth::user()->email;
        $recipient = [$emel_pendaftar,$request->EMEL_PENYELIA];
        $recipient_penyelia = [$request->EMEL_PENYELIA];
        
        if($masa_mula >"12:00"){
            $mula = (float)$masa_mula;
            $masa_mula = $mula - 12;
            $masa_mula =number_format((float)$masa_mula, 2, '.', '');
            $mula = $masa_mula.' PM';
        }else{
            $mula = $masa_mula.' AM';
        }

        if($masa_tamat >"12:00"){
            $tamat = (float)$masa_tamat;
            $masa_tamat = $tamat - 12;
            $masa_tamat =number_format((float)$masa_tamat, 2, '.', '');
            $tamat = $masa_tamat.' PM';
        }else{
            $tamat = $masa_tamat.' AM';
        }

        $pdf = PDF::loadView('pdf.pendaftaran_calon', [
            'jkj' => $permohonan->jawatan_ketua_jabatan,
            'kementerian' => $user_profils3->KOD_KEMENTERIAN,
            'al1' => $permohonan->alamat1_pejabat,
            'al2' => $permohonan->alamat2_pejabat,
            'poskod' => $permohonan->poskod_pejabat,
            'bandar' => ucfirst(strtolower($user_profils3->BANDAR)),
            'negeri' => $user_profils3->KOD_NEGERI,
            'nama_penyelaras' => $permohonan->nama_penyelia,
            'hari' => date('d - m - Y'),
            'nama' => $permohonan->nama,
            'ic' => $permohonan->no_ic,
            'tarikh' => $permohonan->tarikh_sesi,
            'tahap' => $tahap,
            'masa_mula' => $mula,
            'masa_tamat' => $tamat,
            'id_sesi' => $request->id_sesi
        ]);

        $data_email = [
            'ic_calon'=>$permohonan->no_ic,
            'nama_calon'=>$request->NAMA_PESERTA,
            'tarikh' => $permohonan->tarikh_sesi,
        ];
        
        Mail::send('emails.daftar_peserta', $data_email, function($message)use($recipient, $pdf) {
            $message->to($recipient)
                    ->subject("ISAC - Permohonan Berjaya")
                    ->attachData($pdf->output(), 'Surat_tawaran.pdf');
        });

        Mail::send('emails.penyelia_pendaftaran', $data_email, function($message)use($recipient_penyelia, $pdf) {
            $message->to($recipient_penyelia)
                    ->subject("ISAC - Permohonan Penilaian ISAC")
                    ->attachData($pdf->output(), 'Surat_tawaran.pdf');
        });

        return $pdf->download('Surat_tawaran_' . $permohonan->no_ic . '.pdf');
    }
}

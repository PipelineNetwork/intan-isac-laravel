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
use App\Models\Bankjawapancalon;
use App\Models\Permohanan;
use App\Models\Tugas;
use App\Models\Perkhidmatan;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use App\Models\Bankjawapanpengetahuan;
use App\Models\KeputusanPenilaian;

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
        $id = Auth::user()->id;
        $calon_3 = MohonPenilaian::where('no_ic', $ic)->where('status_penilaian', 'Baru')->orderBy('created_at', 'desc')->get();

        $penyelaras = MohonPenilaian::join('pro_sesi', 'mohon_penilaians.id_sesi', 'pro_sesi.ID_PENILAIAN')->where('KOD_KATEGORI_PESERTA', '02')->where('user_id', $id)->orderBy('mohon_penilaians.created_at', 'desc')->get();
        $peserta = MohonPenilaian::orderBy('created_at', 'desc')->get();
        return view('mohonPenilaian.senarai_permohonan', [
            'peserta' => $peserta,
            'calon_3' => $calon_3,
            'penyelaras' => $penyelaras
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

        if (($role == 'penyelaras') || ($role == 'pentadbir sistem')) {
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

            $jabatan = Refgeneral::where('MASTERCODE', 10029)->orderBy('DESCRIPTION1', 'asc')->get();

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
                'jabatans' => $jabatan,
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
        $check_jadual = Jadual::where('ID_PENILAIAN', $request->id_sesi)->first();
        $check_bilangan_daftar = MohonPenilaian::where('id_sesi', $request->id_sesi)->count();
        // dd($check_bilangan_daftar);
        if (($check_jadual->KEKOSONGAN != 0) && ($check_bilangan_daftar <= $check_jadual->JUMLAH_KESELURUHAN)) {
            $check_calon = MohonPenilaian::where('id_sesi', $request->id_sesi)->where('no_ic', $request->NO_KAD_PENGENALAN)->first();

            if ($check_calon == null) {
                $user_profils1 = User::where('nric', $request->NO_KAD_PENGENALAN)->first();
                $user_profils1->name = $request->NAMA_PESERTA;
                $user_profils1->nric = $request->NO_KAD_PENGENALAN;
                $user_profils1->email = $request->EMEL_PESERTA;

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
                $user_profils3->KOD_JABATAN = $request->KOD_JABATAN;
                $user_profils3->GELARAN_KETUA_JABATAN = strtoupper($request->GELARAN_KETUA_JABATAN);
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

                $user_profils1->save();
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
                if ($request->KOD_JANTINA == '01') {
                    $jantina = 'Lelaki';
                } else {
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
                // $current_user = Auth::user()->nric;
                $peserta = Permohanan::where('NO_KAD_PENGENALAN', $request->NO_KAD_PENGENALAN)->first();
                $maklumat_calon = Tugas::where('ID_PESERTA', $peserta->ID_PESERTA)->first();

                $permohonan_d = MohonPenilaian::where('id_sesi', $permohonan->id_sesi)->get();
                $bilangan_permohonan = count($permohonan_d);

                $kekosongan->BILANGAN_CALON = $bilangan_permohonan;
                $kekosongan->KEKOSONGAN = $kekosongan->JUMLAH_KESELURUHAN - $kekosongan->BILANGAN_CALON;
                $kekosongan->save();

                $tahap = $kekosongan->KOD_TAHAP;
                if ($tahap == "01") {
                    $tahap = "Asas";
                } else {
                    $tahap = "Lanjutan";
                }

                $masa_mula = $kekosongan->KOD_MASA_MULA;
                $masa_tamat = $kekosongan->KOD_MASA_TAMAT;

                // $emel_pendaftar = Auth::user()->email;
                $recipient = $user_profils1->email;
                $recipient_penyelia = $request->EMEL_PENYELIA;

                if ($masa_mula >= "12:00") {
                    list($jam_m, $min_m) = explode(":", $masa_mula);
                    $jam_m = (int)$jam_m;
                    if ($jam_m > 12) {
                        $jam_m = $jam_m - 12;
                        $mula = $jam_m . ':' . $min_m . ' PM';
                    }
                    $mula = $masa_mula . ' PM';
                } else {
                    $mula = $masa_mula . ' AM';
                }

                if ($masa_tamat >= "12:00") {
                    list($jam, $min) = explode(":", $masa_tamat);
                    $jam = (int)$jam;
                    if ($jam > 12) {
                        $jam = $jam - 12;
                        $tamat = $jam . ':' . $min . ' PM';
                    }
                    $tamat = $masa_tamat . ' PM';
                } else {
                    $tamat = $masa_tamat . ' AM';
                }

                // dd($mula, $tamat);

                $pdf = PDF::loadView('pdf.pendaftaran_calon', [
                    'jkj' => $permohonan->jawatan_ketua_jabatan,
                    'kementerian' => $maklumat_calon->KOD_KEMENTERIAN,
                    'jabatan' => $maklumat_calon->KOD_JABATAN,
                    'bahagian' => $maklumat_calon->BAHAGIAN,
                    'al1' => $permohonan->alamat1_pejabat,
                    'poskod' => $permohonan->poskod_pejabat,
                    'bandar' => $maklumat_calon->BANDAR,
                    'negeri' => $maklumat_calon->KOD_NEGERI,
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
                    'ic_calon' => $permohonan->no_ic,
                    'nama_calon' => $request->NAMA_PESERTA,
                    'tarikh' => $permohonan->tarikh_sesi,
                ];

                Mail::send('emails.daftar_peserta_kumpulan', $data_email, function ($message) use ($recipient, $recipient_penyelia, $pdf) {
                    $message->to($recipient)
                        ->cc($recipient_penyelia)
                        ->subject("ISAC - Permohonan Berjaya")
                        ->attachData($pdf->output(), 'Surat_tawaran.pdf');
                });

                Mail::send('emails.penyelia_pendaftaran', $data_email, function ($message) use ($recipient_penyelia, $pdf) {
                    $message->to($recipient_penyelia)
                        ->subject("ISAC - Permohonan Penilaian ISAC")
                        ->attachData($pdf->output(), 'Surat_tawaran.pdf');
                });

                return $pdf->download('Surat_tawaran_' . $permohonan->no_ic . '.pdf');
            } else {
                echo '<script language="javascript">';
                echo 'alert("Calon telah didaftar penilaian ini.");';
                echo "window.location.href='/mohonpenilaian';";
                echo '</script>';
            }
        } else {
            echo '<script language="javascript">';
            echo 'alert("Jadual telah penuh.");';
            echo "window.location.href='/mohonpenilaian';";
            echo '</script>';
        }
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
        $ic_calon = $mohonPenilaian->no_ic;
        $kekosongan = Jadual::where('ID_PENILAIAN', $id_penilaian)->first();

        $kekosongan->BILANGAN_CALON = (int)$kekosongan->BILANGAN_CALON - 1;
        $kekosongan->KEKOSONGAN = (int)$kekosongan->KEKOSONGAN + 1;
        $kekosongan->save();

        $pengetahuan = Bankjawapanpengetahuan::where('id_calon', $ic_calon)->where('id_penilaian', $id_penilaian)->get();
        foreach ($pengetahuan as $pengetahuan) {
            $pengetahuan->delete();
        }

        $kemahiran = Bankjawapancalon::where('ic_calon', $ic_calon)->where('id_penilaian', $id_penilaian)->get()->first();
        if ($kemahiran != null) {
            $kemahiran->delete();
        }

        $keputusan = KeputusanPenilaian::where('ic_peserta', $ic_calon)->where('id_penilaian', $id_penilaian)->get()->first();
        if ($keputusan != null) {
            $keputusan->delete();
        }

        $kekosongan->save();
        $mohonPenilaian->delete();
        // alert()->success('Berjaya dihapus!');
        return redirect('/mohonpenilaian');
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

        // $GetDataXMLbyIC = new GetDataXMLbyIC();
        // $details = $GetDataXMLbyIC->getDataHrmis($calon);

        $gelaran_user = Refgeneral::where('MASTERCODE', 10009)
            ->join('pro_peserta', 'refgeneral.REFERENCECODE', 'pro_peserta.KOD_GELARAN')
            ->select('refgeneral.MASTERCODE', 'refgeneral.REFERENCECODE', 'refgeneral.DESCRIPTION1', 'pro_peserta.KOD_GELARAN')
            ->where('pro_peserta.NO_KAD_PENGENALAN', $calon)
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

        $jabatan = Refgeneral::where('MASTERCODE', 10029)->orderBy('DESCRIPTION1')->get();

        $user_profils = User::where('nric', $calon)
            ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
            ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
            ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
            ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
            ->get()->first();

        return view('mohonPenilaian.penyelaras.papar_maklumat', [
            'user_profils' => $user_profils,
            'kod_gelarans' => $kod_gelaran,
            'gelaran_user' => $gelaran_user,
            'peringkats' => $peringkat,
            'klasifikasi_perkhidmatans' => $klasifikasi_perkhidmatan,
            'gred_jawatans' => $gred_jawatan,
            'taraf_perjawatans' => $taraf_perjawatan,
            'jenis_perkhidmatans' => $jenis_perkhidmatan,
            'kementerians' => $kementerian,
            'negeris' => $negeri,
            'jabatans' => $jabatan,
            'sesi_id' => $sesi_id
        ]);

        // $kod_gelaran = Refgeneral::where('MASTERCODE', 10009)->get();

        // $peringkat = Refgeneral::where('MASTERCODE', 10023)->get();

        // $klasifikasi_perkhidmatan = Refgeneral::where('MASTERCODE', 10024)->get();

        // $gred_jawatan = Refgeneral::where('MASTERCODE', 10025)->get();

        // $taraf_perjawatan = Refgeneral::where('MASTERCODE', 10026)->get();

        // $jenis_perkhidmatan = Refgeneral::where('MASTERCODE', 10027)->get();

        // $kementerian = Refgeneral::where('MASTERCODE', 10028)->get();

        // $negeri = Refgeneral::where('MASTERCODE', 10021)->get();

        // if ($details == 'Tiada maklumat HRMIS dijumpai') {
        //     // buat form
        //     $details = DB::table('users')
        //         ->where('nric', '=', $calon)
        //         ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
        //         ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
        //         ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
        //         ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
        //         ->get()->first();
        //     // dd($details);
        //     return view('mohonPenilaian.penyelaras.isi_maklumat', [
        //         'sesi' => $sesi,
        //         'calon' => $calon,
        //         'sesi_id' => $sesi_id,
        //         'details' => $details,

        //         'kod_gelarans' => $kod_gelaran,
        //         'peringkats' => $peringkat,
        //         'klasifikasi_perkhidmatans' => $klasifikasi_perkhidmatan,
        //         'gred_jawatans' => $gred_jawatan,
        //         'taraf_perjawatans' => $taraf_perjawatan,
        //         'jenis_perkhidmatans' => $jenis_perkhidmatan,
        //         'kementerians' => $kementerian,
        //         'negeris' => $negeri,
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


        $user_profils2->save();
        $user_profils3->save();
        $user_profils4->save();

        $jadual = Jadual::where('user_id', null)
            ->orderBy('TARIKH_SESI', 'desc')
            ->get();

        // alert()->success('Maklumat berjaya dikemaskini.');

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

        if ($masa_mula >= "12:00") {
            list($jam_m, $min_m) = explode(":", $masa_mula);
            $jam_m = (int)$jam_m;
            if ($jam_m > 12) {
                $jam_m = $jam_m - 12;
                $mula = $jam_m . ':' . $min_m . ' PM';
            }
            $mula = $masa_mula . ' PM';
        } else {
            $mula = $masa_mula . ' AM';
        }

        if ($masa_tamat >= "12:00") {
            list($jam, $min) = explode(":", $masa_tamat);
            $jam = (int)$jam;
            if ($jam > 12) {
                $jam = $jam - 12;
                $tamat = $jam . ':' . $min . ' PM';
            }
            $tamat = $masa_tamat . ' PM';
        } else {
            $tamat = $masa_tamat . ' AM';
        }

        // $emel_pendaftar = Auth::user()->email;
        // $recipient = [$emel_pendaftar];
        // Mail::to($recipient)->send(new DaftarPeserta($permohonan));

        $pdf = PDF::loadView('pdf.pendaftaran_calon', [
            'jkj' => $permohonan->jawatan_ketua_jabatan,
            'kementerian' => $user_profils3->KOD_KEMENTERIAN,
            'jabatan' => $user_profils3->KOD_JABATAN,
            'bahagian' => $user_profils3->BAHAGIAN,
            'al1' => $permohonan->alamat1_pejabat,
            'poskod' => $permohonan->poskod_pejabat,
            'bandar' => $user_profils3->BANDAR,
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

        // alert()->success('Penjadualan Semula telah berjaya');
        return redirect('/mohonpenilaian');
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

        $jabatan = Refgeneral::where('MASTERCODE', 10029)->orderBy('DESCRIPTION1')->get();

        $user_profils = User::where('id', $checkid2)
            ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
            ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
            ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
            ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
            ->get()->first();

        // dd($user_profils);
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
            'id_penilaian' => $id_penilaian,
            'jabatans' => $jabatan
        ]);
    }

    public function daftar_permohonan_calon(Request $request)
    {
        $check_jadual = Jadual::where('ID_PENILAIAN', $request->id_sesi)->first();
        $check_bilangan_daftar = MohonPenilaian::where('id_sesi', $request->id_sesi)->count();
        // dd($check_bilangan_daftar);
        if (($check_jadual->KEKOSONGAN != 0) && ($check_bilangan_daftar <= $check_jadual->JUMLAH_KESELURUHAN)) {
            $check_calon = MohonPenilaian::where('id_sesi', $request->id_sesi)->where('no_ic', $request->NO_KAD_PENGENALAN)->first();

            if ($check_calon == null) {
                $user_profils1 = User::find($request->user()->id);
                $user_profils1->name = $request->NAMA_PESERTA;
                $user_profils1->nric = $request->NO_KAD_PENGENALAN;
                $user_profils1->email = $request->EMEL_PESERTA;

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
                $user_profils3->KOD_JABATAN = $request->KOD_JABATAN;
                $user_profils3->GELARAN_KETUA_JABATAN = strtoupper($request->GELARAN_KETUA_JABATAN);
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

                $user_profils1->save();
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
                if ($request->KOD_JANTINA == '01') {
                    $jantina = 'Lelaki';
                } else {
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
                $current_user = Auth::user()->nric;
                $peserta = Permohanan::where('NO_KAD_PENGENALAN', $current_user)->first();
                $maklumat_calon = Tugas::where('ID_PESERTA', $peserta->ID_PESERTA)->first();

                $permohonan_d = MohonPenilaian::where('id_sesi', $permohonan->id_sesi)->get();
                $bilangan_permohonan = count($permohonan_d);

                $kekosongan->BILANGAN_CALON = $bilangan_permohonan;
                $kekosongan->KEKOSONGAN = $kekosongan->JUMLAH_KESELURUHAN - $kekosongan->BILANGAN_CALON;
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
                $recipient_penyelia = [$request->EMEL_PENYELIA];

                if ($masa_mula >= "12:00") {
                    list($jam_m, $min_m) = explode(":", $masa_mula);
                    $jam_m = (int)$jam_m;
                    if ($jam_m > 12) {
                        $jam_m = $jam_m - 12;
                        $mula = $jam_m . ':' . $min_m . ' PM';
                    }
                    $mula = $masa_mula . ' PM';
                } else {
                    $mula = $masa_mula . ' AM';
                }

                if ($masa_tamat >= "12:00") {
                    list($jam, $min) = explode(":", $masa_tamat);
                    $jam = (int)$jam;
                    if ($jam > 12) {
                        $jam = $jam - 12;
                        $tamat = $jam . ':' . $min . ' PM';
                    }
                    $tamat = $masa_tamat . ' PM';
                } else {
                    $tamat = $masa_tamat . ' AM';
                }

                // dd($mula, $tamat);

                $pdf = PDF::loadView('pdf.pendaftaran_calon', [
                    'jkj' => $permohonan->jawatan_ketua_jabatan,
                    'kementerian' => $maklumat_calon->KOD_KEMENTERIAN,
                    'jabatan' => $maklumat_calon->KOD_JABATAN,
                    'bahagian' => $maklumat_calon->BAHAGIAN,
                    'al1' => $permohonan->alamat1_pejabat,
                    'poskod' => $permohonan->poskod_pejabat,
                    'bandar' => $maklumat_calon->BANDAR,
                    'negeri' => $maklumat_calon->KOD_NEGERI,
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
                    'ic_calon' => $permohonan->no_ic,
                    'nama_calon' => $request->NAMA_PESERTA,
                    'tarikh' => $permohonan->tarikh_sesi,
                ];

                Mail::send('emails.daftar_peserta', $data_email, function ($message) use ($recipient, $recipient_penyelia, $pdf) {
                    $message->to($recipient)
                        ->cc($recipient_penyelia)
                        ->subject("ISAC - Permohonan Berjaya")
                        ->attachData($pdf->output(), 'Surat_tawaran.pdf');
                });

                Mail::send('emails.penyelia_pendaftaran', $data_email, function ($message) use ($recipient_penyelia, $pdf) {
                    $message->to($recipient_penyelia)
                        ->subject("ISAC - Permohonan Penilaian ISAC")
                        ->attachData($pdf->output(), 'Surat_tawaran.pdf');
                });

                return $pdf->download('Surat_tawaran_' . $permohonan->no_ic . '.pdf');
            } else {
                echo '<script language="javascript">';
                echo 'alert("Anda telah mendaftar penilaian ini.");';
                echo "window.location.href='/dashboard';";
                echo '</script>';
            }
        } else {
            echo '<script language="javascript">';
            echo 'alert("Jadual telah penuh.");';
            echo "window.location.href='/dashboard';";
            echo '</script>';
        }
    }
}

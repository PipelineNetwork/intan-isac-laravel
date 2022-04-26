<?php

namespace App\Http\Controllers;

use App\Models\Jadual;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JadualKemaskini;
use App\Mail\JadualKemaskiniPenangguhan;
use App\Mail\JadualKemaskiniPembatalan;
use App\Models\KeputusanPenilaian;
use Illuminate\Support\Facades\Validator;
use App\Models\Permohanan;
use App\Models\MohonPenilaian;
use App\Models\Perkhidmatan;
use App\Models\Refgeneral;
use Spatie\Permission\Models\Role;
use App\Models\SelenggaraKawalanSistem;
use App\Models\Tugas;
use PDF;
use PhpParser\Node\Expr\FuncCall;

class JadualController extends Controller
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
    public function index()
    {
        return view('jadual.carian_jadual');
    }

    public function result_search(Request $request)
    {
        if (!empty($request->id_penilaian)) {
            $jaduals = Jadual::where('ID_PENILAIAN', 'like', '%' . $request->id_penilaian . '%')
                ->orderBy('TARIKH_SESI', 'desc')
                ->paginate(15)->appends(request()->query());

            $jadual_list = Jadual::all();
            foreach ($jadual_list as $key => $jadual_upd) {
                $jadual_upd->KEKOSONGAN = $jadual_upd->JUMLAH_KESELURUHAN - $jadual_upd->BILANGAN_CALON;
                $jadual_upd->save();
            }
        } elseif (!empty($request->tarikh_penilaian)) {
            $jaduals = Jadual::where('TARIKH_SESI', 'like', '%' . $request->tarikh_penilaian . '%')
                ->orderBy('TARIKH_SESI', 'desc')
                ->paginate(15)->appends(request()->query());

            $jadual_list = Jadual::all();
            foreach ($jadual_list as $key => $jadual_upd) {
                $jadual_upd->KEKOSONGAN = $jadual_upd->JUMLAH_KESELURUHAN - $jadual_upd->BILANGAN_CALON;
                $jadual_upd->save();
            }
        } elseif (!empty($request->id_penilaian) && !empty($request->tarikh_penilaian)) {
            $jaduals = Jadual::where('ID_PENILAIAN', 'like', '%' . $request->id_penilaian . '%')
                ->where('TARIKH_SESI', 'like', '%' . $request->tarikh_penilaian . '%')
                ->orderBy('TARIKH_SESI', 'desc')
                ->paginate(15)->appends(request()->query());

            $jadual_list = Jadual::all();
            foreach ($jadual_list as $key => $jadual_upd) {
                $jadual_upd->KEKOSONGAN = $jadual_upd->JUMLAH_KESELURUHAN - $jadual_upd->BILANGAN_CALON;
                $jadual_upd->save();
            }
        } else {
            $jaduals = Jadual::orderBy('TARIKH_SESI', 'desc')
                ->paginate(15)->appends(request()->query());

            $jadual_list = Jadual::all();
            foreach ($jadual_list as $key => $jadual_upd) {
                $jadual_upd->KEKOSONGAN = $jadual_upd->JUMLAH_KESELURUHAN - $jadual_upd->BILANGAN_CALON;
                $jadual_upd->save();
            }
        }

        return view('jadual.index', [
            'jaduals' => $jaduals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kementerians = Refgeneral::where('MASTERCODE', '10028')->get();
        $role_penyelaras = Role::where('name', 'penyelaras')->first();
        $role_id_penyelaras = $role_penyelaras->id;
        $role_pentadbir_sistem = Role::where('name', 'pentadbir sistem')->first();
        $role_id_pentadbir_sistem = $role_pentadbir_sistem->id;
        $penyelaras = User::where('user_group_id', $role_id_penyelaras)->get();
        $pentadbir_sistem = User::where('user_group_id', $role_id_pentadbir_sistem)->get();

        $masa_penilaian = SelenggaraKawalanSistem::where('ID_KAWALAN_SISTEM', '1')->first();
        $masa_pengetahuan = $masa_penilaian->TEMPOH_MASA_KESELURUHAN_PENILAIAN;
        return view('jadual.create', [
            'kementerians' => $kementerians,
            'penyelaras' => $penyelaras,
            'pentadbir_sistem' => $pentadbir_sistem,
            'masa_pengetahuan' => $masa_pengetahuan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $jadual = new Jadual;
        $jadual->KOD_SESI_PENILAIAN = $request->KOD_SESI_PENILAIAN;
        $jadual->KOD_TAHAP = $request->KOD_TAHAP;
        $jadual->KOD_MASA_MULA = $request->KOD_MASA_MULA;
        $jadual->KOD_MASA_TAMAT = $request->KOD_MASA_TAMAT;
        $jadual->TARIKH_SESI = $request->TARIKH_SESI;
        $jadual->JUMLAH_KESELURUHAN = $request->JUMLAH_KESELURUHAN;
        $jadual->platform = $request->platform;
        $jadual->KOD_KATEGORI_PESERTA = $request->KOD_KATEGORI_PESERTA;
        $jadual->KOD_KEMENTERIAN = $request->KOD_KEMENTERIAN;
        $jadual->LOKASI = $request->LOKASI;
        $jadual->user_id = $request->user_id;
        $jadual->ID_PENILAIAN = random_int(100000, 999999);
        $jadual->KEKOSONGAN = $request->JUMLAH_KESELURUHAN;
        $jadual->BILANGAN_CALON = 0;

        if ($jadual->KOD_KATEGORI_PESERTA == "02") {
            if ($jadual->platform == "Fizikal") {
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'KOD_KEMENTERIAN' => 'required',
                    'user_id' => 'required',
                    'platform' => 'required',
                    'LOKASI' => 'required',
                ];
            } else {
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'KOD_KEMENTERIAN' => 'required',
                    'user_id' => 'required',
                    'platform' => 'required',
                ];
            }
        } else {
            if ($jadual->platform == "Fizikal") {
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'platform' => 'required',
                    'LOKASI' => 'required',
                ];
            } else {
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'platform' => 'required',
                ];
            }
        }

        $messages = [
            'KOD_SESI_PENILAIAN.required' => 'Sila pilih kod sesi',
            'KOD_TAHAP.required' => 'Sila pilih kod tahap',
            'KOD_MASA_MULA.required' => 'Sila isi masa mula',
            'KOD_MASA_TAMAT.required' => 'Sila isi masa tamat',
            'TARIKH_SESI.required' => 'Sila pilih tarikh sesi',
            'JUMLAH_KESELURUHAN.required' => 'Sila isi jumlah calon',
            'KOD_KATEGORI_PESERTA.required' => 'Sila pilih kategori',
            'platform.required' => 'Sila pilih platform',
            'KOD_KEMENTERIAN.required' => 'Sila pilih jabatan kementerian',
            'LOKASI.required' => 'Sila pilih lokasi',
            'user_id.required' => 'Sila pilih penyelaras'
        ];
        Validator::make($request->input(), $rules, $messages)->validate();

        $jadual->save();

        return redirect('/jaduals');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jadual $jadual)
    {
        $permohonan = MohonPenilaian::where('id_sesi', $jadual->ID_PENILAIAN)->paginate(15);
        return view('jadual.show', [
            'jadual' => $jadual,
            'permohonans' => $permohonan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_SESI)
    {

        $jadual = Jadual::where('ID_SESI', $ID_SESI)->first();
        $penyelaras_id = $jadual->user_id;
        if ($penyelaras_id != null) {
            $penyelaras_sesi = User::where('id', $penyelaras_id)->first();
        } else {
            $penyelaras_sesi = null;
        }
        // dd($penyelaras_id);
        $penyelaras = User::where('user_group_id', '3')->get();

        $masa_penilaian = SelenggaraKawalanSistem::where('ID_KAWALAN_SISTEM', '1')->first();
        $masa_pengetahuan = $masa_penilaian->TEMPOH_MASA_KESELURUHAN_PENILAIAN;
        return view('jadual.edit', [
            'jadual' => $jadual,
            'ID_SESI' => $ID_SESI,
            'penyelaras_sesi' => $penyelaras_sesi,
            'penyelaras' => $penyelaras,
            'masa_pengetahuan' => $masa_pengetahuan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadual $jadual)
    {
        $jadual->KOD_SESI_PENILAIAN = $request->KOD_SESI_PENILAIAN;
        $jadual->KOD_TAHAP = $request->KOD_TAHAP;
        $jadual->KOD_MASA_MULA = $request->KOD_MASA_MULA;
        $jadual->KOD_MASA_TAMAT = $request->KOD_MASA_TAMAT;
        $jadual->TARIKH_SESI = $request->TARIKH_SESI;
        $jadual->JUMLAH_KESELURUHAN = $request->JUMLAH_KESELURUHAN;
        $jadual->platform = $request->platform;
        $jadual->KOD_KATEGORI_PESERTA = $request->KOD_KATEGORI_PESERTA;
        $jadual->KOD_KEMENTERIAN = $request->KOD_KEMENTERIAN;
        $jadual->user_id = $request->user_id;
        $jadual->LOKASI = $request->LOKASI;
        $jadual->status = $request->status;
        $jadual->keterangan = $request->keterangan;

        $permohonan = MohonPenilaian::where('id_sesi', $jadual->ID_PENILAIAN)->get();
        if ($permohonan != null) {
            foreach ($permohonan as $key => $mohon) {
                $mohon->tarikh_sesi = $request->TARIKH_SESI;
                $mohon->save();
            }
        }
        $idpenilaian = $jadual->ID_PENILAIAN;
        $list_calon = MohonPenilaian::where('id_sesi', $idpenilaian)->get();

        $emel_peserta = [];
        foreach ($list_calon as $key => $calon) {
            $peserta = User::where('nric', $calon->no_ic)->first();
            if ($peserta != null) {
                $email = $peserta->email;

                array_push($emel_peserta, $email);
            }
        }

        if ($jadual->KOD_KATEGORI_PESERTA == "02") {
            if ($jadual->platform == "Fizikal") {
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'KOD_KEMENTERIAN' => 'required',
                    'user_id' => 'required',
                    'platform' => 'required',
                    'LOKASI' => 'required',
                    'keterangan' => 'required'
                ];
            } else {
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'KOD_KEMENTERIAN' => 'required',
                    'user_id' => 'required',
                    'platform' => 'required',
                    'keterangan' => 'required'
                ];
            }
        } else {
            if ($jadual->platform == "Fizikal") {
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'platform' => 'required',
                    'LOKASI' => 'required',
                    'keterangan' => 'required'
                ];
            } else {
                $rules = [
                    'KOD_SESI_PENILAIAN' => 'required',
                    'KOD_TAHAP' => 'required',
                    'KOD_MASA_MULA' => 'required',
                    'KOD_MASA_TAMAT' => 'required',
                    'TARIKH_SESI' => 'required',
                    'JUMLAH_KESELURUHAN' => 'required',
                    'KOD_KATEGORI_PESERTA' => 'required',
                    'platform' => 'required',
                    'keterangan' => 'required'
                ];
            }
        }

        $messages = [
            'KOD_SESI_PENILAIAN.required' => 'Sila pilih kod sesi',
            'KOD_TAHAP.required' => 'Sila pilih kod tahap',
            'KOD_MASA_MULA.required' => 'Sila isi masa mula',
            'KOD_MASA_TAMAT.required' => 'Sila isi masa tamat',
            'TARIKH_SESI.required' => 'Sila pilih tarikh sesi',
            'JUMLAH_KESELURUHAN.required' => 'Sila isi jumlah calon',
            'KOD_KATEGORI_PESERTA.required' => 'Sila pilih kumpulan',
            'platform.required' => 'Sila pilih plaform',
            'KOD_KEMENTERIAN.required' => 'Sila pilih jabatan kementerian',
            'LOKASI.required' => 'Sila pilih lokasi',
            'user_id.required' => 'Sila pilih penyelaras',
            'keterangan.required' => 'Sila beri keterangan'
        ];
        Validator::make($request->input(), $rules, $messages)->validate();
        $jadual->save();

        $recipient = $emel_peserta;
        Mail::to($recipient)->send(new JadualKemaskini($jadual));
        return redirect('/jaduals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jadual)
    {
        $jadual = Jadual::find($jadual);
        $permohonan = MohonPenilaian::where('id_sesi', $jadual->ID_PENILAIAN)->get();
        foreach ($permohonan as $permohonan) {
            $permohonan->delete();
        }
        $keputusan = KeputusanPenilaian::where('id_penilaian', $jadual->ID_PENILAIAN)->get();
        foreach ($keputusan as $k) {
            $k->delete();
        }
        $jadual->delete();
        return redirect('/jaduals');
    }

    // kemaskini status
    public function kemaskini_status(Request $request, $jadual)
    {
        // dd($jadual);
        $jadual = Jadual::where("ID_SESI", $jadual)->first();
        // dd($jadual);
        $jadual->status = $request->status;
        $jadual->keterangan = $request->keterangan;

        $tukar_status_penilaian = MohonPenilaian::where('id_sesi', $jadual->ID_PENILAIAN)->get();

        foreach ($tukar_status_penilaian as $tukar_status_penilaian_batal) {
            $tukar_status_penilaian_batal->status_penilaian = 'Pembatalan';
            $tukar_status_penilaian_batal->save();
        }
        $jadual->save();

        $idpenilaian = $jadual->ID_PENILAIAN;
        // $list_calon = MohonPenilaian::where('id_sesi', $idpenilaian)->get();
        $list_calon = MohonPenilaian::where('id_sesi', $idpenilaian)->join('users', 'mohon_penilaians.no_ic', 'users.nric')->get();
        // dd($list_calon);
        $recipient = [];
        foreach ($list_calon as $calon) {
            $id_peserta = $calon->email;

            array_push($recipient, $id_peserta);
        }

        if ($request->status == 'Penangguhan') {
            Mail::to($recipient)->send(new JadualKemaskiniPenangguhan($jadual));
        } else if ($request->status == 'Pembatalan') {
            Mail::to($recipient)->send(new JadualKemaskiniPembatalan($jadual));
        }

        return redirect('/jaduals');
    }

    public function tambah_calon($id_sesi)
    {
        return view('jadual.cari_user', [
            'id_sesis' => $id_sesi
        ]);
    }

    public function profil_calon(Request $request, $id_sesi)
    {
        $ic = $request->ic;
        $user_ic = User::where('nric', $ic)->first();
        $id_penilaian = Jadual::find($id_sesi);

        if ($user_ic == null) {
            echo '<script language="javascript">';
            echo 'alert("No. Kad Pengenalan yang dimasukkan tidak wujud.");';
            echo "window.location.href='/jaduals';";
            echo '</script>';
        } else {
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

            $gelaran_user = Refgeneral::where('MASTERCODE', 10009)
                ->join('pro_peserta', 'refgeneral.REFERENCECODE', 'pro_peserta.KOD_GELARAN')
                ->select('refgeneral.MASTERCODE', 'refgeneral.REFERENCECODE', 'refgeneral.DESCRIPTION1', 'pro_peserta.KOD_GELARAN')
                ->where('pro_peserta.NO_KAD_PENGENALAN', $ic)
                ->get()->first();

            $user = User::where('nric', '=', $ic)
                ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
                ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->get()->first();
            return view('jadual.papar_user', [
                'users' => $user,
                'id_sesis' => $id_sesi,
                'kod_gelarans' => $kod_gelaran,
                'gelaran_user' => $gelaran_user,
                'peringkats' => $peringkat,
                'klasifikasi_perkhidmatans' => $klasifikasi_perkhidmatan,
                'gred_jawatans' => $gred_jawatan,
                'taraf_perjawatans' => $taraf_perjawatan,
                'jenis_perkhidmatans' => $jenis_perkhidmatan,
                'kementerians' => $kementerian,
                'negeris' => $negeri,
                'id_penilaian' => $id_penilaian->ID_PENILAIAN,
                'jabatans' => $jabatan
            ]);
        }
    }

    public function daftar_calon_baru(Request $request)
    {
        $check_jadual = Jadual::where('ID_PENILAIAN', $request->id_sesi)->first();
        $check_bilangan_daftar = MohonPenilaian::where('id_sesi', $request->id_sesi)->count();
        // dd($check_bilangan_daftar);
        if (($check_jadual->KEKOSONGAN != 0) && ($check_bilangan_daftar < $check_jadual->JUMLAH_KESELURUHAN)) {
            $check_calon = MohonPenilaian::where('id_sesi', $request->id_sesi)->where('no_ic', $request->NO_KAD_PENGENALAN)->first();

            if ($check_calon == null) {
                $user_profils1 = User::where('nric', $request->NO_KAD_PENGENALAN)->first();
                $user_profils1->name = strtoupper($request->NAMA_PESERTA);
                $user_profils1->nric = $request->NO_KAD_PENGENALAN;
                $user_profils1->email = $request->EMEL_PESERTA;
                $user_profils1->save();

                $user_profils2 = Permohanan::where('NO_KAD_PENGENALAN', $request->NO_KAD_PENGENALAN)->first();
                $user_profils2->NAMA_PESERTA = strtoupper($request->NAMA_PESERTA);
                $user_profils2->NO_KAD_PENGENALAN = $request->NO_KAD_PENGENALAN;
                $user_profils2->EMEL_PESERTA = $request->EMEL_PESERTA;
                $user_profils2->NO_TELEFON_BIMBIT = $request->NO_TELEFON_BIMBIT;
                $user_profils2->NO_TELEFON_PEJABAT = $request->NO_TELEFON_PEJABAT;
                $user_profils2->KOD_JANTINA = $request->KOD_JANTINA;
                $user_profils2->TARIKH_LAHIR = $request->TARIKH_LAHIR;
                $user_profils2->KOD_GELARAN = $request->KOD_GELARAN;
                $user_profils2->save();

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
                $user_profils3->save();

                $user_profils4 = Perkhidmatan::where('ID_PESERTA', $user_profils2->ID_PESERTA)->first();
                $user_profils4->KOD_KLASIFIKASI_PERKHIDMATAN = $request->KOD_KLASIFIKASI_PERKHIDMATAN;
                $user_profils4->TARIKH_LANTIKAN = $request->TARIKH_LANTIKAN;
                $user_profils4->KOD_GELARAN_JAWATAN = $request->KOD_GELARAN_JAWATAN;
                $user_profils4->KOD_TARAF_PERJAWATAN = $request->KOD_TARAF_PERJAWATAN;
                $user_profils4->KOD_PERINGKAT = $request->KOD_PERINGKAT;
                $user_profils4->KOD_JENIS_PERKHIDMATAN = $request->KOD_JENIS_PERKHIDMATAN;
                $user_profils4->KOD_GRED_JAWATAN = $request->KOD_GRED_JAWATAN;
                $user_profils4->save();

                // daftar permohonan
                $sesi_id = Jadual::where('ID_PENILAIAN', $request->id_sesi)->first();

                $permohonan = new MohonPenilaian;

                $permohonan->id_sesi = $request->id_sesi;
                $permohonan->id_calon = $request->id_peserta;
                $permohonan->tarikh_sesi = $sesi_id->TARIKH_SESI;
                $permohonan->no_ic = $request->NO_KAD_PENGENALAN;
                $permohonan->nama = strtoupper($request->NAMA_PESERTA);
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

                $emel_pendaftar = $request->EMEL_PESERTA;
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
                echo 'alert("Calon ini telah mendaftar penilaian ini.");';
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

    public function ubah_bilangan_tempat(Request $request, $jadual) {
        $jadual = Jadual::where("ID_SESI", $jadual)->first();

        $jadual->JUMLAH_KESELURUHAN = $request->jumlah_calon;
        $jadual->save();

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MohonPenilaian;
use App\Models\Jadual;
use App\Models\Refgeneral;
use App\Models\TambahAduan;
use App\Models\TambahRayuan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function laporan_penilaian_isac_mengikut_kementerian(Request $request)
    {

        //request tahun
        // $tahun = Carbon::parse($request->tahun)->format('Y');
        $tahun = $request->tahun;

        //tahun semasa
        $tahun_semasa = date('Y');

        //request kementerian
        $kementerian = Refgeneral::where('MASTERCODE', 10028)->get();
        $check_kementerian = $request->input_kementerian;

        //request jabatan
        // $jabatan = Refgeneral::where('MASTERCODE', 10029)->get();
        // $check_jabatan = $request->input_jabatan;

        //count bil memohon
        //januari
        if ($tahun != null) {
            if ($check_kementerian != null) {
                $bil_mohon_jan = MohonPenilaian::whereYear('created_at', $tahun)
                        ->where('KOD_KEMENTERIAN', $check_kementerian)
                        ->count();
            } else {
                $bil_mohon_jan = MohonPenilaian::whereYear('created_at', $tahun)
                    ->count();
            }
        } else {
            $bil_mohon_jan = MohonPenilaian::count();
        }

        // dd($bil_mohon_jan);

        //count bil menduduki
        //januari
        if ($tahun != null) {
            if ($check_kementerian != null) {
                $bil_duduk_jan = MohonPenilaian::whereDate('YEAR(created_at)', $tahun)
                    ->where('KOD_KEMENTERIAN', $check_kementerian)
                    ->count();
            } else {
                $bil_duduk_jan = MohonPenilaian::whereDate('YEAR(created_at)', $tahun)
                    ->count();
            }
        } else {
            $bil_duduk_jan = MohonPenilaian::all();
        }

        //count bil lulus


        //count bil gagal

        return view('laporan.penilaian_isac_mengikut_kementerian_jabatan', [
            'tahuns' => $tahun,
            'tahun_semasas' => $tahun_semasa,
            'kementerians' => $kementerian,
            // 'jabatans' => $jabatan,
            'bil_mohon_jans' => $bil_mohon_jan,
            // 'bil_duduk_jan' => $bil_duduk_jan
        ]);
    }

    public function senarai_keputusan_penilaian(Request $request)
    {
        //request tahun
        $tahun = $request->tahun;

        //tahun semasa
        $tahun_semasa = date('Y');

        //keputusan
        $keputusan = $request->input_keputusan;

        //request kementerian
        $kementerian = Refgeneral::where('MASTERCODE', 10028)->get();

        //request jabatan
        $jabatan = Refgeneral::where('MASTERCODE', 10029)->get();
        // $check_kementerian = $request->input_jabatan;

        return view('laporan.senarai_keputusan_penilaian', [
            'tahuns' => $tahun,
            'tahun_semasas' => $tahun_semasa,
            'keputusans' => $keputusan,
            'kementerians' => $kementerian,
            'jabatans' => $jabatan
        ]);
    }

    public function statistik_penilaian_gred_jawatan(Request $request)
    {
        //request tahun
        $tahun = $request->tahun;

        //tahun semasa
        $tahun_semasa = date('Y');

        //request klasifikasi perkhidmatan
        $klasifikasi_perkhidmatan = Refgeneral::where('MASTERCODE', 10024)->get();
        $perkhidmatan = $request->input_perkidmatan;

        //request gred jawatan
        $gred_jawatan = Refgeneral::where('MASTERCODE', 10025)->get();
        $jawatan = $request->input_jawatan;

        return view('laporan.statistik_penilaian_mengikut_gred_jawatan', [
            'tahuns' => $tahun,
            'tahun_semasas' => $tahun_semasa,
            'klasifikasi_perkhidmatans' => $klasifikasi_perkhidmatan,
            'gred_jawatans' => $gred_jawatan,
            'perkhidmatans' => $perkhidmatan,
            'jawatans' => $jawatan,
        ]);
    }

    public function statistik_keseluruhan(Request $request)
    {
        //request kementerian
        $kementerian = Refgeneral::where('MASTERCODE', 10028)->get();
        $ministry = $request->input_kementerian;

        return view('laporan.statistik_keseluruhan', [
            'kementerians' => $kementerian,
        ]);
    }

    public function statistik_keseluruhan_pencapaian_penilaian_isac_ikut_bulan(Request $request)
    {
        //request tahun
        $tahun = $request->tahun;

        //tahun semasa
        $tahun_semasa = date('Y');

        return view('laporan.statistik_keseluruhan_pencapaian_penilaian_isac_mengikut_bulan', [
            'tahuns' => $tahun,
            'tahun_semasas' => $tahun_semasa,
        ]);
    }

    public function statistik_isac_kategori_calon(Request $request)
    {
        //request tahun
        $tahun = $request->tahun;

        //tahun semasa
        $tahun_semasa = date('Y');

        $kategori = $request->input_kategori_peserta;

        return view('laporan.statistik_isac_mengikut_kategori_calon', [
            'tahuns' => $tahun,
            'tahun_semasas' => $tahun_semasa,
            'kategoris' => $kategori,
        ]);
    }

    public function keseluruhan_penilaian_isac_iac(Request $request)
    {
        //request tahun
        $tahun = $request->tahun;

        //tahun semasa
        $tahun_semasa = date('Y');

        return view('laporan.keseluruhan_penilaian_isac_mengikut_iac', [
            'tahuns' => $tahun,
            'tahun_semasas' => $tahun_semasa
        ]);
    }

    public function laporan_aduan(Request $request)
    {
        //request tahun
        // $tahun = Carbon::parse($request->tahun)->format('Y');
        $tahun = $request->tahun;

        //tahun semasa
        $tahun_semasa = date('Y');

        //aduan ikut bulan
        if ($request->tahun != null) {
            $aduan_jan = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '1')
                ->count();
        } else {
            $aduan_jan = TambahAduan::whereMonth('created_at', '=', '1')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_feb = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '2')
                ->count();
        } else {
            $aduan_feb = TambahAduan::whereMonth('created_at', '=', '2')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_mac = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '3')
                ->count();
        } else {
            $aduan_mac = TambahAduan::whereMonth('created_at', '=', '3')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_april = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '4')
                ->count();
        } else {
            $aduan_april = TambahAduan::whereMonth('created_at', '=', '4')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_mei = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '5')
                ->count();
        } else {
            $aduan_mei = TambahAduan::whereMonth('created_at', '=', '5')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_jun = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '6')
                ->count();
        } else {
            $aduan_jun = TambahAduan::whereMonth('created_at', '=', '6')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_julai = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '7')
                ->count();
        } else {
            $aduan_julai = TambahAduan::whereMonth('created_at', '=', '7')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_ogos = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '8')
                ->count();
        } else {
            $aduan_ogos = TambahAduan::whereMonth('created_at', '=', '8')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_sep = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '9')
                ->count();
        } else {
            $aduan_sep = TambahAduan::whereMonth('created_at', '=', '9')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_okt = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '10')
                ->count();
        } else {
            $aduan_okt = TambahAduan::whereMonth('created_at', '=', '10')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_nov = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '11')
                ->count();
        } else {
            $aduan_nov = TambahAduan::whereMonth('created_at', '=', '11')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_dis = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '12')
                ->count();
        } else {
            $aduan_dis = TambahAduan::whereMonth('created_at', '=', '12')
                ->count();
        }


        //aduan dibalas ikut bulan
        if ($request->tahun != null) {
            $aduan_dibalas_jan = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '1')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $aduan_dibalas_jan = TambahAduan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '1')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_dibalas_feb = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '2')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $aduan_dibalas_feb = TambahAduan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '2')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_dibalas_mac = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '3')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $aduan_dibalas_mac = TambahAduan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '3')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_dibalas_april = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '4')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $aduan_dibalas_april = TambahAduan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '4')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_dibalas_mei = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '5')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $aduan_dibalas_mei = TambahAduan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '5')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_dibalas_jun = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '6')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $aduan_dibalas_jun = TambahAduan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '6')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_dibalas_julai = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '7')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $aduan_dibalas_julai = TambahAduan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '7')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_dibalas_ogos = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '8')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $aduan_dibalas_ogos = TambahAduan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '8')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_dibalas_sep = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '9')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $aduan_dibalas_sep = TambahAduan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '9')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_dibalas_okt = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '10')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $aduan_dibalas_okt = TambahAduan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '10')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_dibalas_nov = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '11')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $aduan_dibalas_nov = TambahAduan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '11')
                ->count();
        }

        if ($request->tahun != null) {
            $aduan_dibalas_dis = TambahAduan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '12')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $aduan_dibalas_dis = TambahAduan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '12')
                ->count();
        }


        //jumlah aduan ikut bulan
        if ($request->tahun != null) {
            $jumlah_aduan = TambahAduan::whereYear('created_at', '=', $tahun)
                ->count();
        } else {
            $jumlah_aduan = TambahAduan::count();
        }

        //jumlah aduan dibalas ikut bulan
        if ($request->tahun != null) {
            $jumlah_aduan_dibalas = TambahAduan::whereYear('created_at', '=', $tahun)
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $jumlah_aduan_dibalas = TambahAduan::where('status', '=', 'dibalas')
                ->count();
        }

        return view('laporan.laporan_aduan', [
            'tahuns' => $tahun,
            'tahun_semasas' => $tahun_semasa,
            'aduan_jan' => $aduan_jan,
            'aduan_feb' => $aduan_feb,
            'aduan_mac' => $aduan_mac,
            'aduan_april' => $aduan_april,
            'aduan_mei' => $aduan_mei,
            'aduan_jun' => $aduan_jun,
            'aduan_julai' => $aduan_julai,
            'aduan_ogos' => $aduan_ogos,
            'aduan_sep' => $aduan_sep,
            'aduan_okt' => $aduan_okt,
            'aduan_nov' => $aduan_nov,
            'aduan_dis' => $aduan_dis,
            'aduan_dibalas_jan' => $aduan_dibalas_jan,
            'aduan_dibalas_feb' => $aduan_dibalas_feb,
            'aduan_dibalas_mac' => $aduan_dibalas_mac,
            'aduan_dibalas_april' => $aduan_dibalas_april,
            'aduan_dibalas_mei' => $aduan_dibalas_mei,
            'aduan_dibalas_jun' => $aduan_dibalas_jun,
            'aduan_dibalas_julai' => $aduan_dibalas_julai,
            'aduan_dibalas_ogos' => $aduan_dibalas_ogos,
            'aduan_dibalas_sep' => $aduan_dibalas_sep,
            'aduan_dibalas_okt' => $aduan_dibalas_okt,
            'aduan_dibalas_nov' => $aduan_dibalas_nov,
            'aduan_dibalas_dis' => $aduan_dibalas_dis,
            'jumlah_aduan' => $jumlah_aduan,
            'jumlah_aduan_dibalas' => $jumlah_aduan_dibalas
        ]);
    }

    public function laporan_rayuan(Request $request)
    {

        //request tahun
        $tahun = $request->tahun;

        //tahun semasa
        $tahun_semasa = date('Y');

        //aduan ikut bulan
        if ($request->tahun != null) {
            $rayuan_jan = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '1')
                ->count();
        } else {
            $rayuan_jan = TambahRayuan::whereMonth('created_at', '=', '1')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_feb = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '2')
                ->count();
        } else {
            $rayuan_feb = TambahRayuan::whereMonth('created_at', '=', '2')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_mac = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '3')
                ->count();
        } else {
            $rayuan_mac = TambahRayuan::whereMonth('created_at', '=', '3')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_april = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '4')
                ->count();
        } else {
            $rayuan_april = TambahRayuan::whereMonth('created_at', '=', '4')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_mei = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '5')
                ->count();
        } else {
            $rayuan_mei = TambahRayuan::whereMonth('created_at', '=', '5')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_jun = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '6')
                ->count();
        } else {
            $rayuan_jun = TambahRayuan::whereMonth('created_at', '=', '6')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_julai = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '7')
                ->count();
        } else {
            $rayuan_julai = TambahRayuan::whereMonth('created_at', '=', '7')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_ogos = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '8')
                ->count();
        } else {
            $rayuan_ogos = TambahRayuan::whereMonth('created_at', '=', '8')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_sep = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '9')
                ->count();
        } else {
            $rayuan_sep = TambahRayuan::whereMonth('created_at', '=', '9')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_okt = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '10')
                ->count();
        } else {
            $rayuan_okt = TambahRayuan::whereMonth('created_at', '=', '10')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_nov = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '11')
                ->count();
        } else {
            $rayuan_nov = TambahRayuan::whereMonth('created_at', '=', '11')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_dis = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '12')
                ->count();
        } else {
            $rayuan_dis = TambahRayuan::whereMonth('created_at', '=', '12')
                ->count();
        }


        //rayuan dibalas ikut bulan
        if ($request->tahun != null) {
            $rayuan_dibalas_jan = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '1')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $rayuan_dibalas_jan = TambahRayuan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '1')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_dibalas_feb = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '2')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $rayuan_dibalas_feb = TambahRayuan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '2')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_dibalas_mac = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '3')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $rayuan_dibalas_mac = TambahRayuan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '3')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_dibalas_april = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '4')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $rayuan_dibalas_april = TambahRayuan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '4')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_dibalas_mei = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '5')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $rayuan_dibalas_mei = TambahRayuan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '5')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_dibalas_jun = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '6')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $rayuan_dibalas_jun = TambahRayuan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '6')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_dibalas_julai = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '7')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $rayuan_dibalas_julai = TambahRayuan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '7')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_dibalas_ogos = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '8')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $rayuan_dibalas_ogos = TambahRayuan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '8')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_dibalas_sep = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '9')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $rayuan_dibalas_sep = TambahRayuan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '9')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_dibalas_okt = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '10')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $rayuan_dibalas_okt = TambahRayuan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '10')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_dibalas_nov = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '11')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $rayuan_dibalas_nov = TambahRayuan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '11')
                ->count();
        }

        if ($request->tahun != null) {
            $rayuan_dibalas_dis = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', '12')
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $rayuan_dibalas_dis = TambahRayuan::where('status', '=', 'dibalas')
                ->whereMonth('created_at', '=', '12')
                ->count();
        }


        //jumlah rayuan ikut bulan
        if ($request->tahun != null) {
            $jumlah_rayuan = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->count();
        } else {
            $jumlah_rayuan = TambahRayuan::count();
        }

        //jumlah rayuan dibalas ikut bulan
        if ($request->tahun != null) {
            $jumlah_rayuan_dibalas = TambahRayuan::whereYear('created_at', '=', $tahun)
                ->where('status', '=', 'dibalas')
                ->count();
        } else {
            $jumlah_rayuan_dibalas = TambahRayuan::where('status', '=', 'dibalas')
                ->count();
        }

        return view('laporan.laporan_rayuan', [
            'tahuns' => $tahun,
            'tahun_semasas' => $tahun_semasa,
            'rayuan_jan' => $rayuan_jan,
            'rayuan_feb' => $rayuan_feb,
            'rayuan_mac' => $rayuan_mac,
            'rayuan_april' => $rayuan_april,
            'rayuan_mei' => $rayuan_mei,
            'rayuan_jun' => $rayuan_jun,
            'rayuan_julai' => $rayuan_julai,
            'rayuan_ogos' => $rayuan_ogos,
            'rayuan_sep' => $rayuan_sep,
            'rayuan_okt' => $rayuan_okt,
            'rayuan_nov' => $rayuan_nov,
            'rayuan_dis' => $rayuan_dis,
            'rayuan_dibalas_jan' => $rayuan_dibalas_jan,
            'rayuan_dibalas_feb' => $rayuan_dibalas_feb,
            'rayuan_dibalas_mac' => $rayuan_dibalas_mac,
            'rayuan_dibalas_april' => $rayuan_dibalas_april,
            'rayuan_dibalas_mei' => $rayuan_dibalas_mei,
            'rayuan_dibalas_jun' => $rayuan_dibalas_jun,
            'rayuan_dibalas_julai' => $rayuan_dibalas_julai,
            'rayuan_dibalas_ogos' => $rayuan_dibalas_ogos,
            'rayuan_dibalas_sep' => $rayuan_dibalas_sep,
            'rayuan_dibalas_okt' => $rayuan_dibalas_okt,
            'rayuan_dibalas_nov' => $rayuan_dibalas_nov,
            'rayuan_dibalas_dis' => $rayuan_dibalas_dis,
            'jumlah_rayuan' => $jumlah_rayuan,
            'jumlah_rayuan_dibalas' => $jumlah_rayuan_dibalas
        ]);
    }
}

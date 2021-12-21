<?php

namespace App\Http\Controllers;

use App\Models\Permohanan;
use App\Models\Tugas;
use App\Models\MohonPenilaian;
use App\Models\KeputusanPenilaian;
use App\Models\Jadual;
use App\Models\Refgeneral;
use App\Models\TambahAduan;
use App\Models\TambahRayuan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $jabatan = Refgeneral::where('MASTERCODE', 10029)->get();
        $check_jabatan = $request->input_jabatan;

        //count bil memohon
        //januari
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //februari
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //mac
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //april
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //mei
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //jun
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //julai
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //ogos
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //september
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //oktober
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //november
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //disember
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //jumlah memohon
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_mohon_jumlah = MohonPenilaian::whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_mohon_jumlah = MohonPenilaian::whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_mohon_jumlah = MohonPenilaian::whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_mohon_jumlah = MohonPenilaian::join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_jumlah = MohonPenilaian::whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_mohon_jumlah = MohonPenilaian::join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_mohon_jumlah = MohonPenilaian::join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_mohon_jumlah = MohonPenilaian::join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //count bil menduduki
        //januari
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //februari
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //mac
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //april
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //mei
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //jun
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //julai
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //ogos
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //september
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //oktober
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //november
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //disember
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //jumlah menduduki
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->count();
        } else {
            $bil_duduk_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->count();
        }

        //count bil lulus
        //januari
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //februari
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //mac
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //april
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //mei
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //jun
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //julai
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //ogos
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //september
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //oktober
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //november
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //disember
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //jumlah lulus
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //count bil gagal
        //januari
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //februari
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //mac
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //april
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //mei
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //jun
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //julai
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //ogos
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //september
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //oktober
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //november
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //disember
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //jumlah gagal
        if ($tahun && $check_kementerian && $check_jabatan != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_kementerian != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jabatan != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_kementerian != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jabatan != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        return view('laporan.penilaian_isac_mengikut_kementerian_jabatan', [
            'tahuns' => $tahun,
            'tahun_semasas' => $tahun_semasa,
            'kementerians' => $kementerian,
            'check_kementerians' => $check_kementerian,
            'jabatans' => $jabatan,
            'check_jabatans' => $check_jabatan,
            'bil_mohon_jans' => $bil_mohon_jan,
            'bil_mohon_febs' => $bil_mohon_feb,
            'bil_mohon_macs' => $bil_mohon_mac,
            'bil_mohon_aprs' => $bil_mohon_apr,
            'bil_mohon_meis' => $bil_mohon_mei,
            'bil_mohon_juns' => $bil_mohon_jun,
            'bil_mohon_julais' => $bil_mohon_julai,
            'bil_mohon_ogoss' => $bil_mohon_ogos,
            'bil_mohon_seps' => $bil_mohon_sep,
            'bil_mohon_okts' => $bil_mohon_okt,
            'bil_mohon_novs' => $bil_mohon_nov,
            'bil_mohon_diss' => $bil_mohon_dis,
            'bil_mohon_jumlahs' => $bil_mohon_jumlah,
            'bil_duduk_jans' => $bil_duduk_jan,
            'bil_duduk_febs' => $bil_duduk_feb,
            'bil_duduk_macs' => $bil_duduk_mac,
            'bil_duduk_aprs' => $bil_duduk_apr,
            'bil_duduk_meis' => $bil_duduk_mei,
            'bil_duduk_juns' => $bil_duduk_jun,
            'bil_duduk_julais' => $bil_duduk_julai,
            'bil_duduk_ogoss' => $bil_duduk_ogos,
            'bil_duduk_seps' => $bil_duduk_sep,
            'bil_duduk_okts' => $bil_duduk_okt,
            'bil_duduk_novs' => $bil_duduk_nov,
            'bil_duduk_diss' => $bil_duduk_dis,
            'bil_duduk_jumlahs' => $bil_duduk_jumlah,
            'bil_lulus_jans' => $bil_lulus_jan,
            'bil_lulus_febs' => $bil_lulus_feb,
            'bil_lulus_macs' => $bil_lulus_mac,
            'bil_lulus_aprs' => $bil_lulus_apr,
            'bil_lulus_meis' => $bil_lulus_mei,
            'bil_lulus_juns' => $bil_lulus_jun,
            'bil_lulus_julais' => $bil_lulus_julai,
            'bil_lulus_ogoss' => $bil_lulus_ogos,
            'bil_lulus_seps' => $bil_lulus_sep,
            'bil_lulus_okts' => $bil_lulus_okt,
            'bil_lulus_novs' => $bil_lulus_nov,
            'bil_lulus_diss' => $bil_lulus_dis,
            'bil_lulus_jumlahs' => $bil_lulus_jumlah,
            'bil_gagal_jans' => $bil_gagal_jan,
            'bil_gagal_febs' => $bil_gagal_feb,
            'bil_gagal_macs' => $bil_gagal_mac,
            'bil_gagal_aprs' => $bil_gagal_apr,
            'bil_gagal_meis' => $bil_gagal_mei,
            'bil_gagal_juns' => $bil_gagal_jun,
            'bil_gagal_julais' => $bil_gagal_julai,
            'bil_gagal_ogoss' => $bil_gagal_ogos,
            'bil_gagal_seps' => $bil_gagal_sep,
            'bil_gagal_okts' => $bil_gagal_okt,
            'bil_gagal_novs' => $bil_gagal_nov,
            'bil_gagal_diss' => $bil_gagal_dis,
            'bil_gagal_jumlahs' => $bil_gagal_jumlah,
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
        $check_kementerian = $request->input_kementerian;

        //request jabatan
        $jabatan = Refgeneral::where('MASTERCODE', 10029)->get();
        $check_jabatan = $request->input_jabatan;

        if ($tahun && $keputusan && $check_kementerian && $check_jabatan != null) {
            $senarai_keputusan = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', $keputusan]])
                ->get();
        } elseif ($tahun && $keputusan && $check_kementerian != null) {
            $senarai_keputusan = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', $keputusan]])
                ->get();
        } elseif ($tahun && $keputusan && $check_jabatan != null) {
            $senarai_keputusan = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', $keputusan]])
                ->get();
        } elseif ($tahun && $check_kementerian && $check_jabatan != null) {
            $senarai_keputusan = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->get();
        } elseif ($keputusan && $check_kementerian && $check_jabatan != null) {
            $senarai_keputusan = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan], ['keputusan', $keputusan]])
                ->get();
        } elseif ($tahun && $keputusan != null) {
            $senarai_keputusan = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', $keputusan)
                ->get();
        } elseif ($tahun && $check_kementerian != null) {
            $senarai_keputusan = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->get();
        } elseif ($tahun && $check_jabatan != null) {
            $senarai_keputusan = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->get();
        } elseif ($keputusan && $check_kementerian != null) {
            $senarai_keputusan = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['keputusan', $keputusan]])
                ->get();
        } elseif ($keputusan && $check_jabatan != null) {
            $senarai_keputusan = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_JABATAN', $check_jabatan], ['keputusan', $keputusan]])
                ->get();
        } elseif ($check_kementerian && $check_jabatan != null) {
            $senarai_keputusan = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where([['KOD_KEMENTERIAN', $check_kementerian], ['KOD_JABATAN', $check_jabatan]])
                ->get();
        } elseif ($tahun != null) {
            $senarai_keputusan = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->get();
        } elseif ($keputusan != null) {
            $senarai_keputusan = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('keputusan', $keputusan)
                ->get();
        } elseif ($check_kementerian != null) {
            $senarai_keputusan = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_KEMENTERIAN', $check_kementerian)
                ->get();
        } elseif ($check_jabatan != null) {
            $senarai_keputusan = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                ->where('KOD_JABATAN', $check_jabatan)
                ->get();
        } else {
            $senarai_keputusan = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
                // ->distinct()
                ->get();
        }
        // dd($senarai_keputusan);

        return view('laporan.senarai_keputusan_penilaian', [
            'tahuns' => $tahun,
            'tahun_semasas' => $tahun_semasa,
            'keputusans' => $keputusan,
            'kementerians' => $kementerian,
            'check_kementerians' => $check_kementerian,
            'jabatans' => $jabatan,
            'check_jabatans' => $check_jabatan,
            'senarai_keputusans' => $senarai_keputusan
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
        $check_perkhidmatan = $request->input_perkidmatan;

        //request gred jawatan
        $gred_jawatan = Refgeneral::where('MASTERCODE', 10025)->get();
        $check_jawatan = $request->input_jawatan;

        //count bil memohon
        //januari
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //februari
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //mac
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //april
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //mei
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //jun
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //julai
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //ogos
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //september
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //oktober
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //november
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //disember
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //bil jumlah memohon
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_jumlah = MohonPenilaian::whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_mohon_jumlah = MohonPenilaian::whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_mohon_jumlah = MohonPenilaian::whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_mohon_jumlah = MohonPenilaian::join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_mohon_jumlah = MohonPenilaian::whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_mohon_jumlah = MohonPenilaian::join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_mohon_jumlah = MohonPenilaian::join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_mohon_jumlah = MohonPenilaian::join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //bil menduduki
        //januari
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //februari
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //mac
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //april
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //mei
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //jun
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //julai
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //ogos
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //september
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //oktober
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //november
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //disember
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //jumlah menduduki
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan]])
                ->count();
        } elseif ($tahun != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan)
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('KOD_GRED_JAWATAN', $check_jawatan)
                ->count();
        } else {
            $bil_duduk_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }


        //bil lulus
        //januari
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //februari
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //mac
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //april
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //mei
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //jun
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //julai
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //ogos
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //september
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //oktober
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //november
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //disember
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //jumlah lulus
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($tahun != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Lulus']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Lulus']])
                ->count();
        } else {
            $bil_lulus_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }


        //bil gagal
        //januari
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //februari
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //mac
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //april
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //mei
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //jun
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //julai
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //ogos
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //september
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //oktober
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //november
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //disember
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //jumlah gagal
        if ($tahun && $check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_perkhidmatan != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun && $check_jawatan != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_perkhidmatan && $check_jawatan != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($tahun != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } elseif ($check_perkhidmatan != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_KLASIFIKASI_PERKHIDMATAN', $check_perkhidmatan], ['keputusan', 'Gagal']])
                ->count();
        } elseif ($check_jawatan != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where([['KOD_GRED_JAWATAN', $check_jawatan], ['keputusan', 'Gagal']])
                ->count();
        } else {
            $bil_gagal_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        return view('laporan.statistik_penilaian_mengikut_gred_jawatan', [
            'tahuns' => $tahun,
            'tahun_semasas' => $tahun_semasa,
            'klasifikasi_perkhidmatans' => $klasifikasi_perkhidmatan,
            'gred_jawatans' => $gred_jawatan,
            'perkhidmatans' => $check_perkhidmatan,
            'jawatans' => $check_jawatan,
            'bil_mohon_jans' => $bil_mohon_jan,
            'bil_mohon_febs' => $bil_mohon_feb,
            'bil_mohon_macs' => $bil_mohon_mac,
            'bil_mohon_aprs' => $bil_mohon_apr,
            'bil_mohon_meis' => $bil_mohon_mei,
            'bil_mohon_juns' => $bil_mohon_jun,
            'bil_mohon_julais' => $bil_mohon_julai,
            'bil_mohon_ogoss' => $bil_mohon_ogos,
            'bil_mohon_seps' => $bil_mohon_sep,
            'bil_mohon_okts' => $bil_mohon_okt,
            'bil_mohon_novs' => $bil_mohon_nov,
            'bil_mohon_diss' => $bil_mohon_dis,
            'bil_mohon_jumlahs' => $bil_mohon_jumlah,
            'bil_duduk_jans' => $bil_duduk_jan,
            'bil_duduk_febs' => $bil_duduk_feb,
            'bil_duduk_macs' => $bil_duduk_mac,
            'bil_duduk_aprs' => $bil_duduk_apr,
            'bil_duduk_meis' => $bil_duduk_mei,
            'bil_duduk_juns' => $bil_duduk_jun,
            'bil_duduk_julais' => $bil_duduk_julai,
            'bil_duduk_ogoss' => $bil_duduk_ogos,
            'bil_duduk_seps' => $bil_duduk_sep,
            'bil_duduk_okts' => $bil_duduk_okt,
            'bil_duduk_novs' => $bil_duduk_nov,
            'bil_duduk_diss' => $bil_duduk_dis,
            'bil_duduk_jumlahs' => $bil_duduk_jumlah,
            'bil_lulus_jans' => $bil_lulus_jan,
            'bil_lulus_febs' => $bil_lulus_feb,
            'bil_lulus_macs' => $bil_lulus_mac,
            'bil_lulus_aprs' => $bil_lulus_apr,
            'bil_lulus_meis' => $bil_lulus_mei,
            'bil_lulus_juns' => $bil_lulus_jun,
            'bil_lulus_julais' => $bil_lulus_julai,
            'bil_lulus_ogoss' => $bil_lulus_ogos,
            'bil_lulus_seps' => $bil_lulus_sep,
            'bil_lulus_okts' => $bil_lulus_okt,
            'bil_lulus_novs' => $bil_lulus_nov,
            'bil_lulus_diss' => $bil_lulus_dis,
            'bil_lulus_jumlahs' => $bil_lulus_jumlah,
            'bil_gagal_jans' => $bil_gagal_jan,
            'bil_gagal_febs' => $bil_gagal_feb,
            'bil_gagal_macs' => $bil_gagal_mac,
            'bil_gagal_aprs' => $bil_gagal_apr,
            'bil_gagal_meis' => $bil_gagal_mei,
            'bil_gagal_juns' => $bil_gagal_jun,
            'bil_gagal_julais' => $bil_gagal_julai,
            'bil_gagal_ogoss' => $bil_gagal_ogos,
            'bil_gagal_seps' => $bil_gagal_sep,
            'bil_gagal_okts' => $bil_gagal_okt,
            'bil_gagal_novs' => $bil_gagal_nov,
            'bil_gagal_diss' => $bil_gagal_dis,
            'bil_gagal_jumlahs' => $bil_gagal_jumlah,
        ]);
    }

    public function statistik_keseluruhan(Request $request)
    {
        //request kementerian
        $kementerian = Refgeneral::where('MASTERCODE', 10028)->get();
        $ministry = $request->input_kementerian;

        // if ($ministry != null) {
        //     $senarai_keputusan = KeputusanPenilaian::join('mohon_penilaians', 'keputusan_penilaians.ic_peserta', 'mohon_penilaians.no_ic')
        //     ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
        //     ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
        //     ->select(DB::raw('count(*) as jumlah'),'keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
        //     ->where('KOD_KEMENTERIAN', $ministry)
        //     ->get();
        // } else {
        //     $senarai_keputusan = KeputusanPenilaian::join('mohon_penilaians', 'keputusan_penilaians.ic_peserta', 'mohon_penilaians.no_ic')
        //     ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
        //     ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', 'pro_tempat_tugas.ID_PESERTA')
        //     ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_tempat_tugas.*')
        //     ->get();
        // }


        return view('laporan.statistik_keseluruhan', [
            'kementerians' => $kementerian,
            'ministrys' => $ministry,
            // 'senarai_keputusans' => $senarai_keputusan,
        ]);
    }

    public function statistik_keseluruhan_pencapaian_penilaian_isac_ikut_bulan(Request $request)
    {
        //request tahun
        $tahun = $request->tahun;

        //tahun semasa
        $tahun_semasa = date('Y');

        //count sesi
        //januari
        if ($tahun != null) {
            $bil_sesi_jan = Jadual::whereMonth('created_at', 1)
                ->whereYear('created_at', $tahun)
                ->count();
        } else {
            $bil_sesi_jan = Jadual::whereMonth('created_at', 1)
                ->count();
        }

        //februari
        if ($tahun != null) {
            $bil_sesi_feb = Jadual::whereMonth('created_at', 2)
                ->whereYear('created_at', $tahun)
                ->count();
        } else {
            $bil_sesi_feb = Jadual::whereMonth('created_at', 2)
                ->count();
        }

        //mac
        if ($tahun != null) {
            $bil_sesi_mac = Jadual::whereMonth('created_at', 3)
                ->whereYear('created_at', $tahun)
                ->count();
        } else {
            $bil_sesi_mac = Jadual::whereMonth('created_at', 3)
                ->count();
        }

        //april
        if ($tahun != null) {
            $bil_sesi_apr = Jadual::whereMonth('created_at', 4)
                ->whereYear('created_at', $tahun)
                ->count();
        } else {
            $bil_sesi_apr = Jadual::whereMonth('created_at', 4)
                ->count();
        }

        //mei
        if ($tahun != null) {
            $bil_sesi_mei = Jadual::whereMonth('created_at', 5)
                ->whereYear('created_at', $tahun)
                ->count();
        } else {
            $bil_sesi_mei = Jadual::whereMonth('created_at', 5)
                ->count();
        }

        //jun
        if ($tahun != null) {
            $bil_sesi_jun = Jadual::whereMonth('created_at', 6)
                ->whereYear('created_at', $tahun)
                ->count();
        } else {
            $bil_sesi_jun = Jadual::whereMonth('created_at', 6)
                ->count();
        }

        //julai
        if ($tahun != null) {
            $bil_sesi_julai = Jadual::whereMonth('created_at', 7)
                ->whereYear('created_at', $tahun)
                ->count();
        } else {
            $bil_sesi_julai = Jadual::whereMonth('created_at', 7)
                ->count();
        }

        //ogos
        if ($tahun != null) {
            $bil_sesi_ogos = Jadual::whereMonth('created_at', 8)
                ->whereYear('created_at', $tahun)
                ->count();
        } else {
            $bil_sesi_ogos = Jadual::whereMonth('created_at', 8)
                ->count();
        }

        //september
        if ($tahun != null) {
            $bil_sesi_sep = Jadual::whereMonth('created_at', 9)
                ->whereYear('created_at', $tahun)
                ->count();
        } else {
            $bil_sesi_sep = Jadual::whereMonth('created_at', 9)
                ->count();
        }

        //oktober
        if ($tahun != null) {
            $bil_sesi_okt = Jadual::whereMonth('created_at', 10)
                ->whereYear('created_at', $tahun)
                ->count();
        } else {
            $bil_sesi_okt = Jadual::whereMonth('created_at', 10)
                ->count();
        }

        //november
        if ($tahun != null) {
            $bil_sesi_nov = Jadual::whereMonth('created_at', 11)
                ->whereYear('created_at', $tahun)
                ->count();
        } else {
            $bil_sesi_nov = Jadual::whereMonth('created_at', 11)
                ->count();
        }

        //disember
        if ($tahun != null) {
            $bil_sesi_dis = Jadual::whereMonth('created_at', 12)
                ->whereYear('created_at', $tahun)
                ->count();
        } else {
            $bil_sesi_dis = Jadual::whereMonth('created_at', 12)
                ->count();
        }

        //jumlah
        if ($tahun != null) {
            $bil_sesi_jumlah = Jadual::whereYear('created_at', $tahun)
                ->count();
        } else {
            $bil_sesi_jumlah = Jadual::count();
        }

        //count bil memohon
        //januari
        if ($tahun != null) {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_mohon_jan = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 1)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //februari
        if ($tahun != null) {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_mohon_feb = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 2)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //mac
        if ($tahun != null) {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_mohon_mac = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 3)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //april
        if ($tahun != null) {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_mohon_apr = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 4)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //mei
        if ($tahun != null) {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_mohon_mei = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 5)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //jun
        if ($tahun != null) {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_mohon_jun = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 6)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //julai
        if ($tahun != null) {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_mohon_julai = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 7)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //ogos
        if ($tahun != null) {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_mohon_ogos = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 8)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //september
        if ($tahun != null) {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_mohon_sep = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 9)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //oktober
        if ($tahun != null) {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_mohon_okt = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 10)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //november
        if ($tahun != null) {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_mohon_nov = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 11)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //disember
        if ($tahun != null) {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_mohon_dis = MohonPenilaian::whereMonth('mohon_penilaians.created_at', 12)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //bil jumlah memohon
        if ($tahun != null) {
            $bil_mohon_jumlah = MohonPenilaian::whereYear('mohon_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_mohon_jumlah = MohonPenilaian::join('pro_peserta', 'mohon_penilaians.no_ic', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('mohon_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //bil menduduki
        //januari
        if ($tahun != null) {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_duduk_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //februari
        if ($tahun != null) {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_duduk_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //mac
        if ($tahun != null) {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_duduk_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //april
        if ($tahun != null) {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_duduk_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //mei
        if ($tahun != null) {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_duduk_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //jun
        if ($tahun != null) {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_duduk_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //julai
        if ($tahun != null) {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_duduk_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //ogos
        if ($tahun != null) {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_duduk_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //september
        if ($tahun != null) {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_duduk_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //oktober
        if ($tahun != null) {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_duduk_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //november
        if ($tahun != null) {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_duduk_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //disember
        if ($tahun != null) {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_duduk_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }

        //jumlah menduduki
        if ($tahun != null) {
            $bil_duduk_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        } else {
            $bil_duduk_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->count();
        }


        //bil lulus
        //januari
        if ($tahun != null) {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } else {
            $bil_lulus_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //februari
        if ($tahun != null) {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } else {
            $bil_lulus_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //mac
        if ($tahun != null) {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } else {
            $bil_lulus_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //april
        if ($tahun != null) {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } else {
            $bil_lulus_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //mei
        if ($tahun != null) {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } else {
            $bil_lulus_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //jun
        if ($tahun != null) {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } else {
            $bil_lulus_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //julai
        if ($tahun != null) {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } else {
            $bil_lulus_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //ogos
        if ($tahun != null) {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } else {
            $bil_lulus_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //september
        if ($tahun != null) {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } else {
            $bil_lulus_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //oktober
        if ($tahun != null) {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } else {
            $bil_lulus_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //november
        if ($tahun != null) {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } else {
            $bil_lulus_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //disember
        if ($tahun != null) {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } else {
            $bil_lulus_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }

        //jumlah lulus
        if ($tahun != null) {
            $bil_lulus_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        } else {
            $bil_lulus_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Lulus')
                ->count();
        }


        //percent lulus
        //januari
        if ($bil_duduk_jan != 0) {
            $percent_lulus_jan = number_format((float)($bil_lulus_jan / $bil_duduk_jan) * 100, 2, '.', '');
        } else {
            $percent_lulus_jan = 0;
        }

        //februari
        if ($bil_duduk_feb != 0) {
            $percent_lulus_feb = number_format((float)($bil_lulus_feb / $bil_duduk_feb) * 100, 2, '.', '');
        } else {
            $percent_lulus_feb = 0;
        }

        //mac
        if ($bil_duduk_mac != 0) {
            $percent_lulus_mac = number_format((float)($bil_lulus_mac / $bil_duduk_mac) * 100, 2, '.', '');
        } else {
            $percent_lulus_mac = 0;
        }

        //april
        if ($bil_duduk_apr != 0) {
            $percent_lulus_apr = number_format((float)($bil_lulus_apr / $bil_duduk_apr) * 100, 2, '.', '');
        } else {
            $percent_lulus_apr = 0;
        }

        //mei
        if ($bil_duduk_mei != 0) {
            $percent_lulus_mei = number_format((float)($bil_lulus_mei / $bil_duduk_mei) * 100, 2, '.', '');
        } else {
            $percent_lulus_mei = 0;
        }

        //jun
        if ($bil_duduk_jun != 0) {
            $percent_lulus_jun = number_format((float)($bil_lulus_jun / $bil_duduk_jun) * 100, 2, '.', '');
        } else {
            $percent_lulus_jun = 0;
        }

        //julai
        if ($bil_duduk_julai != 0) {
            $percent_lulus_julai = number_format((float)($bil_lulus_julai / $bil_duduk_julai) * 100, 2, '.', '');
        } else {
            $percent_lulus_julai = 0;
        }

        //ogos
        if ($bil_duduk_ogos != 0) {
            $percent_lulus_ogos = number_format((float)($bil_lulus_ogos / $bil_duduk_ogos) * 100, 2, '.', '');
        } else {
            $percent_lulus_ogos = 0;
        }

        //september
        if ($bil_duduk_sep != 0) {
            $percent_lulus_sep = number_format((float)($bil_lulus_sep / $bil_duduk_sep) * 100, 2, '.', '');
        } else {
            $percent_lulus_sep = 0;
        }

        //oktober
        if ($bil_duduk_okt != 0) {
            $percent_lulus_okt = number_format((float)($bil_lulus_okt / $bil_duduk_okt) * 100, 2, '.', '');
        } else {
            $percent_lulus_okt = 0;
        }

        //november
        if ($bil_duduk_nov != 0) {
            $percent_lulus_nov = number_format((float)($bil_lulus_nov / $bil_duduk_nov) * 100, 2, '.', '');
        } else {
            $percent_lulus_nov = 0;
        }

        //disember
        if ($bil_duduk_dis != 0) {
            $percent_lulus_dis = number_format((float)($bil_lulus_dis / $bil_duduk_dis) * 100, 2, '.', '');
        } else {
            $percent_lulus_dis = 0;
        }

        //jumlah
        if ($bil_duduk_jumlah != 0) {
            $percent_lulus_jumlah = number_format((float)($bil_lulus_jumlah / $bil_duduk_jumlah) * 100, 2, '.', '');
        } else {
            $percent_lulus_jumlah = 0;
        }


        //bil gagal
        //januari
        if ($tahun != null) {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } else {
            $bil_gagal_jan = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 1)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //februari
        if ($tahun != null) {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } else {
            $bil_gagal_feb = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 2)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //mac
        if ($tahun != null) {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } else {
            $bil_gagal_mac = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 3)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //april
        if ($tahun != null) {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } else {
            $bil_gagal_apr = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 4)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //mei
        if ($tahun != null) {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } else {
            $bil_gagal_mei = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 5)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //jun
        if ($tahun != null) {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } else {
            $bil_gagal_jun = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 6)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //julai
        if ($tahun != null) {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } else {
            $bil_gagal_julai = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 7)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //ogos
        if ($tahun != null) {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } else {
            $bil_gagal_ogos = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 8)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //september
        if ($tahun != null) {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } else {
            $bil_gagal_sep = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 9)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //oktober
        if ($tahun != null) {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } else {
            $bil_gagal_okt = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 10)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //november
        if ($tahun != null) {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } else {
            $bil_gagal_nov = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 11)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //disember
        if ($tahun != null) {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } else {
            $bil_gagal_dis = KeputusanPenilaian::whereMonth('keputusan_penilaians.created_at', 12)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }

        //jumlah gagal
        if ($tahun != null) {
            $bil_gagal_jumlah = KeputusanPenilaian::whereYear('keputusan_penilaians.created_at', $tahun)
                ->join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        } else {
            $bil_gagal_jumlah = KeputusanPenilaian::join('pro_peserta', 'keputusan_penilaians.ic_peserta', 'pro_peserta.NO_KAD_PENGENALAN')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', 'pro_perkhidmatan.ID_PESERTA')
                ->select('keputusan_penilaians.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->where('keputusan', 'Gagal')
                ->count();
        }


        //percent gagal
        //januari
        if ($bil_duduk_jan != 0) {
            $percent_gagal_jan = number_format((float)($bil_gagal_jan / $bil_duduk_jan) * 100, 2, '.', '');
        } else {
            $percent_gagal_jan = 0;
        }

        //februari
        if ($bil_duduk_feb != 0) {
            $percent_gagal_feb = number_format((float)($bil_gagal_feb / $bil_duduk_feb) * 100, 2, '.', '');
        } else {
            $percent_gagal_feb = 0;
        }

        //mac
        if ($bil_duduk_mac != 0) {
            $percent_gagal_mac = number_format((float)($bil_gagal_mac / $bil_duduk_mac) * 100, 2, '.', '');
        } else {
            $percent_gagal_mac = 0;
        }

        //april
        if ($bil_duduk_apr != 0) {
            $percent_gagal_apr = number_format((float)($bil_gagal_apr / $bil_duduk_apr) * 100, 2, '.', '');
        } else {
            $percent_gagal_apr = 0;
        }

        //mei
        if ($bil_duduk_mei != 0) {
            $percent_gagal_mei = number_format((float)($bil_gagal_mei / $bil_duduk_mei) * 100, 2, '.', '');
        } else {
            $percent_gagal_mei = 0;
        }

        //jun
        if ($bil_duduk_jun != 0) {
            $percent_gagal_jun = number_format((float)($bil_gagal_jun / $bil_duduk_jun) * 100, 2, '.', '');
        } else {
            $percent_gagal_jun = 0;
        }

        //julai
        if ($bil_duduk_julai != 0) {
            $percent_gagal_julai = number_format((float)($bil_gagal_julai / $bil_duduk_julai) * 100, 2, '.', '');
        } else {
            $percent_gagal_julai = 0;
        }

        //ogos
        if ($bil_duduk_ogos != 0) {
            $percent_gagal_ogos = number_format((float)($bil_gagal_ogos / $bil_duduk_ogos) * 100, 2, '.', '');
        } else {
            $percent_gagal_ogos = 0;
        }

        //september
        if ($bil_duduk_sep != 0) {
            $percent_gagal_sep = number_format((float)($bil_gagal_sep / $bil_duduk_sep) * 100, 2, '.', '');
        } else {
            $percent_gagal_sep = 0;
        }

        //oktober
        if ($bil_duduk_okt != 0) {
            $percent_gagal_okt = number_format((float)($bil_gagal_okt / $bil_duduk_okt) * 100, 2, '.', '');
        } else {
            $percent_gagal_okt = 0;
        }

        //november
        if ($bil_duduk_nov != 0) {
            $percent_gagal_nov = number_format((float)($bil_gagal_nov / $bil_duduk_nov) * 100, 2, '.', '');
        } else {
            $percent_gagal_nov = 0;
        }

        //disember
        if ($bil_duduk_dis != 0) {
            $percent_gagal_dis = number_format((float)($bil_gagal_dis / $bil_duduk_dis) * 100, 2, '.', '');
        } else {
            $percent_gagal_dis = 0;
        }

        //jumlah
        if ($bil_duduk_jumlah != 0) {
            $percent_gagal_jumlah = number_format((float)($bil_gagal_jumlah / $bil_duduk_jumlah) * 100, 2, '.', '');
        } else {
            $percent_gagal_jumlah = 0;
        }

        return view('laporan.statistik_keseluruhan_pencapaian_penilaian_isac_mengikut_bulan', [
            'tahuns' => $tahun,
            'tahun_semasas' => $tahun_semasa,
            'bil_sesi_jans' => $bil_sesi_jan,
            'bil_sesi_febs' => $bil_sesi_feb,
            'bil_sesi_macs' => $bil_sesi_mac,
            'bil_sesi_aprs' => $bil_sesi_apr,
            'bil_sesi_meis' => $bil_sesi_mei,
            'bil_sesi_juns' => $bil_sesi_jun,
            'bil_sesi_julais' => $bil_sesi_julai,
            'bil_sesi_ogoss' => $bil_sesi_ogos,
            'bil_sesi_seps' => $bil_sesi_sep,
            'bil_sesi_okts' => $bil_sesi_okt,
            'bil_sesi_novs' => $bil_sesi_nov,
            'bil_sesi_diss' => $bil_sesi_dis,
            'bil_sesi_jumlahs' => $bil_sesi_jumlah,
            'bil_mohon_jans' => $bil_mohon_jan,
            'bil_mohon_febs' => $bil_mohon_feb,
            'bil_mohon_macs' => $bil_mohon_mac,
            'bil_mohon_aprs' => $bil_mohon_apr,
            'bil_mohon_meis' => $bil_mohon_mei,
            'bil_mohon_juns' => $bil_mohon_jun,
            'bil_mohon_julais' => $bil_mohon_julai,
            'bil_mohon_ogoss' => $bil_mohon_ogos,
            'bil_mohon_seps' => $bil_mohon_sep,
            'bil_mohon_okts' => $bil_mohon_okt,
            'bil_mohon_novs' => $bil_mohon_nov,
            'bil_mohon_diss' => $bil_mohon_dis,
            'bil_mohon_jumlahs' => $bil_mohon_jumlah,
            'bil_duduk_jans' => $bil_duduk_jan,
            'bil_duduk_febs' => $bil_duduk_feb,
            'bil_duduk_macs' => $bil_duduk_mac,
            'bil_duduk_aprs' => $bil_duduk_apr,
            'bil_duduk_meis' => $bil_duduk_mei,
            'bil_duduk_juns' => $bil_duduk_jun,
            'bil_duduk_julais' => $bil_duduk_julai,
            'bil_duduk_ogoss' => $bil_duduk_ogos,
            'bil_duduk_seps' => $bil_duduk_sep,
            'bil_duduk_okts' => $bil_duduk_okt,
            'bil_duduk_novs' => $bil_duduk_nov,
            'bil_duduk_diss' => $bil_duduk_dis,
            'bil_duduk_jumlahs' => $bil_duduk_jumlah,
            'bil_lulus_jans' => $bil_lulus_jan,
            'bil_lulus_febs' => $bil_lulus_feb,
            'bil_lulus_macs' => $bil_lulus_mac,
            'bil_lulus_aprs' => $bil_lulus_apr,
            'bil_lulus_meis' => $bil_lulus_mei,
            'bil_lulus_juns' => $bil_lulus_jun,
            'bil_lulus_julais' => $bil_lulus_julai,
            'bil_lulus_ogoss' => $bil_lulus_ogos,
            'bil_lulus_seps' => $bil_lulus_sep,
            'bil_lulus_okts' => $bil_lulus_okt,
            'bil_lulus_novs' => $bil_lulus_nov,
            'bil_lulus_diss' => $bil_lulus_dis,
            'bil_lulus_jumlahs' => $bil_lulus_jumlah,
            'percent_lulus_jans' => $percent_lulus_jan,
            'percent_lulus_febs' => $percent_lulus_feb,
            'percent_lulus_macs' => $percent_lulus_mac,
            'percent_lulus_aprs' => $percent_lulus_apr,
            'percent_lulus_meis' => $percent_lulus_mei,
            'percent_lulus_juns' => $percent_lulus_jun,
            'percent_lulus_julais' => $percent_lulus_julai,
            'percent_lulus_ogoss' => $percent_lulus_ogos,
            'percent_lulus_seps' => $percent_lulus_sep,
            'percent_lulus_okts' => $percent_lulus_okt,
            'percent_lulus_novs' => $percent_lulus_nov,
            'percent_lulus_diss' => $percent_lulus_dis,
            'percent_lulus_jumlahs' => $percent_lulus_jumlah,
            'bil_gagal_jans' => $bil_gagal_jan,
            'bil_gagal_febs' => $bil_gagal_feb,
            'bil_gagal_macs' => $bil_gagal_mac,
            'bil_gagal_aprs' => $bil_gagal_apr,
            'bil_gagal_meis' => $bil_gagal_mei,
            'bil_gagal_juns' => $bil_gagal_jun,
            'bil_gagal_julais' => $bil_gagal_julai,
            'bil_gagal_ogoss' => $bil_gagal_ogos,
            'bil_gagal_seps' => $bil_gagal_sep,
            'bil_gagal_okts' => $bil_gagal_okt,
            'bil_gagal_novs' => $bil_gagal_nov,
            'bil_gagal_diss' => $bil_gagal_dis,
            'bil_gagal_jumlahs' => $bil_gagal_jumlah,
            'percent_gagal_jans' => $percent_gagal_jan,
            'percent_gagal_febs' => $percent_gagal_feb,
            'percent_gagal_macs' => $percent_gagal_mac,
            'percent_gagal_aprs' => $percent_gagal_apr,
            'percent_gagal_meis' => $percent_gagal_mei,
            'percent_gagal_juns' => $percent_gagal_jun,
            'percent_gagal_julais' => $percent_gagal_julai,
            'percent_gagal_ogoss' => $percent_gagal_ogos,
            'percent_gagal_seps' => $percent_gagal_sep,
            'percent_gagal_okts' => $percent_gagal_okt,
            'percent_gagal_novs' => $percent_gagal_nov,
            'percent_gagal_diss' => $percent_gagal_dis,
            'percent_gagal_jumlahs' => $percent_gagal_jumlah,
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

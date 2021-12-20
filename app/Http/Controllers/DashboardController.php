<?php

namespace App\Http\Controllers;

use App\Models\Jadual;
use App\Models\KeputusanPenilaian;
use App\Models\MohonPenilaian;
use App\Models\VideoDanNota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $jaduals = Jadual::orderBy('TARIKH_SESI', 'desc')
            ->whereYear('TARIKH_SESI', '>=', 2021)
            ->get();
        $videodannotas = VideoDanNota::all();

        $bil_mohon_jumlah = MohonPenilaian::where('jantina', 'Lelaki')
            ->orWhere('jantina', 'Perempuan')
            ->count();

        $bil_lulus_jumlah = KeputusanPenilaian::join('mohon_penilaians', 'keputusan_penilaians.ic_peserta', 'mohon_penilaians.no_ic')
            ->select('*')
            ->where([['keputusan', 'Lulus'], ['jantina', 'Lelaki']])
            ->orWhere([['keputusan', 'Lulus'], ['jantina', 'Perempuan']])
            ->count();

        $bil_gagal_jumlah = KeputusanPenilaian::join('mohon_penilaians', 'keputusan_penilaians.ic_peserta', 'mohon_penilaians.no_ic')
            ->select('*')
            ->where([['keputusan', 'Gagal'], ['jantina', 'Lelaki']])
            ->orWhere([['keputusan', 'Gagal'], ['jantina', 'Perempuan']])
            ->count();

        //graf kelulusan
        $graf_lulus_gagal = KeputusanPenilaian::join('mohon_penilaians', 'keputusan_penilaians.ic_peserta', 'mohon_penilaians.no_ic')
            ->where('jantina', 'Lelaki')
            ->orWhere('jantina', 'Perempuan')
            ->select('keputusan_penilaians.keputusan as keputusan', DB::raw('count(*) as jumlah'))
            ->groupBy('keputusan')
            ->get()->toArray();
        // ->toSql();

        //graf permohonan bulanan
        $graf_permohonan_bulanan = MohonPenilaian::where('jantina', 'Lelaki')
            ->orWhere('jantina', 'Perempuan')
            ->select(DB::raw("CONCAT_WS('/',MONTH(created_at),YEAR(created_at)) as monthname"), DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('monthname')
            ->get()->toArray();

        // dd($graf_permohonan_bulanan);
        return view('dashboard', [
            'videodannotas' => $videodannotas,
            'jaduals' => $jaduals,
            'bil_mohon_jumlahs' => $bil_mohon_jumlah,
            'bil_lulus_jumlahs' => $bil_lulus_jumlah,
            'bil_gagal_jumlahs' => $bil_gagal_jumlah,
            'graf_lulus_gagals' => $graf_lulus_gagal,
            'graf_permohonan_bulanans' => $graf_permohonan_bulanan
        ]);
    }
}

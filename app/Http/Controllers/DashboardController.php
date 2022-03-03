<?php

namespace App\Http\Controllers;

use App\Models\Jadual;
use App\Models\KeputusanPenilaian;
use App\Models\MohonPenilaian;
use App\Models\User;
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
        $current_date = date('Y-m-d');
        $jaduals = Jadual::orderBy('TARIKH_SESI', 'asc')
            ->where('TARIKH_SESI', '>=', $current_date)
            ->get();
        
        $videodannotas = VideoDanNota::orderBy('jenis', 'asc')->get();
        // dd($videodannotas);
        $bil_mohon_jumlah = MohonPenilaian::where('jantina', 'Lelaki')
            ->orWhere('jantina', 'Perempuan')
            ->count();

        $bil_lulus_jumlah = KeputusanPenilaian::where('keputusan', 'Lulus')->count();

        $bil_gagal_jumlah = KeputusanPenilaian::where('keputusan', 'Gagal')->count();

        //bil peranan pentadbir sistem
        $bil_pentadbir_sistem = User::where('user_group_id', '1')->count();

        //bil peranan pentadbir penilaian
        $bil_pentadbir_penilaian = User::where('user_group_id', '2')->count();

        //bil peranan penyelaras
        $bil_penyelaras = User::where('user_group_id', '3')->count();

        //bil peranan pengawas
        $bil_pengawas = User::where('user_group_id', '4')->count();

        //bil peranan calon
        $bil_calon = User::where('user_group_id', '5')->count();

        //bil peranan pegawai korporat
        $bil_pegawai_korporat = User::where('user_group_id', '6')->count();

        //graf kelulusan
        $graf_lulus_gagal = KeputusanPenilaian::select('keputusan', DB::raw('count(*) as jumlah'))
            ->groupBy('keputusan')
            ->get()->toArray();
        // ->toSql();

        //graf permohonan bulanan
        $graf_permohonan_bulanan = MohonPenilaian::select(DB::raw("CONCAT_WS('/',MONTH(created_at),YEAR(created_at)) as monthname"), DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->where('jantina', 'Lelaki')
            ->orWhere('jantina', 'Perempuan')
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
            'graf_permohonan_bulanans' => $graf_permohonan_bulanan,
            'bil_pentadbir_sistems' => $bil_pentadbir_sistem,
            'bil_pentadbir_penilaians' => $bil_pentadbir_penilaian,
            'bil_penyelarass' => $bil_penyelaras,
            'bil_pengawass' => $bil_pengawas,
            'bil_calons' => $bil_calon,
            'bil_pegawai_korporats' => $bil_pegawai_korporat,
        ]);
    }
}

<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Facades\Mail;
use App\Mail\PeringatanPenilaian;
use App\Mail\PeringatanTidakHadir;
use App\Mail\PeringatanTukarKatalaluan;
use App\Models\Jadual;
use App\Models\NotifikasiEmail;
use App\Models\MohonPenilaian;
use App\Models\User;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            //call schedl1
            $this->peringatan_penilaian();
            $this->peringatan_tidak_hadir();
        })->dailyAt('8:00');

        // $schedule->call(function () {
        //     $this->testing();
        // })->everyThreeMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }


    // Method Scheduler

    // public function testing(){
    //     $hariz = User::where('name', 'hariz')->first();
    //     $hariz->name = 'Najhan Schedule';
    //     $hariz->save();
    // }

    public function peringatan_penilaian()
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $harini = date('d-m-Y');

        // reminder
        $noti = NotifikasiEmail::first();
        $hari = $noti->peringatan_penilaian;

        if ($hari != 0) {
            $calon = MohonPenilaian::get();

            foreach ($calon as $c) {
                $tarikh_sesi = date('d-m-Y', strtotime($c->tarikh_sesi));
                $noti_reminder = date('d-m-Y', strtotime('-' . $hari . ' day', strtotime($tarikh_sesi)));
                if ($noti_reminder == $harini) {
                    $ic_calon = $c->no_ic;
                    $data_calon = User::where('nric', $ic_calon)->first();
                    $emel_calon = $data_calon->email;
                    // $emel_penyelia = $c->emel_penyelia;
                    $recipient = [$emel_calon];
                    Mail::to($recipient)->send(new PeringatanPenilaian($c->id));
                }
            }
        }
    }

    public function peringatan_tidak_hadir()
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $harini = date('d-m-Y');

        // reminder
        $noti = NotifikasiEmail::first();
        $hari = $noti->peringatan_tidak_hadir;

        if ($hari != 0) {
            $calon = MohonPenilaian::get();

            foreach ($calon as $c) {
                if ($c->status_penilaian == 'Baru') {
                    $tarikh_sesi = date('d-m-Y', strtotime($c->tarikh_sesi));
                    $noti_reminder = date('d-m-Y', strtotime('+' . $hari . ' day', strtotime($tarikh_sesi)));
                    if ($noti_reminder == $harini) {
                        $ic_calon = $c->no_ic;
                        $data_calon = User::where('nric', $ic_calon)->first();
                        $emel_calon = $data_calon->email;
                        $jadual = Jadual::where('ID_PENILAIAN', $c->id_sesi)->first();
                        if ($jadual->user_id != null) {
                            $penyelaras = User::where('id', $jadual->user_id)->first();
                            $emel_penyelaras = $penyelaras->email;
                            $recipient = [$emel_penyelaras];
                        } else {
                            $emel_penyelia = $c->emel_penyelia;
                            $recipient = [$emel_calon, $emel_penyelia];
                        }
                        Mail::to($recipient)->send(new PeringatanTidakHadir($c->id));
                    }
                }
            }
        }
    }

    public function peringatan_tukar_katalaluan()
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $harini = date('d-m-Y');

        // reminder
        $noti = NotifikasiEmail::first();
        $bulan = $noti->peringatan_tukar_katalaluan;

        if ($bulan != 0) {
            $calon = User::get();

            foreach ($calon as $c) {
                $tarikh_daftar_akaun = date('d-m-Y', strtotime($c->created_at));
                $noti_reminder = date('d-m-Y', strtotime('+' . $bulan . ' months', strtotime($tarikh_daftar_akaun)));
                if ($noti_reminder == $harini) {
                    $recipient = $c->email;
                    Mail::to($recipient)->send(new PeringatanTukarKatalaluan($c->id));
                }
            }
        }
    }
}

<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Facades\Mail;
use App\Mail\PeringatanPenilaian;

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
        // $schedule->call(function () {

        //     //call schedl1
        //     $this->schedule1();
        //     $this->schedule1();
        //     $this->schedule1();
        // })->daily;
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
    // public function schedule1()
    // {
    //     date_default_timezone_set("Asia/Kuala_Lumpur");
    //     $harini = date('d-m-Y');

    //     // reminder
    //     $noti = NotifikasiEmail::first();
    //     $hari = $noti->peringatan_penilaian;

    //     $calon = MohonPenilaian::get();

    //     foreach ($calon as $calon) {
    //         $tarikh_sesi = date('d-m-Y', strtotime($calon->tarikh_sesi));
    //         $noti_reminder = date('d-m-Y', strtotime('-' . $hari . ' day', strtotime($tarikh_sesi)));
    //         if ($noti_reminder == $harini) {
    //             $ic_calon = $calon->nric;
    //             $data_calon = User::where('nric', $ic_calon)->first;
    //             $emel_calon = $data_calon->email;
    //             $emel_penyelia = $calon->emel_penyelia;
    //             $recipient = [$emel_calon, $emel_penyelia];
    //             Mail::to($recipient)->send(new PeringatanPenilaian());
    //         }
    //     }
    // }

    // public function schedule2()
    // {
    // }
}

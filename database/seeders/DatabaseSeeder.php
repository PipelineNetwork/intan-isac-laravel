<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifikasi_emails')->insert([
            
            'id' => 1,
            'tawaran_penilaian_individu' => 7,
            'tawaran_penilaian_kumpulan' => 7,
            'peringatan_penilaian' => 3,
            'peringatan_tidak_hadir' => 1,
            'jadual_penilaian' => 0,
        ]);
    }
}

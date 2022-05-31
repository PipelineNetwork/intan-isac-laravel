<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSizeAttribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pro_sesi', function (Blueprint $table) {
            $table->string('KOD_SESI_PENILAIAN')->nullable()->change();
            $table->string('KOD_MASA_MULA')->nullable()->change();
            $table->string('KOD_MASA_TAMAT')->nullable()->change();
            $table->text('KOD_KEMENTERIAN')->nullable()->change();
            $table->string('LOKASI')->nullable()->change();
            $table->string('KOD_IAC')->nullable()->change();
            $table->string('KOD_STATUS')->nullable()->change();
            $table->string('ID_PENGHANTARAN')->nullable()->change();
            $table->string('KOD_JENIS_SESI')->nullable()->change();
            $table->string('KOD_TAHAP')->nullable()->change();
            $table->string('KOD_KATEGORI_PESERTA')->nullable()->change();
            $table->string('KOD_PENGESAHAN_PENILAIAN')->nullable()->change();
            $table->string('JUMLAH_KESELURUHAN')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

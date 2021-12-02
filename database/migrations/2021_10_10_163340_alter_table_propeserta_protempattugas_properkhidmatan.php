<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePropesertaProtempattugasProperkhidmatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pro_tempat_tugas', function (Blueprint $table) {
            $table->string('GELARAN_KETUA_JABATAN', 255)->change();
            $table->string('KOD_KEMENTERIAN', 255)->change();
            $table->string('KOD_JABATAN', 255)->change();
            $table->string('ALAMAT_1', 255)->change();
            $table->string('ALAMAT_2', 255)->change();
        });

        Schema::table('pro_perkhidmatan', function (Blueprint $table) {
            $table->string('KOD_PERINGKAT', 255)->change();
            $table->string('KOD_KLASIFIKASI_PERKHIDMATAN', 255)->change();
            $table->string('KOD_TARAF_PERJAWATAN', 255)->change();
            $table->string('KOD_JENIS_PERKHIDMATAN', 255)->change();
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

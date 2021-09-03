<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlamatToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ALAMAT_1')->nullable();
            $table->string('ALAMAT_2')->nullable();
            $table->string('POSKOD')->nullable();
            $table->string('KOD_NEGERI')->nullable();
            $table->string('KOD_NEGARA')->nullable();
            $table->string('KOD_JANTINA')->nullable();
            $table->string('KOD_KLASIFIKASI_PERKHIDMATAN')->nullable();
            $table->string('TARIKH_LAHIR')->nullable();
            $table->string('TARIKH_LANTIKAN')->nullable();
            $table->string('GELARAN_KETUA_JABATAN')->nullable();
            $table->string('KOD_TARAF_PERJAWATAN')->nullable();
            $table->string('NAMA_PENYELIA')->nullable();
            $table->string('EMEL_PENYELIA')->nullable();
            $table->string('NO_TELEFON_PENYELIA')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

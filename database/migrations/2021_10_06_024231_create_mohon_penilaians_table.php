<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMohonPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mohon_penilaians', function (Blueprint $table) {
            $table->id();
            $table->string('id_calon')->nullable();
            $table->string('id_sesi')->nullable();
            $table->date('tarikh_sesi')->nullable();
            
            $table->string('nama')->nullable();
            $table->string('no_ic')->nullable();
            $table->string('no_telefon_pejabat')->nullable();
            $table->string('alamat1_pejabat')->nullable();
            $table->string('alamat2_pejabat')->nullable();   
            $table->string('poskod_pejabat')->nullable();
            $table->string('jantina')->nullable();
            $table->string('bangsa')->nullable();
            $table->string('klasifikasi_perkhidmatan')->nullable();
            $table->string('tarikh_lahir')->nullable();
            $table->string('tarikh_lantikan')->nullable();
            $table->string('taraf_jawatan')->nullable();
            $table->string('jawatan_ketua_jabatan')->nullable();
            $table->string('nama_penyelia')->nullable();
            $table->string('emel_penyelia')->nullable();
            $table->string('no_telefon_penyelia')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mohon_penilaians');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeputusanPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keputusan_penilaians', function (Blueprint $table) {
            $table->id();
            $table->string('id_peserta')->nullable();
            $table->string('id_penilaian')->nullable();
            $table->string('nama_peserta')->nullable();
            $table->string('ic_peserta')->nullable();
            $table->string('tarikh_penilaian')->nullable();
            $table->string('lokasi')->nullable();
            $table->integer('markah_pengetahuan')->nullable();
            $table->integer('markah_kemahiran')->nullable();
            $table->integer('markah_keseluruhan')->nullable();
            $table->string('keputusan')->nullable();
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
        Schema::dropIfExists('keputusan_penilaians');
    }
}

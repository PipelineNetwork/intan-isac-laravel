<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifikasiEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasi_emails', function (Blueprint $table) {
            $table->id();
            $table->integer('tawaran_penilaian_individu')->nullable();
            $table->integer('tawaran_penilaian_kumpulan')->nullable();
            $table->integer('peringatan_penilaian')->nullable();
            $table->integer('peringatan_tidak_hadir')->nullable();
            $table->integer('jadual_penilaian')->nullable();
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
        Schema::dropIfExists('notifikasi_emails');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTambahAduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tambah_aduans', function (Blueprint $table) {
            $table->id();
            $table->string('tajuk');
            $table->text('keterangan_aduan_send')->nullable();
            $table->string('file_aduan_send')->nullable();
            $table->text('keterangan_aduan_reply')->nullable();
            $table->string('file_aduan_reply')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('tambah_aduans');
    }
}

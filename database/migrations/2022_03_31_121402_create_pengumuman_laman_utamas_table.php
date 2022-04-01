<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengumumanLamanUtamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumuman_laman_utamas', function (Blueprint $table) {
            $table->id();
            $table->text('tajuk_header')->nullable();
            $table->string('jenis_tajuk_header')->nullable();
            $table->text('tajuk_pengumuman')->nullable();
            $table->string('jenis_tajuk_pengumuman')->nullable();
            $table->text('subtajuk_pengumuman')->nullable();
            $table->string('jenis_subtajuk_pengumuman')->nullable();
            $table->text('pengumuman_1')->nullable();
            $table->string('jenis_pengumuman_1')->nullable();
            $table->text('subpengumuman_1')->nullable();
            $table->string('jenis_subpengumuman_1')->nullable();
            $table->text('pengumuman_2')->nullable();
            $table->string('jenis_pengumuman_2')->nullable();
            $table->text('subpengumuman_2')->nullable();
            $table->string('jenis_subpengumuman_2')->nullable();
            $table->text('pengumuman_3')->nullable();
            $table->string('jenis_pengumuman_3')->nullable();
            $table->text('subpengumuman_3')->nullable();
            $table->string('jenis_subpengumuman_3')->nullable();
            $table->text('pengumuman_4')->nullable();
            $table->string('jenis_pengumuman_4')->nullable();
            $table->text('subpengumuman_4')->nullable();
            $table->string('jenis_subpengumuman_4')->nullable();
            $table->text('pengumuman_5')->nullable();
            $table->string('jenis_pengumuman_5')->nullable();
            $table->text('subpengumuman_5')->nullable();
            $table->string('jenis_subpengumuman_5')->nullable();
            $table->text('pengumuman_6')->nullable();
            $table->string('jenis_pengumuman_6')->nullable();
            $table->text('subpengumuman_6')->nullable();
            $table->string('jenis_subpengumuman_6')->nullable();
            $table->text('pengumuman_button_manual')->nullable();
            $table->string('status_button_manual')->nullable();
            $table->string('status_pengumuman')->nullable();
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
        Schema::dropIfExists('pengumuman_laman_utamas');
    }
}

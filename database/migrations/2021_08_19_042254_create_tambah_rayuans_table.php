<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTambahRayuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tambah_rayuans', function (Blueprint $table) {
            
            $table->id();
            $table->string('tajuk');
            $table->text('keterangan_rayuan_send')->nullable();
            $table->string('file_rayuan_send')->nullable();
            $table->text('keterangan_rayuan_reply')->nullable();
            $table->string('file_rayuan_reply')->nullable();
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
        Schema::dropIfExists('tambah_rayuans');
    }
}

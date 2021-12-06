<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRayuanCalonBlacklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rayuan_calon_blacklists', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('ic_calon')->nullable();
            $table->string('tahap')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('rayuan_calon_blacklists');
    }
}

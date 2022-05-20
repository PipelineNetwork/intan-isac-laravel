<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeattToMohonPenilaians extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mohon_penilaians', function (Blueprint $table) {
            $table->text('alamat1_pejabat')->nullable()->change();
            $table->text('alamat2_pejabat')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mohon_penilaians', function (Blueprint $table) {
            //
        });
    }
}

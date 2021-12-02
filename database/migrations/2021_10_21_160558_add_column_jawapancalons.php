<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnJawapancalons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bankjawapancalons', function (Blueprint $table) {
            $table->text('input_to')->nullable();
            $table->text('input_subject')->nullable();
            $table->text('input_mesej')->nullable();
            $table->text('fail_upload')->nullable();
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

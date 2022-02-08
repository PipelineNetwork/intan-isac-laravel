<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddcolumnStatusTablejawapancalon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bankjawapancalons', function (Blueprint $table) {
            $table->string('status_jawab_internet')->nullable();
            $table->string('status_jawab_word')->nullable();
            $table->string('status_jawab_email')->nullable();
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

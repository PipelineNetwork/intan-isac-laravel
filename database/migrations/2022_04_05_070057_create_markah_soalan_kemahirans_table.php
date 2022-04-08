<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkahSoalanKemahiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markah_soalan_kemahirans', function (Blueprint $table) {
            $table->id();
            $table->integer('markah_internet')->nullable();
            $table->integer('markah_word')->nullable();
            $table->integer('markah_email')->nullable();
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
        Schema::dropIfExists('markah_soalan_kemahirans');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add2BankjawapancalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bankjawapancalons', function (Blueprint $table) {
            $table->text('jawapansebenar_urlteks')->nullable();
            $table->integer('markah_urlteks')->nullable();
            $table->text('jawapansebenar_carianteks')->nullable();
            $table->integer('markah_carianteks')->nullable();
            $table->integer('markah_inputto')->nullable();
            $table->integer('markah_inputsubject')->nullable();
            $table->integer('markah_inputmesej')->nullable();
            $table->integer('markah_failupload')->nullable();
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

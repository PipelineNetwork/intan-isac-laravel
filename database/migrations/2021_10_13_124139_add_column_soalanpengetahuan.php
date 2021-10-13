<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSoalanpengetahuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banksoalanpengetahuans', function (Blueprint $table) {
            $table->text('pilihan_jawapan1')->nullable();
            $table->text('pilihan_jawapan2')->nullable();
            $table->text('pilihan_jawapan3')->nullable();
            $table->text('pilihan_jawapan4')->nullable();
            $table->text('jawapan1')->nullable();
            $table->text('jawapan2')->nullable();
            $table->text('jawapan3')->nullable();
            $table->text('jawapan4')->nullable();
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

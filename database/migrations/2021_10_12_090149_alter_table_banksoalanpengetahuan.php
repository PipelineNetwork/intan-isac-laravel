<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableBanksoalanpengetahuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("ALTER TABLE `banksoalanpengetahuans` CHANGE `jenis_soalan` `jenis_soalan` ENUM('fill_in_the_blank', 'multiple_choice', 'ranking', 'single_choice', 'true_or_false', 'subjective') NULL");
        // Schema::table('banksoalanpengetahuans', function (Blueprint $table) {
        //     $table->enum('jenis_soalan', ['fill_in_the_blank', 'multiple_choice', 'ranking', 'single_choice', 'true_or_false', 'subjective'])->change();
        // });
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

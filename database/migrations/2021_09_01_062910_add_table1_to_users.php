<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTable1ToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->dropColumn('ALAMAT_1');
            $table->dropColumn('ALAMAT_2');
            $table->dropColumn('POSKOD');
            $table->dropColumn('KOD_NEGERI');
            $table->dropColumn('KOD_NEGARA');
            $table->dropColumn('KOD_JANTINA');
            $table->dropColumn('KOD_KLASIFIKASI_PERKHIDMATAN');
            $table->dropColumn('TARIKH_LAHIR');
            $table->dropColumn('TARIKH_LANTIKAN');
            $table->dropColumn('GELARAN_KETUA_JABATAN');
            $table->dropColumn('KOD_TARAF_PERJAWATAN');
            $table->dropColumn('NAMA_PENYELIA');
            $table->dropColumn('EMEL_PENYELIA');
            $table->dropColumn('NO_TELEFON_PENYELIA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

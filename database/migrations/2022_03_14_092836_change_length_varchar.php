<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLengthVarchar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pro_peserta', function (Blueprint $table) {
            $table->string('KOD_GELARAN', '255')->nullable()->change();
            $table->string('NAMA_PESERTA', '255')->nullable()->change();
            $table->string('TARIKH_LAHIR', '255')->nullable()->change();
            $table->string('KOD_JANTINA', '255')->nullable()->change();
            $table->string('EMEL_PESERTA', '255')->nullable()->change();
            $table->string('KOD_KATEGORI_PESERTA', '255')->nullable()->change();
            $table->string('NO_KAD_PENGENALAN', '255')->nullable()->change();
            $table->string('NO_KAD_PENGENALAN_LAIN', '255')->nullable()->change();
            $table->string('NO_TELEFON_BIMBIT', '255')->nullable()->change();
            $table->string('NO_TELEFON_PEJABAT', '255')->nullable()->change();
        });

        Schema::table('pro_tempat_tugas', function (Blueprint $table) {
            $table->string('POSKOD', '255')->nullable()->change();
            $table->string('BANDAR', '255')->nullable()->change();
            $table->string('KOD_NEGARA', '255')->nullable()->change();
            $table->string('NAMA_PENYELIA', '255')->nullable()->change();
            $table->string('EMEL_PENYELIA', '255')->nullable()->change();
            $table->string('NO_TELEFON_PENYELIA', '255')->nullable()->change();
            $table->string('NO_FAX_PENYELIA', '255')->nullable()->change();
        });

        Schema::table('pro_perkhidmatan', function (Blueprint $table) {
            $table->string('KOD_GRED_JAWATAN', '255')->nullable()->change();
            $table->string('TARIKH_LANTIKAN', '255')->nullable()->change();
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

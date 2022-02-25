<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPenyeliaToNotifikasiEmails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifikasi_emails', function (Blueprint $table) {
            $table->string('penyelia_terima_surat_tawaran')->nullable();
            $table->string('penyelia_terima_sijil_kelulusan')->nullable();
            $table->string('penyelia_terima_slip_keputusan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifikasi_emails', function (Blueprint $table) {
            $table->dropColumn('penyelia_terima_surat_tawaran');
            $table->dropColumn('penyelia_terima_sijil_kelulusan');
            $table->dropColumn('penyelia_terima_slip_keputusan');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPeringatanTukarKataLaluanToNotifikasiEmails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifikasi_emails', function (Blueprint $table) {
            $table->integer('peringatan_tukar_katalaluan')->nullable();
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
            $table->dropColumn('peringatan_tukar_katalaluan');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddcolumnBankjawapancalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bankjawapancalons', function (Blueprint $table) {
            $table->renameColumn('id_soalan_kemahiran', 'id_soalankemahiraninternet');
            $table->integer('id_soalankemahiranword')->nullable();
            $table->integer('id_soalankemahiranemail')->nullable();
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

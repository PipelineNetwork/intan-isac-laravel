<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalankemahiraninternetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soalankemahiraninternets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tahap_soalan', 255)->nullable();
            $table->text('arahan_umum')->nullable();
            $table->text('arahan_soalan')->nullable();
            $table->integer('status_soalan')->nullable();
            $table->foreignId('id_soalankemahiran')->nullable();
            $table->text('soalan_1')->nullable();
            $table->text('jawapan_1')->nullable();
            $table->integer('markah_1')->nullable();
            $table->text('soalan_2')->nullable();
            $table->text('jawapan_2')->nullable();
            $table->integer('markah_2')->nullable();
            $table->text('soalan_3')->nullable();
            $table->text('jawapan_3')->nullable();
            $table->integer('markah_3')->nullable();
            $table->text('soalan_4')->nullable();
            $table->text('jawapan_4')->nullable();
            $table->integer('markah_4')->nullable();
            $table->text('soalan_5')->nullable();
            $table->text('jawapan_5')->nullable();
            $table->integer('markah_5')->nullable();
            $table->text('soalan_6')->nullable();
            $table->text('jawapan_6')->nullable();
            $table->integer('markah_6')->nullable();
            $table->text('soalan_7')->nullable();
            $table->text('jawapan_7')->nullable();
            $table->integer('markah_7')->nullable();
            $table->text('soalan_8')->nullable();
            $table->text('jawapan_8')->nullable();
            $table->integer('markah_8')->nullable();
            $table->text('soalan_9')->nullable();
            $table->text('jawapan_9')->nullable();
            $table->integer('markah_9')->nullable();
            $table->text('soalan_10')->nullable();
            $table->text('jawapan_10')->nullable();
            $table->integer('markah_10')->nullable();
            $table->text('soalan_11')->nullable();
            $table->text('jawapan_11')->nullable();
            $table->integer('markah_11')->nullable();
            $table->text('soalan_12')->nullable();
            $table->text('jawapan_12')->nullable();
            $table->integer('markah_12')->nullable();
            $table->text('soalan_13')->nullable();
            $table->text('jawapan_13')->nullable();
            $table->integer('markah_13')->nullable();
            $table->text('soalan_14')->nullable();
            $table->text('jawapan_14')->nullable();
            $table->integer('markah_14')->nullable();
            $table->text('soalan_15')->nullable();
            $table->text('jawapan_15')->nullable();
            $table->integer('markah_15')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soalankemahiraninternets');
    }
}

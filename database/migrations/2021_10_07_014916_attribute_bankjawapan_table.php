<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttributeBankjawapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banksoalanpengetahuans', function (Blueprint $table) {
            $table->integer('id_tahap_soalan')->nullable();
            $table->integer('id_kategori_pengetahuan')->nullable();
            $table->enum('jenis_soalan', ['fill_in_the_blank', 'multiple_choice', 'ranking', 'single_choice', 'true_or_false']);
            $table->string('knowledge_area', 255)->nullable();
            $table->string('topik_soalan', 255)->nullable();
            $table->text('penyataan_soalan')->nullable();
            $table->string('muat_naik_fail')->nullable();
            $table->integer('id_status_soalan')->nullable();
            $table->string('pilihan_jawapan', 255)->nullable();
            $table->text('jawapan')->nullable();
        });

        Schema::table('banksoalankemahirans', function (Blueprint $table) {
            $table->integer('id_set_soalan')->nullable();
            $table->integer('id_bahagian_internet')->nullable();
            $table->integer('id_bahagian_word')->nullable();
            $table->integer('id_bahagian_emel')->nullable();
            $table->text('arahan_umum')->nullable();
            $table->text('arahan_soalan')->nullable();
            $table->integer('id_status_soalan')->nullable();
        });

        Schema::table('bankjawapanpengetahuans', function (Blueprint $table) {
            $table->foreignId('id_soalan_pengetahuan')->nullable();
            $table->string('pilihan_jawapan', 255)->nullable();
            $table->text('jawapan')->nullable();
            $table->integer('markah')->nullable();
        });

        Schema::table('bankjawapankemahirans', function (Blueprint $table) {
            $table->foreignId('id_soalan_kemahiran')->nullable();
            $table->text('skema_jawapan')->nullable();
            $table->integer('markah')->nullable();
        });

        Schema::table('bankjawapancalons', function (Blueprint $table) {
            $table->foreignId('id_soalan_pengetahuan')->nullable();
            // $table->foreignId('id_jawapan_pengetahuan')->nullable();
            $table->string('keputusan_pengetahuan', 255)->nullable();
            $table->integer('markah_pengetahuan')->nullable();
            $table->foreignId('id_soalan_kemahiran')->nullable();
            // $table->foreignId('id_jawapan_kemahiran')->nullable();
            $table->string('keputusan_kemahiran', 255)->nullable();
            $table->integer('markah_kemahiran')->nullable();
            $table->string('markah_akhir_calon', 255)->nullable();
            $table->string('keputusan_akhir', 255)->nullable();
            $table->foreignId('user_id')->nullable();
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

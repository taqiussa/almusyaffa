<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nis')->unique()->nullable();
            $table->string('nama')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->string('agama')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('skhun')->nullable();
            $table->string('no_ujian')->nullable();
            $table->string('no_ijazah')->nullable();
            $table->string('no_kps')->nullable();
            $table->string('tahun')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBkDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bk_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bk_id')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('bentuk_bimbingan')->nullable();
            $table->string('jenis_bimbingan')->nullable();
            $table->foreignId('kelas_id')->nullable();
            $table->string('tahun')->nullable();
            $table->foreignId('nis')->nullable();
            $table->text('permasalahan')->nullable();
            $table->text('penyelesaian')->nullable();
            $table->text('tindak_lanjut')->nullable();
            $table->string('foto')->nullable();
            $table->string('foto_dokumen')->nullable();
            $table->string('slug');
            $table->string('user_name');
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
        Schema::dropIfExists('bk_detail');
    }
}

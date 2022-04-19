<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->nullable();
            $table->string('nama')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nama_kelas')->nullable();
            $table->string('tahun')->nullable();
            $table->string('nik')->nullable();
            $table->string('agama')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('skhun')->nullable();
            $table->string('no_ujian')->nullable();
            $table->string('no_ijazah')->nullable();
            $table->string('no_kps')->nullable();
            $table->string('status')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('desa')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('nama_sekolah_sd')->nullable();
            $table->string('desa_sekolah_sd')->nullable();
            $table->string('kecamatan_sekolah_sd')->nullable();
            $table->string('kabupaten_sekolah_sd')->nullable();
            $table->string('provinsi_sekolah_sd')->nullable();
            $table->string('kode_pos_sekolah_sd')->nullable();
            $table->string('nama_sekolah_asal')->nullable();
            $table->string('desa_sekolah_asal')->nullable();
            $table->string('kecamatan_sekolah_asal')->nullable();
            $table->string('kabupaten_sekolah_asal')->nullable();
            $table->string('provinsi_sekolah_asal')->nullable();
            $table->string('kode_pos_sekolah_asal')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('tempat_lahir_ayah')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('tempat_lahir_ibu')->nullable();
            $table->string('tanggal_lahir_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('jenis_kelamin_wali')->nullable();
            $table->string('tempat_lahir_wali')->nullable();
            $table->date('tanggal_lahir_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('penghasilan_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
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
        Schema::dropIfExists('data_siswa');
    }
}

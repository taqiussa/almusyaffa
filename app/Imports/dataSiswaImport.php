<?php

namespace App\Imports;

use App\Models\DataSiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class dataSiswaImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataSiswa([
            'nis' => $row['nis'],
            'nama' => $row['nama'],
            'nisn' => $row['nisn'],
            'nama_kelas' => $row['nama_kelas'],
            'tahun' => $row['tahun'],
            'nik' => $row['nik'],
            'agama' => $row['agama'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'telepon' => $row['telepon'],
            'email' => $row['email'],
            'skhun' => $row['skhun'],
            'no_ujian' => $row['no_ujian'],
            'no_ijazah' => $row['no_ijazah'],
            'no_kps' => $row['no_kps'],
            'status' => $row['status'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            'desa' => $row['desa'],
            'kelurahan' => $row['kelurahan'],
            'kecamatan' => $row['kecamatan'],
            'kabupaten' => $row['kabupaten'],
            'provinsi' => $row['nis'],
            'nama_sekolah_sd' => $row['nama_sekolah_sd'],
            'desa_sekolah_sd' => $row['desa_sekolah_sd'],
            'kecamatan_sekolah_sd' => $row['kecamatan_sekolah_sd'],
            'kabupaten_sekolah_sd' => $row['kabupaten_sekolah_sd'],
            'provinsi_sekolah_sd' => $row['provinsi_sekolah_sd'],
            'kode_pos_sekolah_sd' => $row['kode_pos_sekolah_sd'],
            'nama_sekolah_asal' => $row['nama_sekolah_asal'],
            'desa_sekolah_asal' => $row['desa_sekolah_asal'],
            'kecamatan_sekolah_asal' => $row['kecamatan_sekolah_asal'],
            'kabupaten_sekolah_asal' => $row['kabupaten_sekolah_asal'],
            'provinsi_sekolah_asal' => $row['provinsi_sekolah_asal'],
            'kode_pos_sekolah_asal' => $row['kode_pos_sekolah_asal'],
            'nama_ayah' => $row['nama_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'tempat_lahir_ayah' => $row['tempat_lahir_ayah'],
            'tanggal_lahir_ayah' => $row['tanggal_lahir_ayah'],
            'pekerjaan_ayah' => $row['pekerjaan_ayah'],
            'penghasilan_ayah' => $row['penghasilan_ayah'],
            'pendidikan_ayah' => $row['pendidikan_ayah'],
            'tempat_lahir_ibu' => $row['tempat_lahir_ibu'],
            'tanggal_lahir_ibu' => $row['tanggal_lahir_ibu'],
            'pekerjaan_ibu' => $row['pekerjaan_ibu'],
            'penghasilan_ibu' => $row['penghasilan_ibu'],
            'pendidikan_ibu' => $row['pendidikan_ibu'],
            'nama_wali' => $row['nama_wali'],
            'jenis_kelamin_wali' => $row['jenis_kelamin_wali'],
            'tempat_lahir_wali' => $row['tempat_lahir_wali'],
            'tanggal_lahir_wali' => $row['tanggal_lahir_wali'],
            'pekerjaan_wali' => $row['pekerjaan_wali'],
            'penghasilan_wali' => $row['penghasilan_wali'],
            'pendidikan_wali' => $row['pendidikan_wali'],
        ]);
    }
    public function batchSize(): int
    {
        return 100;
    }
    
    public function chunkSize(): int
    {
        return 100;
    }
}

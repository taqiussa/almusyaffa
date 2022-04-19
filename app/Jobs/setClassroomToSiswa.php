<?php

namespace App\Jobs;

use App\Models\DataSiswa;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class setClassroomToSiswa implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = DataSiswa::get();
        foreach($data as $siswa){
            $kelas = Kelas::where('nama', $siswa->nama_kelas)->first();
            Siswa::create([
                'nis' => $siswa->nis,
                'kelas_id' => $kelas->id,
                'tahun' => $siswa->tahun,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Kehadiran;
use Illuminate\Database\Seeder;

class KehadiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            'Hadir',
            'Sakit',
            'Izin',
            'Alpha',
            'Bolos',
            'Izin Pulang',
        ];
        foreach($datas as $data){
            Kehadiran::create([
                'nama' => $data
            ]);
        }
    }
}

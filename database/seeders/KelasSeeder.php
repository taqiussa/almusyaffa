<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classrooms = [
            ['tingkat' => '7', 'nama' => '7.A'],
            ['tingkat' => '7', 'nama' => '7.B'],
            ['tingkat' => '7', 'nama' => '7.C'],
            ['tingkat' => '7', 'nama' => '7.D'],
            ['tingkat' => '7', 'nama' => '7.E'],
            ['tingkat' => '7', 'nama' => '7.F'],
            ['tingkat' => '7', 'nama' => '7.G'],
            ['tingkat' => '7', 'nama' => '7.H'],
            ['tingkat' => '7', 'nama' => '7.I'],
            ['tingkat' => '7', 'nama' => '7.J'],
            ['tingkat' => '7', 'nama' => '7.K'],
            ['tingkat' => '8', 'nama' => '8.A'],
            ['tingkat' => '8', 'nama' => '8.B'],
            ['tingkat' => '8', 'nama' => '8.C'],
            ['tingkat' => '8', 'nama' => '8.D'],
            ['tingkat' => '8', 'nama' => '8.E'],
            ['tingkat' => '8', 'nama' => '8.F'],
            ['tingkat' => '8', 'nama' => '8.G'],
            ['tingkat' => '8', 'nama' => '8.H'],
            ['tingkat' => '8', 'nama' => '8.I'],
            ['tingkat' => '8', 'nama' => '8.J'],
            ['tingkat' => '8', 'nama' => '8.K'],
            ['tingkat' => '9', 'nama' => '9.A'],
            ['tingkat' => '9', 'nama' => '9.B'],
            ['tingkat' => '9', 'nama' => '9.C'],
            ['tingkat' => '9', 'nama' => '9.D'],
            ['tingkat' => '9', 'nama' => '9.E'],
            ['tingkat' => '9', 'nama' => '9.F'],
            ['tingkat' => '9', 'nama' => '9.G'],
            ['tingkat' => '9', 'nama' => '9.H'],
            ['tingkat' => '9', 'nama' => '9.I'],
            ['tingkat' => '9', 'nama' => '9.J'],
            ['tingkat' => '9', 'nama' => '9.K'],
            ];
        foreach($classrooms as $classroom){
            Kelas::create([
                'tingkat' => $classroom['tingkat'],
                'nama' => $classroom['nama'],
            ]);
        }
    }
}

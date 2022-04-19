<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('asdfasdf'),
        ]);
        $guru = User::create([
            'name' => 'Guru',
            'email' => 'guru@gmail.com',
            'password' => Hash::make('asdfasdf'),
        ]);
        $konseling = User::create([
            'name' => 'Konseling',
            'email' => 'konseling@gmail.com',
            'password' => Hash::make('asdfasdf'),
        ]);
        $siswa = User::create([
            'name' => 'Siswa',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('asdfasdf'),
        ]);
        
        $admin->assignRole('Admin');
        $guru->assignRole('Guru');
        $konseling->assignRole('Konseling');
        $siswa->assignRole('Siswa');
    }
}

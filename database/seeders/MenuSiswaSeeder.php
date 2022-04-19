<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $studentMenu = Menu::create([
            'name' => 'Siswa',
            'icon' => 'user',
            'route' => ''
        ]);
        $studentMenu->role_id = 1;
        $studentMenu->save();
        $studentSubMenus = [
            [
                'name' => 'Tambah Siswa',
                'route' => 'tambah-siswa'
            ]
        ];
        foreach ($studentSubMenus as $studentSubMenu) {
            $studentMenu->subMenus()->create([
                'name' => $studentSubMenu['name'],
                'route' => $studentSubMenu['route']
            ]);
        }
    }
}

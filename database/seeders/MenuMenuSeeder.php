<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
            'name' => 'Menu',
            'icon' => 'list',
            'route' => ''
        ]);
        $menu->role_id = 1;
        $menu->save();
        $subMenus = [
            [
                'name' => 'Header dan Role',
                'route' => 'header-role'
            ],
            [
                'name' => 'Import Data Siswa',
                'route' => 'import-data-siswa'
            ],
            [
                'name' => 'List Menu',
                'route' => 'list-menu'
            ],
            [
                'name' => 'Set Role',
                'route' => 'set-role'
            ],
            [
                'name' => 'Set Role Siswa',
                'route' => 'set-role-siswa'
            ],
            [
                'name' => 'Tambah Kelas',
                'route' => 'tambah-kelas'
            ],
            [
                'name' => 'Tambah Menu',
                'route' => 'tambah-menu'
            ],
        ];
        foreach ($subMenus as $subMenu) {
            $menu->subMenus()->create([
                'name' => $subMenu['name'],
                'route' => $subMenu['route'],
            ]);
        }
    }
}

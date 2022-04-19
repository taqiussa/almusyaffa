<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guruMenu = Menu::create([
            'name' => 'Guru',
            'icon' => 'user',
            'route' => '',
        ]);
        $guruMenu->role_id = 1;
        $guruMenu->save();
        $guruSubMenus = [
                [
                    'name' => 'List Guru',
                    'route' => 'list-guru',
                ],
                [
                    'name' => 'Tambah Guru',
                    'route' => 'tambah-guru'
                ]
            ];
        foreach ($guruSubMenus as $guruSubMenu){
            $guruMenu->subMenus()->create([
                'name' => $guruSubMenu['name'],
                'route' => $guruSubMenu['route']
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuKonselingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $konselingMenu = Menu::create([
            'name' => 'Absensi',
            'icon' => 'clipboard',
            'route' => '',
        ]);
        $konselingMenu->role_id = 3;
        $konselingMenu->save();
        $konselingSubMenus = [
            [
                'name' => 'Absensi Siswa',
                'route' => 'konseling.absensi-siswa'
            ],
            [
                'name' => 'Cek List Absensi',
                'route' => 'konseling.cek-list-absensi'
            ],
            [
                'name' => 'Cek List Kehadiran',
                'route' => 'konseling.cek-list-kehadiran'
            ],
            [
                'name' => 'Cek Alpha / Bolos',
                'route' => 'konseling.cek-alpha-bolos'
            ],
            [
                'name' => 'Rekap Kehadiran',
                'route' => 'konseling.rekap-kehadiran'
            ],
        ];
        foreach ($konselingSubMenus as $konselingSubMenu) {
            $konselingMenu->subMenus()->create([
                'name' => $konselingSubMenu['name'],
                'route' => $konselingSubMenu['route'],
            ]);
        }
        $konselingMenu2 = Menu::create([
            'name' => 'Layanan',
            'icon' => 'edit-3',
            'route' => '',
        ]);
        $konselingMenu2->role_id = 3;
        $konselingMenu2->save();
        $konselingSubMenus2 = [
            [
                'name' => 'Bimbingan dan Konseling',
                'route' => 'konseling.layanan-bimbingan-konseling'
            ],
            [
                'name' => 'Rekap Bimbingan',
                'route' => 'konseling.rekap-bimbingan'
            ],
        ];
        foreach ($konselingSubMenus2 as $konselingSubMenu) {
            $konselingMenu2->subMenus()->create([
                'name' => $konselingSubMenu['name'],
                'route' => $konselingSubMenu['route'],
            ]);
        }
    }
}

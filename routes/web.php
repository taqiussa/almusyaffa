<?php

use App\Http\Livewire\Admin\HeaderRole;
use App\Http\Livewire\Admin\ImportDataSiswa;
use App\Http\Livewire\Admin\ListGuru;
use App\Http\Livewire\Admin\ListMenu;
use App\Http\Livewire\Admin\TambahMenu;
use App\Http\Livewire\Admin\SetRole;
use App\Http\Livewire\Admin\SetRoleSiswa;
use App\Http\Livewire\Admin\TambahGuru;
use App\Http\Livewire\Admin\TambahKelas;
use App\Http\Livewire\Home;
use App\Http\Livewire\Konseling\AbsensiBk;
use App\Http\Livewire\Konseling\AbsensiSiswa;
use App\Http\Livewire\Konseling\CekAlphaBolos;
use App\Http\Livewire\Konseling\CekListAbsensi;
use App\Http\Livewire\Konseling\CekListKehadiran;
use App\Http\Livewire\Konseling\DetailBimbingan;
use App\Http\Livewire\Konseling\LayananBimbingan;
use App\Http\Livewire\Konseling\RekapBimbingan;
use App\Http\Livewire\Konseling\RekapKehadiran;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', Home::class)->name('home');
    //Role Admin Menu
    Route::get('/set-kelas-siswa', function () {
        return view();
    })->name('set-kelas-siswa');
    Route::get('/tambah-user', function () {
        return view();
    })->name('tambah-user');
    Route::get('/tambah-siswa', function () {
        return view();
    })->name('tambah-siswa');
    Route::get('/set-role-siswa', SetRoleSiswa::class)->name('set-role-siswa');
    Route::get('/import-data-siswa', ImportDataSiswa::class)->name('import-data-siswa');
    Route::get('/list-guru', ListGuru::class)->name('list-guru');
    Route::get('/tambah-guru', TambahGuru::class)->name('tambah-guru');
    Route::get('/tambah-kelas', TambahKelas::class)->name('tambah-kelas');
    Route::get('/list-menu', ListMenu::class)->name('list-menu');
    Route::get('/header-role', HeaderRole::class)->name('header-role');
    Route::get('/tambah-menu', TambahMenu::class)->name('tambah-menu');
    Route::get('/set-role', SetRole::class)->name('set-role');

    //Role Konseling
    Route::get('/konseling/absensi-siswa', AbsensiSiswa::class)->name('konseling.absensi-siswa');
    Route::get('/konseling/absensi-bk', AbsensiBk::class)->name('konseling.absensi-bk');
    Route::get('/konseling/cek-list-absensi', CekListAbsensi::class)->name('konseling.cek-list-absensi');
    Route::get('/konseling/cek-list-kehadiran', CekListKehadiran::class)->name('konseling.cek-list-kehadiran');
    Route::get('/konseling/cek-alpha-bolos', CekAlphaBolos::class)->name('konseling.cek-alpha-bolos');
    Route::get('/konseling/rekap-kehadiran', RekapKehadiran::class)->name('konseling.rekap-kehadiran');
    Route::get('/Konseling/layanan-bimbingan-konseling', LayananBimbingan::class)->name('konseling.layanan-bimbingan-konseling');
    Route::get('/konseling/rekap-bimbingan', RekapBimbingan::class)->name('konseling.rekap-bimbingan');
    Route::get('/konseling/detail-bimbingan/{slug}', DetailBimbingan::class)->name('konseling.detail-bimbingan');
});
Auth::routes();


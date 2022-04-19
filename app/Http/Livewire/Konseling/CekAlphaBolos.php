<?php

namespace App\Http\Livewire\Konseling;

use App\Models\Absensi;
use Livewire\Component;
use App\Models\User;

class CekAlphaBolos extends Component
{
    public $tahun;
    public $tanggalAwal;
    public $tanggalAkhir;
    public $cekSiswa = [];
    public function render()
    {
        return view('livewire.konseling.cek-alpha-bolos');
    }
    public function mount()
    {
        $bulan = gmdate('m');
        $tahun = gmdate('Y');
        //make tahun ajaran based on month
        if ($bulan < 7) {
            $this->tahun = ($tahun - 1) . '/' . ($tahun);
        } else {
            $this->tahun = $tahun . '/' . ($tahun + 1);
        }
        $this->tanggalAwal = gmdate('Y-m-d');
        $this->tanggalAkhir = gmdate('Y-m-d');
        $this->getKehadiranSiswa();
    }
    public function updatedTanggalAwal()
    {
        $this->getKehadiranSiswa();
    }
    public function updatedTanggalAkhir()
    {
        $this->getKehadiranSiswa();
    }

    private function getKehadiranSiswa()
    {
        $this->cekSiswa =  [
            '1-2' =>
            Absensi::whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])
                ->where('jam', '1-2')
                ->where('tahun', $this->tahun)
                ->join('users', 'absensi.nis', '=', 'users.nis')
                ->join('kehadiran', 'absensi.kehadiran_id', '=', 'kehadiran.id')
                ->join('kelas', 'absensi.kelas_id', '=', 'kelas.id')
                ->select(
                    'users.name as nama',
                    'kehadiran.nama as nama_kehadiran',
                    'kelas.nama as nama_kelas',
                    'absensi.tanggal as tanggal'
                )
                ->where(
                    fn ($query) =>
                    $query->where('kehadiran.nama', 'Alpha')
                        ->orWhere('kehadiran.nama', 'Bolos')
                )
                ->get(),
            '3-4' =>
            Absensi::whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])
                ->where('jam', '3-4')
                ->where('tahun', $this->tahun)
                ->join('users', 'absensi.nis', '=', 'users.nis')
                ->join('kehadiran', 'absensi.kehadiran_id', '=', 'kehadiran.id')
                ->join('kelas', 'absensi.kelas_id', '=', 'kelas.id')
                ->select(
                    'users.name as nama',
                    'kehadiran.nama as nama_kehadiran',
                    'kelas.nama as nama_kelas',
                    'absensi.tanggal as tanggal'
                )
                ->where(
                    fn ($query) =>
                    $query->where('kehadiran.nama', 'Alpha')
                        ->orWhere('kehadiran.nama', 'Bolos')
                )
                ->get(),
            '5-6' =>
            Absensi::whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])
                ->where('jam', '5-6')
                ->where('tahun', $this->tahun)
                ->join('users', 'absensi.nis', '=', 'users.nis')
                ->join('kehadiran', 'absensi.kehadiran_id', '=', 'kehadiran.id')
                ->join('kelas', 'absensi.kelas_id', '=', 'kelas.id')
                ->select(
                    'users.name as nama',
                    'kehadiran.nama as nama_kehadiran',
                    'kelas.nama as nama_kelas',
                    'absensi.tanggal as tanggal'
                )
                ->where(
                    fn ($query) =>
                    $query->where('kehadiran.nama', 'Alpha')
                        ->orWhere('kehadiran.nama', 'Bolos')
                )
                ->get(),
            '7-8' =>
            Absensi::whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])
                ->where('jam', '7-8')
                ->where('tahun', $this->tahun)
                ->join('users', 'absensi.nis', '=', 'users.nis')
                ->join('kehadiran', 'absensi.kehadiran_id', '=', 'kehadiran.id')
                ->join('kelas', 'absensi.kelas_id', '=', 'kelas.id')
                ->select(
                    'users.name as nama',
                    'kehadiran.nama as nama_kehadiran',
                    'kelas.nama as nama_kelas',
                    'absensi.tanggal as tanggal'
                )
                ->where(
                    fn ($query) =>
                    $query->where('kehadiran.nama', 'Alpha')
                        ->orWhere('kehadiran.nama', 'Bolos')
                )
                ->get(),
        ];
    }
}

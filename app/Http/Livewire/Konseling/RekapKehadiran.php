<?php

namespace App\Http\Livewire\Konseling;

use App\Models\Absensi;
use Livewire\Component;

class RekapKehadiran extends Component
{
    public $tanggal;
    public $tahun;
    public $hadir;
    public $sakit;
    public $izin;
    public $alpha;
    public $bolos;
    public $pulang;
    public function render()
    {
        $this->cekRekap();
        return view('livewire.konseling.rekap-kehadiran');
    }
    public function mount(){
        $bulan = gmdate('m');
        $tahun = gmdate('Y');
        //make tahun ajaran based on month
        if ($bulan < 7) {
            $this->tahun = ($tahun - 1) . '/' . ($tahun);
        } else {
            $this->tahun = $tahun . '/' . ($tahun + 1);
        }
        $this->tanggal = gmdate('Y-m-d');
    }
    private function cekRekap(){
        $this->hadir = Absensi::join('kehadiran','kehadiran.id', '=', 'absensi.kehadiran_id')
                            ->where('absensi.tanggal',$this->tanggal)
                            ->where('absensi.tahun', $this->tahun)
                            ->where('kehadiran.nama','Hadir')
                            ->count();
        $this->sakit = Absensi::join('kehadiran','kehadiran.id', '=', 'absensi.kehadiran_id')
                            ->where('absensi.tanggal',$this->tanggal)
                            ->where('absensi.tahun', $this->tahun)
                            ->where('kehadiran.nama','Sakit')
                            ->count();
        $this->izin = Absensi::join('kehadiran','kehadiran.id', '=', 'absensi.kehadiran_id')
                            ->where('absensi.tanggal',$this->tanggal)
                            ->where('absensi.tahun', $this->tahun)
                            ->where('kehadiran.nama','Izin')
                            ->count();
        $this->alpha = Absensi::join('kehadiran','kehadiran.id', '=', 'absensi.kehadiran_id')
                            ->where('absensi.tanggal',$this->tanggal)
                            ->where('absensi.tahun', $this->tahun)
                            ->where('kehadiran.nama','Alpha')
                            ->count();
        $this->bolos = Absensi::join('kehadiran','kehadiran.id', '=', 'absensi.kehadiran_id')
                            ->where('absensi.tanggal',$this->tanggal)
                            ->where('absensi.tahun', $this->tahun)
                            ->where('kehadiran.nama','Bolos')
                            ->count();
        $this->pulang = Absensi::join('kehadiran','kehadiran.id', '=', 'absensi.kehadiran_id')
                            ->where('absensi.tanggal',$this->tanggal)
                            ->where('absensi.tahun', $this->tahun)
                            ->where('kehadiran.nama','Izin Pulang')
                            ->count();
    }
}

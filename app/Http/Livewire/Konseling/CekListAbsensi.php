<?php

namespace App\Http\Livewire\Konseling;

use App\Models\Absensi;
use App\Models\Kelas;
use Livewire\Component;

class CekListAbsensi extends Component
{
    public $tahun;
    public $checkList = [];
    public $setIds = [];
    public $tanggal;
    public $classrooms;
    public function render()
    {
        return view('livewire.konseling.cek-list-absensi');
    }
    public function updatedTanggal()
    {
        $this->checkAttend();
    }
    public function mount()
    {
        $this->tanggal = gmdate('Y-m-d');
        $this->checkAttend();
    }
    private function checkAttend()
    {
        $bulan = gmdate('m');
        $tahun = gmdate('Y');
        //make tahun ajaran based on month
        if ($bulan < 7) {
            $this->tahun = ($tahun - 1) . '/' . ($tahun);
        } else {
            $this->tahun = $tahun . '/' . ($tahun + 1);
        }
        //make classroom view data
        $this->classrooms = Kelas::orderBy('tingkat')
            ->orderBy('nama')
            ->get();
        //set User Id to Check On Attendance User
        foreach ($this->classrooms as $key => $classroom) {
            //getting the data of user attendances
            $this->checkList[$key] = [
                'show1-2' => Absensi::where('jam', '1-2')
                    ->where('tanggal', $this->tanggal)
                    ->where('kelas_id',$classroom->id)
                    ->where('tahun', $this->tahun)
                    ->get(),
                'show3-4' => Absensi::where('jam', '3-4')
                    ->where('tanggal', $this->tanggal)
                    ->where('kelas_id',$classroom->id)
                    ->where('tahun', $this->tahun)
                    ->get(),
                'show5-6' => Absensi::where('jam', '5-6')
                    ->where('tanggal', $this->tanggal)
                    ->where('kelas_id',$classroom->id)
                    ->where('tahun', $this->tahun)
                    ->get(),
                'show7-8' => Absensi::where('jam', '7-8')
                    ->where('tanggal', $this->tanggal)
                    ->where('kelas_id',$classroom->id)
                    ->where('tahun', $this->tahun)
                    ->get(),
            ];
        }
    }
}

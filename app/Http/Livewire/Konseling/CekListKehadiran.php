<?php

namespace App\Http\Livewire\Konseling;

use App\Models\Absensi;
use App\Models\Kehadiran;
use App\Models\Kelas;
use Livewire\Component;

class CekListKehadiran extends Component
{
    public $kelas;
    public $tahun;
    public $tanggal;
    public $kehadiran;
    public $selectedKelas;
    public $searchKehadiran = [];
    // public $checkList = [];
    // public $classrooms;
    // public $attendances;
    // public $attendanceCount = [];
    public function render()
    {
        
        return view('livewire.konseling.cek-list-kehadiran',[
            'listKelas' => Kelas::orderBy('tingkat')->orderBy('nama')->get(),
        ]);
    }
    public function mount(){
        $this->tanggal = gmdate('Y-m-d');
    }
    public function updatedTanggal()
    {
        $this->cekKehadiran();
    }
    public function updatedKelas(){
        $this->cekKehadiran();
    }
    private function cekKehadiran(){
        $bulan = gmdate('m');
        $tahun = gmdate('Y');
        //make tahun ajaran based on month
        if ($bulan < 7) {
            $this->tahun = ($tahun - 1) . '/' . ($tahun);
        } else {
            $this->tahun = $tahun . '/' . ($tahun + 1);
        }
        $this->kehadiran = Kehadiran::orderBy('id')->get();
        $this->selectedKelas = Kelas::where('id', $this->kelas)
                                        ->first();
        foreach($this->kehadiran as $key => $listKehadiran){

            $this->searchKehadiran[$key] = 
            [
                'count1-2' => Absensi::where('kelas_id', $this->kelas)
                                            ->where('kehadiran_id', $listKehadiran->id)
                                            ->where('tahun', $this->tahun)
                                            ->where('tanggal', $this->tanggal)
                                            ->where('jam', '1-2')
                                            ->count(),
                'count3-4' => Absensi::where('kelas_id', $this->kelas)
                                            ->where('kehadiran_id', $listKehadiran->id)
                                            ->where('tahun', $this->tahun)
                                            ->where('tanggal', $this->tanggal)
                                            ->where('jam', '3-4')
                                            ->count(),
                'count5-6' => Absensi::where('kelas_id', $this->kelas)
                                            ->where('kehadiran_id', $listKehadiran->id)
                                            ->where('tahun', $this->tahun)
                                            ->where('tanggal', $this->tanggal)
                                            ->where('jam', '5-6')
                                            ->count(),
                'count7-8' => Absensi::where('kelas_id', $this->kelas)
                                            ->where('kehadiran_id', $listKehadiran->id)
                                            ->where('tahun', $this->tahun)
                                            ->where('tanggal', $this->tanggal)
                                            ->where('jam', '7-8')
                                            ->count(),
            ];
        }
    }
    // public function checkAttend()
    // {
    //     $bulan = gmdate('m');
    //     $tahun = gmdate('Y');
    //     //make tahun ajaran based on month
    //     if ($bulan < 7) {
    //         $this->tahun = ($tahun - 1) . '/' . ($tahun);
    //     } else {
    //         $this->tahun = $tahun . '/' . ($tahun + 1);
    //     }
    //     //make classroom view data
    //     $this->classrooms = Kelas::orderBy('tingkat')
    //         ->orderBy('nama')
    //         ->get();
    //     //make attendance list
    //     $this->attendances = Kehadiran::orderBy('id')->get();
    //     //set User Id to Check On Attendance User
    //     foreach ($this->classrooms as $key => $classroom) {
    //         $this->checkList[$key] = [
    //             'show1-2' => Absensi::where('jam', '1-2')
    //                 ->where('tanggal', $this->tanggal)
    //                 ->where('kelas_id', $classroom->id)
    //                 ->where('tahun', $this->tahun)
    //                 ->get(),
    //             'show3-4' => Absensi::where('jam', '3-4')
    //                 ->where('tanggal', $this->tanggal)
    //                 ->where('kelas_id', $classroom->id)
    //                 ->where('tahun', $this->tahun)
    //                 ->get(),
    //             'show5-6' => Absensi::where('jam', '5-6')
    //                 ->where('tanggal', $this->tanggal)
    //                 ->where('kelas_id', $classroom->id)
    //                 ->where('tahun', $this->tahun)
    //                 ->get(),
    //             'show7-8' => Absensi::where('jam', '7-8')
    //                 ->where('tanggal', $this->tanggal)
    //                 ->where('kelas_id', $classroom->id)
    //                 ->where('tahun', $this->tahun)
    //                 ->get(),
    //         ];
    //         //count each attendances of user per classroom
    //         foreach ($this->attendances as $index => $attendance) {
    //             $this->attendanceCount[$key][$index] =
    //                 [
    //                     'count1-2' => Absensi::where('jam', '1-2')
    //                         ->where('tanggal', $this->tanggal)
    //                         ->where('kelas_id', $classroom->id)
    //                         ->where('tahun', $this->tahun)
    //                         ->where('kehadiran_id', $attendance->id)
    //                         ->count(),
    //                     'count3-4' => Absensi::where('jam', '3-4')
    //                         ->where('tanggal', $this->tanggal)
    //                         ->where('kelas_id', $classroom->id)
    //                         ->where('tahun', $this->tahun)
    //                         ->where('kehadiran_id', $attendance->id)
    //                         ->count(),
    //                     'count5-6' => Absensi::where('jam', '5-6')
    //                         ->where('tanggal', $this->tanggal)
    //                         ->where('kelas_id', $classroom->id)
    //                         ->where('tahun', $this->tahun)
    //                         ->where('kehadiran_id', $attendance->id)
    //                         ->count(),
    //                     'count7-8' => Absensi::where('jam', '7-8')
    //                         ->where('tanggal', $this->tanggal)
    //                         ->where('kelas_id', $classroom->id)
    //                         ->where('tahun', $this->tahun)
    //                         ->where('kehadiran_id', $attendance->id)
    //                         ->count(),
    //                 ];
    //         }
    //     }
    // }
}

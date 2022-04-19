<?php

namespace App\Http\Livewire\Konseling;

use App\Models\Absensi;
use App\Models\Kehadiran;
use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;

class AbsensiSiswa extends Component
{
    public $jam;
    public $kelas;
    public $tahun;
    public $setNis;
    public $tanggal;
    public $classrooms;
    public $attendance = [];
    public $attendances;
    public $userAttendances;
    public $users = [];
    protected $rules = [
        'attendance.*.attend' => 'required',
        'jam' => 'required',
        'tanggal' => 'required',
        'kelas' => 'required',
        'tahun' => 'required',
    ];
    protected $messages = [
        'attendance.*.attend.required' => 'Silahkan Pilih Kehadiran'
    ];
    public function render()
    {
        return view('livewire.konseling.absensi-siswa');
    }
    public function mount()
    {
        $tahunIni = gmdate('Y');
        $bulanIni = gmdate('m');
        if ($bulanIni <= 6) {
            $this->tahun = (intval($tahunIni) - 1) . '/' . intval($tahunIni);
        } else {
            $this->tahun = intval($tahunIni) . '/' . (intval($tahunIni) + 1);
        }
        $this->tanggal = gmdate('Y-m-d');
        $this->classrooms = Kelas::orderBy('tingkat')->orderBy('nama')->get();
        $this->attendances = Kehadiran::orderBy('id')->get();
    }
    public function hydrate(){
        $this->users = Siswa::join('users', 'siswa.nis', '=', 'users.nis')
            ->where('siswa.kelas_id', $this->kelas ?? '')
            ->where('siswa.tahun', $this->tahun ?? '')
            ->select(
                'users.name as name',
                'siswa.nis as nis',
            )
            ->orderBy('users.name')
            ->get();
    }
    public function save()
    {
        //validation
        $this->validate();
        //check Wether classroom has been listed
        $cekAbsen = Absensi::where('jam', $this->jam)
            ->where('tanggal', $this->tanggal)
            ->where('kelas_id', $this->kelas)
            ->where('tahun', $this->tahun)
            ->get();
        //if classroom hasn't been list
        if (blank($cekAbsen)) {
            //creating attendances list
            foreach ($this->users as $key => $user) {
                Absensi::create([
                    'nis' => $user->nis,
                    'kehadiran_id' => $this->attendance[$key]['attend'],
                    'kelas_id' => $this->kelas,
                    'tahun' => $this->tahun,
                    'tanggal' => $this->tanggal,
                    'jam' => $this->jam,
                ]);
            }
            $this->dispatchBrowserEvent('notyf:success', [
                'type' => 'success',
                'message' => 'Berhasil Absen Siswa',
            ]);
        } else {
            //if classroom has been list, update or creating (if there is empty array) the attendance list
            foreach ($this->users as $key => $user) {
                Absensi::updateOrCreate(
                    ['id' => $this->attendance[$key]['ids']],
                    [
                        'nis' => $user->nis,
                        'kehadiran_id' => $this->attendance[$key]['attend'],
                        'kelas_id' => $this->kelas,
                        'tahun' => $this->tahun,
                        'tanggal' => $this->tanggal,
                        'jam' => $this->jam,
                    ]
                );
            }
            $this->dispatchBrowserEvent('notyf:success', [
                'type' => 'warning',
                'message' => 'Berhasil Update Absen Siswa',
            ]);
        }
    }
    public function updatedTanggal()
    {
        $this->allProccess();
    }
    public function updatedJam()
    {
        $this->allProccess();
    }
    public function updatedKelas()
    {
        $this->allProccess();
    }
    public function updatedTahun()
    {
        $this->allProccess();
    }
    private function allProccess()
    {
        $this->resetErrorBag();
        //intialize array users and attendance data, so the data view become realistic
        $this->users = [];
        $this->attendance = [''];
        //make list of classroom student
        $this->users = Siswa::join('users', 'siswa.nis', '=', 'users.nis')
            ->where('siswa.kelas_id', $this->kelas)
            ->where('siswa.tahun', $this->tahun)
            ->select(
                'users.name as name',
                'siswa.nis as nis',
            )
            ->orderBy('users.name')
            ->get();
        //making list array of id's from classroom student to check on attendance table data
        // this code below supposed to used with many to many relationship
        // $this->setNis = Siswa::where('kelas_id', $this->kelas)
        //                     ->where('tahun', $this->tahun)
        //                     ->pluck('nis');
        //checking the attendance list based on array of id's from setNis
        $dataAbsen = Absensi::join('users','absensi.nis','=','users.nis')
            ->where('jam', $this->jam)
            ->where('tanggal', $this->tanggal)
            ->where('kelas_id', $this->kelas)
            ->where('tahun', $this->tahun)
            ->select(
                'users.name as name',
                'absensi.id as id',
                'absensi.jam as jam',
                'absensi.kehadiran_id as kehadiran_id',
            )
            ->orderBy('users.name')
            ->get();
        //if checking result null or the classroom hasn't been listed yet
        if (blank($dataAbsen)) {
            //this make initialization so the validation become make senses
            foreach ($this->users as $key => $cekUser) {
                $this->attendance[$key] = [
                    'ids' => '',
                    'attend' => ''
                ];
            }
        } else {
            //if checking has result attendancen list, make set of id's and attend ID so the user can view the result of the attendance list
            foreach ($dataAbsen as $key => $cekAbsen) {
                $this->attendance[$key] = [
                    'ids' => $cekAbsen->id,
                    'attend' => $cekAbsen->kehadiran_id,
                ];
            }
        }
    }
}

<?php

namespace App\Http\Livewire\Konseling;

use App\Models\Absensi;
use App\Models\Kehadiran;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;

class AbsensiBk extends Component
{
    public $tanggal;
    public $tahun;
    public $jam;
    public $kelas;
    public $siswa;
    public $kehadiran;
    public $attendances = [];
    public $classrooms = [];
    public $students = [];
    public $kelompokSiswa = [];
    public $isDisabled = '';
    public function render()
    {
        if ($this->kelompokSiswa) {
            $this->isDisabled = 'disabled';
        } else {
            $this->isDisabled = '';
        }
        $this->students = Siswa::where('kelas_id', $this->kelas)
            ->where('tahun', $this->tahun)
            ->join('users', 'users.nis', '=', 'siswa.nis')
            ->orderBy('users.name')
            ->get();
        return view('livewire.konseling.absensi-bk');
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
        $this->tanggal = gmdate('Y-m-d');
        $this->classrooms = Kelas::orderBy('nama')->get();
        $this->attendances = Kehadiran::skip(1)->take(5)->orderBy('id')->get();
    }
    public function tambahSiswa()
    {
        $this->validate([
            'kelas' => 'required',
            'siswa' => 'required',
            'kehadiran' => 'required',
            'jam' => 'required'
        ]);
        $cariKelas = Kelas::find($this->kelas);
        $cariSiswa = User::where('nis', $this->siswa)->first();
        $cariKehadiran = Kehadiran::find($this->kehadiran);
        $this->kelompokSiswa[] = [
            'idKelas' => $cariKelas->id,
            'namaKelas' => $cariKelas->nama,
            'nisSiswa' => $cariSiswa->nis,
            'namaSiswa' => $cariSiswa->name,
            'idKehadiran' => $cariKehadiran->id,
            'namaKehadiran' => $cariKehadiran->nama
        ];
        $this->siswa = '';
        $this->kehadiran = '';
    }
    public function hapusSiswa($key)
    {
        unset($this->kelompokSiswa[$key]);
        $this->kelompokSiswa = array_values($this->kelompokSiswa);
    }
    public function save()
    {
        $this->validate([
            'kelas' => 'required'
        ]);
        $cariSiswa = Siswa::where('kelas_id', $this->kelas)
            ->where('tahun', $this->tahun)
            ->get();
        $cariAbsensi =  Absensi::where('tahun', $this->tahun)
            ->where('kelas_id', $this->kelas)
            ->where('tanggal', $this->tanggal)
            ->where('jam', $this->jam)
            ->get();
        if (blank($cariAbsensi)) {
            foreach ($cariSiswa as $key => $siswaAbsen) {
                Absensi::create([
                    'nis' => $siswaAbsen->nis,
                    'kelas_id' => $this->kelas,
                    'kehadiran_id' => 1,
                    'tahun' => $this->tahun,
                    'tanggal' => $this->tanggal,
                    'jam' => $this->jam
                ]);
            }
            foreach ($this->kelompokSiswa as $key => $kelompokAbsen) {
                Absensi::where('nis', $kelompokAbsen['nisSiswa'])
                    ->where('tahun', $this->tahun)
                    ->where('kelas_id', $this->kelas)
                    ->where('tanggal', $this->tanggal)
                    ->where('jam', $this->jam)
                    ->update(['kehadiran_id' => $kelompokAbsen['idKehadiran']]);
            }
            $this->dispatchBrowserEvent('notyf:success', [
                'type' => 'success',
                'message' => 'Berhasil Absen Siswa'
            ]);
        }else{
            foreach ($this->kelompokSiswa as $key => $kelompokAbsen) {
                Absensi::where('nis', $kelompokAbsen['nisSiswa'])
                    ->where('tahun', $this->tahun)
                    ->where('kelas_id', $this->kelas)
                    ->where('tanggal', $this->tanggal)
                    ->where('jam', $this->jam)
                    ->update(['kehadiran_id' => $kelompokAbsen['idKehadiran']]);
            }
            $this->dispatchBrowserEvent('notyf:success', [
                'type' => 'warning',
                'message' => 'Berhasil Update Absen Siswa'
            ]);
        }
    }
}

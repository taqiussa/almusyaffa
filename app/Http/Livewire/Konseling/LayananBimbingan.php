<?php

namespace App\Http\Livewire\Konseling;

use App\Models\Bk;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananBimbingan extends Component
{
    use WithFileUploads;
    public $tahun;
    public $siswa;
    public $kelas;
    public $bentukBimbingan;
    public $tanggal;
    public $listKelas;
    public $listSiswa;
    public $jenisBimbingan;
    public $kelompokSiswa = [];
    public $permasalahan;
    public $penyelesaian;
    public $tindakLanjut;
    public $foto;
    public $fotoDokumen;
    protected $rules = [
        'permasalahan' => 'required',
        'penyelesaian' => 'required',
        'tindakLanjut' => 'required',
    ];
    public function render()
    {
        return view('livewire.konseling.layanan-bimbingan');
    }
    public function hydrate()
    {
        $this->listSiswa = [];
        $this->listKelas = Kelas::orderBy('nama')->get();
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
        $this->listKelas = Kelas::orderBy('nama')->get();
        $this->listSiswa = [];
    }
    public function updatedbentukBimbingan()
    {
        $this->kelas = '';
        $this->siswa = '';
        $this->listSiswa = [];
    }
    public function updatedKelas()
    {
        $this->listSiswa = Siswa::where('kelas_id', $this->kelas)
            ->where('tahun', $this->tahun)
            ->join('users', 'siswa.nis', '=', 'users.nis')
            ->select(
                'siswa.nis as nis',
                'users.name as name',
            )
            ->orderBY('users.name')
            ->get();
    }
    public function updatedFoto(){
        $this->resetErrorBag();
    }
    public function updatedFotoDokumen(){
        $this->resetErrorBag();
    }
    public function tambahKelompok()
    {
        $this->validate([
            'kelas' => 'required',
            'siswa' => 'required',
        ]);
        $cariKelas = Kelas::find($this->kelas);
        $cariSiswa = User::where('nis', $this->siswa)->first();
        $this->kelompokSiswa[] = [
            'idKelas' => $cariKelas->id,
            'namaKelas' => $cariKelas->nama,
            'nisSiswa' => $cariSiswa->nis,
            'namaSiswa' => $cariSiswa->name,
        ];
        $this->kelas = [];
        $this->siswa = '';
    }
    public function hapusKelompok($key)
    {
        unset($this->kelompokSiswa[$key]);
        $this->kelompokSiswa = array_values($this->kelompokSiswa);
    }
    public function save()
    {
        switch ($this->bentukBimbingan) {
            case 'individu':
                $this->resetErrorBag();
                $this->validate();
                if($this->foto){
                    $foto = $this->foto->store('foto');
                }else
                {
                    $foto = '';
                }
                if($this->fotoDokumen){
                    $fotoDokumen = $this->fotoDokumen->store('fotodokumen');
                }else{
                    $fotoDokumen = '';
                }
                $cariSiswa = User::where('nis', $this->siswa)->first();
                $bk = Bk::create([
                    'tanggal' => $this->tanggal,
                    'jenis_bimbingan' => $this->jenisBimbingan,
                    'bentuk_bimbingan' => $this->bentukBimbingan,
                    'kelas_id' => $this->kelas,
                    'tahun' => $this->tahun,
                    'nis' => $this->siswa,
                    'permasalahan' => $this->permasalahan,
                    'penyelesaian' => $this->penyelesaian,
                    'tindak_lanjut' => $this->tindakLanjut,
                    'foto' => $foto,
                    'foto_dokumen' => $fotoDokumen,
                ]);
                $bk->details()->create([
                    'tanggal' => $this->tanggal,
                    'jenis_bimbingan' => $this->jenisBimbingan,
                    'bentuk_bimbingan' => $this->bentukBimbingan,
                    'kelas_id' => $this->kelas,
                    'tahun' => $this->tahun,
                    'nis' => $this->siswa,
                    'user_name' => $cariSiswa->name,
                    'permasalahan' => $this->permasalahan,
                    'penyelesaian' => $this->penyelesaian,
                    'tindak_lanjut' => $this->tindakLanjut,
                    'foto' => $foto,
                    'foto_dokumen' => $fotoDokumen,
                ]);
                $this->dispatchBrowserEvent('notyf:success', [
                    'type' => 'success',
                    'message' => 'Berhasil Menyimpan Bimbingan Individu',
                ]);
                $this->clearVar();
                break;
            case 'kelompok':
                $this->resetErrorBag();
                $this->validate();
                if($this->foto){
                    $foto = $this->foto->store('foto');
                }else
                {
                    $foto = '';
                }
                if($this->fotoDokumen){
                    $fotoDokumen = $this->fotoDokumen->store('fotodokumen');
                }else{
                    $fotoDokumen = '';
                }
                $bk = Bk::create([
                    'tanggal' => $this->tanggal,
                    'jenis_bimbingan' => $this->jenisBimbingan,
                    'bentuk_bimbingan' => $this->bentukBimbingan,
                    'kelas_id' => $this->kelompokSiswa[0]['idKelas'],
                    'tahun' => $this->tahun,
                    'nis' => $this->kelompokSiswa[0]['nisSiswa'],
                    'permasalahan' => $this->permasalahan,
                    'penyelesaian' => $this->penyelesaian,
                    'tindak_lanjut' => $this->tindakLanjut,
                    'foto' => $foto,
                    'foto_dokumen' => $fotoDokumen,
                ]);
                foreach($this->kelompokSiswa as $key => $kelompok){
                    $bk->details()->create([
                        'tanggal' => $this->tanggal,
                        'jenis_bimbingan' => $this->jenisBimbingan,
                        'bentuk_bimbingan' => $this->bentukBimbingan,
                        'kelas_id' => $kelompok['idKelas'],
                        'tahun' => $this->tahun,
                        'nis' => $kelompok['nisSiswa'],
                        'user_name' => $kelompok['namaSiswa'],
                        'permasalahan' => $this->permasalahan,
                        'penyelesaian' => $this->penyelesaian,
                        'tindak_lanjut' => $this->tindakLanjut,
                        'foto' => $foto,
                        'foto_dokumen' => $fotoDokumen,
                    ]);
                }
                $this->clearVar();
                $this->kelompokSiswa = [];
                $this->dispatchBrowserEvent('notyf:success', [
                    'type' => 'success',
                    'message' => 'Berhasil Menyimpan Bimbingan Kelompok',
                ]);
                break;
            case 'kelas':
                $this->resetErrorBag();
                $this->validate();
                if($this->foto){
                    $foto = $this->foto->store('foto');
                }else
                {
                    $foto = '';
                }
                if($this->fotoDokumen){
                    $fotoDokumen = $this->fotoDokumen->store('fotodokumen');
                }else{
                    $fotoDokumen = '';
                }
                $cariSiswa = Siswa::where('kelas_id', $this->kelas)
                                    ->where('tahun', $this->tahun)
                                    ->join('users','siswa.nis','=','users.nis')
                                    ->select(
                                        'users.name as name',
                                        'siswa.nis as nis'
                                    )
                                    ->get();
                $bk = Bk::create([
                    'tanggal' => $this->tanggal,
                    'jenis_bimbingan' => $this->jenisBimbingan,
                    'bentuk_bimbingan' => $this->bentukBimbingan,
                    'kelas_id' => $this->kelas,
                    'tahun' => $this->tahun,
                    'nis' => $cariSiswa[0]['nis'],
                    'permasalahan' => $this->permasalahan,
                    'penyelesaian' => $this->penyelesaian,
                    'tindak_lanjut' => $this->tindakLanjut,
                    'foto' => $foto,
                    'foto_dokumen' => $fotoDokumen,
                ]);
                foreach($cariSiswa as $key => $siswa){
                    $bk->details()->create([
                        'user_name' => $siswa->name,
                        'tanggal' => $this->tanggal,
                        'jenis_bimbingan' => $this->jenisBimbingan,
                        'bentuk_bimbingan' => $this->bentukBimbingan,
                        'kelas_id' => $this->kelas,
                        'tahun' => $this->tahun,
                        'nis' => $siswa->nis,
                        'permasalahan' => $this->permasalahan,
                        'penyelesaian' => $this->penyelesaian,
                        'tindak_lanjut' => $this->tindakLanjut,
                        'foto' => $foto,
                        'foto_dokumen' => $fotoDokumen,
                    ]);
                }
                $this->clearVar();
                $this->dispatchBrowserEvent('notyf:success', [
                    'type' => 'success',
                    'message' => 'Berhasil Menyimpan Bimbingan 1 Kelas',
                ]);
                break;

            default:

                break;
        }
    }
    public function clearVar(){
        $bulan = gmdate('m');
        $tahun = gmdate('Y');
        //make tahun ajaran based on month
        if ($bulan < 7) {
            $this->tahun = ($tahun - 1) . '/' . ($tahun);
        } else {
            $this->tahun = $tahun . '/' . ($tahun + 1);
        }
        $this->tanggal = gmdate('Y-m-d');
        $this->kelas = '';
        $this->siswa = '';
        $this->permasalahan = '' ;
        $this->penyelesaian = '';
        $this->tindakLanjut = '';
        $this->foto = '';
        $this->fotoDokumen = '';
    }
}

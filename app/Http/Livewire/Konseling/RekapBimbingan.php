<?php

namespace App\Http\Livewire\Konseling;

use App\Models\Bk;
use App\Models\BkDetail;
use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;

class RekapBimbingan extends Component
{
    use WithPagination;
    public $tanggalAwal;
    public $tanggalAkhir;
    public $tahun;
    public $kelas;
    public $siswa;
    public $classrooms = [];
    public $students = [];
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $this->students = Siswa::where('kelas_id', $this->kelas)
            ->where('tahun', $this->tahun)
            ->join('users', 'siswa.nis', '=', 'users.nis')
            ->select(
                'users.name as name',
                'siswa.nis as nis'
            )
            ->orderBy('users.name')
            ->get();
        if($this->kelas && empty($this->siswa)){
            $report = BkDetail::
            join('users', 'users.nis', '=', 'bk_detail.nis')
            ->join('kelas', 'kelas.id', '=', 'bk_detail.kelas_id')
            ->select(
                'users.name as name',
                'kelas.nama as nama_kelas',
                'bk_detail.id as id',
                'bk_detail.slug as slug',
                'bk_detail.nis as nis',
                'bk_detail.bk_id as bk_id',
                'bk_detail.tanggal as tanggal',
                'bk_detail.bentuk_bimbingan as bentuk_bimbingan',
                'bk_detail.jenis_bimbingan as jenis_bimbingan',
                'bk_detail.permasalahan as permasalahan',
                'bk_detail.penyelesaian as penyelesaian',
                'bk_detail.tindak_lanjut as tindak_lanjut',
            )
            ->where('kelas_id',$this->kelas)
            ->where('tahun', $this->tahun)
            ->whereBetween('tanggal',[$this->tanggalAwal, $this->tanggalAkhir])
            ->orderBy('tanggal', 'desc')
            ->orderBy('kelas.nama')
            ->orderBy('users.name')
            ->paginate(5);
        }
        elseif($this->kelas && $this->siswa){
            $report = BkDetail::
            join('users', 'users.nis', '=', 'bk_detail.nis')
            ->join('kelas', 'kelas.id', '=', 'bk_detail.kelas_id')
            ->select(
                'users.name as name',
                'kelas.nama as nama_kelas',
                'bk_detail.id as id',
                'bk_detail.nis as nis',
                'bk_detail.slug as slug',
                'bk_detail.bk_id as bk_id',
                'bk_detail.tanggal as tanggal',
                'bk_detail.bentuk_bimbingan as bentuk_bimbingan',
                'bk_detail.jenis_bimbingan as jenis_bimbingan',
                'bk_detail.permasalahan as permasalahan',
                'bk_detail.penyelesaian as penyelesaian',
                'bk_detail.tindak_lanjut as tindak_lanjut',
            )
            ->where('bk_detail.nis', $this->siswa)
            ->where('tahun', $this->tahun)
            ->whereBetween('tanggal',[$this->tanggalAwal, $this->tanggalAkhir])
            ->orderBy('kelas.nama')
            ->orderBy('users.name')
            ->orderBy('tanggal', 'desc')
            ->paginate(5);
        }
        else{
            $report = BkDetail::
            join('users', 'users.nis', '=', 'bk_detail.nis')
            ->join('kelas', 'kelas.id', '=', 'bk_detail.kelas_id')
            ->select(
                'users.name as name',
                'kelas.nama as nama_kelas',
                'bk_detail.id as id',
                'bk_detail.nis as nis',
                'bk_detail.slug as slug',
                'bk_detail.bk_id as bk_id',
                'bk_detail.tanggal as tanggal',
                'bk_detail.bentuk_bimbingan as bentuk_bimbingan',
                'bk_detail.jenis_bimbingan as jenis_bimbingan',
                'bk_detail.permasalahan as permasalahan',
                'bk_detail.penyelesaian as penyelesaian',
                'bk_detail.tindak_lanjut as tindak_lanjut',
            )
            ->where('tahun', $this->tahun)
            ->whereBetween('tanggal',[$this->tanggalAwal, $this->tanggalAkhir])
            ->orderBy('tanggal', 'desc')
            ->orderBy('kelas.nama')
            ->orderBy('users.name')
            ->paginate(5);
        }
        return view(
            'livewire.konseling.rekap-bimbingan',
            [
                'reports' => $report,
            ]
        );
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
        $this->classrooms = Kelas::orderBy('nama')->get();
    }
}

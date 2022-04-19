<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use Livewire\Component;
use Livewire\WithPagination;

class TambahKelas extends Component
{
    use WithPagination;

    public $nama;
    public $tingkat;
    
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refresh' => '$refresh',
    ];
    protected $rules = [ 
        'nama' => 'required|string|unique:kelas',
        'tingkat' => 'required',
    ];
    
    public function render()
    {
        return view('livewire.admin.tambah-kelas',[
            'kelas' => Kelas::orderBy('tingkat')->orderBy('nama')->paginate(5),
        ]);
    }
    public function save(){
        $this->resetErrorBag();
        $this->validate();
        Kelas::create([
            'nama' => $this->nama,
            'tingkat' => $this->tingkat,
        ]);
        $this->dispatchBrowserEvent('notyf:success',
        [
            'type' => 'success',
            'message' => 'Berhasil Menambahkan Kelas',
        ]);
        $this->nama = '';
        $this->tingkat = '';
        $this->emitSelf('refresh','$refresh');
    }
}

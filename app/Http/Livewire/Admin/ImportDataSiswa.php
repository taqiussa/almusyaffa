<?php

namespace App\Http\Livewire\Admin;

use App\Imports\dataSiswaImport;
use App\Imports\UserSiswaImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ImportDataSiswa extends Component
{
    use WithFileUploads;
    public $importFileUserSiswa;
    public $importFileDataSiswa;

    public function render()
    {
        return view('livewire.admin.import-data-siswa');
    }
    public function mount(){
        $this->importFileUserSiswa = '';
    }
    public function importUserSiswa(){
        $this->validate([
            'importFileUserSiswa' => 'required|mimes:xlsx,xls'
        ]);
        Excel::import(new UserSiswaImport, $this->importFileUserSiswa);
        $this->dispatchBrowserEvent('swal:notif',
        [
            'title' => 'Hore !!!',
            'text' => 'Berhasil Import User Sebagai Siswa',
            'icon' => 'success',
        ]);
        $this->importFileUserSiswa = '';
    }
    public function importDataSiswa(){
        $this->validate([
            'importFileDataSiswa' => 'required|mimes:xlsx,xls'
        ]);
        Excel::import(new dataSiswaImport, $this->importFileDataSiswa);
        $this->dispatchBrowserEvent('swal:notif',
        [
            'title' => 'Hore !!!',
            'text' => 'Berhasil Import Seluruh Data Siswa',
            'icon' => 'success',
        ]);
        $this->importFileDataSiswa = '';
    }
}

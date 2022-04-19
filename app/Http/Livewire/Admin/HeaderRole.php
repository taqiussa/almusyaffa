<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class HeaderRole extends Component
{
    use WithPagination;
    public $name;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'name' => 'required|string|unique:roles',
    ];
    public $listeners = [
        'delete' => 'delete',
        'refresh' => '$refresh'
    ];
    public function render()
    {
        return view('livewire.admin.header-role',
        [
            'headers' => Role::paginate(5)
        ]);
    }
    public function save(){
        $this->validate();
        $this->resetErrorBag();
        Role::create(['name' => $this->name]);
        $this->dispatchBrowserEvent('notyf:success',
        [
            'type' => 'success',
            'message' => 'Berhasil',
        ]);
        $this->emitTo('menu.header-table', 'refresh', '$refresh');
        $this->emitTo('layouts.sidebar', 'refresh', '$refresh');
        $this->name='';
    }
    public function confirmDelete($id){
        $this->dispatchBrowserEvent('swal:confirm',[
            'title' => 'Yakin Menghapus Header ?',
            'text' => '',
            'id' => $id,
        ]);
    }
    public function delete($id){
        Role::destroy($id);
        $this->emitTo('layouts.sidebar', 'refresh','$refresh');
        $this->dispatchBrowserEvent('notyf:success',[
            'type' => 'error',
            'message' => 'Header Telah Terhapus',
        ]);
    }
}

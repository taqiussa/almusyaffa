<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListGuru extends Component
{
    use WithPagination;
    protected $listeners = [
        'delete' => 'delete'
    ];
    public function render()
    {
        return view(
            'livewire.admin.list-guru',
            [
                'users' => User::with('roles')
                                ->whereHas('roles', fn($query) =>
                                    $query->where('name','Guru')
                                )->orderBy('name')->paginate(5),
            ]
        );
    }
    public function confirmDelete($id){
        $this->dispatchBrowserEvent('swal:confirm',[
            'type' => 'warning',
            'title' => 'Yakin Menghapus Header ?',
            'text' => '',
            'id' => $id,
        ]);
    }
    public function delete($id){
        $user = User::find($id);
        $user->roles()->detach();
        $user->delete();
        $this->dispatchBrowserEvent('notyf:success',[
            'type' => 'error',
            'message' => 'Berhasil Menghapus User',
        ]);
    }
}

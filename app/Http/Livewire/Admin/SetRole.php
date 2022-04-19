<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class SetRole extends Component
{
    use WithPagination;
    public $userId;
    public $user;
    public $roleName = [];
    public $userRole;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'user' => 'required',
    ];
    public function render()
    {
        return view('livewire.admin.set-role',
        [
            'users' => User::where('email','!=','')->orderBy('name')->paginate(3),
            'roles' => Role::orderBy('name')->get(),
        ]);
    }
    public function setUserRole($id){
        $this->user = User::find($id);
        $setOfIds = $this->user->roles->pluck('name')->toArray();
        $this->roleName = array_fill_keys($setOfIds,true);
        $this->userId = $id;
    }
    public function save(){
        $this->user = User::find($this->userId);
        $this->user->syncRoles($this->roleName);
        $this->user = '';
        $this->dispatchBrowserEvent('notyf:success',[
            'type' => 'success',
            'message' => 'Berhasil Mengatur Role',
        ]);
        $this->emitTo('layouts.sidebar','refresh','$refresh');
    }
}

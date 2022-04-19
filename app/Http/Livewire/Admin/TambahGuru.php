<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class TambahGuru extends Component
{
    use WithFileUploads;
    public $name;
    public $fileImport;
    public $email;
    public $password;
    public $password_confirmation;
    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ];
    public function render()
    {
        return view('livewire.admin.tambah-guru');
    }
    public function save()
    {
        $this->resetErrorBag();
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $user->assignRole('Guru');
        $this->dispatchBrowserEvent('notyf:success', [
            'type' => 'success',
            'message' => 'Berhasil Menambahkan User',
        ]);
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }
}

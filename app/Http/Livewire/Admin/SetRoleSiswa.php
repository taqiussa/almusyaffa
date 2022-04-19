<?php

namespace App\Http\Livewire\Admin;

use App\Jobs\setClassroomToSiswa;
use App\Jobs\SetRoleUserToSiswaJob;
use App\Models\DataSiswa;
use App\Models\User;
use Livewire\Component;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;

class SetRoleSiswa extends Component
{
    public function render()
    {
        return view('livewire.admin.set-role-siswa');
    }
    public function setUserToSiswa(){
        Bus::batch([new SetRoleUserToSiswaJob()])->dispatch();
    }
    public function setClassroomToSiswa(){
        Bus::batch([new setClassroomToSiswa()])->dispatch();
    }
}

<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Sidebar extends Component
{
    protected $listeners = [
        'refresh' => '$refresh',
    ];
    public function render()
    {
        return view('livewire.layouts.sidebar',[
            'headers' => Role::with(['menus','subMenus'])->orderBy('name')->get()
        ]);
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Menu;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class TambahMenu extends Component
{
    public $header;
    public $headers;
    public $menuName;
    public $iconName;
    public $routeName;
    public $subMenus = [''];
    protected $rules = [
        'header' => 'required',
        'menuName' => 'required',
    ];
    public function mount(){
        $this->headers = Role::orderBy('name')->get();
    }
    public function render()
    {
        return view('livewire.admin.tambah-menu');
    }
    public function save()
    {
        $this->validate();
        DB::transaction(function () {
            $role = Role::findById($this->header);
            $searchMenu = Menu::where('name', $this->menuName)->first();
            if ($searchMenu) {
                $this->menuUpdate($role,$searchMenu);
            } else {
                $this->menuCreate($role);
            }
            
            
        });
        $this->emitTo('layouts.sidebar','refresh','$refresh');
        $this->dispatchBrowserEvent('notyf:success', [
            'type' => 'success',
            'message' => 'Berhasil',
        ]);
    }
    public function addSubMenu()
    {
        $this->subMenus[] = ['name' => '', 'route' => ''];
    }
    public function deleteSubMenu($index)
    {
        unset($this->subMenus[$index]);
        $this->subMenus = array_values($this->subMenus);
    }
    private function menuUpdate($role,$searchMenu){
        $menu = Menu::updateOrCreate(['id'=> $searchMenu->id],[
            'name' => $this->menuName,
            'icon' => $this->iconName,
            'route' => $this->routeName,
        ]);
        $menu->role()->associate($role);
        $menu->save();
        foreach ($this->subMenus as $subMenu) {
            $menu->subMenus()->create([
                'name' => $subMenu['name'],
                'route' => $subMenu['route'],
            ]);
        }
    }
    private function menuCreate($role){
        $menu = Menu::create([
            'name' => $this->menuName,
            'icon' => $this->iconName,
            'route' => $this->routeName,                    
        ]);
        $menu->role()->associate($role);
        $menu->save();
        foreach ($this->subMenus as $subMenu) {
            $menu->subMenus()->create([
                'name' => $subMenu['name'],
                'route' => $subMenu['route'],
            ]);
        }
    }
}

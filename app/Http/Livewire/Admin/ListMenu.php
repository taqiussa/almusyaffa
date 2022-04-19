<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\Menu;
use App\Models\SubMenu;
use Livewire\WithPagination;

class ListMenu extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'deleteMenu' => 'deleteMenu',
        'deleteSubMenu' => 'deleteSubMenu',
    ];
    public function confirmDeleteMenu($id){
        $this->dispatchBrowserEvent('swal:deleteMenu',[
            'type' => 'warning',
            'title' => 'Yakin Menghapus Header ?',
            'text' => '',
            'id' => $id,
        ]);
    }
    public function confirmDeleteSubMenu($id){
        $this->dispatchBrowserEvent('swal:deleteSubMenu',
        [
        'id' => $id
        ]);
    }
    public function deleteMenu($id){
        $menu = Menu::find($id);
        $menu->subMenus()->delete();
        $menu->delete();
        $this->emitTo('layouts.sidebar','refresh','$refresh');
        $this->dispatchBrowserEvent('notyf:success',
                [
                    'type' => 'warning',
                    'message' => 'Berhasil Menghapus Menu'
                ]    
            );
    }
    public function deleteSubMenu($id){
        SubMenu::destroy($id);
        $this->emitTo('layouts.sidebar','refresh','$refresh');
        $this->dispatchBrowserEvent('notyf:success',
        [
            'type' => 'warning',
            'message' => 'Berhasil Menghapus Sub Menu'
        ]    
    );
    }
    public function render()
    {
        return view('livewire.admin.list-menu',
        [
            'roles' => Role::with(['menus','subMenus'])->orderBy('name')->paginate(2),
            'menus' => Menu::withCount('subMenus')->get()

        ]);
    }
}

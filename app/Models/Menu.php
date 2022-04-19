<?php

namespace App\Models;

use App\Models\SubMenu;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['subMenus'];
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function subMenus(){
        return $this->hasMany(SubMenu::class);
    }
}

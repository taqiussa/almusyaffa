<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BkDetail extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'bk_detail';
    protected $guarded = [];
    public function bk(){
        return $this->belongsTo(Bk::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'user_name'
            ]
        ];
    }
    public function getRouteKeyName()

    {

        return 'slug';

    }
}

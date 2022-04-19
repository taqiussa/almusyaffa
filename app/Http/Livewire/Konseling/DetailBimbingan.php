<?php

namespace App\Http\Livewire\Konseling;

use App\Models\BkDetail;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class DetailBimbingan extends Component
{
    public $getId = '';
    public $details;
    public function render()
    {
        return view('livewire.konseling.detail-bimbingan');
    }
    public function mount(){
        $getId = Route::current()->parameter('slug');
        $this->details = BkDetail::whereSlug($getId)->first();
    }
}

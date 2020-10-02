<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;

class Loader extends Component
{
    protected $listeners = ['loading'];
    public $loading = '';

    public function render()
    {
        return view('livewire.common.loader');
    }

    public function loading($loading){
    
        if($loading){
            $this->loading = 'loader-overlay';
        }
        else{
            $this->loading = '';
        }
    
    }
}

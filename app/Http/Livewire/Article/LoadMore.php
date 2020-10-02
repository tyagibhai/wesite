<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;

class LoadMore extends Component
{
    protected $listeners = ['loading'];
    public $loading = '';

    public function render()
    {
        return view('livewire.article.load-more');
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

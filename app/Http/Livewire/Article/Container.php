<?php

namespace App\Http\Livewire\Article;


use Livewire\Component;

class Container extends Component
{
    public $post_slug = null;
    
    //fetch and update 
    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.article.container');
    }
}

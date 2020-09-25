<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;

class PageHeaderSection extends Component
{
    protected $listeners = ['setData'];

    //public variable will be passed to view autometically
    public $post_slug = null;
    public $post_title = null;
    
    public function setData(){  
        //geeting event value data from post content section component
        $this->post_title = "reset" ; 
    }
    public function render()
    {
        return view('livewire.article.page-header-section');
    }
}

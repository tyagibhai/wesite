<?php

namespace App\Http\Livewire\Common;

use App\Models\Article;
use Livewire\Component;

class BlogListCards extends Component
{
    //event listener
    protected $listeners = ['loadMore'];
    // public variable
    public $articles = [];
    public $offset = 1;
    
    public function mount()
    {
        $this->articles = Article::getAllArticle(null,1,0,5);   
    }
    public function loadMore()
    {
        //show loading popup
        $this->emit('loading',true);
        $slug = null;
        $type = 1;
        $from =0;
        $limit = $this->offset*9;
        //loading data
        $this->articles = Article::getAllArticle($slug,$type,$from,$limit);
        //update offset
        $this->offset++;
        //hide loading popup
        $this->emit('loading',false);

    }

    public function render()
    {
        return view('livewire.common.blog-list-cards');
    }
}

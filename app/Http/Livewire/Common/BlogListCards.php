<?php

namespace App\Http\Livewire\Common;

use App\Models\Article;
use Livewire\Component;

class BlogListCards extends Component
{
    //event listener
    protected $listeners = ['loadMore','filterByCategory'];
    // public variable
    public $articles = [];
    public $offset = 1;
    public $slug = null;
    public $type = 1;
    
    public function mount()
    {
        $slug = $this->slug;
        $type = $this->type;
        $from =0;
        $limit = $this->offset*9;

        $this->articles = Article::getAllArticle($slug,$type,$from,$limit);   
    }
    public function loadMore()
    {
        $slug = $this->slug;
        $type = $this->type;
        $from =0;
        $limit = $this->offset*9;
        //loading data
        $this->articles = Article::getAllArticle($slug,$type,$from,$limit);
        //update offset
        $this->offset++;

    }
    // filter by category
    public function filterByCategory($category)
    {
        //setting slug property value
        $this->slug = $category;
        //show loading popup
        //$this->emit('loading',true);
        $slug = $this->slug;
        $type = $this->type;
        $from =0;
        $limit = $this->offset*9;
        //loading data
        $this->articles = Article::getAllArticle($slug,$type,$from,$limit);
        //update offset
        $this->offset++;
        //hide loading popup
        //$this->emit('loading',false);

    }

    public function render()
    {
        return view('livewire.common.blog-list-cards');
    }
}

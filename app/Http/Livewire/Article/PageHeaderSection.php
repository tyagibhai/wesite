<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Article;

class PageHeaderSection extends Component
{
    protected $listeners = ['updateData'];

    //public variable will be passed to view autometically
    public $post_slug = null;
    public $post_header_content = null;

    public function mount(){
        $data = Article::getPostTagsAndCategories($this->post_slug);
        //assigning value to component
        $this->post_header_content = $data;
    }
    public function updatetData(){  
        //geeting event value data from post content section component
    }
    public function render()
    {
        return view('livewire.article.page-header-section');
    }
}

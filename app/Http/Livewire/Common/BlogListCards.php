<?php

namespace App\Http\Livewire\Common;

use App\Models\Article;
use Livewire\Component;

class BlogListCards extends Component
{
    public $articles = [];

    public function __construct(){}

    public function mount()
    {
        $this->articles = Article::getAllArticle();   
    }

    public function render()
    {
        return view('livewire.common.blog-list-cards');
    }
}

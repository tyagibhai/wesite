<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Article;

class PopularPostsSection extends Component
{
    public $posts = [];

    public function mount(){
        $this->posts = Article::getAllArticle(null,1,0,5);
    }

    public function render()
    {
        return view('livewire.article.popular-posts-section');
    }
}

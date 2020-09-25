<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;

class ArticleContentSection extends Component
{
    public $post_slug = null;
    
    public function render()
    {
        return view('livewire.article.article-content-section');
    }
}

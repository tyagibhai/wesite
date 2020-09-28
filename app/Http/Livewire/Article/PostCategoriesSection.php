<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Article;

class PostCategoriesSection extends Component
{
    public $categories = [];

    public function mount(){
        $this->categories = Article::getAllCategoryAndTag('category',5);
    }
    public function render()
    {
        return view('livewire.article.post-categories-section');
    }
}

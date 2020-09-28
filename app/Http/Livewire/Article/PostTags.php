<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Article;

class PostTags extends Component
{
    public $post_slug = null;
    public $tags = [];

    public function mount(){
        $data = Article::getPostTagsAndCategories($this->post_slug);
        $this->tags = $data['tags'];
    }
    public function render()
    {
        return view('livewire.article.post-tags');
    }
}

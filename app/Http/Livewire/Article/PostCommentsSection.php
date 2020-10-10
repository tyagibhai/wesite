<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Comment;
class PostCommentsSection extends Component
{
    public function render()
    {
        return view('livewire.article.post-comments-section');
    }
}

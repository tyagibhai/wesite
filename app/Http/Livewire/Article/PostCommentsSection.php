<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Comment;
class PostCommentsSection extends Component
{
    public $post_slug;
    public $comments;

    //fetch initial comment data on load
    public function mount(){
        $this->comments = Comment::getComments($this->post_slug);
    }
    
    //render component
    public function render()
    {
        return view('livewire.article.post-comments-section');
    }

}

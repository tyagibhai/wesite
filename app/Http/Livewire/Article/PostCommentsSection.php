<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Comment;
class PostCommentsSection extends Component
{
    public $post_slug;
    public $offset = 0;
    public $comments;
    public $count = 0;

    // event listiner
    protected $listeners = ['loadMoreComments','refreshComments'];
    //fetch initial comment data on load
    public function mount(){
        $this->count = Comment::count($this->post_slug);
        $this->comments = Comment::getComments($this->post_slug,$this->offset);
    }
    
    //render component
    public function render()
    {
        return view('livewire.article.post-comments-section');
    }
    // load more
    public function loadMoreComments(){
        //increase offset
        $this->offset++;
        //reassign the data
        $resp = Comment::getComments($this->post_slug,$this->offset);
        $this->comments = array_merge($this->comments,$resp);
    }
    //refresh comments when new comment posted
    public function refreshComments($data){
        $this->count = Comment::count($this->post_slug);
        $this->comments = array_merge($this->comments,[$data]);
        
    }
}

<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class PostContentSection extends Component
{
    public $post_slug = null;
    public $post_details = [];
    
    //fetch and update 
    public function mount(){

        $this->post_details = Article::getArticleDetails($this->post_slug);
        if(!count($this->post_details)){ abort('404'); }
        //pass psot object
        $this->post_details = $this->post_details[0];
    }

    public function render()
    {
        return view('livewire.article.post-content-section');
    }
}

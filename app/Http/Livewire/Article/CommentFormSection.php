<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;

use App\Models\Article;
use App\Models\Comment;

class CommentFormSection extends Component
{
    public $comment_post_ID;
    public $post_slug;
    public 	$name;
    public 	$email;
    public 	$comment;

    //validation rules
    protected $rules = [
        'name' => 'required|min:3|max:30',
        'email' => 'required|email',
        'comment' => 'required|min:2|max:260',
    ];
    //set initial properties on mount
    public function mount(){
        $data = Article::where('post_name',$this->post_slug)->take(1)->get();
        $this->comment_post_ID = $data[0]['ID'];
    }
    //form submit handle
    public function submit()
    {
        $this->validate();
        //Execution doesn't reach here if validation fails. 
        $new = Comment::create([
            'comment_post_ID'=>$this->comment_post_ID,
            'comment_author' => $this->name,
            'comment_author_email' => $this->email,
            'comment_content' => $this->comment,
            'comment_author_IP' => getIp()
        ]);
        //push new comment to the view
        $append = [
            'comment_ID'=>$new->comment_ID,
            'comment_author'=>$new->comment_author,
            'comment_author_email'=>$new->comment_author_email,
            'comment_content'=>$new->comment_content,
            'comment_date'=>$new->comment_date,
        ];
        //emmit the refresh comments event
        $this->emit('refreshComments',$append);
        //resetting the form
        $this->name = $this->email = $this->comment = null;
    }
    public function render()
    {
        return view('livewire.article.comment-form-section');
    }
}

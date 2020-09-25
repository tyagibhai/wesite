<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;

class AuthorWidgetSection extends Component
{
    public $author_details = [];

    public function mount(){
        //fill values
        $this->author_details['name'] = "Anil Sharma";
        $this->author_details['job_title'] = "Software Engineer";
        $this->author_details['pic'] = "https://s.gravatar.com/avatar/017c2f452a5b71e2bb49cd8932d42e74?s=80";
        $this->author_details['fb'] = "https://facebook.com/tyagibhai";
        $this->author_details['tw'] = "http://web.lo/article/https//twitter.com/realanilsharma";
        $this->author_details['gh'] = "https://github.com/ascodelab";
        $this->author_details['ln'] = "https://www.linkedin.com/in/realanilsharma";
        $this->author_details['bio'] = "Doing things that add value to your career and life.";
    }
    public function render()
    {
        return view('livewire.article.author-widget-section');
    }
}

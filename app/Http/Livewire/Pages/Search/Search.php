<?php

namespace App\Http\Livewire\Pages\Search;

use Livewire\Component;
use App\Models\Article;

class Search extends Component
{
    public $query = '';
    public $posts = [];

    // seartch render
    public function render()
    {
        $results = Article::search($this->query);
        //assigning value to results
        //dd($results);
        $results = filter_by_value($results, 'post_status', 'publish');

        $this->posts = $results;

        return view('livewire.pages.search.search');
    }

}


# need to run following query
## ALTER TABLE `wp_posts` ADD FULLTEXT( `post_content`, `post_title`, `post_excerpt`);
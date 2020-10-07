<?php

namespace App\Http\Livewire\Pages\Search;

use Livewire\Component;

class SearchHeader extends Component
{
    public $page_title = null;
    
    public function render()
    {
        return view('livewire.pages.search.search-header');
    }
}

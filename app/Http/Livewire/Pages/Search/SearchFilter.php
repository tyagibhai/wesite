<?php

namespace App\Http\Livewire\Pages\Search;

use Livewire\Component;
use App\Models\Article;

class SearchFilter extends Component
{
    //category slug
    public $slug = null;
    public $type = null;
    public $categories = [];
    
    public function mount()
    {
        $this->categories = Article::getAllCategoryAndTag('category');
    }
    //triggers when dropdown changed
    public function updated()
    {
        $this->categories = Article::getAllCategoryAndTag('category');
        //fire the filte method in blog list component
        $this->emit('filterByCategory',$this->slug);
    }

    public function render()
    {
        return view('livewire.pages.search.search-filter');
    }

}

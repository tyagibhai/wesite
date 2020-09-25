<?php

namespace App\Http\Livewire\Pages\Article;

use Livewire\Component;

class Index extends Component
{
    public $slug;

    public function mount($slug){
        //getting route parameters
        $this->slug = $slug;
    }

    public function render()
    {
        return view('livewire.pages.article.index')->extends('livewire.layouts.frontend');;
    }
}

<?php

namespace App\Http\Livewire\Pages\Search;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.search.index')->extends('livewire.layouts.frontend');;
    }
}

<?php

namespace App\Http\Livewire\Pages\Search;

use Illuminate\Http\Request;
use Livewire\Component;

class Index extends Component
{
    public $page_title = "Okay, what would you learn today?";
    public $slug = null;
    public $type = 1;

    public function mount(Request $request, $slug = null){
        //assiging slug value
        $this->slug = $slug;
        //assiging type value
        $type = $request->query('type');
        if($type === 'tag'){
            $this->type = 2;
        }
    }
    public function render()
    {
        return view('livewire.pages.search.index')->extends('livewire.layouts.frontend');;
    }
}

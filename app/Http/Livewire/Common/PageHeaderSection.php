<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;

class PageHeaderSection extends Component
{
    public $page_title = null;
    
    public function render()
    {
        return view('livewire.common.page-header-section');
    }
}

<?php

namespace App\Http\Livewire\Pages\Contact;

use Livewire\Component;

class Index extends Component
{
    public $page_title = "Contact Us";

    public function render()
    {
        return view('livewire.pages.contact.index')->extends('livewire.layouts.frontend');
    }
}

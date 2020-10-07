<?php

namespace App\Http\Livewire\Pages\Contact;

use Livewire\Component;
use App\Models\Contact;


class Form extends Component
{
    public $disabled = '';
    public $first_name = null;
    public $last_name = null;
    public $email = null;
    public $phone = null;
    public $subject = null;
    public $message = null;

    //validation rules
    protected $rules = [
        'first_name' => 'required|min:3|max:30',
        'last_name' => 'required|min:3|max:30',
        'email' => 'required|email',
        'phone' => 'required|min:8|max:20',
        'subject' => 'required|min:10|max:120',
        'message' => 'required|min:8|max:260',
    ];

    public function submit()
    {
        $this->validate();
        //Execution doesn't reach here if validation fails.
         //show loader
        $this->emit('loading',true);
        
        Contact::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->phone,
        ]);
        //adding success message
        session()->flash('message', 'Great! your message has been sent to us. We will get back to you shortly.');
        //hide loader
        $this->disabled = 'disabled';
        $this->emit('loading',false);
    }

    public function render()
    {
        return view('livewire.pages.contact.form');
    }
}

<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\Newsletter;

class NewsletterSection extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email|min:8|max:120',
    ];

    public function submit()
    {
        $this->validate();
        //Execution doesn't reach here if validation fails.
         //show loader
        $this->emit('loading',true);
        
        $count = Newsletter::where('email',$this->email)->count();

        if($count>0){
            $this->addError('email', 'You have already subscribed to our newsletter!');
            //hide loader
            $this->emit('loading',false);
            return 0;
        }

        Newsletter::create([
            'email' => $this->email,
        ]);
        //adding success message
        session()->flash('message', 'You have successfully subscribed to our newsletter!');
        //hide loader
        $this->emit('loading',false);
    }
    public function render()
    {
        return view('livewire.common.newsletter-section');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $form = [
        'email' => '',
        'password' => '',
    ];

    protected $messages = [
        'form.email.required' => 'Email field is required', 
        'form.email.email' => 'Must be an email', 
        'form.password.required' => 'Password field is required',    
    ];


    public function submit()
    {
        $this->validate([
            'form.email' => 'required|email',
            'form.password' => 'required',
        ]);

        Auth::attempt($this->form);
        return redirect(route('home'));
    }

    public function render()
    {
        return view('livewire.login');
    }
}

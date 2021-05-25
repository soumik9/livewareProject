<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
Use Alert;

class Register extends Component
{
    public function render()
    {
        return view('livewire.register');
    }

    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
    ];

    protected $messages = [
        'form.name.required' => 'Name field is required',
        'form.email.required' => 'Email field is required', 
        'form.email.email' => 'Must be an email', 
        'form.password.required' => 'Password field is required',    
        'form.password.confirmed' => 'Password did not match',      
    ];

    public function updated($field)
    {
        $this->validateOnly($field,[
            'form.name' => 'required|string',
            'form.email' => 'required|string|email',
            // 'form.password' => 'required|string|confirmed',
            // 'form.password_confirmation' => 'same:pass',
        ]);
    }

 

    public function submit()
    {
        $this->validate([
            'form.password' => 'required|string|confirmed',
        ]);
         
            $create =  User::create($this->form); 

            if($create)
            {
                session()->flash('message', 'User successfully Added :) ');
                return redirect(route('register'));
            }else{
                session()->flash('message', 'User added Failed:) ');
                return redirect(route('register'));
            }   
    }//submit end
}

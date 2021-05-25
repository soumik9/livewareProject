<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public function render()
    {
        // if(Auth::check())
        //     {
        //         return view('livewire.home');
        //     }

        // return redirect('login')->with('errmessage', 'Please Login to access restricted area.');
        return view('livewire.home');
    }
}

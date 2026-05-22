<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{

    #[Rule('required|email')]
    public $email;
    
    #[Rule('required|min:8')]
    public $password;

    #[Rule('boolean')]
    public $remember = false;
    
    public function login()
    {

        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            return redirect()->route('dashboard');
        }   


        session()->flash('error', 'Invalid email or password');
    }
    
    public function render()
    {
        return view('livewire.auth.login');
    }
}

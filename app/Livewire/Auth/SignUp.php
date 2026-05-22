<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SignUp extends Component
{
    #[Rule('required|max:50')]
    public $first_name;

    #[Rule('required|max:50')]
    public $last_name;

    #[Rule('required|unique:users,email')]
    public $email;

    #[Rule('required')]
    public $country_code = '+20';

    #[Rule('required|numeric|min_digits:8|max_digits:15|unique:users,phone')]
    public $phone;

    #[Rule('required|min:8|confirmed')]
    public $password;

    public $password_confirmation;

    #[Rule('required|accepted')]
    public $terms;
    

    public function register()
    {
        $this->validate();

        $full_phone = $this->country_code . ltrim($this->phone, '0');

        // Check uniqueness on the full phone number (with country code)
        if (User::where('phone', $full_phone)->exists()) {
            $this->addError('phone', 'This phone number is already registered.');
            return;
        }

        $user = User::create([
            'name' => $this->first_name.' '.$this->last_name,
            'email' => $this->email,
            'phone' => $full_phone,
            'password' => bcrypt($this->password),
        ]);

        Auth::login($user);

        session()->regenerate();

        // go to merchant dashboard
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
}

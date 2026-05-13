<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Inquiry;

class InquiryForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $company = '';
    public string $category = '';
    public string $quantity = '';
    public string $message = '';
    public bool $submitted = false;

    protected array $rules = [
        'name'     => 'required|min:2',
        'email'    => 'required|email',
        'phone'    => 'nullable|min:7',
        'category' => 'required',
        'quantity' => 'required',
        'message'  => 'nullable|max:500',
    ];

    public function submit(): void
    {
        $this->validate();

        Inquiry::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'company' => $this->company,
            'category' => $this->category,
            'quantity' => $this->quantity,
            'message' => $this->message,
        ]);

        $this->submitted = true;
        $this->reset(['name', 'email', 'phone', 'company', 'category', 'quantity', 'message']);
    }

    public function render()
    {
        return view('livewire.inquiry-form');
    }
}

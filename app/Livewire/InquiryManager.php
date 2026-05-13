<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Inquiry;

class InquiryManager extends Component
{
    public function delete(int $id): void
    {
        Inquiry::destroy($id);
    }

    public function render()
    {
        return view('livewire.inquiry-manager', [
            'inquiries' => Inquiry::latest()->get()
        ])->layout('components.layouts.dashboard', ['pageTitle' => 'Customer Messages']);
    }
}

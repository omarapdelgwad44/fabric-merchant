<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Setting;

class SettingsManager extends Component
{
    public array $settings = [];
    public bool $saved = false;

    public function mount()
    {
        $this->settings = Setting::all()->pluck('value', 'key')->toArray();
    }

    public function save(): void
    {
        foreach ($this->settings as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }
        $this->saved = true;
        setTimeout(fn() => $this->saved = false, 3000);
    }

    public function render()
    {
        return view('livewire.settings-manager')
            ->layout('components.layouts.dashboard', ['pageTitle' => 'CMS Settings']);
    }
}

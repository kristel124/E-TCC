<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Laravel\Fortify\Features;

class UpdateProfileInformationForm extends Component
{
    public $state = [];

    public function mount()
    {
        // Initialize state with current user data
        $this->state = [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'phone' => auth()->user()->phone, // pre-fill phone number
        ];
    }

    public function updateProfileInformation()
    {
        // Validation and update logic here (already handled in Fortify action)
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        // Call the Fortify action to update
        app(\App\Actions\Fortify\UpdateUserProfileInformation::class)->update(auth()->user(), $this->state);

        $this->emit('saved');
    }

    public function render()
    {
        return view('profile.update-profile-information-form');
    }
}

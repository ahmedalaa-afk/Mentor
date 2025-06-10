<?php

namespace App\Livewire\User\Profile\Partials;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileInformation extends Component
{
    public $name, $email, $message;

    public function mount()
    {
        if (auth()->check()) {
            $this->name = Auth::user()->name;
            $this->email = Auth::user()->email;
        }
    }

    public function submit()
    {
        $user = Auth::user();

        // Validate input
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Update user profile
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        // Set success message
        $this->message = 'Profile updated successfully!';
    }

    public function render()
    {
        return view('user.profile.partials.profile-information');
    }
}

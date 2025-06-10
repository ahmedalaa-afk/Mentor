<?php

namespace App\Livewire\User\Profile\Partials;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdatePassword extends Component
{
    public $current_password, $new_password, $new_password_confirmation, $message;

    public function submit()
    {
        $user = Auth::user();

        // Validate input
        $this->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Check if current password is correct
        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'The current password is incorrect.');
            return;
        }

        // Update password
        $user->update([
            'password' => Hash::make($this->new_password),
        ]);

        // Clear input fields
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);

        // Set success message
        $this->message = 'Password updated successfully!';
    }
    public function render()
    {
        return view('user.profile.partials.update-password');
    }
}

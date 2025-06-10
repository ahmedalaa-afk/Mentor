<?php

namespace App\Livewire\User\Profile\Partials;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class DeleteAccount extends Component
{
    public $password, $confirmingDeletion = false, $message;

    public function confirmDeletion()
    {
        $this->confirmingDeletion = true;
    }

    public function cancelDeletion()
    {
        $this->reset(['password', 'confirmingDeletion']);
    }

    public function deleteAccount()
    {
        $user = Auth::user();

        // Validate password input
        $this->validate([
            'password' => 'required|string',
        ]);

        // Check if password is correct
        if (!Hash::check($this->password, $user->password)) {
            $this->addError('password', 'The provided password is incorrect.');
            return;
        }

        // Logout user before deleting the account
        Auth::logout();

        // Delete user account
        $user->delete();

        // Clear session and redirect
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/')->with('message', 'Your account has been deleted successfully.');
    }
    public function render()
    {
        return view('user.profile.partials.delete-account');
    }
}

<?php

namespace App\Livewire\User\Profile\Partials;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileInformation extends Component
{
    public $name, $email, $phone, $address, $country, $city, $gender, $birthdate, $message;

    public function mount()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->address = $user->address;
            $this->country = $user->country;
            $this->city = $user->city;
            $this->gender = $user->gender;
            $this->birthdate = $user->birthdate;
        }
    }

    public function submit()
    {
        $user = Auth::user();
        if (!$user) {
            $this->message = 'User not authenticated.';
            return;
        }

        // Validate input
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20|unique:users,phone,' . $user->id,
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'gender' => 'required|in:male,female',
            'birthdate' => 'required|date',
        ]);

        // Update user profile
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'country' => $this->country,
            'city' => $this->city,
            'gender' => $this->gender,
            'birthdate' => $this->birthdate,
        ]);

        // Set success message
        $this->message = 'Profile updated successfully!';
    }

    public function render()
    {
        return view('user.profile.partials.profile-information');
    }
}

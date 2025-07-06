<?php

namespace App\Livewire\SuperAdmin\Profile\Partials;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class DeleteAccount extends Component
{
    public $current_password;
    public function rules()
    {
        return [
            'current_password' => 'required|min:8',
        ];
    }
    public function messages()
    {
        return [
            'current_password' => 'The Password field is required.',
        ];
    }
    public function submit()
    {
        $data = $this->validate();
        if (Hash::check($data['current_password'], Auth::user()->password)) {
            $admin = Auth::user();
            $admin->delete();
            $this->reset(['current_password']);
            return to_route('/login');
        } else {
            $this->addError('current_password', 'Wrong password');
        }
    }
    public function render()
    {
        return view('super-admin.profile.partials.delete-account');
    }
}

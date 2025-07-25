<?php

namespace App\Livewire\SuperAdmin\Profile\Partials;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileInformation extends Component
{
    protected $listeners = ['refreshProfile' => '$refresh'];
    public $name, $email;
    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }
    public function submit()
    {
        $admin = Auth::user();
        $admin->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        $this->dispatch('refreshProfile');
    }
    public function render()
    {
        return view('super-admin.profile.partials.profile-information');
    }
}

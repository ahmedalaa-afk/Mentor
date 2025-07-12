<?php

namespace App\Livewire\SuperAdmin\Users;

use App\Models\User;
use Livewire\Component;

class UsersData extends Component
{
    protected $listeners = ['refreshUsers' => '$refresh'];
    public function render()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'super admin');
        })->get();
        return view('super-admin.users.users-data', ['users' => $users]);
    }
}

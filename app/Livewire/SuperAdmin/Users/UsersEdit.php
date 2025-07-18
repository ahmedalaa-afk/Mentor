<?php

namespace App\Livewire\SuperAdmin\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UsersEdit extends Component
{
    public $user;
    public $selectedRoles = [], $newRoles = [];
    public $replaceRoles = false;

    protected $listeners = ['editUser'];

    public function editUser($id)
    {
        $this->user = User::with('roles')->find($id);
        $this->selectedRoles = $this->user->roles->pluck('name')->toArray();
        $this->dispatch('editUserRoleModal');
    }

    public function rules()
    {
        return [
            'newRoles' => ['required', 'array'],
            'newRoles.*' => ['exists:roles,name'],
        ];
    }

    public function submit()
    {
        $this->validate();
        if ($this->replaceRoles == true) {
            $this->user->syncRoles($this->newRoles); // Replace old with new
        } else {
            foreach ($this->newRoles as $roleName) {
                if (!$this->user->hasRole($roleName)) {
                    $this->user->assignRole($roleName); // Append new ones
                }
            }
        }

        session()->flash('status', 'User roles updated successfully.');
        $this->reset(['selectedRoles', 'newRoles', 'user']);
        $this->dispatch('editUserRoleModal');
        $this->dispatch('refreshUsers')->to(UsersData::class);
    }

    public function render()
    {
        return view('super-admin.users.users-edit', [
            'roles' => Role::all(),
        ]);
    }
}

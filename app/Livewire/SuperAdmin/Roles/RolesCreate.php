<?php

namespace App\Livewire\SuperAdmin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesCreate extends Component
{
    public $name;
    public function rules()
    {
        return [
            'name' => 'required|unique:roles,name',
        ];
    }
    public function submit()
    {
        $this->validate();
        // create Role
        Role::create(['name' => $this->name]);
        // reset inputs
        $this->reset(['name']);
        // close modal
        $this->dispatch('createRoleModal');
        // refresh Roles
        $this->dispatch('refreshRole')->to(RolesData::class);
    }
    public function render()
    {
        return view('super-admin.roles.roles-create');
    }
}

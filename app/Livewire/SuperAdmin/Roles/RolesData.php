<?php

namespace App\Livewire\SuperAdmin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesData extends Component
{
    protected $listeners = ['refreshRoles' => '$refresh'];
    public function render()
    {
        $roles = Role::all();
        return view('super-admin.roles.roles-data', ['roles' => $roles]);
    }
}

<?php

namespace App\Livewire\SuperAdmin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesEdit extends Component
{
    protected $listeners = ['editRole'];

    public $name, $role;
    public function editRole($id)
    {
        $this->role = Role::find($id);
        $this->name = $this->role->name;
        $this->resetValidation();
        $this->dispatch('editRoleModal');
    }
    public function submit()
    {
        $this->role->name = $this->name;
        $this->role->save();
        $this->dispatch('editRoleModal');
        $this->dispatch('refreshRoles')->to(RolesData::class);
    }
    public function render()
    {
        $roles = Role::all();
        return view('super-admin.roles.roles-edit', ['roles' => $roles]);
    }
}

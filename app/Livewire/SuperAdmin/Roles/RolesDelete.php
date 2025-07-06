<?php

namespace App\Livewire\SuperAdmin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesDelete extends Component
{
    protected $listeners = ['deleteRole'];
    public $role;
    public function deleteRole($id)
    {
        // fetch the role
        $this->role = Role::find($id);
        // dispatch the delete modal
        $this->dispatch('deleteRoleModal');
    }
    public function submit()
    {
        // delete the category and keep the children
        $this->role->delete();
        // close the delete modal
        $this->dispatch('deleteRoleModal');
        // refresh the categories data
        $this->dispatch('refreshRoles')->to(RolesData::class);
    }
    public function render()
    {
        return view('super-admin.roles.roles-delete');
    }
}

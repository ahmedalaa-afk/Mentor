<?php

namespace App\Livewire\Admin\Teacher;

use App\Models\User;
use Livewire\Component;

class TeachersData extends Component
{
    protected $listeners = ['refreshData' => '$refresh'];
    public function render()
    {
        $teachers = User::role('teacher')->get();
        return view('admin.teacher.teachers-data', ['teachers' => $teachers]);
    }
}

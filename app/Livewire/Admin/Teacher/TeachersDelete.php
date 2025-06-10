<?php

namespace App\Livewire\Admin\Teacher;

use App\Models\User;
use Livewire\Component;

class TeachersDelete extends Component
{
    public $teacher;
    protected $listeners=['deleteTeacher'];
    public function deleteTeacher($id){
        $this->teacher = User::role('teacher')->where('id',$id)->first();
        // dispatch modal
        $this->dispatch('deleteTeacherModal');

    }
    public function submit(){
        $this->teacher->delete();
        // dispatch success toast
        $this->dispatch('successToast', ['message' => 'Teacher deleted successfully']);
        // close modal
        $this->dispatch('deleteTeacherModal');
        // refresh data
        $this->dispatch('refreshData')->to(TeachersData::class);
    }
    public function render()
    {
        return view('admin.teacher.teachers-delete');
    }
}

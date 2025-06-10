<?php

namespace App\Livewire\Admin\Teacher;

use App\Models\User;
use Livewire\Component;

class TeachersShow extends Component
{
    public $teacher;
    protected $listeners=['teacherDetails'];
    public function teacherDetails($id){
        $this->teacher = User::role('teacher')->where('id',$id)->first();
        // dispatch modal
        $this->dispatch('showTeacherModal');

    }
    public function render()
    {
        return view('admin.teacher.teachers-show',['teacher'=>$this->teacher]);
    }
}

<?php

namespace App\Livewire\Admin\TeacherApplication;

use App\Models\TeacherApplication;
use Livewire\Component;
use Livewire\WithPagination;

class ApplicationsData extends Component
{
    use WithPagination;

    public function render()
    {
        $applications = TeacherApplication::paginate(10);
        return view('admin.teacher-application.applications-data', ['applications' => $applications]);
    }

    public function accept($id)
    {
        $application = TeacherApplication::findOrFail($id);
        $application->status = 'accepted';
        $application->save();
        $application->user->syncRoles('teacher');
        session()->flash('message', 'Application accepted successfully.');
    }

    public function reject($id)
    {
        $application = TeacherApplication::findOrFail($id);
        $application->status = 'rejected';
        $application->save();
        session()->flash('message', 'Application rejected successfully.');
    }
}

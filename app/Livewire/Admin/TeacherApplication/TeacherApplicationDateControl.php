<?php

namespace App\Livewire\Admin\TeacherApplication;

use App\Models\TeacherApplicationDateControl as ModelsTeacherApplicationDateControl;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TeacherApplicationDateControl extends Component
{
    public $start_at;
    public $end_at;
    public $record_id;

    public function mount()
    {
        $latest = ModelsTeacherApplicationDateControl::first();
        if ($latest) {
            $this->start_at = $latest->start_at;
            $this->end_at = $latest->end_at;
            $this->record_id = $latest->id;
        }
    }

    public function save()
    {
        $this->validate([
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
        ]);

        if ($this->record_id) {
            $record = ModelsTeacherApplicationDateControl::find($this->record_id);
            $record->update([
                'start_at' => $this->start_at,
                'end_at' => $this->end_at,
                'admin_id' => Auth::id(),
            ]);
        } else {
            $record = ModelsTeacherApplicationDateControl::create([
                'start_at' => $this->start_at,
                'end_at' => $this->end_at,
                'admin_id' => Auth::id(),
            ]);
            $this->record_id = $record->id;
        }
        session()->flash('success', 'Application time updated!');
    }
    public function render()
    {
        return view('admin.teacher-application.teacher-application-date-control');
    }
}

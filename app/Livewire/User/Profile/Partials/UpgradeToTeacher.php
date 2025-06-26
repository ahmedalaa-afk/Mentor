<?php

namespace App\Livewire\User\Profile\Partials;

use App\Models\TeacherApplication;
use App\Models\TeacherApplicationDateControl;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpgradeToTeacher extends Component
{
    use WithFileUploads;

    public $cv;
    public $showForm = false;
    public $hasExistingApplication = false;
    public $applicationStatus = '';

    protected $rules = [
        'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
    ];

    public function mount()
    {
        // Check if user already has an application
        $this->checkExistingApplication();
    }

    public function checkExistingApplication()
    {
        $existingApplication = TeacherApplication::where('user_id', Auth::user()->id)->first();
        if ($existingApplication) {
            $this->hasExistingApplication = true;
            $this->applicationStatus = $existingApplication->status;
        }
    }

    public function showApplicationForm()
    {
        $user = Auth::user();

        // Check if any basic info is missing
        if (empty($user->name) || empty($user->email) || empty($user->phone) || empty($user->address)) {
            $this->showForm = false;
            session()->flash('error', 'Please complete your profile (name, email, phone, address) before applying to become a teacher.');
            return;
        }

        // check if application end date is valid
        $applicationDate = TeacherApplicationDateControl::first();
        if ($applicationDate->end_at < now()) {
            $this->showForm = false;
            session()->flash('error', 'Teacher Application Closed for now.');
        } else {
            $this->showForm = true;
        }
    }

    public function submitApplication()
    {
        $this->validate();

        $user = auth()->user();

        // Store CV file
        $cvPath = $this->cv->store('teacher-applications/cv', 'public');

        // Create teacher application
        $application = TeacherApplication::create([
            'cv' => $cvPath,
            'status' => 'pending',
            'apply_at' => now(),
            'user_id' => $user->id
        ]);

        $this->showForm = false;
        $this->hasExistingApplication = true;
        $this->applicationStatus = 'pending';

        session()->flash('success', 'Your teacher application has been submitted successfully! We will review it and get back to you soon.');
    }

    public function render()
    {
        return view('user.profile.partials.upgrade-to-teacher');
    }
}

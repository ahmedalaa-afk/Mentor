<?php

namespace App\Livewire\Admin\Teacher;

use App\Models\User;
use Livewire\Component;

class TeachersEdit extends Component
{
    protected $listeners = ['editTeacher'];
    public $teacher;
    public $name, $email, $password, $password_confirmation;
    public $phone, $gender, $birthdate, $address, $city, $country;

    public function editTeacher($id)
    {
        // fetch data
        $this->teacher = User::role('teacher')->find($id);
        $this->name = $this->teacher->name;
        $this->email = $this->teacher->email;
        $this->phone = $this->teacher->phone;
        $this->gender = $this->teacher->gender;
        $this->birthdate = $this->teacher->birthdate;
        $this->address = $this->teacher->address;
        $this->city = $this->teacher->city;
        $this->country = $this->teacher->country;
        // dispatch modal
        $this->dispatch('editTeacherModal');
    }
    public function rules()
    {
        return [
            'name' => 'nullable|string|min:3',
            'email' => 'nullable|email|exists:users,email',
            'password' => 'nullable|min:8|confirmed',
            'phone' => 'nullable|min:11|max:11',
            'gender' => 'nullable|in:male,female',
            'birthdate' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        // Update teacher records
        $this->teacher->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'birthdate' => $data['birthdate'],
            'address' => $data['address'],
            'city' => $data['city'],
            'country' => $data['country'],
        ]);


        // Reset form inputs
        $this->reset([
            'name',
            'email',
            'password',
            'password_confirmation',
            'phone',
            'gender',
            'birthdate',
            'address',
            'city',
            'country',
        ]);

        // Hide modal
        $this->dispatch('editTeacherModal');

        // Refresh teacher data
        $this->dispatch('refreshData')->to(TeachersData::class);
    }
    public function render()
    {
        return view('admin.teacher.teachers-edit', ['teacher' => $this->teacher]);
    }
}

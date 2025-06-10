<?php

namespace App\Livewire\Admin\Teacher;

use App\Models\User;
use Livewire\Component;

class TeachersCreate extends Component
{
    public $name, $email, $password, $password_confirmation;
    public $phone, $gender, $birthdate, $address, $city, $country;

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'phone' => 'required|min:11|max:11',
            'gender' => 'required|in:male,female',
            'birthdate' => 'required|date',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
        ];
    }

    public function submit()
    {
        $data = $this->validate();

        // Create a new teacher record
        $teacher = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'birthdate' => $data['birthdate'],
            'address' => $data['address'],
            'city' => $data['city'],
            'country' => $data['country'],
        ]);

        // Assign 'teacher' role
        $teacher->assignRole('teacher');

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
        $this->dispatch('createTeacherModal');

        // Refresh teacher data
        $this->dispatch('refreshData')->to(TeachersData::class);
    }
    public function render()
    {
        return view('admin.teacher.teachers-create');
    }
}

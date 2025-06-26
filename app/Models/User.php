<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Controllers\Admin\TeacherApplicationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'users';
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // All Roles Section
    public function currency()
    {
        return $this->hasOne(Currency::class);
    }

    // Student Section

    public function teacherApplication()
    {
        return $this->hasOne(TeacherApplication::class)->whereHas('roles', function ($q) {
            $q->where('name', 'student');
        });
    }

    // Admin Section
    public function teachers()
    {
        return $this->hasMany(User::class, 'admin_id')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'teacher');
            });
    }

    public function categories()
    {
        return $this->hasMany(User::class)->whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        });
    }

    public function teacherApplicationDate()
    {
        return $this->hasOne(TeacherApplicationDateControl::class)->whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        });
    }

    public function getAllTeachersApplications()
    {
        return $this->hasMany(TeacherApplication::class)->whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        });
    }
}

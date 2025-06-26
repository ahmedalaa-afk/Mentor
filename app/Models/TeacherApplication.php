<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class TeacherApplication extends Model
{
    use HasRoles;

    protected $guarded = [];

    public function student()
    {
        $this->belongsTo(User::class)->whereHas('roles', function ($qr) {
            $qr->where('name', 'student');
        });
    }

    public function admin()
    {
        $this->belongsTo(User::class)->whereHas('roles', function ($qr) {
            $qr->where('name', 'admin');
        });
    }
}

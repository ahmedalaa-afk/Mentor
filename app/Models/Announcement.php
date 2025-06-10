<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcements';
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(User::class)->whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function activeAnnouncement()
    {
        return $this->where('status', 'active')->get();
    }
}

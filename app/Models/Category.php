<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(User::class)->whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        });
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function deleteCategory()
    {
        $this->children()->update(['parent_id' => null]);
        $this->delete();
    }
    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }
}

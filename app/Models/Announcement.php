<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    // Accessor for formatted start date
    public function getFormattedStartAtAttribute()
    {
        return $this->start_at ? Carbon::parse($this->start_at)->format('M d, Y') : 'N/A';
    }

    // Accessor for formatted end date
    public function getFormattedEndAtAttribute()
    {
        return $this->end_at ? Carbon::parse($this->end_at)->format('M d, Y') : 'N/A';
    }

    // Accessor for full date range
    public function getFormattedDateRangeAttribute()
    {
        $startDate = $this->formatted_start_at;
        $endDate = $this->formatted_end_at;

        if ($startDate === 'N/A' && $endDate === 'N/A') {
            return 'N/A';
        }

        return $startDate . ' - ' . $endDate;
    }
}

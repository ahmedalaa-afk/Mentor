<?php

namespace App\Livewire\Admin\Announcement;

use App\Models\Announcement;
use Livewire\Component;
use Livewire\WithPagination;

class AnnouncementsData extends Component
{
    use WithPagination;

    protected $listeners = ['refreshAnnouncement' => '$refresh'];

    public function render()
    {
        $announcements = Announcement::with('admin')
            ->orderBy('is_pinned', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.announcement.announcements-data', compact('announcements'));
    }
}

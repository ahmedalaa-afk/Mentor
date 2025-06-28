<?php

namespace App\Livewire\User;

use App\Models\Announcement;
use Livewire\Component;
use Livewire\WithPagination;

class AnnouncementsFilter extends Component
{
    use WithPagination;

    public function render()
    {
        $announcements = Announcement::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.announcements-filter', [
            'announcements' => $announcements
        ]);
    }
}

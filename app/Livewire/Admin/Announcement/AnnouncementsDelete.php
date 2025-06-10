<?php

namespace App\Livewire\Admin\Announcement;

use App\Models\Announcement;
use Livewire\Component;

class AnnouncementsDelete extends Component
{
    protected $listeners = ['deleteAnnouncement'];
    public $announcement;
    public function deleteAnnouncement($id)
    {
        $this->announcement = Announcement::find($id);
        $this->dispatch('deleteAnnouncementModal');
    }
    public function submit()
    {
        $this->announcement->delete();
        $this->dispatch('deleteAnnouncementModal');
        $this->dispatch('refreshAnnouncement')->to(AnnouncementsData::class);
    }
    public function render()
    {
        return view('admin.announcement.announcements-delete');
    }
}

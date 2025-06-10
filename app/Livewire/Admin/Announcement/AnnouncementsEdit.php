<?php

namespace App\Livewire\Admin\Announcement;

use App\Models\Announcement;
use App\Models\Category;
use App\Service\FileUploadService;
use Livewire\Component;
use Livewire\WithFileUploads;

class AnnouncementsEdit extends Component
{
    protected $listeners = ['editAnnouncement', 'resetForm'];
    use WithFileUploads;

    public $title;
    public $description;
    public $image;
    public $old_image;
    public $category_id;
    public $start_at;
    public $end_at;
    public $status = 'active';
    public $importance = 'medium';
    public $target_audience = 'all';
    public $is_pinned = false;
    public $announcement_id;

    public function resetForm()
    {
        $this->reset(['title', 'description', 'image', 'old_image', 'category_id', 'start_at', 'end_at', 'status', 'importance', 'target_audience', 'is_pinned', 'announcement_id']);
    }

    public function editAnnouncement($id)
    {
        $this->resetForm();
        $announcement = Announcement::find($id);
        $this->announcement_id = $id;
        $this->title = $announcement->title;
        $this->description = $announcement->description;
        $this->old_image = $announcement->image;
        $this->category_id = $announcement->category_id;
        $this->start_at = $announcement->start_at;
        $this->end_at = $announcement->end_at;
        $this->status = $announcement->status;
        $this->importance = $announcement->importance;
        $this->target_audience = $announcement->target_audience;
        $this->is_pinned = $announcement->is_pinned;

        $this->dispatch('editAnnouncementModal');
    }

    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'required|min:10',
        'image' => 'nullable|image|max:2048',
        'category_id' => 'required|exists:categories,id',
        'start_at' => 'required|date',
        'end_at' => 'required|date|after:start_at',
        'status' => 'required|in:active,inactive',
        'importance' => 'required|in:low,medium,high',
        'target_audience' => 'required|in:all,students,teachers,admins',
        'is_pinned' => 'boolean'
    ];

    public function submit()
    {
        $this->validate();

        $announcement = Announcement::find($this->announcement_id);

        $imagePath = $this->old_image;
        if ($this->image) {
            $fileUploadService = app(FileUploadService::class);
            $imagePath = $fileUploadService->uploadImage($this->image, 'announcements');
        }

        $announcement->update([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imagePath,
            'category_id' => $this->category_id,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'status' => $this->status,
            'importance' => $this->importance,
            'target_audience' => $this->target_audience,
            'is_pinned' => $this->is_pinned,
        ]);

        $this->dispatch('editAnnouncementModal');
        $this->reset(['title', 'description', 'image', 'old_image', 'category_id', 'start_at', 'end_at', 'status', 'importance', 'target_audience', 'is_pinned', 'announcement_id']);
        $this->dispatch('refreshAnnouncement')->to(AnnouncementsData::class);
        session()->flash('success', 'Announcement updated successfully.');
    }

    public function render()
    {
        return view('admin.announcement.announcements-edit', [
            'categories' => Category::all()
        ]);
    }
}

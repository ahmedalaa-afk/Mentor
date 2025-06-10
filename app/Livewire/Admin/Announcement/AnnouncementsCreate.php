<?php

namespace App\Livewire\Admin\Announcement;

use App\Models\Announcement;
use App\Models\Category;
use App\Service\FileUploadService;
use Livewire\Component;
use Livewire\WithFileUploads;

class AnnouncementsCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $image;
    public $category_id;
    public $start_at;
    public $end_at;
    public $status = 'active';
    public $importance = 'medium';
    public $target_audience = 'all';
    public $is_pinned = false;

    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'required|min:10',
        'image' => 'required|image|max:2048',
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

        $fileUploadService = app(FileUploadService::class);
        $imagePath = $fileUploadService->uploadImage($this->image, 'announcements');

        Announcement::create([
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
            'admin_id' => request()->user()->id,
        ]);

        $this->dispatch('createAnnouncementModal');
        $this->reset(['title', 'description', 'image', 'category_id', 'start_at', 'end_at', 'status', 'importance', 'target_audience', 'is_pinned']);
        $this->dispatch('refreshAnnouncement')->to(AnnouncementsData::class);
        session()->flash('success', 'Announcement created successfully.');
    }

    public function render()
    {
        return view('admin.announcement.announcements-create', [
            'categories' => Category::all()
        ]);
    }
}

<?php

namespace App\Livewire\User;

use App\Models\Announcement;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AnnouncementsFilter extends Component
{
    use WithPagination;

    public $selectedCategory;
    public $selectedImportance;
    public $categories;
    public $importances;

    public function mount()
    {
        $this->categories = Category::all();
        $this->importances = ['low', 'medium', 'high'];
    }

    public function render()
    {
        $announcements = Announcement::query();

        if ($this->selectedCategory) {
            $announcements->where('category_id', $this->selectedCategory);
        }

        if ($this->selectedImportance) {
            $announcements->where('importance', $this->selectedImportance);
        }

        $announcements = $announcements->paginate(10);

        return view('user.announcements-filter', [
            'announcements' => $announcements
        ]);
    }
}

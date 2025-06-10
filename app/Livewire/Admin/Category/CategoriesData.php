<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class CategoriesData extends Component
{
    protected $listeners = ['refreshCategory' => '$refresh'];
    public function render()
    {
        $categories = Category::all();
        return view('admin.category.categories-data', ['categories' => $categories]);
    }
}

<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CategoriesCreate extends Component
{
    public $name, $parent;
    public function rules()
    {
        return [
            'name' => 'required|unique:categories,name',
            'parent' => 'nullable|exists:categories,id',
        ];
    }
    public function submit()
    {
        $this->validate();
        // create Category
        Category::create(['name' => $this->name, 'parent_id' => $this->parent, 'admin_id' => Auth::user()->id]);
        // reset inputs
        $this->reset(['name', 'parent']);
        // close modal
        $this->dispatch('createCategoryModal');
        // refresh categories
        $this->dispatch('refreshCategory')->to(CategoriesData::class);
    }
    public function render()
    {
        $categories = Category::all();
        return view('admin.category.categories-create', ['categories' => $categories]);
    }
}

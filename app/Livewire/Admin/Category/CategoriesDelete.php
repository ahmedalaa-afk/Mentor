<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class CategoriesDelete extends Component
{
    protected $listeners = ['deleteCategory'];
    public $category;
    public function deleteCategory($id)
    {
        // fetch the category
        $this->category = Category::find($id);
        // dispatch the delete modal
        $this->dispatch('deleteCategoryModal');
    }
    public function submit()
    {
        // delete the category and keep the children
        $this->category->deleteCategory();
        // close the delete modal
        $this->dispatch('deleteCategoryModal');
        // refresh the categories data
        $this->dispatch('refreshCategory')->to(CategoriesData::class);
    }
    public function render()
    {
        return view('admin.category.categories-delete');
    }
}

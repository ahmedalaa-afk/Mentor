<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class CategoriesEdit extends Component
{
    public $selectedCategory, $name, $parent;
    protected $listeners = ['editCategory'];
    public function editCategory($id)
    {
        // fetch the category
        $this->selectedCategory = Category::find($id);
        $this->name = $this->selectedCategory->name;
        $this->parent = $this->selectedCategory->parent->id ?? null;
        $this->resetValidation();
        // show modal
        $this->dispatch('editCategoryModal');
    }
    public function rules()
    {
        return [
            'name' => 'required',
            'parent' => 'nullable',
        ];
    }
    public function submit()
    {
        $data = $this->validate();
        // check if the selected parent is the category itself
        if ($this->selectedCategory->id == $this->parent) {
            return $this->addError('parent', 'The selected parent cannot be the same as the category itself.');
        }
        // update the category in the database
        $this->selectedCategory->update(['name' => $data['name'], 'parent_id' => $this->parent]);
        // close the modal
        $this->dispatch('editCategoryModal');
        // refresh data modal
        $this->dispatch('refreshCategory')->to(CategoriesData::class);
    }
    public function render()
    {
        $categories = Category::all();
        return view('admin.category.categories-edit', ['categories' => $categories]);
    }
}

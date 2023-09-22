<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminCategoryEditComponent extends Component
{
    public $category_id;
    public $name;
    public $slug;    
    /**
     * mount
     *
     * @param  mixed $category_id
     * @return void
     */
    public function mount($category_id)
    {
        $this->category_id = $category_id;
        $category = Category::find($this->category_id);
        $this->name = $category->name;
        $this->slug = $category->slug;
    }
    
    /**
     * generateSlug
     *
     * @return void
     */
    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }    
    /**
     * editCategory
     *
     * @return void
     */
    public function editCategory(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);

        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Category has been updated successfully!');
    }    
    /**
     * updated
     *
     * @param  mixed $fields
     * @return void
     */
    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
    }
    
    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.admin.admin-category-edit-component');
    }
}

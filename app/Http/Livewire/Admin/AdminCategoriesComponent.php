<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\Pagination;
use App\Models\Category;


class AdminCategoriesComponent extends Component
{
    public $categoryId;
    
    /**
     * deleteCategory
     *
     * @return void
     */
    public function deleteCategory(){
        $category = Category::find($this->categoryId);
        $category->delete();
        session()->flash('message', 'Category has been deleted successfully!');
    }

    
    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        $categories = Category::paginate(10);
        return view('livewire.admin.admin-categories-component',['categories' => $categories]);
    }
}

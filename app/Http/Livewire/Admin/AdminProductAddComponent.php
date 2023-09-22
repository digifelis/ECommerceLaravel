<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Category;

class AdminProductAddComponent extends Component
{
    use WithFileUploads;
    
    public $name;
    public $slug;
    public $image;
    public $product_id;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status = 'instock';
    public $featured = 0;
    public $quantity;
    public $category_id;
    public $images;
    
    /**
     * generateSlug
     *
     * @return void
     */
    public function generateSlug(){
        $this->slug = Str::slug($this->name, '-');
    }
    
    /**
     * addProduct
     *
     * @return void
     */
    public function addProduct(){
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        if($this->image){
            $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('products', $imageName);
            $product->image = $imageName;
        }
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message', 'Product has been created successfully!');
    }

    
    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-product-add-component', ['categories' => $categories]);
    }
}

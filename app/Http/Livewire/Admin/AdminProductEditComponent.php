<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Category;

class AdminProductEditComponent extends Component
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
    public $stock_status;
    public $featured;
    public $quantity;
    public $category_id;
    public $newImage;
    
    /**
     * generateSlug
     *
     * @return void
     */
    public function generateSlug(){
        $this->slug = Str::slug($this->name, '-');
    } 
    
    /**
     * mount
     *
     * @param  mixed $product_id
     * @return void
     */
    public function mount($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->category_id = $product->category_id;
        $this->image = $product->image;
        $this->product_id = $product->id;
    }
    
    /**
     * editProduct
     *
     * @return void
     */
    public function editProduct(){
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $product->category_id = $this->category_id;
        if($this->newImage){
            $imageName = Carbon::now()->timestamp. '.' . $this->newImage->extension();
            $this->newImage->storeAs('products', $imageName);
            $product->image = $imageName;
        }
        $product->save();
        session()->flash('message', 'Product has been updated successfully!');
    }    
    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-product-edit-component', ['categories' => $categories]);
    }
}

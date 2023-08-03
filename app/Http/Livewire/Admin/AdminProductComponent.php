<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\Pagination;
use App\Models\Product;
use App\Models\Category;

class AdminProductComponent extends Component
{
    public $productId;
    public function deleteProduct(){
        $product = Product::find($this->productId);
        $product->delete();
        session()->flash('message', 'Product has been deleted successfully!');
    }
    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.admin-product-component', ['products' => $products]);
    }
}

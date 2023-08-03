<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;
class DetailsComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function store($product_id, $product_name, $product_price, $product_slug){
        Cart::add($product_id, $product_name, 1, $product_price, ['slug' => $product_slug])->associate('App\Models\Product');
        session()->flash('success_message', "Item added in Cart");
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        //$related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(5)->get();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        //$new_products = Product::where('category_id', $product->category_id, 'desc')->limit(4)->get();
        $new_products = Product::latest()->take(4)->get();
        return view('livewire.details-component', ['product' => $product, 
                                                    'releated_products' => $related_products, 
                                                    'new_products' => $new_products]);
    }
}

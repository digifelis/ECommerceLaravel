<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\HomeSlider;
use Cart;
class HomeComponent extends Component
{
    public function store($product_id, $product_name, $product_price, $product_slug){
        Cart::instance('shopping')->add($product_id, $product_name, 1, $product_price, ['slug' => $product_slug])->associate('App\Models\Product');
        session()->flash('success_message', "Item added in Cart");
        $this->emitTo('cart-icon-component', 'refreshComponent');
      //  return redirect()->route('product.cart');
    }

    public function addWishList($product_id, $product_name, $product_price, $product_slug){
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price, ['slug' => $product_slug])->associate('App\Models\Product');
        session()->flash('success_message', "Item added in Wishlist");
        $this->emitTo('wish-list-component', 'refreshComponent');
    }
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();

        $featured_products = Product::orderBy('sale_price', 'DESC')->limit(8)->get();
        $popular_products = Product::orderBy('quantity', 'DESC')->limit(8)->get();
        $recent_products = Product::orderBy('created_at', 'DESC')->limit(8)->get();
        return view('livewire.home-component', 
        [
            'sliders' => $sliders, 
            'featured_products' => $featured_products, 
            'popular_products' => $popular_products, 
            'recent_products' => $recent_products
        ]);
    }
}

<?php

namespace App\Http\Livewire;
use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;


class SearchComponent extends Component
{
    use WithPagination;
    public $pageSize = 10;
    public $orderBy = 'Default';
    public $q;
    public $search_term;
    public $min_value = 0;
    public $max_value = 1000;
    public function mount(){
        $this->fill(request()->only('q'));
        $this->search_term = '%'.request()->q.'%';
    }

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
    public function changePagesize($size){
        $this->pageSize = $size;
    }
    public function changeOrder($order){
        $this->orderBy = $order;
    }
    public function render()
    {
        $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('name', 'like', $this->search_term)->paginate($this->pageSize);
        if($this->orderBy == 'Price: Low to High'){
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('name', 'like', $this->search_term)->orderBy('sale_price', 'ASC')->paginate($this->pageSize);
        }
        if($this->orderBy == 'Price: High to Low'){
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('name', 'like', $this->search_term)->orderBy('sale_price', 'DESC')->paginate($this->pageSize);
        }
        if($this->orderBy == 'Product: A to Z'){
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('name', 'like', $this->search_term)->orderBy('name', 'ASC')->paginate($this->pageSize);
        }
        if($this->orderBy == 'Product: Z to A'){
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('name', 'like', $this->search_term)->orderBy('sale_price', 'DESC')->paginate($this->pageSize);
        }

        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.search-component', ['products' => $products, 'categories' => $categories]);
    }
}

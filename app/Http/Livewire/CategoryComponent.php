<?php

namespace App\Http\Livewire;
use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;


class CategoryComponent extends Component
{
    use WithPagination;
    public $pageSize = 10;
    public $orderBy = 'Default';
    public $category_slug;
    public $min_value = 0;
    public $max_value = 1000;
    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
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
        $category = Category::where('slug', $this->category_slug)->first();
        $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('category_id', $category->id)->paginate($this->pageSize);
        if($this->orderBy == 'Price: Low to High'){
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('category_id', $category->id)->orderBy('sale_price', 'ASC')->paginate($this->pageSize);
        }
        if($this->orderBy == 'Price: High to Low'){
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('category_id', $category->id)->orderBy('sale_price', 'DESC')->paginate($this->pageSize);
        }
        if($this->orderBy == 'Product: A to Z'){
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('category_id', $category->id)->orderBy('name', 'ASC')->paginate($this->pageSize);
        }
        if($this->orderBy == 'Product: Z to A'){
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('category_id', $category->id)->orderBy('name', 'DESC')->paginate($this->pageSize);
        }

        $categories = Category::orderBy('name', 'ASC')->get();
        $newProducts = Product::orderBy('created_at', 'DESC')->get()->take(3);
        return view('livewire.category-component', ['products' => $products, 'categories' => $categories, 'category' => $category, 'newProducts' => $newProducts]);
        // return view('livewire.category-component');
    }
}

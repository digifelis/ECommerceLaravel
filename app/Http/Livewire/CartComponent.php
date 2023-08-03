<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        $product = Cart::instance('shopping')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('shopping')->update($rowId, $qty);
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function decreaseQuantity($rowId){
        $product = Cart::instance('shopping')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('shopping')->update($rowId, $qty);
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function destroy($rowId){
        Cart::instance('shopping')->remove($rowId);
        $this->emitTo('cart-icon-component', 'refreshComponent');
        session()->flash('success_message', 'Item has been removed');
    }
    
    public function destroyAll(){
        Cart::instance('shopping')->destroy();
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function checkout(){
        return redirect()->route('shop.checkout');
    }
    
    public function render()
    {
        return view('livewire.cart-component');
    }
}

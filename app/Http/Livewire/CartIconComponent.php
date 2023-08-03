<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class CartIconComponent extends Component
{
    protected $listeners = ['refreshComponent' => 'render'];
    public function destroy($rowId){
        Cart::instance('shopping')->remove($rowId);
       // $this->emitTo('cart-icon-component', 'refreshComponent');
        session()->flash('success_message', 'Item has been removed');
    }
    public function render()
    {
        return view('livewire.cart-icon-component');
    }
}

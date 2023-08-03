<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class WishlistAllComponent extends Component
{
    public function remove($rowId)
    {
        Cart::instance('wishlist')->remove($rowId);
        $this->emitTo('wish-list-component', 'refreshComponent');
        session()->flash('success_message', 'Item has been removed');
    }

    public function render()
    {
        return view('livewire.wishlist-all-component');
    }
}

<?php

namespace App\Http\Livewire\Cart;

use Gloudemans\Shoppingcart\Cart;
use Livewire\Component;

class Index extends Component
{
    public function render(Cart $cart)
    {
        $item = $cart->content();
        return view('livewire.cart.index', ['cart' => $item, 'total' => $cart->subtotalFloat()]);
    }

    public function removeItem($rowId, Cart $cart)
    {
        $cart->remove($rowId);
        $this->reset();
    }
}

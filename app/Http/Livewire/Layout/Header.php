<?php

namespace App\Http\Livewire\Layout;

use Gloudemans\Shoppingcart\Cart;
use Livewire\Component;

class Header extends Component
{
    protected $listeners = ['cart_updated' => 'render'];

    public function render(Cart $cart)
    {
        $count = $cart->content()->count();
        $cart = $cart->content();
        return view('livewire.layout.header', ['count' => $count, 'cart' => $cart]);
    }
}

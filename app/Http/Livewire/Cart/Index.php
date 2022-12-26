<?php

namespace App\Http\Livewire\Cart;

use Gloudemans\Shoppingcart\Cart;
use Livewire\Component;

class Index extends Component
{
    public $order = [];

    public function render(Cart $cart)
    {
        $this->order = $cart->content();
        return view('livewire.cart.index', ['cart' => $this->order, 'total' => $cart->subtotalFloat()]);
    }

    public function removeItem($rowId, Cart $cart)
    {
        $cart->remove($rowId);
        $this->reset();
        $this->emit('cart_updated');
        $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => 'Đã xóa thành món hàng']);
    }

    public function increaseQty($rowId, $qty, Cart $cart)
    {
        $quantity = $qty + 1;
        $cart->update($rowId, $quantity);
        $this->emit('cart_updated');
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Cập nhật giỏ hàng thành công']);
    }

    public function decreaseQty($rowId, $qty, Cart $cart)
    {
        $quantity = $qty <= 1 ? 1 : $qty - 1;
        $cart->update($rowId, $quantity);
        $this->emit('cart_updated');
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Cập nhật giỏ hàng thành công']);
    }
}

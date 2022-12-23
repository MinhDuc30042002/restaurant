<?php

namespace App\Http\Livewire\Client;

use App\Http\Livewire\Layout\Header;
use Gloudemans\Shoppingcart\Cart;
use Livewire\Component;

class Foods extends Component
{
    public $data;
    public $related_item;

    public $addToCart = ['quantity' => 1];

    public function render()
    {
        return view('livewire.client.foods');
    }

    public function addToCart(Cart $cart)
    {
        $item = ['id' => $this->data->id, 'name' => $this->data->name, 'qty' => $this->addToCart['quantity'], 'price' => $this->data->price, 'weight' => 0, 'options' => ['image' => $this->data->image]];
        $cart->setGlobalTax(0.5);
        $cart->add([$item]);

        $this->emit('cart_updated');
        session()->flash('message', 'Cập nhật giỏ hàng thành công');
    }
}

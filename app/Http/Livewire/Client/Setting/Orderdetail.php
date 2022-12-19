<?php

namespace App\Http\Livewire\Client\Setting;

use App\Models\Order;
use Livewire\Component;

class Orderdetail extends Component
{
    public $identify;
    public $order;
    public $order_lines;

    public function render()
    {
        return view('livewire.client.setting.orderdetail');
    }

    public function mount()
    {
        $this->order = Order::find($this->identify);
        $this->order_lines = $this->order->lines()->get();
    }
}

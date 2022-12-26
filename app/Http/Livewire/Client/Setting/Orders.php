<?php

namespace App\Http\Livewire\Client\Setting;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Orders extends Component
{
    private $orders;
    public $limitPerPage = 5;
    
    public function onScrollLoadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 5;
    }

    public function render()
    {
        $partner_id = Auth::user()->partner->id;

        $this->orders = Order::where('partner_id', $partner_id)->paginate($this->limitPerPage);
        $orders_pending = Order::where('partner_id', $partner_id)->where('state', 'Chờ xác nhận')->paginate($this->limitPerPage);
        $orders_handle = Order::where('partner_id', $partner_id)->where('state', 'Đã xác nhận')->paginate($this->limitPerPage);


        return view('livewire.client.setting.orders', ['orders' => $this->orders, 'orders_pending' => $orders_pending, 'orders_handle' => $orders_handle]);
    }
}

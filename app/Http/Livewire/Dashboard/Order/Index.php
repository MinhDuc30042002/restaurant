<?php

namespace App\Http\Livewire\Dashboard\Order;

use App\Models\OrderType;
use Livewire\Component;

class Index extends Component
{
    private $order_type;
    public $limitPerPage = 10;
    public $action;

    public $search = '';
    public function render()
    {
        $type = OrderType::where('name', '=', $this->action)->first();
        $this->order_type = $type->orders()->withCount('lines')->orderByDesc('id')->paginate($this->limitPerPage);
        $orders_pending = $type->orders()->withCount('lines')->where('state', 'Chờ xác nhận')->paginate($this->limitPerPage);
        $orders_handle = $type->orders()->withCount('lines')->where('state', 'Đã xác nhận')->paginate($this->limitPerPage);

        $key = '%' . $this->search . '%';
        if ($this->search != '') {
            $this->order_type = $type->orders()->where('name', 'LIKE', $key)
                ->orWhere('phone', 'LIKE', $key)
                ->orWhere('email', 'LIKE', $key)
                ->paginate($this->limitPerPage);
        }


        return view('livewire.dashboard.order.index', ['orders' => $this->order_type, 'orders_pending' => $orders_pending, 'orders_handle' => $orders_handle]);
    }

    public function onScrollLoadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 5;
    }
}

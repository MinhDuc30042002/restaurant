<?php

namespace App\Http\Livewire\Dashboard\Order;

use App\Models\Order;
use App\Models\OrderType;
use App\Models\Partner;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class Show extends Component
{
    public $order_id;
    public $action;
    public $order_detail;
    public $order_lines;
    public $state;

    public function render()
    {
        $type = OrderType::where('name', '=', $this->action)->first();
        $this->order_detail = $type->orders()->where('id', '=', $this->order_id)->first();
        $this->order_lines = $this->order_detail->lines()->get();
        return view('livewire.dashboard.order.show', ['order_lines' => $this->order_lines, 'order_detail' => $this->order_detail]);
    }

    public function generatepdf($id)
    {
        $this->partner2 = Partner::where('id', $id)->get();
        $this->order2 = Order::where('partner_id', $id)->get();
        $order1 = Order::find($id);
        $this->detailOrder = $order1->lines()->where('order_id', $id)->get();
        $this->sub_total = $order1->lines()->where('order_id', $id)->sum('amount');
        $this->total = intval($this->sub_total + ($this->sub_total * 10 / 100));
        view()->share(['order1' => $order1, 'detaiOrder' => $this->detailOrder, 'sub_total' => $this->sub_total, 'total' => $this->total, 'partner2' => $this->partner2, 'order2' => $this->order2]);
        $pdf = Pdf::loadView('dashboard.PDF.index')->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "invoice.pdf"
        );
    }

    public function changeState($parameter)
    {
        Order::where('id', $parameter)->update(['state' => 'Đã xác nhận']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Đã duyệt đơn hàng']);
    }
}

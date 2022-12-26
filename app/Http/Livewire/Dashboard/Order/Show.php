<?php

namespace App\Http\Livewire\Dashboard\Order;

use App\Models\ActivityMessage;
use App\Models\Order;
use App\Models\OrderLine;
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
    public $amount;
    public $subtotal;
    public $taxRate;

    protected $listeners = ['call' => 'render'];

    public function render()
    {
        $type = OrderType::where('name', '=', $this->action)->first();
        $this->order_detail = $type->orders()->where('id', '=', $this->order_id)->first();
        $this->order_lines = $this->order_detail->lines()->get();

        return view('livewire.dashboard.order.show', ['order_lines' => $this->order_lines, 'order_detail' => $this->order_detail]);
    }

    public function mount()
    {
        $type = OrderType::where('name', '=', $this->action)->first();
        $this->order_detail = $type->orders()->where('id', '=', $this->order_id)->first();
        $this->order_lines = $this->order_detail->lines()->get();

        $this->amount = $this->order_detail->amount;
        $this->subtotal = $this->order_detail->subtotal_float;
        $this->taxRate = $this->order_detail->tax_float;

        $this->handleQty();
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

    public function decreaseQty($key, $qty)
    {
        $this->handleQty();
        $quantity = $qty <= 1 ? 1 : $qty - 1;
        $this->order_lines[$key]->update(['quantity' => $quantity, 'amount' => $this->order_lines[$key]->food_price * $quantity]);
        $this->order_detail->update(['tax_float' => $this->taxRate, 'subtotal_float' => $this->subtotal, 'amount' => $this->amount]);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Cập nhật giỏ hàng thành công']);
        $this->mount();
    }

    public function increaseQty($key, $qty)
    {
        $this->handleQty();
        $quantity = $qty + 1;
        $this->order_lines[$key]->update(['quantity' => $quantity, 'amount' => $this->order_lines[$key]->food_price * $quantity]);
        $this->order_detail->update(['tax_float' => $this->taxRate, 'subtotal_float' => $this->subtotal, 'amount' => $this->amount]);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Cập nhật giỏ hàng thành công']);
        $this->mount();
    }

    public function handleQty()
    {
        $type = OrderType::where('name', '=', $this->action)->first();
        $this->order_detail = $type->orders()->where('id', '=', $this->order_id)->first();
        $this->order_lines = $this->order_detail->lines()->get();

        $this->subtotal = $this->order_lines->sum('amount');
        $this->taxRate = $this->subtotal * 0.1;
        $this->amount = $this->subtotal + $this->order_detail->ship_rate + $this->order_detail->tax_float;
    }
}

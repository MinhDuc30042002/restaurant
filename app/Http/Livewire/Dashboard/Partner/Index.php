<?php

namespace App\Http\Livewire\Dashboard\Partner;

use Livewire\Component;
use App\Models\Partner;
use App\Models\Order;
use App\Models\OrderLine;
use BaconQrCode\Renderer\Path\Path;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\PDF;

class Index extends Component
{
    use WithPagination;
    public $search = '';
    public $name, $phone, $email;
    public $orderdetail;
    public $detail;
    public $modelId;
    public $modelId_detail;
    public $order_detail;
    public $detailOrder;
    public $order;
    public $showState;
    public $state;
    public $stateId;
    public $modalConfirmDeleteVisible;
    public $order2;
    public $sub_total;
    public $total;
    public $order1;

    private $orders;
    public $limitPerPage = 10;
    private $order_type;

    public function onScrollLoadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 5;
    }


    public function render()
    {
        $search = '%' . $this->search . '%';

        $this->order_type = Order::withCount('lines')->orderByDesc('id')->paginate($this->limitPerPage);

        if ($this->search != '') {
            $this->order_type = Order::where('name', 'LIKE', $search)
                ->orWhere('phone', 'LIKE', $search)
                ->orWhere('email', 'LIKE', $search)
                ->paginate($this->limitPerPage);
        }

        $orders_pending = Order::where('state', 'Chờ xác nhận')->paginate($this->limitPerPage);
        $orders_handle = Order::where('state', 'Đã xác nhận')->paginate($this->limitPerPage);


        return view('livewire.dashboard.partner.index', [
            'orders' => $this->order_type,
            'orders_pending' => $orders_pending,
            'orders_handle' => $orders_handle,
        ]);
    }
    public function showOrder($id)
    {
        $this->modelId = $id;
        $partner1 = Partner::find($this->modelId);
        $this->order = $partner1->orders()->where('partner_id', $this->modelId)->get();
        $this->orderdetail = true;
    }
    public function detail($id)
    {
        $this->modelId_detail = $id;
        $this->order2 = Order::find($this->modelId_detail)->get();
        $order1 = Order::find($this->modelId_detail);
        $this->detailOrder = $order1->lines()->where('order_id', $this->modelId_detail)->get();
        $this->sub_total = $order1->lines()->where('order_id', $this->modelId_detail)->sum('food_price');
        $this->total = intval($this->sub_total * 10 / 100);
        $this->order_detail = true;
    }
    public function showUpdateState($id)
    {
        $this->reset();
        $this->showState = true;
        $this->stateId = $id;
        $this->loadState();
    }
    public function loadState()
    {
        $order_state = Order::find($this->stateId)->get();
    }
    public function updateState()
    {
        Order::find($this->stateId)->update(['state' => $this->state]);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Update Successful !']);
        $this->showState = false;
    }
    public function showDeleteInvoice()
    {
        $this->modalConfirmDeleteVisible = true;
    }
    public function deleteInvoice($id)
    {
        Order::destroy($id);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Delete OK !']);
        $this->modalConfirmDeleteVisible = false;
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
        $pdf = PDF::loadView('dashboard.PDF.index')->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "invoice.pdf"
        );
    }
}

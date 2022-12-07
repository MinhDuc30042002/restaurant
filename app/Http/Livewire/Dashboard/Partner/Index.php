<?php

namespace App\Http\Livewire\Dashboard\Partner;

use Livewire\Component;
use App\Models\Partner;
use App\Models\Order;
use BaconQrCode\Renderer\Path\Path;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $search = '';
    public $name, $phone, $email;
    public $orderdetail;
    public $detail;
    public $modelId;
    public $order_detail;
    public $detailOrder;
    public $order;
    
    public function render()
    {
        $search = '%' . $this->search . '%';
        $partner = Partner::where('name', 'LIKE', $search)
            ->orWhere('phone', 'LIKE', $search)
            ->orWhere('email', 'LIKE', $search)
            ->paginate(10);

        return view('livewire.dashboard.partner.index', [
            'partner' => $partner
        ]);
    }
    public function showOrder($id)
    {
        $this->modelId = $id;
        $partner1 = Partner::find($this->modelId);
        $this->order = $partner1->orders()->where('partner_id',$this->modelId)->get();
        $this->orderdetail = true;
    }
    public function detail($id)
    {
        $this->modelId = $id;
        $order1 = Order::find($this->modelId);
        $this->detailOrder = $order1->lines()->where('order_id',$this->modelId)->get();
        $this->order_detail = true;
    }
}

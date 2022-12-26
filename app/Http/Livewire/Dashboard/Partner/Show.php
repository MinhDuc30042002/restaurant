<?php

namespace App\Http\Livewire\Dashboard\Partner;

use App\Models\Order;
use App\Models\OrderLine;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\PDF;

class Show extends Component
{
    public $modelId_detail;
    public $total;
    public $sub_total;
    public $editedProductIndex = null;
    public $detailOrder = [];

    protected function rules()
    {
        return [
            'detailOrder.*.quantity' => ['required','numeric'],
        ];
    }

    protected function messages()
    {
        return [
            'required' => ':attribute không thể để trống.',
            'numeric' => ':attribute chỉ nhập số'
        ];
    }

    protected function validationAttributes()
    {
        return [
            'detailOrder.*.quantity' => 'Số lượng',
        ];
    }
    public function render()
    {
        $order1 = Order::find($this->modelId_detail);
        $this->detailOrder = $order1->lines()->where('order_id', $this->modelId_detail)->get();
        return view('livewire.dashboard.partner.show',['detailOrder' => $this->detailOrder, 'order' => $order1]);
    }
    public function deleteInvoice($id)
    {
        OrderLine::destroy($id);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Delete OK !']);
        $this->modalConfirmDeleteVisible = false;
    }
    public function generatepdf()
    {
        $order2 = Order::where('partner_id',$this->modelId_detail)->get();
        $order1 = Order::find($this->modelId_detail);
        $partner2 = $order1->partner()->get();
        $detailOrder = $order1->lines()->where('order_id', $this->modelId_detail)->get();
        $this->sub_total = $order1->lines()->where('order_id', $this->modelId_detail)->sum('amount');
        $this->total = intval($this->sub_total + ($this->sub_total * 10/100));
        view()->share(['order1'=>$order1,'detaiOrder'=>$detailOrder,'sub_total'=>$this->sub_total,'total'=>$this->total,'partner2'=>$partner2,'order2'=> $order2]);
        $pdf = Pdf::loadView('dashboard.PDF.index')->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "invoice.pdf"
       );
    }
    public function editProduct($productIndex)
    {
        $this->editedProductIndex = $productIndex;
    }
    public function saveProduct($productIndex)
    {
        $this->validate();
        $product = $this->detailOrder[$productIndex] ?? NULL;
        OrderLine::find($product['id'])->update(['quantity' => $product->quantity]);

        $this->editedProductIndex = null;
    }
}

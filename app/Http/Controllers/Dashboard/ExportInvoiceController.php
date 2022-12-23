<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Partner;
use Barryvdh\DomPDF\Facade\PDF;

class ExportInvoiceController extends Controller
{
    public function renderdata($id)
    {
        $data = Order::all();
        return view('livewire.dashboard.PDF.exportPDF',['data' => $data]);
    }
    public function exportPDF()
    {
        $data = Order::all();
        $pdf = PDF::loadView('livewire.dashboard.PDF.exportPDF',['data' => ['data'=>$data]]);
        return $pdf->download('print.pdf');
    }
}

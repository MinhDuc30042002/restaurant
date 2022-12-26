<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\OrderType;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($action)
    {
        return view('dashboard.orders.index', ['action' => $action]);
    }

    public function show($action, $id)
    {
        return view('dashboard.orders.show', ['action' => $action, 'order_id' => $id]);
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\User;

class DasboardController extends Controller
{
    public function index()
    {
        $order = Order::count();
        $user = User::limit(5)->count();
        $newOrder = Order::orderBy('id','desc')->limit(10)->get();
        $sold = OrderLine::orderBy('id','desc')->limit(10)->count();
        $list_staff = User::where('is_staff',1)->orWhere('is_manager',1)->get();
        return view('dashboard',['order' => $order,'user' => $user,'newOrder' => $newOrder,'sold'=>$sold,'list_staff'=>$list_staff]);
    }
}

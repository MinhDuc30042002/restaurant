<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('client.setting.profile');
    }

    public function orders()
    {
        return view('client.setting.orders');
    }

    public function orderDetail($id)
    {
        return view('client.setting.orderdetail', compact('id'));
    }
}

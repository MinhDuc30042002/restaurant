<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return view('dashboard.group.index');
    }

    public function create(){
        // return view('dashboard.group.store');
    }
}

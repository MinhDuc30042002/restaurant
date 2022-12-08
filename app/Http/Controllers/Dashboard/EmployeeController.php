<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.employee.index');
    }
}

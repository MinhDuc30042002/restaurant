<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        return view('dashboard.food.index');
    }

    public function show($id)
    {
        return view('dashboard.food.show', ['id' => $id]);
    }

    public function create()
    {
        return view('dashboard.food.create');
    }

    
}

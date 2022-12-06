<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index($id)
    {
        return view('dashboard.categories.show', compact('id'));
    }

    public function show($id)
    {
        return view('dashboard.food.show', compact('id'));
    }

    public function create()
    {
        return view('dashboard.food.create');
    }

    
}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Food;

class FoodController extends Controller
{
    public function index($slug)
    {
        $food = Food::where('slug', '=', $slug)->first();

        $category = $food->categories()->first();
        $food_related = $category->foods()
            ->where('category_id', '=', $category->id)
            ->take(5)->get();

        return view('client.food.index', ['data' => $food, 'related_item' => $food_related]);
    }
}

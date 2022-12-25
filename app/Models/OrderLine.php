<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id', 'quantity', 'order_id', 'food_price', 'food_name', 'amount', 'food_image',
    ];

    protected static function booted()
    {
        static::created(function ($line) {
            $food = Food::find($line['food_id']);

            $line->update([
                'food_price' => $food->price,
                'food_name' => $food->name,
                'food_image' => $food->image,
                'amount' => $food->price * $line->quantity,
            ]);
        });
    }
}

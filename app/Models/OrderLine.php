<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id', 'quantity', 'order_id',
    ];

    protected static function booted()
    {
        static::created(function ($line) {
            $food = $line->food();
            $line->update([
                'food_price' => $food->price,
                'food_name' => $food->name,
                'amount' => $food->price * $line->quantity,
            ]);
        });
    }
}

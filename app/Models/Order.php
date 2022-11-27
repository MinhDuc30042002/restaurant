<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'state', 'type_id', 'partner_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function lines()
    {
        return $this->hasMany(OrderLine::class, 'order_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Method
    |--------------------------------------------------------------------------
    */

    public function add_line(Food $food, int $quantity)
    {
        $this->lines()->create([
            'food_id' => $food,
            'quantity' => $quantity,
        ]);
    }

    /*
     *  Print order include lines
     *
     */
    public function print_order()
    {
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'state', 'type_id', 'partner_id', 'address', 'email', 'name', 'phone', 'amount' , 'ship_rate', 'tax_float' ,'subtotal_float'
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

    public function add_line(int $food, int $quantity)
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

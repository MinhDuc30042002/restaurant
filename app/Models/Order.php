<?php

namespace App\Models;

use App\Traits\Tracking;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use Tracking;
    use BroadcastsEvents;

    protected $fillable = [
        'state', 'type_id', 'partner_id', 'address', 'email', 'name', 'phone', 'amount', 'ship_rate', 'tax_float', 'subtotal_float',
    ];

    public function tracking(): array
    {
        return [
            'state', 'type_id', 'partner_id', 'address', 'email', 'name', 'phone', 'amount', 'ship_rate', 'tax_float', 'subtotal_float',
        ];
    }

    public function broadcastOn($event)
    {
        return match ($event) {
            'created' => ['App.Models.Order'],
            default => [$this],
        };
    }

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

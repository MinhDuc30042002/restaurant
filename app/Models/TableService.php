<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableService extends Model
{
    use HasFactory;

    protected $fillable = [
        'state', 'table_id', 'staff_id', 'order_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function order()
    {
        return $this->hasOne(Order::class, 'order_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    */
    public function serving()
    {
        $this->update(['state' => 'serving']);
    }

    public function served()
    {
        $this->update(['state' => 'served']);
    }
}

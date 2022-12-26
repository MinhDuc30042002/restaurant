<?php

namespace App\Models;

use App\Traits\Tracking;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    use Tracking;
    use BroadcastsEvents;

    protected $fillable = [
        'name', 'phone', 'email',
    ];

    public function tracking(): array
    {
        return [
            'name', 'phone', 'email',
        ];
    }

    public function broadcastOn($event)
    {
        return match ($event) {
            'created' => ['App.Models.Partner'],
            default => [$this],
        };
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function orders()
    {
        return $this->hasMany(Order::class, 'partner_id');
    }
}

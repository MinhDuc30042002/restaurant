<?php

namespace App\Models;

use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    use BroadcastsEvents;

    public function broadcastOn($event)
    {
        return match ($event) {
            'created' => ['App.Models.Table'],
            default => [$this],
        };
    }

    protected $fillable = [
        'state',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use BroadcastsEvents;

    protected $fillable = ['text', 'user_id', 'food_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function broadcastOn($event)
    {
        return match ($event) {
            'created' => ['App.Models.Comment'],
            default => [$this],
        };
    }
}

<?php

namespace App\Models;

use App\Traits\Tracking;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    use Tracking;
    use BroadcastsEvents;

    protected $fillable = [
        'name', 'slug',
    ];

    public function tracking(): array
    {
        return [
            'name',
        ];
    }

    public function broadcastOn($event)
    {
        return match ($event) {
            'created' => ['App.Models.Category'],
            default => [$this],
        };
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_category', 'category_id', 'food_id');
    }

    protected static function booted()
    {
        static::saving(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }
}

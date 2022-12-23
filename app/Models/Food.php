<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'image', 'description', 'available_quantity', 'slug',
    ];

    protected $table = 'foods';

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'food_category', 'food_id', 'category_id');
    }

    protected static function booted()
    {
        static::saving(function ($food) {
            $food->slug = Str::slug($food->name);
        });
    }
}

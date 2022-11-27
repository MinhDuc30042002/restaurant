<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    const C = 'create_';

    const R = 'read_';

    const U = 'update_';

    const D = 'delete_';

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'permission_group', 'permission_id', 'group_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Create CRUD permissions.
     *
     * @param  string  $name name of model.
     * @return void
     */
    public static function crud(string $name): void
    {
        $attributes_list = [];
        foreach (['C', 'R', 'U', 'D'] as $value) {
            $attributes_list[] = ['name' => constant(static::class.'::'.$value).$name];
        }

        Permission::upsert($attributes_list, ['name']);
    }
}

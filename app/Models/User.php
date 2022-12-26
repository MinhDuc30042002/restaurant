<?php

namespace App\Models;

use App\Traits\Tracking;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Tracking;
    use BroadcastsEvents;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'firstname',
        'lastname',
        'gender',
        'email',
        'phone_number',
        'address',
        'password',
        'is_staff',
        'is_manager',
        'partner_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function tracking(): array
    {
        return [
            'name',
            'firstname',
            'lastname',
            'gender',
            'email',
            'phone_number',
            'address',
            'password',
            'is_staff',
            'is_manager',

        ];
    }

    public function broadcastOn($event)
    {
        return match ($event) {
            'created' => ['App.Models.User'],
            default => [$this],
        };
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user', 'user_id', 'group_id');
    }

    public function partners()
    {
        return $this->hasOne(Partner::class, 'partner_id');
    }

    public function permissions(): Collection
    {
        $permissions = collect([]);
        $this->groups()->each(function ($g) use (&$permissions) {
            $permissions = $g->permissions->map(function ($perm) {
                return $perm->name;
            });
        });

        return $permissions;
    }

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    */

    public function hasPermissions($permissions): bool
    {
        $user_permissions = $this->permissions();

        return collect((array) $permissions)->every(function ($perm) use ($user_permissions) {
            return $user_permissions->contains($perm);
        });
    }
}

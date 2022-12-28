<?php

namespace App\Traits;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

trait Tracking
{
    public static function bootTracking()
    {
        static::created(function ($model) {
            $activity = Activity::create([
                'res_model' => $model::class,
                'res_id' => $model->id,
            ]);
            $user = Auth::user();
            $user_id = null;
            if ($user) {
                $user_id = $user->id;
            }
            $activity->messages()->create([
                'body' => 'New record created',
                'user_id' => $user_id,
            ]);
        });
        static::saved(function ($model) {
            $activity = Activity::firstOrCreate([
                'res_model' => $model::class,
                'res_id' => $model->id,
            ]);
            $user = Auth::user();
            $user_id = null;
            if ($user) {
                $user_id = $user->id;
            }
            foreach ($model->tracking() as $key) {
                if ($model->wasChanged($key)) {
                    $activity->messages()->create([
                        'field' => $key,
                        'origin' => $model->getOriginal($key),
                        'new' => $model[$key],
                        'body' => '',
                        'user_id' => $user_id,
                    ]);
                }
            }
        });
    }

    abstract public function tracking(): array;

    public function getMessages()
    {
        $activity = Activity::where([
            'res_model' => $this::class,
            'res_id' => $this->id,
        ])->first();
        $messages = $activity ? $activity->messages : new Collection();
        if ($messages->count()) {
            $messages = $messages->sortByDesc('updated_at');
        }

        return $messages;
    }
}

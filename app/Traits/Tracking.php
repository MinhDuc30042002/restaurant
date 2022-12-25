<?php

namespace App\Traits;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

trait Tracking
{
    public static function bootTracking()
    {
        static::created(function ($model) {
            $activity = Activity::create([
                'res_model' => $model::class,
                'res_id' => $model->id,
            ]);
            $activity->messages()->create([
                'body' => 'New record created',
                'user_id' => Auth::user()->id,
            ]);
        });
        static::saved(function ($model) {
            $activity = Activity::firstOrCreate([
                'res_model' => $model::class,
                'res_id' => $model->id,
            ]);
            foreach ($model->tracking() as $key) {
                if ($model->wasChanged($key)) {
                    $activity->messages()->create([
                        'body' => $model->getOriginal($key).' to '.$model[$key],
                        'user_id' => Auth::user()->id,
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
        $messages = $activity ? $activity->messages : [];

        return $messages;
    }
}

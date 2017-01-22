<?php

namespace App\Providers;

use App\Activity;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogLastLogin',
            'App\Listeners\UpdateLastLoggedAt',
        ],

    ];

    /**
     * Register any events for your application.
     *
     */
    public function boot()
    {
        parent::boot();

        Event::listen('eloquent.created: *', function ($model) {
           Activity::record('create', $model);
        });
    }
}

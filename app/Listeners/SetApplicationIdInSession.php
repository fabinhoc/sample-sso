<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetApplicationIdInSession
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if(!$event->user->isSuperUser() || !$event->user->isTenantAdmin()) {
            session()->put('applicationIds', $event->user->applications()->select('applications.id')->pluck('id')->toArray());
        }
    }
}

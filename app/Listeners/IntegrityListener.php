<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;
use Illuminate\Queue\InteractsWithQueue;
use TheCapybaRalph\LaravelUhoh\Events\IntegrityCheckFailed;
use TheCapybaRalph\LaravelUhoh\Events\IntegrityCheckPassed;

class IntegrityListener
{
    /**
     * Handle user login events.
     */
    public function handleFailedIntegriyChecks(IntegrityCheckFailed $event): void {
        info($event->message);
    }

    /**
     * Handle user logout events.
     */
    public function handlePassedIntegrityChecks(IntegrityCheckPassed $event): void {
    }

    /**
     * Register the listeners for the subscriber.
     */
    public function subscribe(Dispatcher $events): void
    {
        $events->listen(
            IntegrityCheckFailed::class,
            [IntegrityListener::class, 'handleFailedIntegriyChecks']
        );

        $events->listen(
            IntegrityCheckPassed::class,
            [IntegrityListener::class, 'handlePassedIntegrityChecks']
        );
    }
}

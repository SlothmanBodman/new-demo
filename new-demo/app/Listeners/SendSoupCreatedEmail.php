<?php

namespace App\Listeners;

use App\Events\SoupCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendSoupCreatedEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(SoupCreated $event): void
    {
        Log::info('Soup Created Evenet', [
            'event' => $event,
            'email' => $event->email
        ]);
    }
}

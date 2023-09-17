<?php

namespace App\Listeners;

use App\Events\EndpointDown;
use App\Notifications\EndpointDownNotification;
use Illuminate\Notifications\AnonymousNotifiable;

class SendEndpointDownNotification
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
    public function handle(EndpointDown $event): void
    {
        $notifiable = new AnonymousNotifiable;
        $notifiable->route('mail', 'jack.bodman1998@outlook.com')->notify(new EndpointDownNotification($event->endpoint));
    }
}

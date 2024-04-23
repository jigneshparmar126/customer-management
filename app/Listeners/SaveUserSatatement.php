<?php

namespace App\Listeners;

use App\Events\UserBalance;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\UserStatement;

class SaveUserSatatement
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
    public function handle(UserBalance $event): void
    {

        $eventData = $event->eventData;

        // save a user transection table
        UserStatement::create(['refrence_type'    => $eventData['refrence_type'],
                               'refrence_id'      => $eventData['refrence_id'],
                               'old_balance'      => $eventData['old_balance'],
                               'transaction_type' => $eventData['transaction_type'],
                               'updated_value'    => $eventData['updated_value'],
                               'total_balance'    => $eventData['total_balance'],
                               'partner'          => $eventData['partner'],
        ]);

        
    }
}

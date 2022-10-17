<?php

namespace App\Listeners;

use App\Models\Account;
use Illuminate\Auth\Events\Registered;

class CreateUserAccount
{
    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $account = new Account();

        $account->value = 0;
        $account->user_id = $event->user->id;

        $account->save();
    }
}

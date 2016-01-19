<?php

namespace App\Policies;

use App\User;
use App\Event;


use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    //TOFIX always passing here even if it should be allowed. Will be using a third party plugin for now.
    public function update(User $user, Event $event)
    {
         $user->id === $event->user_id; //die();
    }
}

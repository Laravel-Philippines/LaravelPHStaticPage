<?php

namespace App\Providers;

use App\Event;
use App\Policies\EventPolicy;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
     
    protected $policies = [
        'App\Event' => 'App\Policies\EventPolicy',
    ];
    
    /*
    protected $policies = [
        Event::class => EventPolicy::class,
        
    ];
    */
    
    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        
       //  dd('fuck');
        
       // $gate->define('update-event', function ($user, $event) {
            
      //      return $user->id === $event->user_id;
       //  });
    }
}

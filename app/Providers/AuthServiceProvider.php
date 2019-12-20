<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        /*
        $startTime = date("d-m-Y H:i:s");
        $endTime = date("d-m-Y H:i:s", 
            strtotime('+7 day +1 hour +30 minutes +45 seconds', strtotime($startTime)));
        $expTime = \DateTime::createFromFormat("d-m-Y H:i:s", $endTime);
        Passport::tokenExpireIn($expTime);
        */
        /*
        $startTime = date("Y-m-d H:i:s");
        $endTime = date("Y-m-d H:i:s", 
            strtotime('+7 day +1 hour +30 minutes +45 seconds', strtotime($startTime)));
        $expTime = \DateTime::createFromFormat("Y-m-d H:i:s", $endTime);
        Passport::tokensExpireIn($expTime);
        Passport::refreshTokensExpireIn($expTime);
        */
        
    }
}

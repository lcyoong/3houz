<?php

namespace App\Providers;

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
        // \App\User::class => \App\Policies\UserPolicy::class,
        \App\Property::class => \App\Policies\PropertyPolicy::class,
        \App\PropertyFavourites::class => \App\Policies\PropertyFavouritePolicy::class,
        \App\OfferKey::class => \App\Policies\OfferKeyPolicy::class,
        \App\Offer::class => \App\Policies\OfferPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        // $gate->define('update_property', function ($user, $contact) {
        //             return $user->id === $contact->prop_owner;
        //         });
        //
    }
}

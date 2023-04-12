<?php

namespace App\Providers;

use App\Models\CinemaHall;
use App\Models\Film;
use App\Models\Reservation;
use App\Policies\CinemaHallPolicy;
use App\Policies\FilmPolicy;
use App\Policies\ReservationPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Film::class => FilmPolicy::class,
        CinemaHall::class => CinemaHallPolicy::class,
        Reservation::class => ReservationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}

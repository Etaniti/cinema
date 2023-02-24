<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\FilmPolicy;
use App\Models\Film;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Film::class => FilmPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-film', [FilmPolicy::class, 'create']);
        Gate::define('update-film', [FilmPolicy::class, 'update']);
        Gate::define('delete-film', [FilmPolicy::class, 'delete']);
    }
}

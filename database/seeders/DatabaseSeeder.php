<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleAndPermissionSeeder::class,
            FilmSeeder::class,
            GenreSeeder::class,
            CinemaHallSeeder::class,
            FilmSessionSeeder::class,
        ]);
    }
}

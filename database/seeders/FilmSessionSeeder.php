<?php

namespace Database\Seeders;

use App\Models\FilmSession;
use Illuminate\Database\Seeder;

class FilmSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filmSession = FilmSession::create([
            'film_id' => 1,
            'cinema_hall_id' => 1,
            'date' => '2023-04-12',
            'start' => '17:00:00',
            'end' => '20:15:00',
        ]);

        $filmSession = FilmSession::create([
            'film_id' => 1,
            'cinema_hall_id' => 1,
            'date' => '2023-04-12',
            'start' => '21:00:00',
            'end' => '00:15:00',
        ]);

        $filmSession = FilmSession::create([
            'film_id' => 1,
            'cinema_hall_id' => 1,
            'date' => '2023-04-13',
            'start' => '17:00:00',
            'end' => '20:15:00',
        ]);

        $filmSession = FilmSession::create([
            'film_id' => 1,
            'cinema_hall_id' => 1,
            'date' => '2023-04-13',
            'start' => '21:00:00',
            'end' => '00:15:00',
        ]);
    }
}

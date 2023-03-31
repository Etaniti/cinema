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
            'date' => '2023-03-25',
            'start' => '18:00:00',
            'end' => '20:00:00',
        ]);

        $filmSession = FilmSession::create([
            'film_id' => 1,
            'cinema_hall_id' => 1,
            'date' => '2023-03-25',
            'start' => '20:00:00',
            'end' => '22:00:00',
        ]);

        $filmSession = FilmSession::create([
            'film_id' => 1,
            'cinema_hall_id' => 1,
            'date' => '2023-03-25',
            'start' => '22:00:00',
            'end' => '00:00:00',
        ]);
    }
}

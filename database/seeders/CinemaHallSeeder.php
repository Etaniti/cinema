<?php

namespace Database\Seeders;

use App\Models\CinemaHall;
use Illuminate\Database\Seeder;

class CinemaHallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cinemaHall = CinemaHall::create([
            'name' => 'Малый зал',
            'rows' => 10,
            'seats_in_row' => 15,
        ]);
    }
}

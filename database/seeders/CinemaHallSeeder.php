<?php

namespace Database\Seeders;

use App\Models\CinemaHall;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CinemaHallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seating_chart = Storage::disk('local')->get('/data/seating_chart.json');

        $cinemaHall = CinemaHall::create([
            'name' => 'Малый зал',
            'rows' => 10,
            'seats_in_row' => 15,
            'seating_chart' => $seating_chart,
        ]);
    }
}

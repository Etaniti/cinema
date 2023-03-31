<?php

namespace Database\Seeders;

use App\Models\SeatingChart;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SeatingChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seats = Storage::disk('local')->get('/data/seats.json');

        $seatingChart = SeatingChart::create([
            'cinema_hall_id' => 1,
            'seats' => $seats,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seats = Storage::disk('local')->get('/data/reserved_seats_1.json');
        $reservation = Reservation::create([
            'film_session_id' => 1,
            'seats' => $seats,
        ]);

        $seats = Storage::disk('local')->get('/data/reserved_seats_2.json');
        $reservation = Reservation::create([
            'film_session_id' => 1,
            'seats' => $seats,
        ]);
    }
}

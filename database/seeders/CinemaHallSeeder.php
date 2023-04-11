<?php

namespace Database\Seeders;

use App\Models\CinemaHall;
use App\Models\Seat;
use App\Statuses\Status;
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
            'title' => 'Малый зал',
            'rows' => 10,
            'seats_in_row' => 15,
            'seating_chart' => Status::AVAILABLE,
        ]);

        $cinemaHall->setStatus(Status::ACTIVATED);

        $seats = [];
        for ($i = 1; $i <= $cinemaHall->rows; $i++) {
            for ($j = 1; $j <= $cinemaHall->seats_in_row; $j++) {
                $seats[] = [
                    'cinema_hall_id' => $cinemaHall->id,
                    'row' => $i,
                    'column' => $j,
                    'status' => Status::NOT_AVAILABLE,
                ];
            }
        }

        $cinemaHall->seats()->createMany($seats);

        foreach ($cinemaHall->seats->groupBy('row') as $seats) {
            foreach ($seats as $seat) {
                $availiableSeat = Seat::where('id', $seat->id)->update([
                    'status' => Status::AVAILABLE,
                ]);
            }
        }
    }
}

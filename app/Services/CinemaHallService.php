<?php

namespace App\Services;

use App\Models\CinemaHall;
use App\Models\Seat;
use App\Statuses\Status;

class CinemaHallService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $data
     * @return void
     */
    public function store($data)
    {
        $status = Status::NOT_ACTIVATED;
        $cinemaHall = CinemaHall::create($data)->setStatus($status);

        $seats = [];
        for ($i = 1; $i <= $data['rows']; $i++) {
            for ($j = 1; $j <= $data['seats_in_row']; $j++) {
                $seats[] = [
                    'cinema_hall_id' => $cinemaHall->id,
                    'row' => $i,
                    'column' => $j,
                ];
            }
        }

        $cinemaHall->seats()->createMany($seats);

        return $cinemaHall;
    }
}

<?php

namespace App\Services;

use App\Models\CinemaHall;

class CinemaHallService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $data
     * @return \App\Models\CinemaHall
     */
    public function store($data): CinemaHall
    {
        $row = $data['rows'];
        $seats_in_row = $data['seats_in_row'];
        $seating_chart = [];
        $seats = [];

        for ($i = 0; $i < $seats_in_row; $i++) {
            $seats[$i] = array_push($seats, $i);
        }

        for ($i = 1; $i < $row + 1; $i++) {
            $seating_chart[$i] = $seats;
        }

        $data['seating_chart'] = json_encode($seating_chart);

        return $cinemaHall = CinemaHall::create($data)->setStatus('not_activated');
    }
}

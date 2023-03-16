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
        return $cinemaHall = CinemaHall::create($data)->setStatus('not_activated');
    }
}

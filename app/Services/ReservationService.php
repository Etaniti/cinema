<?php

namespace App\Services;
use App\Models\Reservation;

class ReservationService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $data
     * @return \App\Models\Reservation
     */
    public function store($data): Reservation
    {
        $data['seats'] = json_encode($data['seats']);
        return $reservation = Reservation::create($data);

    }
}

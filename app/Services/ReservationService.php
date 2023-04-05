<?php

namespace App\Services;

use App\Models\FilmSession;
use App\Models\Seat;
use App\Models\Reservation;

class ReservationService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $data
     * @return bool
     */
    public function store($data)
    {
        $filmSession = FilmSession::find($data['film_session_id']);
        $cinemaHall = $filmSession->cinemaHall;

        foreach ($cinemaHall->seats->groupBy('row') as $seats) {
            foreach ($seats as $seat) {
                foreach ($data['seats'] as $row => $key) {
                    foreach ($key as $value) {
                        if ($seat->row == $row && $seat->column == $value) {
                            $seat = $seat->filmSessions()->attach($seat);
                        }
                    }
                }
            }
        }
    }
}

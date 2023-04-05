<?php

namespace App\Services;

use App\Models\FilmSession;

class ReservationService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $data
     * @return \App\Models\FilmSession
     */
    public function store($data): FilmSession
    {
        $filmSession = FilmSession::find($data['film_session_id']);
        $cinemaHall = $filmSession->cinemaHall;

        foreach ($cinemaHall->seats->groupBy('row') as $seats) {
            foreach ($seats as $seat) {
                foreach ($data['seats'] as $row => $key) {
                    foreach ($key as $value) {
                        if ($seat->row == $row && $seat->column == $value) {
                            $filmSession->seats()->attach($seat);
                        }
                    }
                }
            }
        }

        return $filmSession;
    }
}

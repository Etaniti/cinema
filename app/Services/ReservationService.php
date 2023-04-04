<?php

namespace App\Services;

use App\Models\FilmSession;
use App\Models\Reservation;

class ReservationService
{
    public function create($film_session_id)
    {
        $reservations = Reservation::where('film_session_id', $film_session_id)->get();
        $filmSession = FilmSession::findOrFail($film_session_id);
        $cinemaHall = $filmSession->cinemaHall;
        foreach ($reservations as $reservation) {
            $seats = json_decode($reservation->seats, true);
            for ($i = 1; $i < $cinemaHall->rows; $i++) {
                if (!empty($seats[$i])) {
                    $reserved_seats[$i] = $seats;
                }
            }
        }

        return $reserved_seats;
    }

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

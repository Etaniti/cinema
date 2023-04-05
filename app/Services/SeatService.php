<?php

namespace App\Services;

use App\Models\CinemaHall;
use App\Models\Seat;
use App\Statuses\Status;

class SeatService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $data
     * @return \App\Models\CinemaHall
     */
    public function store($data): CinemaHall
    {
        $cinemaHall = CinemaHall::find($data['cinema_hall_id']);
        $availiable = Status::AVAILABLE;
        $activated = Status::ACTIVATED;

        foreach ($cinemaHall->seats->groupBy('row') as $seats) {
            foreach ($seats as $seat) {
                foreach ($data['seats'] as $row => $key) {
                    foreach ($key as $value) {
                        if ($seat->row == $row && $seat->column == $value) {
                            $availiableSeat = Seat::where('id', $seat->id)->update([
                                'status' => $availiable,
                            ]);
                        }
                    }
                }
            }
        }

        if (!empty($data['status'])) {
            $cinemaHall->setStatus($activated);
        }

        $cinemaHall = $cinemaHall->update([
            'seating_chart' => $availiable,
        ]);

        return $cinemaHall;
    }
}

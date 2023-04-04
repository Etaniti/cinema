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
     * @return bool
     */
    public function store($data): bool
    {
        $cinemaHall = CinemaHall::find($data['cinema_hall_id']);
        $status = Status::ACTIVE;

        foreach ($cinemaHall->seats->groupBy('row') as $seats) {
            foreach ($seats as $seat) {
                foreach ($data['seats'] as $row => $key) {
                    foreach ($key as $value) {
                        if ($seat->row == $row && $seat->column == $value) {
                            $activeSeat = Seat::where('id', $seat->id)->update([
                                'status' => $status,
                            ]);
                        }
                    }
                }
            }
        }

        return $cinemaHall = $cinemaHall->update([
            'seating_chart' => $status,
        ]);
    }
}

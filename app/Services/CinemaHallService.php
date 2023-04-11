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
     * @return \App\Models\CinemaHall
     */
    public function store($data): CinemaHall
    {
        $not_activated = Status::NOT_ACTIVATED;
        $not_available = Status::NOT_AVAILABLE;

        $cinemaHall = CinemaHall::create($data)->setStatus($not_activated);

        $seats = [];
        for ($i = 1; $i <= $data['rows']; $i++) {
            for ($j = 1; $j <= $data['seats_in_row']; $j++) {
                $seats[] = [
                    'cinema_hall_id' => $cinemaHall->id,
                    'row' => $i,
                    'column' => $j,
                    'status' => $not_available,
                ];
            }
        }

        $cinemaHall->seats()->createMany($seats);

        return $cinemaHall;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  mixed $data
     * @return bool
     */
    public function update($data): bool
    {
        $cinemaHall = CinemaHall::find($data['cinema_hall_id']);
        $available = Status::AVAILABLE;
        $not_available = Status::NOT_AVAILABLE;
        $activated = Status::ACTIVATED;
        $not_activated = Status::NOT_ACTIVATED;

        if (!empty($data['seats'])) {
            foreach ($cinemaHall->seats->groupBy('row') as $seats) {
                foreach ($seats as $seat) {
                    $seat = Seat::where('id', $seat->id)->update([
                        'status' => $not_available,
                    ]);
                }
            }

            foreach ($cinemaHall->seats->groupBy('row') as $seats) {
                foreach ($seats as $seat) {
                    foreach ($data['seats'] as $row => $key) {
                        foreach ($key as $value) {
                            if ($seat->row == $row && $seat->column == $value) {
                                $availableSeat = Seat::where('id', $seat->id)->update([
                                    'status' => $available,
                                ]);
                            }
                        }
                    }
                }
            }
        }

        if (!empty($data['status'])) {
            if ($data['status'] == $activated) {
                $cinemaHall->setStatus($activated);
            }
        } else {
            $cinemaHall->setStatus($not_activated);
        }

        $cinemaHall = $cinemaHall->update([
            'seating_chart' => $available,
        ]);

        return $cinemaHall;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  mixed $id
     * @return bool
     */
    public function destroy($id): bool
    {
        $film = CinemaHall::findOrFail($id);
        return $film->destroy($id);
    }
}

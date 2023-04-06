<?php

namespace App\Services;

use App\Models\FilmSession;
use App\Models\Reservation;
use App\Models\Seat;
use App\Statuses\Status;
use Illuminate\Support\Facades\DB;

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
        $user_id = auth()->user()->id;

        foreach ($data['seats'] as $seat_id) {
            $seat = Seat::findOrFail($seat_id);
            if (!$hasFilmSession = $seat->filmSessions()->where('seat_id', $seat_id)->exists()) {
                $filmSession->seats()->attach($seat, ['user_id' => $user_id]);
                $film_session_seat_id = DB::table('film_session_seat')->where('seat_id', $seat->id)->value('id');

                $reservation = Reservation::firstOrCreate([
                    'film_session_seat_id' => $film_session_seat_id,
                    'user_id' => $user_id,
                    'status' => Status::IN_PROCESSING,
                ]);
            } else {
                session()->flash('alert', 'Выбранное место занято. Выберите другое место.');
            }
        }

        return $reservation ?? null;
    }
}

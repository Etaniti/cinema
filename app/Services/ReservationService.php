<?php

namespace App\Services;

use App\Models\FilmSession;
use App\Models\Reservation;
use App\Models\Seat;
use App\Statuses\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Jobs\SendEmailReservationStatus;

class ReservationService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $data
     * @return \App\Models\Reservation
     */
    public function store($data): ?Reservation
    {
        $filmSession = FilmSession::find($data['film_session_id']);
        $userId = auth()->user()->id;

        foreach ($data['seats'] as $seat_id) {
            $seat = Seat::findOrFail($seat_id);
            if (!$hasFilmSessionSeat = DB::table('film_session_seat')->where('seat_id', $seat->id)->exists()) {
                $filmSession->seats()->attach($seat, ['user_id' => $userId]);
                $filmSessionSeatId = DB::table('film_session_seat')->where('seat_id', $seat->id)->value('id');

                $reservation = Reservation::create([
                    'film_session_seat_id' => $filmSessionSeatId,
                    'user_id' => $userId,
                    'film_session_id' => $filmSession->id,
                    'status' => Status::PENDING_PAYMENT,
                ]);

                dispatch(new SendEmailReservationStatus($reservation));

            } else {
                session()->flash('alert', 'Выбранное место (ряд ' . $seat->row . ', место ' . $seat->column . ') занято. Выберите другое место.');
                return null;
            }
        }
        return $reservation ?? null;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  mixed $data
     * @return bool
     */
    public function update($data, $id): Reservation
    {
        if (!empty($data['payment_receipt'])) {
            $reservation = Reservation::findOrFail($id);
            $file = $data['payment_receipt'];
            $path = Storage::disk('public')->putFile('documents', $file);
            $data['payment_receipt'] = $path;

            $reservation->update([
                'payment_receipt' => $data['payment_receipt'],
                'status' => Status::IN_PROCESSING,
            ]);

            dispatch(new SendEmailReservationStatus($reservation));
        }
        if (!empty($data['status'])) {
            $reservation = Reservation::findOrFail($id);

            $reservation->update([
                'status' => $data['status'],
                'reason_for_denial' => $data['reason_for_denial'],
            ]);

            dispatch(new SendEmailReservationStatus($reservation));
        }

        return $reservation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  mixed $id
     * @return bool
     */
    public function destroy($id): bool
    {
        $reservation = Reservation::findOrFail($id);
        return $reservation->destroy($id);
    }
}

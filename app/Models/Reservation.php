<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class Reservation extends Model
{
    use HasFactory, HasStatuses;

    protected $fillable = [
        'user_id',
        'film_session_seat_id',
        'payment_receipt',
        'status',
    ];

    /**
     * Get the user that owns the reservation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the film session that owns the reservation.
     */
    public function filmSession()
    {
        return $this->belongsTo(FilmSession::class);
    }
}

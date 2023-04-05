<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'film_id',
        'cinema_hall_id',
        'date',
        'start',
        'end',
    ];

    /**
     * Get the film that owns the film session.
     */
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    /**
     * Get the cinema hall that owns the film session.
     */
    public function cinemaHall()
    {
        return $this->belongsTo(CinemaHall::class);
    }

    /**
     * Get the reservations for the film session.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function seats()
    {
        return $this->belongsToMany(Seat::class, 'film_session_seat', 'film_session_id', 'seat_id')->withTimestamps();
    }
}

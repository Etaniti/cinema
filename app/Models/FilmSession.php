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
}

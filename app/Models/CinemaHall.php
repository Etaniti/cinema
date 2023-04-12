<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class CinemaHall extends Model
{
    use HasFactory, HasStatuses;

    protected $fillable = [
        'title',
        'rows',
        'seats_in_row',
        'seating_chart',
    ];

    /**
     * Get the film sessions for the cinema hall.
     */
    public function filmSessions()
    {
        return $this->hasMany(FilmSession::class);
    }

    /**
     * Get the seats for the cinema hall.
     */
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}

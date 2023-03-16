<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class CinemaHall extends Model
{
    use HasFactory, HasStatuses;

    protected $fillable = [
        'name',
        'rows',
        'seats_in_row',
    ];

    /**
     * Get the seating chart associated with the cinema hall.
     */
    public function seatingChart()
    {
        return $this->hasOne(SeatingChart::class);
    }

    /**
     * Get the film sessions for the cinema hall.
     */
    public function filmSessions()
    {
        return $this->hasMany(FilmSession::class);
    }
}

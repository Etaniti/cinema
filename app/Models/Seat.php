<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class Seat extends Model
{
    use HasFactory, HasStatuses;
    protected $fillable = [
        'cinema_hall_id',
        'row',
        'column',
        'status',
    ];

    public function cinemaHall()
    {
        $this->belongsTo(cinemaHall::class);
    }

    public function filmSessions()
    {
        return $this->belongsToMany(FilmSession::class, 'film_session_seat', 'film_session_id', 'seat_id')->withPivot('user_id')->withTimestamps();
    }
}

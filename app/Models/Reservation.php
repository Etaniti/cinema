<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class Reservation extends Model
{
    use HasFactory, HasStatuses;

    protected $fillable = [
        'film_session_id',
        'seats',
    ];

    /**
     * Get the film session that owns the reservation.
     */
    public function filmSession()
    {
        return $this->belongsTo(filmSession::class);
    }
}

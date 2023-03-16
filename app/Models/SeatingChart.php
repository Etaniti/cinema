<?php

namespace App\Models;

use App\Models\CinemaHall;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatingChart extends Model
{
    use HasFactory;

    protected $fillable = [
        'cinema_hall_id',
        'seats',
    ];

    /**
     * Get the cinema hall that owns the seating chart.
     */
    public function cinemaHall()
    {
        return $this->belongsTo(CinemaHall::class);
    }
}

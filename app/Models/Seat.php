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
}

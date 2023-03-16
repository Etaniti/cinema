<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genres',
        'age_limit',
        'duration',
        'synopsis',
        'poster',
        'start',
        'end',
    ];

    /**
     * Get the film sessions for the film.
     */
    public function filmSessions()
    {
        return $this->hasMany(FilmSession::class);
    }
}

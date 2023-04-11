<?php

namespace App\Models;

use App\Statuses\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\ModelStatus\HasStatuses;
use Illuminate\Support\Facades\Storage;

class Reservation extends Model
{
    use HasFactory, HasStatuses;

    protected $fillable = [
        'user_id',
        'film_session_id',
        'film_session_seat_id',
        'payment_receipt',
        'status',
        'reason_for_denial',
    ];

    public function getFileLink(): string
    {
        return Storage::url($this->payment_receipt);
    }

    public function getStatusLabelAttribute()
    {
        $status = DB::table('reservations')->where('id', $this->id)->value('status');
        return Status::getLabel($status);
    }

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

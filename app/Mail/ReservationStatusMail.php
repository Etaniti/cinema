<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reservation;

class ReservationStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    private $reservationId;

    /**
     * Create a new message instance.
     *
     * @param mixed $reservationId
     * @return void
     */
    public function __construct(int $reservationId)
    {
        $this->reservationId = $reservationId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reservation = Reservation::findOrFail($this->reservationId);
        return $this->from('test@test.com')->view('mails.status_mail', compact('reservation'));
    }
}

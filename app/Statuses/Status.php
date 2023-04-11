<?php

namespace App\Statuses;

class Status
{
    public const ACTIVATED = 'activated';
    public const NOT_ACTIVATED = 'not_activated';
    public const AVAILABLE = 'available';
    public const NOT_AVAILABLE = 'not_available';
    public const PENDING_PAYMENT = 'pending_payment';
    public const IN_PROCESSING = 'in_processing';
    public const CONFIRMED = 'confirmed';
    public const DENIED = 'denied';

    public static function getLabels()
    {
        return [
            Status::PENDING_PAYMENT => 'В ожидании оплаты',
            Status::IN_PROCESSING => 'В ожидании подтверждения',
            Status::CONFIRMED => 'Бронирование подтверждено',
            Status::DENIED => 'Бронирование отклонено',
        ];
    }

    /**
     * Get the label for current status.
     *
     * @param  mixed $status
     * @return string
     */
    public static function getLabel($status): string
    {
        $labels = self::getLabels();
        return $labels[$status];
    }
}

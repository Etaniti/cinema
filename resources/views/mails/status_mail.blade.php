<!DOCTYPE html>
<html>

<head>
    <title>кинотеатр</title>
</head>

<body>
    <div class="card text-start p-5 mt-5 mb-4">
        <h3 class="mb-3">Билет на фильм "{{ $reservation->filmSession->film->title }}"</h3>
        <p class="mb-1"><span class="text-muted">Дата сеанса:
            </span>{{ date('d.m.Y', strtotime($reservation->filmSession->date)) }}</p>
        <div class="d-flex flex-row justify-content-start">
            <p class="me-3 mb-3">
                <span class="text-muted">Начало сеанса:</span>
                <span class="fw-bold">{{ date('H:i', strtotime($reservation->filmSession->start)) }}</span>
            <p>
                <span class="text-muted">Окончание сеанса:</span>
                <span class="fw-bold">{{ date('H:i', strtotime($reservation->filmSession->end)) }}</span>
            </p>
        </div>
        <h4 class="text-center">{{ $reservation->filmSession->cinemaHall->title }}</h4>
        <div class="d-flex flex-row justify-content-center mb-4">
            <h4 class="me-3">
                Ряд:
                {{ DB::table('seats')->where('id',DB::table('film_session_seat')->where('id', $reservation->film_session_seat_id)->value('seat_id'))->value('row') }}
            </h4>
            <h4>
                Место:
                {{ DB::table('seats')->where('id',DB::table('film_session_seat')->where('id', $reservation->film_session_seat_id)->value('seat_id'))->value('column') }}
            </h4>
        </div>
        <div>
            <h4>Статус вашего бронирования: {{ $reservation->getStatusLabelAttribute($reservation) }}</h4>
        </div>
    </div>
</body>

</html>

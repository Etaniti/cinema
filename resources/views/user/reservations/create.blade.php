{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="{{ route('reservations.store', ['film_session' => $filmSession->id]) }}"
                enctype="multipart/form-data" method="POST">
                @csrf
                <h5 class="text-muted mb-4">Схема рассадки в зале</h5>
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <div>
                        <ul class="d-flex flex-column justify-content-between align-items-center custom-list me-4 my-2">
                            @for ($i = 1; $i < $cinemaHall->rows + 1; $i++)
                                <p class="text-muted" style="margin-top: 9px; margin-bottom: 9px;">
                                    {{ $i }}</p>
                            @endfor
                        </ul>
                    </div>
                    <div class="me-4" style="column-count: {{ $cinemaHall->seats_in_row }}; column-width: 30px;">
                        <ul class="d-flex flex-column justify-content-between align-items-center custom-list">
                            @for ($i = 1; $i < $totalSeats + 1; $i++)
                                @foreach ($seats as $value)
                                    @if ($i == $value)
                                        <li value="{{ $i }}" data-name="seat"
                                            class="form-check-input seat text-sm my-2"><span
                                                style="opacity: 0%;">{{ $value }}</span></li>
                                    @endif
                                @endforeach
                                <li value="{{ $i }}" data-name="seat"
                                    class="form-check-input seat-unavailable text-muted my-2">
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div>
                        <ul class="d-flex flex-column justify-content-between align-items-center custom-list">
                            @for ($i = 1; $i < $cinemaHall->rows + 1; $i++)
                                <p class="text-muted" style="margin-top: 9px; margin-bottom: 9px;">
                                    {{ $i }}</p>
                            @endfor
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex flex-wrap flex-column align-items-center mb-2">
                    <div class="d-flex align-items-center col-10 px-3 py-3">
                        <div class="text-center mt-4">
                            <h3>{{ $cinemaHall->name }}</h3>
                            <h5 class="text-muted mb-2">Фильм {{ $filmSession->film->title }}</h5>
                            <p class="mb-3"><span class="fw-bold">{{ date('d.m.Y', strtotime($filmSession->date)) }}</span><br>
                            <span class="text-muted">Начало сеанса:</span> {{ date('h:i', strtotime($filmSession->start)) }}<br>
                            <span class="text-muted">Окончание сеанса:</span> {{ date('h:i', strtotime($filmSession->end)) }}</p>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <div>
                                    <ul
                                        class="d-flex flex-column justify-content-between align-items-center custom-list me-4 my-2">
                                        @for ($i = 1; $i < $cinemaHall->rows + 1; $i++)
                                            <p class="text-muted" style="margin-top: 9px; margin-bottom: 9px;">
                                                {{ $i }}</p>
                                        @endfor
                                    </ul>
                                </div>
                                <div class="me-4"
                                    style="column-count: {{ $cinemaHall->seats_in_row }}; column-width: 30px;">
                                    <ul class="d-flex flex-column justify-content-between align-items-center custom-list">
                                        @for ($i = 1; $i < $totalSeats + 1; $i++)
                                            @foreach ($seats as $value)
                                                @if ($i == $value)
                                                    <li value="{{ $i }}" data-name="seat"
                                                        class="form-check-input seat text-sm my-2"><span
                                                            style="opacity: 0%;">{{ $value }}</span></li>
                                                @endif
                                            @endforeach
                                            <li value="{{ $i }}" data-name="seat"
                                                class="form-check-input seat-unavailable text-muted my-2">
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                                <div>
                                    <ul class="d-flex flex-column justify-content-between align-items-center custom-list">
                                        @for ($i = 1; $i < $cinemaHall->rows + 1; $i++)
                                            <p class="text-muted" style="margin-top: 9px; margin-bottom: 9px;">
                                                {{ $i }}</p>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-5">
                        <a href="{{ route('cinema_halls.edit', ['cinema_hall' => $cinemaHall]) }}"
                            class="btn btn-outline-secondary me-3">Продолжить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var found = {};
            $('li').each(function() {
                var $this = $(this);
                if (found[$this.attr('value')]) {
                    $this.remove();
                } else {
                    found[$this.attr('value')] = true;
                }
            });
        });
    </script>
@endsection

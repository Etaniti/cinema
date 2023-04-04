@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap flex-column align-items-center mb-4">
            <form action="{{ route('reservations.store', ['film_session' => $filmSession->id]) }}"
                enctype="multipart/form-data" method="POST">
                @csrf
                <div class="d-flex align-items-center px-3 py-3">
                    <div class="text-center mt-4">
                        <h2 class="mb-3">{{ $cinemaHall->name }}</h2>
                        <h4 class="mb-1"><span class="text-muted">Фильм</span> "{{ $filmSession->film->title }}" -
                            {{ date('d.m.Y', strtotime($filmSession->date)) }}</h4>
                        <p class="mb-5">
                            <span class="text-muted">Начало сеанса:</span>
                            <span class="fw-bold">{{ date('H:i', strtotime($filmSession->start)) }}</span>
                            <span class="text-muted">Окончание сеанса:</span>
                            <span class="fw-bold">{{ date('H:i', strtotime($filmSession->end)) }}</span>
                        </p>
                        <h5 class="fw-bold mb-4">Выберите места</h5>
                        <div class="text-center">
                            <hr class="border border-primary border-2 mb-1">
                            <p class="text-center mb-4">Экран</p>
                        </div>
                        <div class="d-flex flex-row justify-content-between align-items-center mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-middle">
                                <input type="text" class="form-control" name="film_session_id"
                                    value={{ $film_session_id }} hidden />
                                <ul class="d-flex flex-column justify-content-between align-items-center custom-list mx-4">
                                    @for ($i = 1; $i < $cinemaHall->rows + 1; $i++)
                                        <li class="text-muted numbers-list">
                                            {{ $i }}</li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="d-flex flex-column">
                                @foreach ($seating_chart as $row => $key)
                                    <ul class="d-flex flex-row custom-list">
                                        @foreach ($key as $value)
                                            @if (!empty($seats[$row][$value]))
                                                @if ($value == $seats[$row][$value])
                                                    {{-- @foreach ($filmSession->reservations as $reservation)
                                                        @if (!empty($reservation->seats[$row][$value]))
                                                            <li>
                                                                <input type="checkbox" class="form-check-input seat"
                                                                    name="seats[{{ $row }}][{{ $value }}]"
                                                                    value="{{ $value }}">
                                                            </li>
                                                        @endif
                                                    @endforeach --}}
                                                @endif
                                            @else
                                                <li class="form-check-input seat-none"></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endforeach
                            </div>
                            <div>
                                <ul class="d-flex flex-column justify-content-between align-items-center custom-list mx-4">
                                    @for ($i = 1; $i < $cinemaHall->rows + 1; $i++)
                                        <li class="text-muted numbers-list">
                                            {{ $i }}</li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-center mb-5">
                    <button type="submit" class="btn btn-primary px-5 py-3">Продолжить бронирование</button>
                </div>
            </form>
        </div>
    </div>
@endsection

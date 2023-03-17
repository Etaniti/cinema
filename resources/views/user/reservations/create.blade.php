@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap flex-column align-items-center mb-4">
            <form action="{{ route('reservations.store', ['film_session' => $filmSession->id]) }}"
                enctype="multipart/form-data" method="POST">
                @csrf
                <div class="d-flex align-items-center col-10 px-3 py-3 mb-2 offset-1">
                    <div class="text-center mt-4">
                        <h2 class="mb-3">{{ $cinemaHall->name }}</h2>
                        <h4 class="mb-1"><span class="text-muted">Фильм</span> "{{ $filmSession->film->title }}" -
                            {{ date('d.m.Y', strtotime($filmSession->date)) }}</h4>
                        <p class="mb-4">
                            <span class="text-muted">Начало сеанса:</span>
                            <span class="fw-bold">{{ date('h:i', strtotime($filmSession->start)) }}</span>
                            <span class="text-muted">, окончание сеанса:</span>
                            <span class="fw-bold">{{ date('h:i', strtotime($filmSession->end)) }}</span>
                        </p>
                        <h5 class="fw-bold mb-3">Выберите места</h5>
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
                            <div class="me-4" style="column-count: {{ $cinemaHall->seats_in_row }}; column-width: 30px;">
                                <ul class="d-flex flex-column justify-content-between align-items-center custom-list">
                                    <input type="text" name="film_session_id" value="{{ $filmSession->id}}" hidden />
                                    @for ($i = 1; $i < $totalSeats + 1; $i++)
                                        @foreach ($seats as $value)
                                            @if ($i == $value)
                                                <li id="{{ $i }}">
                                                    <input type="checkbox" class="form-check-input seat my-2" name="seats[]"
                                                        value="{{ $value }}" />
                                                </li>
                                            @endif
                                        @endforeach
                                        <li id="{{ $i }}" data-name="seat"
                                            class="form-check-input seat-unavailable text-muted my-2">
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div>
                                <ul
                                    class="d-flex flex-column justify-content-between align-items-center custom-list me-4 my-2">
                                    @for ($i = 1; $i < $cinemaHall->rows + 1; $i++)
                                        <p class="text-muted" style="margin-top: 9px; margin-bottom: 9px;">
                                            {{ $i }}</p>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="d-flex flex-row align-items-center mb-5">
                <button type="submit" class="btn btn-primary px-5 py-3">Продолжить бронирование</button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var found = {};
            $('li').each(function() {
                var $this = $(this);
                if (found[$this.attr('id')]) {
                    $this.remove();
                } else {
                    found[$this.attr('id')] = true;
                }
            });
        });
    </script>
@endsection

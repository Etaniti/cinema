@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="offset-2">
            <div class="d-flex flex-column align-items-center">
                <div class="align-self-center mt-5 mb-4">
                    <h3>Залы кинотеатра</h3>
                </div>
                <div class="d-flex flex-wrap flex-row justify-content-center">
                    @foreach ($cinemaHalls as $cinemaHall)
                        <div class="d-flex flex-wrap flex-column align-items-center mb-2" style="width: 450px; height: 300px;">
                            <div class="d-flex align-items-center card col-10 px-3 py-3">
                                <div class="card-body text-center">
                                    <h4 class="fw-bold">{{ $cinemaHall->name }}</h4>
                                    <p class="mb-2"><span class="fw-bold">{{ $cinemaHall->rows }}</span> рядов, <span
                                            class="fw-bold">{{ $cinemaHall->seats_in_row }}</span> мест в ряду
                                    </p>
                                    @if ($cinemaHall->seating_chart)
                                        <p class="text-decoration-underline mb-3">Схема рассадки добавлена</p>
                                    @else
                                        <p class="text-muted mb-3">Схема рассадки не добавлена</p>
                                    @endif
                                    @if ($cinemaHall->latestStatus() == 'activated')
                                        <p class="text-success border border-success rounded p-1">Зал активен</p>
                                    @else
                                        <p class="text-danger border border-danger rounded p-1">Зал неактивен</p>
                                    @endif
                                    <a href="{{ route('cinema_halls.show', ['cinema_hall' => $cinemaHall->id]) }}"
                                        class="d-block btn btn-primary p-2 mt-2">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex flex-column align-items-center mb-5">
                <a href="{{ route('cinema_halls.create') }}" class="btn btn-outline-primary row col-6 py-3">Добавить новый зал</a>
            </div>
        </div>
    </div>
@endsection

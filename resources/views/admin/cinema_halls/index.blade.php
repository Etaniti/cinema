@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="offset-2">
            <div class="d-flex flex-column align-items-center">
                <div class="align-self-center mt-5 mb-5">
                    <h3>Залы кинотеатра</h3>
                </div>
                <div class="d-flex flex-wrap flex-row">
                    @foreach ($cinemaHalls as $cinemaHall)
                        <div class="d-flex flex-wrap flex-column align-items-center mb-5"
                            style="width: 530px; height: 400px;">
                            <div class="d-flex align-items-center card col-10 px-3 py-3">
                                <div class="card-body text-center">
                                    <h5 class="fw-bold">{{ $cinemaHall->name }}</h5>
                                    <div>
                                        @if ($cinemaHall->seatingChart)
                                            <p>Схема рассадки добавлена</p>
                                        @else
                                            <p>Схема рассадки не добавлена</p>
                                        @endif
                                        <a href="{{ route('cinema_halls.show', ['cinema_hall' => $cinemaHall->id]) }}"
                                            class="btn btn-outline-primary px-5 mt-4">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex flex-column align-items-center mb-5">
                <a href="{{ route('cinema_halls.create') }}" class="btn btn-primary row col-6 py-3">Добавить новый зал</a>
            </div>
        </div>
    </div>
@endsection

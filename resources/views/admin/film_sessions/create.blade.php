@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="{{ route('film_sessions.store', ['film' => $film_id]) }}" enctype="multipart/form-data"
                method="POST">
                @csrf
                <div class="card px-4 py-3 mt-5 mb-5">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Добавление сеанса фильма</h4>

                        <div class="mb-3 row">
                            <label for="cinema_hall_id" class="col-form-label fw-bold">Зал кинотеатра</label>
                            <select class="form-select" name="cinema_hall_id">
                                @foreach ($cinemaHalls as $cinemaHall)
                                    @if ($cinemaHall->latestStatus() == 'activated')
                                        <option value="{{ $cinemaHall->id }}">{{ $cinemaHall->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('cinema_hall_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <input type="text" name="film_id" value="{{ $film_id }}" hidden />
                            <label for="date" class="col-form-label fw-bold">Дата</label>
                            <input type="date" class="form-control" name="date"
                                value="{{ Carbon\Carbon::now()->toDateString() }}">
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="start" class="col-form-label fw-bold">Начало сеанса</label>
                            <input type="time" class="form-control" name="start" value="{{ Carbon\Carbon::now()->format('H:i') }}">
                            @error('start')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="end" class="col-form-label fw-bold">Окончание сеанса</label>
                            <input type="time" class="form-control" name="end" value="{{ Carbon\Carbon::now()->format('H:i') }}">
                            @error('end')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <button type="submit" class="btn btn-outline-primary p-3">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

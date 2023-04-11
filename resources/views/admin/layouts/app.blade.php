@extends('layouts.app')

@section('sidebar')
    <div>
        <div class="d-flex flex-column bg-white shadow-sm p-3 mt-2" style="width: 15%; height: 100%; position: fixed">
            <ul class="nav nav-pills flex-column mt-3">
                <li value="films" class="nav-item row mx-2 mb-3">
                    <a href="{{ route('admin_films.index') }}" class="btn btn-outline-primary text-start">
                        Фильмы
                    </a>
                </li>
                <li value="schedule" class="nav-item row mx-2 mb-3">
                    <a href="{{ route('film_sessions.index') }}" class="btn btn-outline-primary text-start">
                        Расписание
                    </a>
                </li>
                <li value="cinema-halls" class="nav-item row mx-2 mb-3">
                    <a href="{{ route('cinema_halls.index') }}" class="btn btn-outline-primary text-start">
                        Залы кинотеатра
                    </a>
                </li>
                <li value="reservations" class="nav-item row mx-2 mb-3">
                    <a href="{{ route('admin_reservations.index') }}" class="btn btn-outline-primary text-start">
                        Бронирование
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('sidebar')
    <div>
        <div class="d-flex flex-column bg-white shadow-sm p-3 mt-1" style="width: 15%; height: 100%; position: fixed">
            <ul class="nav nav-pills flex-column mt-3">
                <li class="nav-item row mx-2 mb-3">
                    <a href="{{ route('admin_films.index') }}" class="btn btn-outline-primary text-start">
                        Фильмы
                    </a>
                </li>
                <li class="nav-item row mx-2 mb-3">
                    <a href="#" class="btn btn-outline-primary text-start">
                        Расписание
                    </a>
                </li>
                <li class="nav-item row mx-2 mb-3">
                    <a href="#" class="btn btn-outline-primary text-start">
                        Залы кинотеатра
                    </a>
                </li>
                <li class="nav-item row mx-2 mb-3">
                    <a href="#" class="btn btn-outline-primary text-start">
                        Бронирование
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection

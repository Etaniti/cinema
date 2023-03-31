@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap flex-column align-items-center mb-4">
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
                </div>
            </div>
            <div class="d-flex flex-row justify-content-center mb-5">
                <button type="submit" class="btn btn-primary px-5 py-3">Продолжить бронирование</button>
            </div>
        </div>
    </div>
@endsection

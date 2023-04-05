@extends('user.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap flex-column align-items-center mb-4">
            <div class="d-flex align-items-center px-3 py-3">
                <div class="card text-start p-5 mt-5">
                    <h3 class="mb-3">Билеты на фильм "{{ $filmSession->film->title }}"</h3>
                    <h5 class="mb-2"><span class="text-muted">Дата сеанса:
                        </span>{{ date('d.m.Y', strtotime($filmSession->date)) }}</h5>
                    <p class="mb-4">
                        <span class="text-muted">Начало сеанса:</span>
                        <span class="fw-bold">{{ date('H:i', strtotime($filmSession->start)) }}</span>
                        <span class="text-muted">Окончание сеанса:</span>
                        <span class="fw-bold">{{ date('H:i', strtotime($filmSession->end)) }}</span>
                    </p>
                    <table class="table table-hover">
                        @foreach ($filmSession->seats as $seat)
                        <tr>
                            <td class="text-start align-middle fw-bold">№ {{ $loop->iteration }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-center mb-5">
                <button type="submit" class="btn btn-primary px-5 py-3">Продолжить бронирование</button>
            </div>
        </div>
    </div>
@endsection

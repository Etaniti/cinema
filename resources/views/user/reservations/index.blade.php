@extends('user.layouts.app')

@section('content')
    <div class="container">
        @if (session('alert'))
            <div class="alert alert-success">
                {{ session('alert') }}
            </div>
        @endif
        <div class="d-flex flex-wrap flex-column align-items-start mb-4 offset-2">
            <div class="d-flex flex-wrap flex-column px-3 py-3 mt-3">
                <div class="mt-3">
                    <h2 class="mb-4">Мои бронирования</h2>
                    <div>
                        <table class="table table-striped table-hover mb-5">
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="text-center align-middle">Фильм</th>
                                <th></th>
                                <th class="text-center align-middle">Дата</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td class="text-center align-middle fw-bold">№ {{ $loop->iteration }}</td>
                                    <td></td>
                                    <td class="text-center align-middle">{{ $reservation->filmSession->film->title }}</td>
                                    <td></td>
                                    <td class="text-center align-middle">
                                        {{ date('d.m.Y', strtotime($reservation->filmSession->date)) }}</td>
                                    <td></td>
                                    <td class="text-center align-middle">
                                        <a href="{{ route('reservations.show', ['film_session' => $reservation->filmSession->id, 'reservation' => $reservation->id]) }}"
                                            class="btn btn-outline-primary">Подробнее</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="ms-3">
                {{-- {!! $reservations->links() !!} --}}
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap flex-column mb-4 offset-2">
            <div class="d-flex flex-wrap flex-column px-3 py-3 mt-3" style="width: 100%;">
                <div class="mt-3">
                    <h2 class="mb-4">Бронирования</h2>
                    <div>
                        <table class="table table-striped table-hover mb-5">
                            <tr>
                                <th></th>
                                <th class="text-center align-middle">Пользователь</th>
                                <th class="text-center align-middle">Фильм</th>
                                <th class="text-center align-middle">Дата</th>
                                <th class="text-center align-middle">Зал</th>
                                <th class="text-center align-middle">Ряд</th>
                                <th class="text-center align-middle">Место</th>
                                <th class="text-center align-middle">Статус бронирования</th>
                                <th></th>
                            </tr>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td class="text-center align-middle fw-bold">№ {{ $loop->iteration }}</td>
                                    <td class="text-center align-middle">{{ $reservation->user->lastname }}
                                        {{ substr($reservation->user->firstname, 0, 2) }}.
                                        {{ substr($reservation->user->middlename, 0, 2) }}.
                                    </td>
                                    <td class="text-center align-middle">{{ $reservation->filmSession->film->title }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ date('d.m.Y', strtotime($reservation->filmSession->date)) }}</td>
                                    <td class="text-center align-middle">
                                        {{ $reservation->filmSession->cinemaHall->title }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ DB::table('seats')->where('id',DB::table('film_session_seat')->where('id', $reservation->film_session_seat_id)->value('seat_id'))->value('row') }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ DB::table('seats')->where('id',DB::table('film_session_seat')->where('id', $reservation->film_session_seat_id)->value('seat_id'))->value('column') }}
                                    </td>
                                    <td class="text-center align-middle text-decoration-underline">
                                        {{ $reservation->getStatusLabelAttribute($reservation) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin_reservations.show', ['reservation' => $reservation->id]) }}"
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

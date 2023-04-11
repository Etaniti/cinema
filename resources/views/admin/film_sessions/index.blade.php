@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap flex-column offset-2" style="width: 70%;">
            <div class="d-flex flex-column align-items-center mt-5 mb-3">
                <h4 class="mb-4">Сеансы фильмов</h4>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center align-middle fw-semibold text-muted">№</th>
                            <th class="text-center align-middle fw-semibold text-muted">Кинозал</th>
                            <th class="text-center align-middle fw-semibold text-muted">Дата</th>
                            <th class="text-center align-middle fw-semibold text-muted">Начало сеанса</th>
                            <th class="text-center align-middle fw-semibold text-muted">Окончание сеанса</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filmSessions as $filmSession)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="text-center align-middle">{{ $filmSession->cinemaHall->title }}</td>
                                <td class="text-center align-middle">{{ date('d.m.Y', strtotime($filmSession->date)) }}
                                </td>
                                <td class="text-center align-middle">{{ date('H:i', strtotime($filmSession->start)) }}
                                </td>
                                <td class="text-center align-middle">{{ date('H:i', strtotime($filmSession->end)) }}
                                </td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('film_sessions.edit', ['film_session' => $filmSession->id]) }}" class="text-decoration-none me-3">Редактировать</a>
                                    <a href="{{ route('film_sessions.delete', ['film_session' => $filmSession->id]) }}" class="text-decoration-none text-danger">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination justify-content-center">
                {!! $filmSessions->links() !!}
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center offset-1">
            <div class="mt-5 mb-5">
                <div class="text-center">
                    <h3>{{ $cinemaHall->title }}</h3>
                    <h5 class="text-muted mb-5">Схема рассадки в зале</h5>
                </div>
                @if ($cinemaHall->seating_chart)
                    <div class="text-center">
                        <hr class="border border-primary border-2 mb-1">
                        <p class="text-center mb-4">Экран</p>
                    </div>
                    <div class="d-flex flex-row justify-content-evenly align-items-center mb-4">
                        <div>
                            <ul class="d-flex flex-column justify-content-between align-items-center custom-list">
                                @for ($i = 1; $i < $cinemaHall->rows + 1; $i++)
                                    <li class="text-muted numbers-list">
                                        {{ $i }}</li>
                                @endfor
                            </ul>
                        </div>
                        <div class="d-flex flex-column">
                            @foreach ($cinemaHall->seats->groupBy('row') as $row)
                                <ul class="d-flex flex-row custom-list">
                                    @foreach ($row as $seat)
                                        @if (DB::table('seats')->where('id', $seat->id)->value('status') == 'available')
                                            <li class="form-check-input seat"></li>
                                        @else
                                            <li class="form-check-input seat-unavailable"></li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>
                        <div>
                            <ul class="d-flex flex-column justify-content-between align-items-center custom-list">
                                @for ($i = 1; $i < $cinemaHall->rows + 1; $i++)
                                    <li class="text-muted numbers-list">
                                        {{ $i }}</li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        @if ($cinemaHall->latestStatus() == 'activated')
                            <p class="text-success border border-success rounded p-1">Зал активен</p>
                        @else
                            <p class="text-danger border border-danger rounded p-1">Зал неактивен</p>
                        @endif
                        <div class="d-flex flex-row justify-content-center">
                            <a href="{{ route('cinema_halls.edit', ['cinema_hall' => $cinemaHall->id]) }}"
                                class="btn btn-primary px-5 py-2 mt-1 mb-2 me-3">Редактировать кинозал</a>
                            <a href="{{ route('cinema_halls.delete', ['cinema_hall' => $cinemaHall->id]) }}"
                                class="btn btn-outline-danger px-5 py-2 mt-1 mb-2">Удалить кинозал</a>
                        </div>
                    </div>
                @else
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h5 class="text-secondary border border-secondary rounded p-5 mb-4">Схема рассадки не добавлена</h5>
                        <a href="{{ route('seats.create', ['cinema_hall' => $cinemaHall->id]) }}"
                            class="btn btn-primary px-5 py-2 mt-4">Создать схему рассадки</a>
                    </div>
                @endif
                @if ($cinemaHall->latestStatus() == 'activated')
                    <div class="d-flex flex-column align-items-center mt-5 mb-3">
                        <h4 class="mb-4">Расписание сеансов</h4>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle fw-semibold text-muted">№</th>
                                    <th class="text-center align-middle fw-semibold text-muted">Название</th>
                                    <th class="text-center align-middle fw-semibold text-muted">Дата</th>
                                    <th class="text-center align-middle fw-semibold text-muted">Начало сеанса</th>
                                    <th class="text-center align-middle fw-semibold text-muted">Окончание сеанса</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cinemaHall->filmSessions as $filmSession)
                                    <tr>
                                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                        <td class="text-center align-middle">{{ $filmSession->film->title }}</td>
                                        <td class="text-center align-middle">
                                            {{ date('d.m.Y', strtotime($filmSession->date)) }}
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ date('H:i', strtotime($filmSession->start)) }}
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ date('H:i', strtotime($filmSession->end)) }}
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('film_sessions.edit', ['film_session' => $filmSession->id]) }}"
                                                class="text-decoration-none me-3">Редактировать</a>
                                            <a href="{{ route('film_sessions.delete', ['film_session' => $filmSession->id]) }}"
                                                class="text-decoration-none text-danger">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center mt-5 mb-5">
                        <h4 class="card-title mb-3">Расписание сеансов</h4>
                        <p class="text-muted">Расписание сеансов доступно только для активных кинозалов.</p>
                        <input type="text" class="form-control" name="cinema_hall_id" value={{ $cinemaHall->id }}
                            hidden />
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

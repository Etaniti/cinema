@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center offset-1">
            <form action="{{ route('cinema_halls.update', ['cinema_hall' => $cinemaHall->id]) }}"
                enctype="multipart/form-data" method="POST">
                @csrf
                @method('PATCH')
                @if ($cinemaHall->latestStatus() == 'not_activated')
                    <div class="mt-5 mb-5">
                        <div>
                            <h4 class="card-title text-center mb-5">Редактирование схемы рассадки зала
                                "{{ $cinemaHall->name }}"
                            </h4>
                            <hr class="border border-primary border-2 mb-1">
                            <p class="text-center mb-4">Экран</p>
                            <input type="text" class="form-control" name="cinema_hall_id" value={{ $cinemaHall->id }}
                                hidden />
                        </div>
                        <div class="d-flex flex-row justify-content-between align-items-center mb-4">
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
                                                <li>
                                                    <input type="checkbox" class="form-check-input seat"
                                                        name="seats[{{ $seat->row }}][{{ $seat->column }}]"
                                                        value="{{ $seat->column }}" checked />
                                                </li>
                                            @else
                                                <input type="checkbox" class="form-check-input seat"
                                                    name="seats[{{ $seat->row }}][{{ $seat->column }}]"
                                                    value="{{ $seat->column }}" />
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

                        <div class="d-flex justify-content-center form-check mb-5">
                            <input class="form-check-input me-3" type="checkbox" name="status" value="activated">
                            <label for="status" class="form-check-label">
                                Активировать кинозал
                            </label>
                        </div>

                        <div class="row">
                            <button type="submit" class="btn btn-outline-primary p-3">
                                Сохранить
                            </button>
                        </div>
                    </div>
                @else
                    <div class="mt-5 mb-5">
                        <div>
                            <h4 class="card-title text-center mb-5">Редактирование зала "{{ $cinemaHall->name }}"
                            </h4>
                            <p class="text-muted">Для того, чтобы редактировать схему рассадки, необходимо временно
                                деактивировать кинозал.</p>
                            <input type="text" class="form-control" name="cinema_hall_id" value={{ $cinemaHall->id }}
                                hidden />
                        </div>

                        <div class="d-flex justify-content-center form-check mb-5">
                            <input class="form-check-input me-3" type="checkbox" name="status" value="available" checked>
                            <label for="status" class="form-check-label">
                                Оставить кинозал активным
                            </label>
                        </div>

                        <div class="row">
                            <button type="submit" class="btn btn-outline-primary p-3">
                                Сохранить
                            </button>
                        </div>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection

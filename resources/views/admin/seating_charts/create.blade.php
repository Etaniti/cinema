@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center offset-1">
            <form action="{{ route('seating_charts.store', ['cinema_hall' => $cinema_hall_id]) }}"
                enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mt-5 mb-5">
                    <div class="ms-4">
                        <h4 class="card-title text-center mb-5">Создание схемы рассадки зала "{{ $cinemaHall->name }}"</h4>
                        <hr class="border border-primary border-2 mb-1">
                        <p class="text-center mb-4">Экран</p>
                        <input type="text" class="form-control" name="cinema_hall_id" value={{ $cinema_hall_id }}
                            hidden />
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center mb-5">
                        <div>
                            <ul class="d-flex flex-column justify-content-between align-items-center custom-list">
                                @for ($i = 1; $i < $cinemaHall->rows + 1; $i++)
                                    <li class="text-muted numbers-list">
                                        {{ $i }}</li>
                                @endfor
                            </ul>
                        </div>
                        <div class="d-flex flex-column">
                            @foreach ($seating_chart as $row => $key)
                                <ul class="d-flex flex-row custom-list">
                                    @foreach ($key as $value)
                                        <li>
                                            <input type="checkbox" class="form-check-input seat"
                                                name="seats[{{ $row }}][{{ $value }}]"
                                                value="{{ $value }}" />
                                        </li>
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

                    {{-- <div id="cinema-hall-constructor" class="d-flex justify-content-center" style="max-width: 1000px" data-rows="{{ $cinemaHall->rows }}"
                            data-columns="{{ $cinemaHall->seats_in_row }}"></div> --}}

                    <div class="row">
                        <button type="submit" class="btn btn-outline-primary p-3">
                            Сохранить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

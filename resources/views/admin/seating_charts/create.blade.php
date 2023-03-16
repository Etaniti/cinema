@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center offset-1">
            <form action="{{ route('seating_charts.store', ['cinema_hall' => $cinemaHall->id]) }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="px-4 py-3 mt-5 mb-5">
                    <div>
                        <h4 class="card-title text-center mb-5">Создание схемы рассадки зала "{{ $cinemaHall->name }}"</h4>
                        <hr class="border border-primary border-2 mb-1">
                        <p class="text-center mb-4">Экран</p>
                        <input type="text" class="form-control" name="cinema_hall_id" value={{ $cinema_hall_id }} hidden />

                        <div id="cinema-hall-constructor" class="d-flex justify-content-center" style="max-width: 1000px" data-rows="{{ $cinemaHall->rows }}"
                            data-columns="{{ $cinemaHall->seats_in_row }}"></div>

                        <div class="row">
                            <button type="submit" class="btn btn-outline-primary p-3">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

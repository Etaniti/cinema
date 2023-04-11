@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="{{ route('cinema_halls.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card px-4 py-3 mt-5 mb-5">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Добавление кинозала</h4>

                        <div class="mb-4 row">
                            <label for="title" class="col-form-label fw-bold">Название</label>
                            <input type="text" class="form-control" name="title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="rows" class="col-form-label fw-bold">Количество рядов</label>
                            <input type="text" class="form-control" name="rows">
                            @error('rows')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="seats_in_row" class="col-form-label fw-bold">Количество мест в 1 ряду</label>
                            <input type="text" class="form-control" name="seats_in_row">
                            @error('seats_in_row')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

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

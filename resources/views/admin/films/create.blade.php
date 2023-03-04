@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="{{ route('admin_films.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card px-4 py-3 mt-5 mb-5">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Добавление фильма</h4>

                        <div class="mb-3 row">
                            <label for="title" class="col-form-label fw-bold">Название</label>
                            <input type="text" class="form-control" name="title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="genres" class="col-form-label fw-bold">Жанры</label>
                            <div>
                                @foreach ($default_genres as $default_genre)
                                    <div class="form-check">
                                        <label>
                                            <input type="checkbox" class="form-check-input" name="genres[]"
                                                value="{{ $default_genre->name }}" />
                                            {{ $default_genre->name }}
                                        </label>
                                    </div>
                                @endforeach
                                @error('genres')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="mb-4 row">
                            <label for="age_limit" class="col-form-label fw-bold">Возрастное ограничение</label>
                            <input type="text" class="form-control" name="age_limit" value="12+">
                            @error('age_limit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="mb-4 row">
                            <label for="age_limit" class="col-form-label fw-bold">Возрастное ограничение</label>
                            <select class="form-select" name="age_limit">
                                <option value="0+">0+</option>
                                <option value="6+">6+</option>
                                <option value="12+">12+</option>
                                <option value="16+">16+</option>
                                <option value="18+">18+</option>
                            </select>
                            @error('age_limit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-4 row">
                            <label for="duration" class="col-form-label fw-bold">Длительность</label>
                            <input type="time" class="form-control" name="duration" value="02:00">
                            @error('duration')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="synopsis" class="col-form-label fw-bold">Описание</label>
                            <textarea type="text" class="form-control" name="synopsis" rows="5"></textarea>
                            @error('synopsis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-5 row">
                            <label for="poster" class="col-form-label fw-bold">Постер</label>
                            <input type="file" class="form-control" name="poster">
                            @error('poster')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="start" class="col-form-label fw-bold">Начало показа</label>
                            <input type="date" class="form-control" name="start"
                                value="{{ Carbon\Carbon::now()->toDateString() }}">
                            @error('start')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-5 row">
                            <label for="end" class="col-form-label fw-bold">Конец показа</label>
                            <input type="date" class="form-control" name="end"
                                value="{{ Carbon\Carbon::now()->toDateString() }}">
                            @error('end')
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

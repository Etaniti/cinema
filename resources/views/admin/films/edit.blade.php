@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="{{ route('admin_films.update', ['film' => $film->id]) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PATCH')

                <div class="card px-4 py-3 mt-5 mb-5">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Редактирование фильма</h4>

                        <div class="mb-3 row">
                            <label for="title" class="col-form-label fw-bold">Название</label>
                            <input type="text" class="form-control" name="title" value="{{ $film->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="genres" class="col-form-label fw-bold">Жанры</label>
                            <input type="text" class="form-control" name="genres" value="{{ $film->genres }}">
                            @error('genres')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="age_limit" class="col-form-label fw-bold">Возрастное ограничение</label>
                            <input type="text" class="form-control" name="age_limit" value="{{ $film->age_limit }}">
                            @error('age_limit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="duration" class="col-form-label fw-bold">Длительность</label>
                            <input type="time" class="form-control" name="duration" value="{{ $film->duration }}">
                            @error('duration')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="synopsis" class="col-form-label fw-bold">Описание</label>
                            <textarea type="text" class="form-control" name="synopsis" rows="5">{{ $film->synopsis }}</textarea>
                            @error('synopsis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="poster" class="col-form-label fw-bold">Постер</label>
                            <input type="file" class="form-control" name="poster" value="{{ $film->poster }}">
                            @error('poster')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <button type="submit" class="btn btn-outline-primary p-3">
                                Сохранить изменения
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="{{ route('profile.update', ['user' => $user->id]) }}" enctype="multipart/form-data"
                method="POST">
                @csrf
                @method('PATCH')

                <div class="card px-4 py-3 mt-5 mb-5">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Редактирование профиля</h4>

                        <div class="mb-3 row">
                            <label for="lastname" class="col-form-label fw-bold">Фамилия</label>
                            <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                            @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="firstname" class="col-form-label fw-bold">Имя</label>
                            <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}">
                            @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="middlename" class="col-form-label fw-bold">Отчество</label>
                            <input type="text" class="form-control" name="middlename" value="{{ $user->middlename }}">
                            @error('middlename')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-form-label fw-bold">Адрес электронной почты</label>
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="phone" class="col-form-label fw-bold">Номер мобильного телефона</label>
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="gender" class="col-form-label fw-bold">Пол</label>
                            <div class="flex-row justify-content-between">
                                <input type="radio" class="align-middle" value="male" name="gender">
                                <label for="gender" class="form-label me-4">Мужской</label>
                                <input type="radio" class="align-middle" value="female" name="gender" checked>
                                <label for="gender" class="form-label">Женский</label>
                            </div>
                            @error('gender')
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

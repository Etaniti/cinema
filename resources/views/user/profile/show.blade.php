@extends('user.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap flex-column mb-4 offset-2">
            <div class="d-flex flex-wrap flex-column px-3 py-3 mt-3" style="width: 100%;">
                <h2 class="mt-3 mb-4">Мой профиль</h2>
                <div class="d-flex flew-row mb-4">
                    <div class="text-muted me-5">
                        <h5 class="mb-4">Фамилия:</h5>
                        <h5 class="mb-4">Имя:</h5>
                        <h5 class="mb-4">Отчество:</h5>
                        <h5 class="mb-4">Электронная почта:</h5>
                        <h5 class="mb-4">Мобильный телефон:</h5>
                        <h5 class="mb-4">Пол:</h5>
                    </div>
                    <div>
                        <h5 class="mb-4">{{ $user->lastname }}</h5>
                        <h5 class="mb-4">{{ $user->firstname }}</h5>
                        <h5 class="mb-4">{{ $user->middlename }}</h5>
                        <h5 class="mb-4">{{ $user->email }}</h5>
                        <h5 class="mb-4">{{ $user->phone ?? 'не указан' }}</h5>
                        <h5 class="mb-4">{{ $user->gender ?? 'не указан' }}</h5>
                    </div>
                </div>
                <div>
                    <a href="{{ route('profile.edit', ['user' => auth()->user()->id]) }}"
                        class="btn btn-primary px-5 py-3">Редактировать профиль</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('sidebar')
    <div>
        <div class="d-flex flex-column p-3 mt-3" style="width: 18%; height: 100%; position: fixed">
            <ul class="nav nav-pills flex-column mt-4">
                <li class="nav-item row mx-2 mb-4">
                    <h4>Личный кабинет</h4>
                </li>
                <li class="nav-item row mx-2 mb-3">
                    <a href="{{ route('profile.index') }}" class="btn btn-outline-primary text-start">
                        Мои билеты
                    </a>
                </li>
                <li class="nav-item row mx-2 mb-3">
                    <a href="#" class="btn btn-outline-primary text-start">
                        Данные профиля
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection

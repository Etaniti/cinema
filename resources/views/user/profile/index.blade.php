@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-column align-items-start col-8 mt-5">
            <a href="{{ route('profile.edit', ['user' => $user->id]) }}" class="btn btn-outline-primary px-5 py-2 mb-2">Редактировать профиль</a>
        </div>
    </div>
    <div id="cinema-hall-constructor">
    </div>
@endsection

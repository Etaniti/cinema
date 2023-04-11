@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center offset-1">
            <form action="{{ route('film_sessions.destroy', ['film_session' => $filmSession->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="mt-5">
                    <h4>Вы действительно хотите удалить сеанс фильма "{{ $filmSession->film->title }}" {{ date('d.m.Y', strtotime($filmSession->date)) }}, {{ date('H:i', strtotime($filmSession->start)) }}?</h4>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-danger d-inline-block px-4 py-2">Удалить</button>
                        <a href="{{ route('film_sessions.index') }}" class="btn btn-outline-secondary d-inline-block px-4 py-2 ms-2">Отмена</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

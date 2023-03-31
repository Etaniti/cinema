@extends('user.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap flex-column align-items-start mb-4 offset-2">
            <div class="d-flex flex-wrap flex-column px-3 py-3 mt-3">
                <div class="mt-3">
                    <h2>Билеты</h2>
                    <div>
                        @foreach($reservations as $reservation)
                            {{ $reservation->film_session_id }}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

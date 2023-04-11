@extends('user.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center offset-2">
            <form action="{{ route('user_reservations.destroy', ['reservation' => $reservation->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="mt-5">
                    <h4>Вы действительно отменить бронирование билета на фильм
                        "{{ $reservation->filmSession->film->title }}"<br>(ряд
                        {{ DB::table('seats')->where('id',DB::table('film_session_seat')->where('id', $reservation->film_session_seat_id)->value('seat_id'))->value('row') }},
                        место
                        {{ DB::table('seats')->where('id',DB::table('film_session_seat')->where('id', $reservation->film_session_seat_id)->value('seat_id'))->value('column') }})?
                    </h4>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-danger d-inline-block px-4 py-2">Отменить бронь</button>
                        <a href="{{ route('user_reservations.show', ['reservation' => $reservation->id]) }}"
                            class="btn btn-outline-secondary d-inline-block px-4 py-2 ms-2">Назад</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

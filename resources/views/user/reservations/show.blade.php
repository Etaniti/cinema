@extends('user.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap flex-column align-items-center mb-4">
            <div class="d-flex flex-column align-items-center px-3 py-3">
                <div class="card text-start p-5 mt-5 mb-4">
                    <h3 class="mb-3">Билет на фильм "{{ $filmSession->film->title }}"</h3>
                    <h5 class="mb-1"><span class="text-muted">Дата сеанса:
                        </span>{{ date('d.m.Y', strtotime($filmSession->date)) }}</h5>
                    <div class="d-flex flex-row justify-content-start">
                        <p class="me-3 mb-3">
                            <span class="text-muted">Начало сеанса:</span>
                            <span class="fw-bold">{{ date('H:i', strtotime($filmSession->start)) }}</span>
                        <p>
                            <span class="text-muted">Окончание сеанса:</span>
                            <span class="fw-bold">{{ date('H:i', strtotime($filmSession->end)) }}</span>
                        </p>
                    </div>
                    <h4 class="text-center">{{ $cinemaHall->title }}</h4>
                    <div class="d-flex flex-row justify-content-center mb-4">
                        <h4 class="me-3">
                            Ряд:
                            {{ DB::table('seats')->where('id',DB::table('film_session_seat')->where('id', $reservation->film_session_seat_id)->value('seat_id'))->value('row') }}
                        </h4>
                        <h4>
                            Место:
                            {{ DB::table('seats')->where('id',DB::table('film_session_seat')->where('id', $reservation->film_session_seat_id)->value('seat_id'))->value('column') }}
                        </h4>
                    </div>
                    @if (DB::table('reservations')->where('id', $reservation->id)->value('status') == 'pending_payment' && $reservation->payment_receipt == null)
                        <div class="d-flex flex-row justify-content-center">
                            <button class="btn btn-primary px-5 py-3" onclick="showForm();">Прикрепить чек оплаты</button>
                        </div>
                    @else
                        @if (DB::table('reservations')->where('id', $reservation->id)->value('status') == 'pending_payment')
                            <h4 class="text-center"><span
                                    class="badge text-bg-secondary">{{ $reservation->getStatusLabelAttribute($reservation) }}</span>
                            </h4>
                        @elseif (DB::table('reservations')->where('id', $reservation->id)->value('status') == 'in_processing')
                            <h4 class="text-center"><span
                                    class="badge text-bg-primary">{{ $reservation->getStatusLabelAttribute($reservation) }}</span>
                            </h4>
                        @elseif (DB::table('reservations')->where('id', $reservation->id)->value('status') == 'confirmed')
                            <h4 class="text-center"><span
                                    class="badge text-bg-success">{{ $reservation->getStatusLabelAttribute($reservation) }}</span>
                            </h4>
                        @else
                            <h4 class="text-center"><span
                                    class="badge text-bg-danger">{{ $reservation->getStatusLabelAttribute($reservation) }}</span>
                            </h4>
                        @endif
                    @endif
                </div>
                <div>
                    <a href="{{ route('user_reservations.delete', ['reservation' => $reservation->id]) }}"
                        class="btn btn-outline-danger px-5 py-2 mt-1 mb-4">Отменить бронирование</a>
                </div>
                @if (DB::table('reservations')->where('id', $reservation->id)->value('status') == 'pending_payment' && $reservation->payment_receipt == null)
                    <div id="form" class=" col-md-12 hidden">
                        <div class="d-flex flex-column mb-5">
                            <div class="card px-4 pt-3 pb-5">
                                @include('livewire.payment-receipt', ['reservation' => $reservation])
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        function showForm() {
            document.getElementById('form').style.display = 'block';
        }

        function hideForm() {
            document.getElementById('form').style.display = 'none';
        }
    </script>
@endsection

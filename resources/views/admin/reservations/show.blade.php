@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap flex-column align-items-center mb-4">
            <div class="d-flex flex-column align-items-center px-3 py-3">
                <div class="card text-start p-5 mt-5 mb-4">
                    <h3 class="text-center mb-4">Бронь №{{ $reservation->id }}</h3>
                    <h5 class="mb-2"><span class="text-muted">Пользователь:
                        </span>{{ $reservation->user->lastname }} {{ substr($reservation->user->firstname, 0, 2) }}.
                        {{ substr($reservation->user->middlename, 0, 2) }}.</h5>
                    <h5 class="mb-2"><span class="text-muted">Дата сеанса:
                        </span>{{ date('d.m.Y', strtotime($reservation->filmSession->date)) }}</h5>
                    <div class="d-flex flex-row justify-content-start">
                        <p class="me-3 mb-4">
                            <span class="text-muted">Начало сеанса:</span>
                            <span class="fw-bold">{{ date('H:i', strtotime($reservation->filmSession->start)) }}</span>
                        <p>
                            <span class="text-muted">Окончание сеанса:</span>
                            <span class="fw-bold">{{ date('H:i', strtotime($reservation->filmSession->end)) }}</span>
                        </p>
                    </div>
                    <h4 class="text-center">{{ $reservation->filmSession->cinemaHall->title }}</h4>
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
                        <h4 class="text-center mb-4">
                            <span
                                class="badge text-bg-danger">{{ $reservation->getStatusLabelAttribute($reservation) }}</span>
                        </h4>
                        <p class="text-center"><span class="fw-bold">Причина отклонения: </span>{{ $reservation->reason_for_denial ?? 'не указана' }}
                        </p>
                    @endif
                    @if (DB::table('reservations')->where('id', $reservation->id)->value('status') == 'in_processing')
                        <div class="d-flex justify-content-center">
                            <a href="{{ $reservation->getFileLink() }}"
                                download="Оплата-билета-{{ $reservation->id }}.docx" class="text-dark">Скачать чек оплаты</a>
                        </div>
                        <form
                            action="{{ route('user_reservations.update', ['film_session' => $reservation->filmSession->id, 'reservation' => $reservation->id]) }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-check mt-4 mb-4">
                                <div class="d-flex flex-row justify-content-center mb-3">
                                    <div class="me-5">
                                        <input class="form-check-input me-2" type="radio" name="status" value="confirmed"
                                            onclick="hideInput();" />
                                        <label for="status" class="form-check-label text-success">
                                            Подтвердить бронь
                                        </label>
                                    </div>
                                    <div>
                                        <input class="form-check-input me-2" type="radio" name="status" value="denied"
                                            onclick="showInput();" />
                                        <label for="status" class="form-check-label text-danger">
                                            Отклонить бронь
                                        </label>
                                    </div>
                                </div>
                                <div id="reasonForDenial" class="hidden row mb-4">
                                    <label for="reason_for_denial" class="col-form-label fw-bold">Причина отклонения</label>
                                    <input type="text" class="form-control" name="reason_for_denial">
                                    @error('reason_for_denial')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <button type="submit" class="btn btn-outline-primary p-3">
                                    Сохранить
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function showInput() {
            document.getElementById('reasonForDenial').style.display = 'block';
        }

        function hideInput() {
            document.getElementById('reasonForDenial').style.display = 'none';
        }
    </script>
@endsection

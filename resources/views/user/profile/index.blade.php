@extends('user.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap flex-column align-items-start mb-4 offset-2">
            <div class="d-flex flex-wrap flex-column px-3 py-3 mt-3">
                <div class="mt-3">
                    <h2>Мои бронирования</h2>
                    <div>
                        <table class="table table-hover mb-5">
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td class="text-start align-middle fw-bold">№ {{ $loop->iteration }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

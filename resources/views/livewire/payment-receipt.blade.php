<div>
    <form action="{{ route('user_reservations.update', ['film_session' => $filmSession->id, 'reservation' => $reservation->id]) }}" enctype="multipart/form-data"
        method="POST">
        @csrf
        @method('PATCH')

        <div class="row justify-content-end">
            <button type="button" class="btn-close" aria-label="Close" onclick="hideForm();"></button>
        </div>
        <div class="px-4 row">
            <label for="payment_receipt" class="col-form-label fw-bold">Чек оплаты</label>
            <input type="file" class="form-control" name="payment_receipt">
            @error('payment_receipt')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex flex-row justify-content-center mt-4">
            <button class="btn btn-outline-primary px-5 py-3">Отправить</button>
        </div>
    </form>
</div>

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reservation\CreateRequest;
use App\Http\Requests\Reservation\UpdateRequest;
use App\Models\FilmSession;
use App\Models\Reservation;
use App\Services\ReservationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReservationController extends Controller
{
    protected $reservationService;

    /**
     * Instantiate a new controller instance.
     *
     * @param  mixed App\Services\ReservationService
     * @return void
     */
    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $reservations = Reservation::where('user_id', auth()->user()->id)->paginate(5);
        return view('user.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($film_session_id): View
    {
        $filmSession = FilmSession::findOrFail($film_session_id);
        $cinemaHall = $filmSession->cinemaHall;
        return view('user.reservations.create', compact('filmSession', 'film_session_id', 'cinemaHall'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Reservation\CreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $reservation = $this->reservationService->store($data);
        if (!empty($reservation)) {
            return redirect()->route('user_reservations.show', ['film_session' => $request->film_session_id, 'reservation' => $reservation]);
        } else {
            return redirect()->route('user_reservations.create', ['film_session' => $request->film_session_id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $reservationId
     * @return \Illuminate\View\View
     */
    public function show(int $reservationId): View
    {
        $reservation = Reservation::findOrFail($reservationId);
        $film_session_id = DB::table('film_session_seat')->where('id', $reservation->film_session_seat_id)->value('film_session_id');
        $filmSession = FilmSession::findOrFail($film_session_id);
        $cinemaHall = $filmSession->cinemaHall;
        return view('user.reservations.show', compact('reservation', 'filmSession', 'cinemaHall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Reservation\UpdateRequest  $request
     * @param  int  $reservationId
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, int $reservationId): RedirectResponse
    {
        $reservation = Reservation::findOrFail($reservationId);
        $id = $reservation->id;
        $data = $request->validated();
        $reservation = $this->reservationService->update($data, $id);
        return redirect()->back();
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $reservationId
     * @return \Illuminate\View\View
     */
    public function delete(int $reservationId): View
    {
        $reservation = Reservation::findOrFail($reservationId);
        return view('user.reservations.delete', compact('reservation'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $reservationId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $reservationId): RedirectResponse
    {
        $reservation = Reservation::findOrFail($reservationId);
        $reservation = $this->reservationService->destroy($reservation->id);
        return redirect()->route('profile.index');
    }
}

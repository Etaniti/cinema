<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reservation\CreateRequest;
use App\Models\FilmSession;
use App\Models\Reservation;
use App\Services\ReservationService;
use Illuminate\Http\RedirectResponse;
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
        // $filmSession = FilmSession::get();
        $reservations = Reservation::paginate(5);
        return view('user.reservations.index');
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
        return redirect()->route('reservations.index', ['film_session' => $request->film_session_id, 'reservation' => $reservation->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\View\View
     */
    public function show(Reservation $reservation): View
    {
        $filmSession = FilmSession::findOrFail($film_session_id);
        $cinemaHall = $filmSession->cinemaHall;
        return view('reservations.show', compact('reservation', 'filmSession', 'cinemaHall'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}

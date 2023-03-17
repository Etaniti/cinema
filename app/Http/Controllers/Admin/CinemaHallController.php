<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CinemaHall\CreateRequest;
use App\Models\CinemaHall;
use App\Services\CinemaHallService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CinemaHallController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @param  mixed \App\Services\CinemaHallService
     * @return void
     */
    public function __construct(CinemaHallService $cinemaHallService)
    {
        // $this->authorizeResource(Film::class, 'film');
        $this->cinemaHallService = $cinemaHallService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $cinemaHalls = CinemaHall::all();
        return view('admin.cinema_halls.index', compact('cinemaHalls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('admin.cinema_halls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CinemaHall\CreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $film = $this->cinemaHallService->store($data);
        return redirect()->route('cinema_halls.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CinemaHall  $cinemaHall
     * @return \Illuminate\Http\Response
     */
    public function show(CinemaHall $cinemaHall)
    {
        if ($cinemaHall->seatingChart) {
            $seatingChart = $cinemaHall->seatingChart;
            $seats = json_decode($seatingChart->seats);
            $totalSeats = bcmul($cinemaHall->rows, $cinemaHall->seats_in_row);
        }
        else {
            return view('admin.cinema_halls.show', compact('cinemaHall'));
        }
        return view('admin.cinema_halls.show', compact('cinemaHall', 'seatingChart', 'seats', 'totalSeats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CinemaHall  $cinemaHall
     * @return \Illuminate\Http\Response
     */
    public function edit(CinemaHall $cinemaHall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CinemaHall  $cinemaHall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CinemaHall $cinemaHall)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CinemaHall  $cinemaHall
     * @return \Illuminate\Http\Response
     */
    public function destroy(CinemaHall $cinemaHall)
    {
        //
    }
}

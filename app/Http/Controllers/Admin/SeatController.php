<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seat\CreateRequest;
use App\Models\CinemaHall;
use App\Models\Seat;
use Illuminate\View\View;
use App\Services\SeatService;

class SeatController extends Controller
{
    protected $seatService;

    /**
     * Instantiate a new controller instance.
     *
     * @param  mixed \App\Services\SeatService
     * @return void
     */
    public function __construct(SeatService $seatService)
    {
        $this->seatService = $seatService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($cinema_hall_id): View
    {
        $cinemaHall = CinemaHall::with('seats')->findOrFail($cinema_hall_id);
        //$seating_chart = json_decode($cinemaHall->seating_chart, true);
        return view('admin.seats.create', compact('cinema_hall_id', 'cinemaHall'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Seat\CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $seat = $this->seatService->store($data);
        return redirect()->route('cinema_halls.show', ['cinema_hall' => $request->cinema_hall_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function edit(Seat $seat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seat $seat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        //
    }
}

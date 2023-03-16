<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeatingChart\CreateRequest;
use App\Models\CinemaHall;
use App\Models\SeatingChart;
use Illuminate\View\View;
use App\Services\SeatingChartService;

class SeatingChartController extends Controller
{
    protected $seatingChartService;

    /**
     * Instantiate a new controller instance.
     *
     * @param  mixed \App\Services\SeatingChartService
     * @return void
     */
    public function __construct(SeatingChartService $seatingChartService)
    {
        $this->seatingChartService = $seatingChartService;
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
        $cinemaHall = CinemaHall::findOrFail($cinema_hall_id);
        return view('admin.seating_charts.create', compact('cinema_hall_id', 'cinemaHall'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SeatingChart\CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $seatingChart = $this->seatingChartService->store($data);
        return redirect()->route('cinema_halls.show', ['cinema_hall' => $request->cinema_hall_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeatingChart  $seatingChart
     * @return \Illuminate\Http\Response
     */
    public function show(SeatingChart $seatingChart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeatingChart  $seatingChart
     * @return \Illuminate\Http\Response
     */
    public function edit(SeatingChart $seatingChart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeatingChart  $seatingChart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeatingChart $seatingChart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeatingChart  $seatingChart
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeatingChart $seatingChart)
    {
        //
    }
}

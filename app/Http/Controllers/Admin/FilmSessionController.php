<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilmSession\CreateRequest;
use App\Models\CinemaHall;
use App\Models\FilmSession;
use App\Services\FilmSessionService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FilmSessionController extends Controller
{
    protected $filmSessionService;

    /**
     * Instantiate a new controller instance.
     *
     * @param  mixed App\Services\FilmSessionService
     * @return void
     */
    public function __construct(FilmSessionService $filmSessionService)
    {
        // $this->authorizeResource(FilmSession::class, 'film');
        $this->filmSessionService = $filmSessionService;
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
     * @return \Illuminate\Http\Response
     */
    public function create($film_id): View
    {
        $cinemaHalls = CinemaHall::all();
        return view('admin.film_sessions.create', compact('film_id', 'cinemaHalls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $filmSession = $this->filmSessionService->store($data);
        return redirect()->route('admin_films.show', ['film' => $request->film_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FilmSession  $filmSession
     * @return \Illuminate\Http\Response
     */
    public function show(FilmSession $filmSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FilmSession  $filmSession
     * @return \Illuminate\Http\Response
     */
    public function edit(FilmSession $filmSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FilmSession  $filmSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FilmSession $filmSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FilmSession  $filmSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(FilmSession $filmSession)
    {
        //
    }
}

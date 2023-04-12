<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilmSession\CreateRequest;
use App\Http\Requests\FilmSession\UpdateRequest;
use App\Models\CinemaHall;
use App\Models\FilmSession;
use App\Services\FilmSessionService;
use Illuminate\Http\RedirectResponse;
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
        $this->filmSessionService = $filmSessionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $currentDate = date('Y-m-d');
        $filmSessions = FilmSession::where('date', '>=', $currentDate)->latest()->paginate(20);
        return view('admin.film_sessions.index', compact('filmSessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $filmSession = $this->filmSessionService->store($data);
        return redirect()->route('admin_films.show', ['film' => $request->film_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FilmSession  $filmSession
     * @return \Illuminate\View\View
     */
    public function edit(FilmSession $filmSession): View
    {
        $cinemaHalls = CinemaHall::all();
        return view('admin.film_sessions.edit', compact('filmSession', 'cinemaHalls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\FilmSession\UpdateRequest  $request
     * @param  \App\Models\FilmSession  $filmSession
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, FilmSession $filmSession): RedirectResponse
    {
        $data = $request->validated();
        $id = $filmSession->id;
        $filmSession = $this->filmSessionService->update($data, $id);
        return redirect()->route('film_sessions.index');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Models\FilmSession  $filmSession
     * @return \Illuminate\View\View
     */
    public function delete(FilmSession $filmSession): View
    {
        return view('admin.film_sessions.delete', compact('filmSession'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FilmSession  $filmSession
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(FilmSession $filmSession): RedirectResponse
    {
        $film = $this->filmSessionService->destroy($filmSession->id);
        return redirect()->route('film_sessions.index');
    }
}

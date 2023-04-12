<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CinemaHall\CreateRequest;
use App\Http\Requests\Seat\UpdateRequest;
use App\Models\CinemaHall;
use App\Models\FilmSession;
use App\Services\CinemaHallService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CinemaHallController extends Controller
{
    protected $cinemaHallService;

    /**
     * Instantiate a new controller instance.
     *
     * @param  mixed \App\Services\CinemaHallService
     * @return void
     */
    public function __construct(CinemaHallService $cinemaHallService)
    {
        $this->authorizeResource(CinemaHall::class, 'cinema_hall');
        $this->cinemaHallService = $cinemaHallService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $this->authorize('viewAny', CinemaHall::class);
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
        $this->authorize('create', CinemaHall::class);
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
        $this->authorize('create', CinemaHall::class);
        $data = $request->validated();
        $cinemaHall = $this->cinemaHallService->store($data);
        return redirect()->route('cinema_halls.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CinemaHall  $cinemaHall
     * @return \Illuminate\View\View
     */
    public function show(CinemaHall $cinemaHall): View
    {
        $this->authorize('view', $cinemaHall);
        $filmSessions = FilmSession::paginate(10);
        return view('admin.cinema_halls.show', compact('cinemaHall', 'filmSessions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CinemaHall  $cinemaHall
     * @return \Illuminate\View\View
     */
    public function edit(CinemaHall $cinemaHall): View
    {
        $this->authorize('update', $cinemaHall);
        return view('admin.cinema_halls.edit', compact('cinemaHall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Seat\UpdateRequest  $request
     * @param  \App\Models\CinemaHall  $cinemaHall
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, CinemaHall $cinemaHall): RedirectResponse
    {
        $this->authorize('update', $cinemaHall);
        $data = $request->validated();
        $cinemaHall = $this->cinemaHallService->update($data);
        return redirect()->route('cinema_halls.show', ['cinema_hall' => $request->cinema_hall_id]);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Models\CinemaHall  $cinemaHall
     * @return \Illuminate\View\View
     */
    public function delete(CinemaHall $cinemaHall): View
    {
        $this->authorize('delete', $cinemaHall);
        return view('admin.cinema_halls.delete', compact('cinemaHall'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CinemaHall  $cinemaHall
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CinemaHall $cinemaHall): RedirectResponse
    {
        $this->authorize('delete', $cinemaHall);
        $film = $this->cinemaHallService->destroy($cinemaHall->id);
        return redirect()->route('cinema_halls.index');
    }
}

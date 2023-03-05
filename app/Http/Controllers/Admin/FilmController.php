<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Film\CreateRequest;
use App\Http\Requests\Film\UpdateRequest;
use App\Models\DefaultGenre;
use App\Models\Film;
use App\Services\FilmService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FilmController extends Controller
{
    protected $filmService;

    /**
     * Instantiate a new controller instance.
     *
     * @param  mixed App\Services\FilmService
     * @return void
     */
    public function __construct(FilmService $filmService)
    {
        $this->authorizeResource(Film::class, 'film');
        $this->filmService = $filmService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(404);
        }
        $films = Film::paginate(20);
        return view('admin.films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $default_genres = DefaultGenre::all();
        return view('admin.films.create', compact('default_genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $poster = $request->poster;
        $film = $this->filmService->store($data, $poster);
        return redirect()->route('admin_films.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\View\View
     */
    public function show(Film $film): View
    {
        $this->authorize('show', $film);
        return view('admin.films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\View\View
     */
    public function edit(Film $film): View
    {
        return view('admin.films.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Film $film): RedirectResponse
    {
        $id = $film->id;
        $data = $request->validated();
        $film = $this->filmService->update($data, $film);
        return redirect()->route('admin_films.show', $id);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\View\View
     */
    public function delete(Film $film): View
    {
        $this->authorize('delete', $film);
        return view('admin.films.delete', compact('film'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Film $film): RedirectResponse
    {
        $film = $this->filmService->destroy($film->id);
        return redirect()->route('admin_films.index');
    }
}

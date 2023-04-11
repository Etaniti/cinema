<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\FilmSession;
use App\Services\FilmService;
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
        $this->filmService = $filmService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $films = Film::paginate(20);
        return view('user.films.index', compact('films'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\View\View
     */
    public function show(Film $film): View
    {
        $currentDate = date('Y-m-d');
        $filmSessions = FilmSession::where('film_id', $film->id)->where('date', '>=', $currentDate)->latest()->paginate(5);
        return view('user.films.show', compact('film', 'filmSessions'));
    }
}

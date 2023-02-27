<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Film\CreateRequest;
use App\Http\Requests\Film\UpdateRequest;
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
        return view('admin.films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('admin.films.create');
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
        return redirect()->route('films.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        $film = Film::findOrFail($id);
        return view('admin.films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $film = Film::findOrFail($id);
        return view('admin.films.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Films\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, $id): RedirectResponse
    {
        $data = $request->validated();
        $film = $this->filmService->update($data, $id);
        return redirect()->route('films.show', ['film' => $id]);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function delete($id): View
    {
        $film = Film::findOrFail($id);
        return view('admin.films.delete', compact('film'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $film = $this->filmService->destroy($id);
        return redirect()->route('films.index');
    }
}

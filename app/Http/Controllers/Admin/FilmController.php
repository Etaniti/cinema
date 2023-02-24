<?php

namespace App\Http\Controllers\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRequest;
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
     * @param  mixed \App\Services\FilmService
     * @return void
     */
    public function __construct(FilmService $filmService)
    {
        $this->filmService = $filmService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\View\View
     */
    public function index() : View
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Illuminate\View\View
     */
    public function create() : View
    {
        return view('admin.films.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CreateRequest  $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request) : RedirectResponse
    {
        $data = $request->validated();
        $film = $this->filmService->store($data);
        return back()->with('success', 'Фильм успешно добавлен.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

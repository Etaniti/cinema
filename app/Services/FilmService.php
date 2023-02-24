<?php

namespace App\Services;

use App\Models\Film;

class FilmService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $request
     * @return \App\Models\Film
     */
    public function store($data) : Film
    {
        return Film::create($data);
    }
}

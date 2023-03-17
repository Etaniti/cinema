<?php

namespace App\Services;

use App\Models\FilmSession;

class FilmSessionService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $data
     * @return \App\Models\FilmSession
     */
    public function store($data): FilmSession
    {
        return $filmSession = FilmSession::create($data);
    }
}

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

    /**
     * Update the specified resource in storage.
     *
     * @param  mixed $data
     * @param  mixed $id
     * @return bool
     */
    public function update($data, $id): bool
    {
        $filmSession = FilmSession::findOrFail($id);
        return $filmSession->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  mixed $id
     * @return bool
     */
    public function destroy($id): bool
    {
        $film = FilmSession::findOrFail($id);
        return $film->destroy($id);
    }
}

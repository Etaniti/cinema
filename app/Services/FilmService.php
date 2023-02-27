<?php

namespace App\Services;

use App\Models\Film;
use Illuminate\Support\Facades\Storage;

class FilmService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $data
     * @return App\Models\Film
     */
    public function store($data, $poster): Film
    {
        if ($poster !== null) {
            $file = $data['poster'];
            $path = Storage::putFile('public/images', $file, 'public');
            $data['poster'] = $path;
        }

        return Film::create($data);
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
        $film = Film::findOrFail($id);
        return $film->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  mixed $id
     * @return bool
     */
    public function destroy($id): bool
    {
        $film = Film::findOrFail($id);
        return $film->destroy($id);
    }
}

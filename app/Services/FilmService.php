<?php

namespace App\Services;

use App\Models\Film;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FilmService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $data
     * @return \App\Models\Film
     */
    public function store($data): Film
    {
        $data['genres'] = implode(', ', (array) $data['genres']);

        if (!empty($data['poster'])) {
            $file = $data['poster'];
            $path = Storage::disk('public')->putFile('images', $file);
            $data['poster'] = $path;
        }

        return $film = Film::create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  mixed $data
     * @param  mixed $id
     * @return bool
     */
    public function update($data, Film $film): bool
    {
        if (!empty($data['poster'])) {
            $file = $data['poster'];
            $path = Storage::disk('public')->putFile('images', $file);
            $data['poster'] = $path;
        }

        $data['genres'] = implode(', ', (array) $data['genres']);
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

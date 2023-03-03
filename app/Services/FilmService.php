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
        $data['genres'] = implode(', ', (array) $data['genres']);

        if ($poster !== null) {
            $file = $data['poster'];
            $path = Storage::putFile('public/images', $file, 'public');
            $data['poster'] = $path;
        }

        // if ($poster !== null) {
        //     $path = $poster->store('public/images');
        //     $visibility = Storage::getVisibility($path);
        //     Storage::setVisibility($path, 'public');
        //     $data['poster'] = $path;
        // }

        // if ($poster !== null) {
        //     $path = $poster->store('images', 'public');
        //     $data['poster'] = $path;
        // }

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

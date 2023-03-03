<?php

namespace Database\Seeders;

use App\Models\DefaultGenre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_genre = DefaultGenre::create([
            'name' => 'боевик',
        ]);

        $default_genre = DefaultGenre::create([
            'name' => 'детектив',
        ]);

        $default_genre = DefaultGenre::create([
            'name' => 'драма',
        ]);

        $default_genre = DefaultGenre::create([
            'name' => 'исторический фильм',
        ]);

        $default_genre = DefaultGenre::create([
            'name' => 'комедия',
        ]);

        $default_genre = DefaultGenre::create([
            'name' => 'мелодрама',
        ]);

        $default_genre = DefaultGenre::create([
            'name' => 'приключение',
        ]);

        $default_genre = DefaultGenre::create([
            'name' => 'триллер',
        ]);

        $default_genre = DefaultGenre::create([
            'name' => 'ужасы',
        ]);
    }
}

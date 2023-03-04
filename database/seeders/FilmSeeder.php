<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $film = Film::create([
            'title' => 'Аватар: Путь воды',
            'genres' => 'фэнтези, фантастика, приключение',
            'age_limit' => '12+',
            'duration' => '3:15',
            'synopsis' => 'После принятия образа аватара солдат Джейк Салли становится предводителем народа нави и берет на себя миссию по защите новых друзей от корыстных бизнесменов с Земли. Теперь ему есть за кого бороться — с Джейком его прекрасная возлюбленная Нейтири. Когда на Пандору возвращаются до зубов вооруженные земляне, Джейк готов дать им отпор.',
            'poster' => null,
            'start' => '2023-03-03',
            'end' => '2023-03-20',
        ]);
    }
}

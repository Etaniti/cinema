<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use App\Models\Film;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create-film']);
        Permission::create(['name' => 'update-film']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('create-film');
        $admin->givePermissionTo('update-film');

        $user = User::create([
            'firstname' => 'name',
            'middlename' => 'middlename',
            'lastname' => 'lastname',
            'email' => 'test@test.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole($admin);

        $film = Film::create([
            'title' => 'Аватар: Путь воды',
            'genres' => 'фэнтези, фантастика, приключения',
            'age_limit' => '12',
            'duration' => '3:15',
            'synopsis' => 'После принятия образа аватара солдат Джейк Салли становится предводителем народа нави и берет на себя миссию по защите новых друзей от корыстных бизнесменов с Земли. Теперь ему есть за кого бороться — с Джейком его прекрасная возлюбленная Нейтири. Когда на Пандору возвращаются до зубов вооруженные земляне, Джейк готов дать им отпор.',
            'poster' => null,
        ]);
    }
}

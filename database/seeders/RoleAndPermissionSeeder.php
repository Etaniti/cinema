<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

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

        $user = User::create([
            'firstname' => 'Иван',
            'middlename' => 'Иванович',
            'lastname' => 'Иванов',
            'email' => 'test2@test.com',
            'password' => bcrypt('12345678'),
        ]);

        $user = User::create([
            'firstname' => 'Пётр',
            'middlename' => 'Петрович',
            'lastname' => 'Петров',
            'email' => 'test3@test.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}

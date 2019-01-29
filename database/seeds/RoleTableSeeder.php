<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Create a new role named admin and its description */
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'The admin';
        $role_admin->save();

        /** Create a new role called user and its description */
        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'The user';
        $role_user->save();
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        /** Role seeder comes before user seeder */
        $this->call(RoleTableSeeder::class);

        /** The user will use the role above */
        $this->call(UserTableSeeder::class);
    }
}

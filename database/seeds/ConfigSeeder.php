<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // add users
        DB::table('users')->insert([
            ['name' => 'Administrator', 'email' => 'admin@mail.com', 'password' => bcrypt('admin')],
            ['name' => 'Azzam Jihad Ulhaq', 'email' => 'azzam.jiul@gmail.com', 'password' => bcrypt('admin')],
        ]);

        // add roles
        DB::table('roles')->insert([
            ['role_name' => 'administrator'],
            ['role_name' => 'member']
        ]);

        // assign user to their respective roles
        DB::table('user_role')->insert([
            ['user_id' => 1, 'role_id' => 1],
            ['user_id' => 2, 'role_id' => 2]
        ]);
    }
}

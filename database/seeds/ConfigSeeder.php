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
        DB::table('role_user')->insert([
            ['user_id' => 1, 'role_id' => 1],
            ['user_id' => 2, 'role_id' => 2]
        ]);

        // add currency
        DB::table('currencies')->insert([
            ['code' => 'USD', 'rate' => 1],
            ['code' => 'JPY', 'rate' => 0.0096],
            ['code' => 'IDR', 'rate' => 0.000071]
        ]);

    }
}

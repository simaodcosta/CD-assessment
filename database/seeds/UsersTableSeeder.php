<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Introducing by default an admin login details
        DB::table('users')->insert([
            'name'      => 'administrator',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('password'),
        ]);
    }
}
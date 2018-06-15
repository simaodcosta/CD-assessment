<?php

use Illuminate\Database\Seeder;
use App\User;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'administrator',
            'email'     => ' admin@admin.com',
            'password'  => 'password',
        ]);
    }
}

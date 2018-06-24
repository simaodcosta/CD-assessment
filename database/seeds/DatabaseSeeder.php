<?php

use Illuminate\Database\Seeder;
use database\seeds;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seeds to be called with "php artisan db:seed" command
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
    }
}

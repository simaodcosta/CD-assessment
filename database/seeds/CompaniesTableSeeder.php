<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name'      => 'Cyber Duck',
            'email'     => 'cyberduck@example.com',
            'logo'      => 'CyberDuck.png',
            'phone'     => '1234567890',
        ]);
        DB::table('companies')->insert([
            'name'      => 'FC Porto',
            'email'     => 'fcporto@example.com',
            'logo'      => 'FCPorto.jpeg',
            'phone'     => '0987654321',
        ]);
        DB::table('companies')->insert([
            'name'      => 'Example no3',
            'email'     => 'example@example.com',
            'logo'      => 'default.png',
            'phone'     => '3456789012',
        ]);
        DB::table('companies')->insert([
            'name'      => 'Example no4',
            'email'     => 'example@example.com',
            'logo'      => 'default.png',
            'phone'     => '4567890123',
        ]);
        DB::table('companies')->insert([
            'name'      => 'Example no5',
            'email'     => 'example@example.com',
            'logo'      => 'default.png',
            'phone'     => '5678901234',
        ]);
        DB::table('companies')->insert([
            'name'      => 'Example no6',
            'email'     => 'example@example.com',
            'logo'      => 'default.png',
            'phone'     => '5678901234',
        ]);
        DB::table('companies')->insert([
            'name'      => 'Example no7',
            'email'     => 'example@example.com',
            'logo'      => 'default.png',
            'phone'     => '6789012345',
        ]);
        DB::table('companies')->insert([
            'name'      => 'Example no8',
            'email'     => 'example@example.com',
            'logo'      => 'default.png',
            'phone'     => '7890123456',
        ]);
        DB::table('companies')->insert([
            'name'      => 'Example no9',
            'email'     => 'example@example.com',
            'logo'      => 'default.png',
            'phone'     => '8901234567',
        ]);
        DB::table('companies')->insert([
            'name'      => 'Example no10',
            'email'     => 'example@example.com',
            'logo'      => 'default.png',
            'phone'     => '9012345678',
        ]);
        DB::table('companies')->insert([
            'name'      => 'Example no11',
            'email'     => 'example@example.com',
            'logo'      => 'default.png',
            'phone'     => '0012345678',
        ]);
    }
}
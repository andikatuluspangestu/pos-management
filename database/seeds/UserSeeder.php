<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
            'level' => 'admin'
        ]);

        User::create([
            'name' => 'Sales',
            'email' => 'sales@example.com',
            'password' => bcrypt('12345678'),
            'level' => 'sales'
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'password' => bcrypt('12345678'),
            'level' => 'customer'
        ]);
    }
}

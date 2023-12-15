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
        // Administrators
        User::create([
            'name'      => 'Administrator',
            'email'     => 'admin@example.com',
            'password'  => bcrypt('12345678'),
            'role'      => 'admin'
        ]);

        User::create([
            'name'      => 'Andika Tulus Pangestu',
            'email'     => 'andikatulusp@example.com',
            'password'  => bcrypt('12345678'),
            'role'      => 'admin'
        ]);

        // Sales
        User::create([
            'name'      => 'Sales',
            'email'     => 'sales@example.com',
            'password'  => bcrypt('12345678'),
            'role'      => 'sales'
        ]);

        User::create([
            'name'      => 'Hafizhul Qisti',
            'email'     => 'hafizh@example.com',
            'password'  => bcrypt('12345678'),
            'role'      => 'sales'
        ]);

        // Customers
        User::create([
            'name'      => 'Customer',
            'email'     => 'customer@example.com',
            'password'  => bcrypt('12345678'),
            'role'      => 'customer'
        ]);

        User::create([
            'name'      => 'Yulianti Putri',
            'email'     => 'yulianti@example.com',
            'password'  => bcrypt('12345678'),
            'role'      => 'customer'
        ]);
    }
}

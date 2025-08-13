<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::insert([
            [
                'uid' => 'superadmin',
                'email' => 'superadmin@abc.com',
                'password' => bcrypt('superadmin'),
                'stat' => 'a',
                'role' => 's'
            ],
            [
                'uid' => 'admin',
                'email' => 'admin@abc.com',
                'password' => bcrypt('admin'),
                'stat' => 'a',
                'role' => 'a'
            ],
            [
                'uid' => 'manager',
                'email' => 'manager@abc.com',
                'password' => bcrypt('manager'),
                'stat' => 'a',
                'role' => 'm'
            ],
            [
                'uid' => 'staff',
                'email' => 'staff@abc.com',
                'password' => bcrypt('staff'),
                'stat' => 'a',
                'role' => 'w'
            ],
            [
                'uid' => 'client',
                'email' => 'client@abc.com',
                'password' => bcrypt('client'),
                'stat' => 'a',
                'role' => 'c'
            ],
        ]);
    }
}

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
            // Superadmin
            [
                'uid' => 'superadmin',
                'email' => 'superadmin@abc.com',
                'password' => bcrypt('superadmin'),
                'stat' => 'a',
                'role' => 's'
            ],

            // Admins
            [
                'uid' => 'admin1',
                'email' => 'admin1@abc.com',
                'password' => bcrypt('admin1'),
                'stat' => 'a',
                'role' => 'a'
            ],
            [
                'uid' => 'admin2',
                'email' => 'admin2@abc.com',
                'password' => bcrypt('admin2'),
                'stat' => 'a',
                'role' => 'a'
            ],

            // Managers
            [
                'uid' => 'manager1',
                'email' => 'manager1@abc.com',
                'password' => bcrypt('manager1'),
                'stat' => 'a',
                'role' => 'm'
            ],
            [
                'uid' => 'manager2',
                'email' => 'manager2@abc.com',
                'password' => bcrypt('manager2'),
                'stat' => 'a',
                'role' => 'm'
            ],

            // Staff
            [
                'uid' => 'staff1',
                'email' => 'staff1@abc.com',
                'password' => bcrypt('staff1'),
                'stat' => 'a',
                'role' => 'w'
            ],
            [
                'uid' => 'staff2',
                'email' => 'staff2@abc.com',
                'password' => bcrypt('staff2'),
                'stat' => 'a',
                'role' => 'w'
            ],
            [
                'uid' => 'staff3',
                'email' => 'staff3@abc.com',
                'password' => bcrypt('staff3'),
                'stat' => 'a',
                'role' => 'w'
            ],
            [
                'uid' => 'staff4',
                'email' => 'staff4@abc.com',
                'password' => bcrypt('staff4'),
                'stat' => 'a',
                'role' => 'w'
            ],
            [
                'uid' => 'staff5',
                'email' => 'staff5@abc.com',
                'password' => bcrypt('staff5'),
                'stat' => 'a',
                'role' => 'w'
            ],
            [
                'uid' => 'staff6',
                'email' => 'staff6@abc.com',
                'password' => bcrypt('staff6'),
                'stat' => 'a',
                'role' => 'w'
            ],

            // Clients
            [
                'uid' => 'client1',
                'email' => 'client1@abc.com',
                'password' => bcrypt('client1'),
                'stat' => 'a',
                'role' => 'c'
            ],
            [
                'uid' => 'client2',
                'email' => 'client2@abc.com',
                'password' => bcrypt('client2'),
                'stat' => 'a',
                'role' => 'c'
            ],
            [
                'uid' => 'client3',
                'email' => 'client3@abc.com',
                'password' => bcrypt('client3'),
                'stat' => 'a',
                'role' => 'c'
            ],
            [
                'uid' => 'client4',
                'email' => 'client4@abc.com',
                'password' => bcrypt('client4'),
                'stat' => 'a',
                'role' => 'c'
            ],
            [
                'uid' => 'client5',
                'email' => 'client5@abc.com',
                'password' => bcrypt('client5'),
                'stat' => 'a',
                'role' => 'c'
            ],
            [
                'uid' => 'client6',
                'email' => 'client6@abc.com',
                'password' => bcrypt('client6'),
                'stat' => 'a',
                'role' => 'c'
            ],
        ]);
    }
}

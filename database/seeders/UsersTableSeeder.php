<?php

namespace Database\Seeders;

use App\Utils\UserRole;
use App\Models\User;
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
         $users = [
            [
                'avatar'        => "employee/profile_1.png",
                'name'          => "Admin",
                'email'         => "admin@pos.com",
                'password'      => bcrypt('password'),
                'role'          => UserRole::ADMIN,
            ],
            [
                'avatar'         => "employee/profile_2.png",
                'name'           => "John Doe",
                 'email'         => "john@pos.com",
                 'phone'         => "03345974123",
                 'password'      => bcrypt('password'),
                 'role'          => UserRole::CASHIER
            ],
            [
                'avatar'         => "employee/profile_3.png",
                'name'           => "Jane Doe",
                 'email'         => "jane@pos.com",
                 'phone'         => "03045364787",
                 'password'      => bcrypt('password'),
                 'role'          => UserRole::CASHIER
            ]
         ];

         foreach ($users as $user){
             User::create($user);
         }

    }
}

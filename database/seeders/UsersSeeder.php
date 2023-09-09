<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getUsers() as $index => $user) {
            $user = User::create($user);
            $user->userData()->create($this->getUserData()[$index]);
        }
    }

    protected function getUsers()
    {
        return [
            [
                'name' => 'admin',
                'email' => 'ozgunn@gmail.com',
                'phone_number' => '5422212549',
                'phone_country_code' => '+90',
                'password' => bcrypt('asdasd'),
                'role' => 100,
                'status' => 10,
                'language' => 'tr',
            ],

            [
                'name' => 'teacher',
                'email' => 'teacher@school.com',
                'phone_number' => '0422212549',
                'phone_country_code' => '+90',
                'password' => bcrypt('asdasd'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr'
            ],

            [
                'name' => 'parent',
                'email' => 'parent@school.com',
                'phone_number' => '1422212549',
                'phone_country_code' => '+90',
                'password' => bcrypt('asdasd'),
                'role' => User::ROLE_PARENT,
                'status' => 10,
                'language' => 'tr'
            ]
        ];
    }

    protected function getUserData()
    {
        return [
            [
                'first_name' => "ozgun",
                'last_name' => "aksoy",
                'address' => "bayraklı",
                'country' => 1,
                'city' => 35,
                'town' => null
            ],

            [
                'first_name' => "teacher",
                'last_name' => "lastname",
                'address' => "bayraklı",
                'country' => 1,
                'city' => 6,
                'town' => null
            ],

            [
                'first_name' => "parent",
                'last_name' => "lastname",
                'address' => "bayraklı",
                'country' => 1,
                'city' => 34,
                'town' => null
            ]
        ];
    }
}

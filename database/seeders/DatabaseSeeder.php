<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User Seeder
        User::create(
            [
                'name' => 'admin',
                'email' => 'ozgunn@gmail.com',
                'phone_number' => '5422212549',
                'phone_country_code' => '+90',
                'password' => bcrypt('asdasd'),
                'role' => 'admin',
                'status' => 10,
                'language' => 'tr'
            ]
        );
        UserData::create([
            'user_id' => 1,
            'first_name' => 'ozgun',
            'last_name' => 'aksoy',
            'address' => 'bayraklı - izmir',
        ]);
    }
}

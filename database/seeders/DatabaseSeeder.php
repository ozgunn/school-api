<?php

namespace Database\Seeders;

use App\Models\User;
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
                'password' => bcrypt('asdasd'),
                'role' => 'admin',
                'status' => 10,
                'language' => 'tr'
            ]
        );
    }
}

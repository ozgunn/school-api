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
        $this->call([
            CountriesSeeder::class,
            CitiesSeeder::class,
            TownsSeeder::class,
            UsersSeeder::class,
            SchoolsSeeder::class,
            GroupsSeeder::class,
            ClassesSeeder::class,
            StudentsSeeder::class,
            AnnouncementsSeeder::class,
            DailyNotesSeeder::class,
            DailyReportsSeeder::class,
            FoodMenuSeeder::class,
            BusSeeder::class,
            MessagesSeeder::class,
            FilesSeeder::class,
            MediaSeeder::class,
        ]);
    }
}

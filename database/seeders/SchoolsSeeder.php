<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schools')->insert($this->getItems());

        $school = School::find(1);
        $user1 = User::where(['role' => User::ROLE_ADMIN])->first();
        $user2 = User::where(['role' => User::ROLE_TEACHER])->first();
        $user3 = User::where(['role' => User::ROLE_PARENT])->first();

        $school->managers()->attach($user1, ['role' => \App\Models\User::ROLE_ADMIN]);
        $school->teachers()->attach($user2, ['role' => \App\Models\User::ROLE_TEACHER]);
        $school->parents()->attach($user3, ['role' => \App\Models\User::ROLE_PARENT]);

    }

    protected function getItems()
    {
        return [
            [
                'parent_id' => null,
                'name' => 'Özel Kaptan Yuva Anaokulu',
                'country' => 1,
                'city' => 34,
                'town' => 3,
                'address' => 'Falan Mah. Filan Sokak No:23 Semt',
                'phone' => '+90 216 234 34 43',
                'email' => 'school1@school.com',
                'status' => 1,
            ],
            [
                'parent_id' => 1,
                'name' => 'Kaptan Şube-1',
                'country' => 1,
                'city' => 34,
                'town' => 4,
                'address' => 'Falan Mah. Filan Sokak No:23 Semt',
                'phone' => '+90 216 234 34 43',
                'email' => 'school2@school.com',
                'status' => 1,
            ],
        ];
    }
}

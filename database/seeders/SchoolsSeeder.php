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
                'id' => 100,
                'parent_id' => null,
                'name' => 'Özel Kaptan Yuva Anaokulu',
                'country' => 1,
                'city' => 7,
                'town' => null,
                'address' => 'Gürsu',
                'phone' => '2423249109',
                'email' => 'info@kaptanyuva.com.tr',
                'status' => 1,
            ],
            [
                'id' => 101,
                'parent_id' => 100,
                'name' => 'Kaptan Gürsu',
                'country' => 1,
                'city' => 7,
                'town' => null,
                'address' => 'Gürsu',
                'phone' => '2423249109',
                'email' => 'info@kaptanyuva.com.tr',
                'status' => 1,
            ],
            [
                'id' => 102,
                'parent_id' => 100,
                'name' => 'Kaptan Preschool',
                'country' => 1,
                'city' => 7,
                'town' => null,
                'address' => 'Çağlayan Mah. 2004 Sk. No:18 Muratpaşa',
                'phone' => '2423249109',
                'email' => 'info@kaptanyuva.com.tr',
                'status' => 1,
            ],
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classes')->insert($this->getItems());

    }

    protected function getItems()
    {
        return [
            [
                'name' => 'Kelebekler Sınıfı',
                'group_id' => 1,
                'school_id' => 2
            ],
            [
                'name' => 'Arılar Sınıfı',
                'group_id' => 1,
                'school_id' => 2
            ],
            [
                'name' => 'Böcükler Sınıfı',
                'group_id' => 1,
                'school_id' => 2
            ],
            [
                'id' => 101,
                'name' => '3K',
                'group_id' => 101,
                'school_id' => 101
            ],
            [
                'id' => 102,
                'name' => '4A',
                'group_id' => 102,
                'school_id' => 101
            ],
            [
                'id' => 103,
                'name' => '4B',
                'group_id' => 102,
                'school_id' => 101
            ],
            [
                'id' => 104,
                'name' => '4C',
                'group_id' => 102,
                'school_id' => 101
            ],
            [
                'id' => 105,
                'name' => '5A',
                'group_id' => 103,
                'school_id' => 101
            ],
            [
                'id' => 106,
                'name' => '5B',
                'group_id' => 103,
                'school_id' => 101
            ],
            [
                'id' => 107,
                'name' => '5C',
                'group_id' => 103,
                'school_id' => 101
            ],
            [
                'id' => 108,
                'name' => '6A',
                'group_id' => 104,
                'school_id' => 101
            ],
            [
                'id' => 109,
                'name' => '6B',
                'group_id' => 104,
                'school_id' => 101
            ],
        ];
    }
}

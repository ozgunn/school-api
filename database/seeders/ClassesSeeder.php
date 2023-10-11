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

        ];
    }
}

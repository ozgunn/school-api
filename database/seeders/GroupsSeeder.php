<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groups')->insert($this->getItems());

    }

    protected function getItems()
    {
        return [
            [
                'name' => '3 Yaş Grubu',
                'age_group' => 3,
                'school_id' => 2
            ],
            [
                'name' => '4 Yaş Grubu',
                'age_group' => 4,
                'school_id' => 2
            ],
            [
                'name' => '5 Yaş Grubu',
                'age_group' => 5,
                'school_id' => 2
            ],

        ];
    }
}

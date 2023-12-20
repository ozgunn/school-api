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
                'id' => '101',
                'name' => '3 Yaş Grubu',
                'age_group' => 3,
                'school_id' => 101
            ],
            [
                'id' => '102',
                'name' => '4 Yaş Grubu',
                'age_group' => 4,
                'school_id' => 101
            ],
            [
                'id' => '103',
                'name' => '5 Yaş Grubu',
                'age_group' => 5,
                'school_id' => 101
            ],
            [
                'id' => '104',
                'name' => '6 Yaş Grubu',
                'age_group' => 6,
                'school_id' => 101
            ],
            [
                'id' => '105',
                'name' => '3 Yaş Grubu',
                'age_group' => 3,
                'school_id' => 102
            ],
            [
                'id' => '106',
                'name' => '4 Yaş Grubu',
                'age_group' => 4,
                'school_id' => 102
            ],
            [
                'id' => '107',
                'name' => '5 Yaş Grubu',
                'age_group' => 5,
                'school_id' => 102
            ],
            [
                'id' => '108',
                'name' => '6 Yaş Grubu',
                'age_group' => 6,
                'school_id' => 102
            ],
        ];
    }
}

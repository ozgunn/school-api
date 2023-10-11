<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert($this->getItems());

    }

    protected function getItems()
    {
        $parent = User::where('role', User::ROLE_PARENT)->first();
        return [
            [
                'name' => 'Öğrenci Test1',
                'class_id' => 1,
                'school_id' => 2,
                'parent_id' => $parent->id,
            ],
            [
                'name' => 'Öğrenci Test2',
                'class_id' => 1,
                'school_id' => 2,
                'parent_id' => $parent->id,
            ],
            [
                'name' => 'Öğrenci Test3',
                'class_id' => 1,
                'school_id' => 2,
                'parent_id' => $parent->id,
            ],

        ];
    }
}

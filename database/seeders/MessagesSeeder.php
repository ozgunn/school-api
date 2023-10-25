<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getItems() as $item) {
            DB::table('messages')->insert($item);
        }

    }

    protected function getItems()
    {
        return [
            [
                'school_id' => 2,
                'student_id' => 1,
                'message' => 'Okuldan öğrenciye (veliye) mesaj',
                'user_id' => 1,
                'type' => 1,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'student_id' => 1,
                'message' => 'Öğretmenden öğrenciye (veliye) mesaj',
                'user_id' => 2,
                'teacher_id' => 2,
                'type' => 2,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'school_id' => 2,
                'student_id' => 1,
                'message' => 'Veliden okula mesaj',
                'user_id' => 3,
                'type' => 1,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'student_id' => 1,
                'message' => 'Veliden öğretmene mesaj',
                'user_id' => 3,
                'teacher_id' => 2,
                'type' => 2,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getItems() as $item) {
            DB::table('user_notifications')->insert($item);
        }

    }

    protected function getItems()
    {
        return [
            [
                'title' => 'Okuldan öğrenciye (veliye) mesaj',
                'user_id' => 2,
                'created_at' => new \DateTime(),
                'read_at' => null,
            ],
            [
                'title' => 'Öğretmenden öğrenciye (veliye) mesaj',
                'user_id' => 2,
                'created_at' => new \DateTime(),
                'read_at' => new \DateTime(),
            ],
        ];
    }
}

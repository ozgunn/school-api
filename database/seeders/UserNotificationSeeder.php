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
                'title' => 'Öğretmeninizden bir mesaj geldi',
                'description' => 'Detaylar için tıklayın',
                'user_id' => 2,
                'created_at' => new \DateTime(),
                'read_at' => null,
                'page' => 'kaptanyuva://messages/1',
            ],
            [
                'title' => 'Gün sonu değerlendirmesi eklendi',
                'description' => 'Detaylar için tıklayın',
                'user_id' => 2,
                'created_at' => new \DateTime(),
                'read_at' => new \DateTime(),
                'page' => 'kaptanyuva://daiy',
            ],
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('media')->insert($this->getItems());

    }

    protected function getItems()
    {
        return [
            [
                'user_id' => 2,
                'school_id' => 2,
                'class_id' => 1,
                'file' => 'school-photo-1.jpg',
                'description' => 'Derste çok eğlendik',
                'type' => 1,
                'publish_date' => date('Y-m-d', time()),
            ],
            [
                'user_id' => 2,
                'school_id' => 2,
                'class_id' => 1,
                'file' => 'school-photo-2.jpg',
                'description' => 'Derste çok eğlendik',
                'type' => 1,
                'publish_date' => date('Y-m-d', time()),
            ],
        ];
    }
}

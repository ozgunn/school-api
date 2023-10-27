<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('files')->insert($this->getItems());

    }

    protected function getItems()
    {
        return [
            [
                'user_from' => 1,
                'school_id' => 2,
                'group_id' => null,
                'lang' => 'tr',
                'file' => 'sample.pdf',
                'type' => 1,
                'publish_year' => 2023,
                'publish_month' => 10,
            ],
            [
                'user_from' => 1,
                'school_id' => 2,
                'group_id' => 1,
                'lang' => 'tr',
                'file' => 'sample.pdf',
                'type' => 2,
                'publish_year' => 2023,
                'publish_month' => 10,
            ],
        ];
    }
}

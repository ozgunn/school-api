<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bus')->insert($this->getItems());

    }

    protected function getItems()
    {
        return [
            [
                'school_id' => 1,
                'license_plate' => '07 AB 3281',
                'start_time' => '07:00',
                'end_time' => '18:00',
                'status' => 1,
                'lat' => '36.636882835655226',
                'long' => '30.736882835655226',
            ],
            [
                'school_id' => 1,
                'license_plate' => '07 CD 6281',
                'start_time' => '07:00',
                'end_time' => '18:00',
                'status' => 0,
                'lat' => '36.836882835655226',
                'long' => '30.936882835655226',
            ],
        ];
    }
}

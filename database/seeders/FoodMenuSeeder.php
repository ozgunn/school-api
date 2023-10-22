<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('food_menu')->insert($this->getItems());

    }

    protected function getItems()
    {
        return [
            [
                'school_id' => 1,
                'lang' => 'tr',
                'date' => (new \DateTime())->format('Y-m-d'),
                'first_meal' => 'Sütlü çırpılmış yum., b. peynir, domates, salatalık, süt',
                'second_meal' => 'Nohut, bulgur pilavı, cacık',
                'third_meal' => 'Meyve salatası',
            ],
            [
                'school_id' => 1,
                'lang' => 'tr',
                'date' => (new \DateTime())->modify('+1 day')->format('Y-m-d'),
                'first_meal' => 'Peynirli gözleme, domates, salatalık, süt',
                'second_meal' => 'Peynirli gözleme, domates, salatalık, süt',
                'third_meal' => 'Peynirli çıtır çubuk, soğuk meyve çayı',
            ],
        ];
    }
}

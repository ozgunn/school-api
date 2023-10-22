<?php

namespace Database\Seeders;

use App\Models\AnnouncementRecipient;
use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyNotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //DB::table('daily_notes')->insert($this->getItems());
        foreach ($this->getItems() as $item) {
            DB::table('daily_notes')->insert($item);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    protected function getItems()
    {
        return [
            [
                'id' => 100,
                'parent_id' => 0,
                'type' => 'mood',
                'title' => 'Bugün Ben',
            ],
            [
                'id' => 200,
                'parent_id' => 0,
                'type' => 'activity',
                'title' => 'Bugün Yaptıklarım',
            ],
            [
                'id' => 300,
                'parent_id' => 0,
                'type' => 'food',
                'title' => 'Yemek',
            ],
            [
                'id' => 301,
                'parent_id' => 300,
                'type' => 'food',
                'title' => 'Kahvaltı',
            ],
            [
                'id' => 302,
                'parent_id' => 300,
                'type' => 'food',
                'title' => 'Öğle',
            ],
            [
                'id' => 303,
                'parent_id' => 300,
                'type' => 'food',
                'title' => 'İkindi',
            ],
            [
                'id' => 400,
                'parent_id' => 0,
                'type' => 'sleep',
                'title' => 'Uyku',
            ],
            [
                'id' => 401,
                'parent_id' => 400,
                'title' => null,
                'option' => 'Evet',
            ],
            [
                'id' => 402,
                'parent_id' => 400,
                'title' => null,
                'option' => 'Hayır',
            ],
            [
                'id' => 101,
                'parent_id' => 100,
                'title' => null,
                'option' => 'Mutluydum',
            ],
            [
                'id' => 102,
                'parent_id' => 100,
                'title' => null,
                'option' => 'Katılımcıydım',
            ],
            [
                'id' => 103,
                'parent_id' => 100,
                'title' => null,
                'option' => 'Dinleyiciydim',
            ],
            [
                'id' => 104,
                'parent_id' => 100,
                'title' => null,
                'option' => 'Harketliydim',
            ],
            [
                'id' => 105,
                'parent_id' => 100,
                'title' => null,
                'option' => 'Paylaşımcıydım',
            ],
            [
                'id' => 201,
                'parent_id' => 200,
                'title' => null,
                'option' => 'Daire Zamanı',
            ],
            [
                'id' => 202,
                'parent_id' => 200,
                'title' => null,
                'option' => 'Günlük Aktivite',
            ],
            [
                'id' => 203,
                'parent_id' => 200,
                'title' => null,
                'option' => 'Serbest Oyun',
            ],
            [
                'id' => 204,
                'parent_id' => 200,
                'title' => null,
                'option' => 'Hikaye Saati',
            ],
            [
                'id' => 205,
                'parent_id' => 200,
                'title' => null,
                'option' => 'Masa Oyunları',
            ],
            [
                'id' => 206,
                'parent_id' => 200,
                'title' => null,
                'option' => 'Akıllı Tahta',
            ],
            [
                'id' => 207,
                'parent_id' => 200,
                'title' => null,
                'option' => 'Jimnastik',
            ],
            [
                'id' => 208,
                'parent_id' => 200,
                'title' => null,
                'option' => 'Müzik',
            ],
            [
                'id' => 209,
                'parent_id' => 200,
                'title' => null,
                'option' => 'Sanat',
            ],
            [
                'id' => 210,
                'parent_id' => 200,
                'title' => null,
                'option' => 'Kitap',
            ],
            [
                'id' => 211,
                'parent_id' => 200,
                'title' => null,
                'option' => 'Matematik Oyunları',
            ],
            [
                'id' => 212,
                'parent_id' => 200,
                'title' => null,
                'option' => 'Bahçe-Gezi',
            ],
            [
                'id' => 213,
                'parent_id' => 200,
                'title' => null,
                'option' => 'Bilim',
            ],
            [
                'id' => 311,
                'parent_id' => 301,
                'title' => null,
                'option' => 'Hepsi',
            ],
            [
                'id' => 312,
                'parent_id' => 301,
                'title' => null,
                'option' => 'Biraz',
            ],
            [
                'id' => 313,
                'parent_id' => 301,
                'title' => null,
                'option' => 'Hiç',
            ],
            [
                'id' => 321,
                'parent_id' => 302,
                'title' => null,
                'option' => 'Hepsi',
            ],
            [
                'id' => 322,
                'parent_id' => 302,
                'title' => null,
                'option' => 'Biraz',
            ],
            [
                'id' => 323,
                'parent_id' => 302,
                'title' => null,
                'option' => 'Hiç',
            ],
            [
                'id' => 331,
                'parent_id' => 303,
                'title' => null,
                'option' => 'Hepsi',
            ],
            [
                'id' => 332,
                'parent_id' => 303,
                'title' => null,
                'option' => 'Biraz',
            ],
            [
                'id' => 333,
                'parent_id' => 303,
                'title' => null,
                'option' => 'Hiç',
            ],
        ];
    }
}

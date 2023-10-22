<?php

namespace Database\Seeders;

use App\Models\AnnouncementRecipient;
use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('daily_reports')->insert($this->getItems());

    }

    protected function getItems()
    {
        return [
            [
                'student_id' => 1,
                'school_id' => 1,
                'class_id' => 1,
                'date' => (new \DateTime())->format('Y-m-d'),
                'selected_notes' => '101,102,103,201,202,203,204,205,206,311,322,333,401',
                'note' => 'Çok iyiydi bugün.',
            ]
        ];
    }
}

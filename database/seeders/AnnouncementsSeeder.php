<?php

namespace Database\Seeders;

use App\Models\AnnouncementRecipient;
use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('announcements')->insert($this->getItems());

        // Add content

        DB::table('announcement_content')->insert([
            [
                'announcement_id' => 1,
                'lang' => 'tr',
                'content' => 'Yeni uygulamamız hazır.',
            ],
            [
                'announcement_id' => 1,
                'lang' => 'en',
                'content' => 'Our new app is ready.',
            ],
        ]);

        // Add recipients
        $school = School::find(2);

        $students = $school->students;
        foreach ($students as $student) {
            $recipient = new AnnouncementRecipient();
            $recipient->announcement_id = 1;
            $recipient->student_id = $student->id;
            $recipient->save();
        }

    }

    protected function getItems()
    {
        return [
            [
                'sender_id' => 1,
                'school_id' => 1
            ],
        ];
    }
}

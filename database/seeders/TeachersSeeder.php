<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $school101 = School::findOrFail(101);
        $school102 = School::findOrFail(102);

        foreach ($this->getUsers101() as $index => $user) {
            $user = User::create($user);
            $school101->users()->attach($user, [
                'role' => $user->role,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        foreach ($this->getUsers102() as $index => $user) {
            $user = User::create($user);
            $school102->users()->attach($user, [
                'role' => $user->role,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }

    protected function getUsers101()
    {
        return [
            [
                'name' => 'Ebru Şener',
                'email' => 'ebru07.ee@gmail.com',
                'phone_number' => '5426896812',
                'phone_country_code' => '+90',
                'password' => bcrypt('5426896812'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Münüre Akdemir',
                'email' => 'munureakdemir1024@gmail.com',
                'phone_number' => '5537455173',
                'phone_country_code' => '+90',
                'password' => bcrypt('5537455173'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Feyza Hafif',
                'email' => 'feyzahafif@gmail.com',
                'phone_number' => '5416911307',
                'phone_country_code' => '+90',
                'password' => bcrypt('5416911307'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Ezgi Dilan Ceylan',
                'email' => 'ezgiiiceylan@gmail.com',
                'phone_number' => '5319573487',
                'phone_country_code' => '+90',
                'password' => bcrypt('5319573487'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Ayşenur Topkaya',
                'email' => 'aysetopkara188@hotmail.com',
                'phone_number' => '5433704295',
                'phone_country_code' => '+90',
                'password' => bcrypt('5433704295'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Sibel Çınar',
                'email' => 'sibelcinar97@icloud.com',
                'phone_number' => '5395904744',
                'phone_country_code' => '+90',
                'password' => bcrypt('5395904744'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Sevda Gözütok',
                'email' => 'ruzgar_ruya2014@hotmail.com',
                'phone_number' => '5554882037',
                'phone_country_code' => '+90',
                'password' => bcrypt('5554882037'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Buse Metin',
                'email' => 'metinbuse827@gmail.com',
                'phone_number' => '5437350209',
                'phone_country_code' => '+90',
                'password' => bcrypt('5437350209'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Meryem Gül',
                'email' => 'mervegl021@gmail.com',
                'phone_number' => '5312069848',
                'phone_country_code' => '+90',
                'password' => bcrypt('5312069848'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Melek Dölek',
                'email' => 'akorenmelek@gmail.com',
                'phone_number' => '5414280291',
                'phone_country_code' => '+90',
                'password' => bcrypt('5414280291'),
                'role' => User::ROLE_MANAGER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Hasibe Hatipoğlu',
                'email' => 'hasibephatipoglu@gmail.com',
                'phone_number' => '5324006020',
                'phone_country_code' => '+90',
                'password' => bcrypt('5324006020'),
                'role' => User::ROLE_MANAGER,
                'status' => 10,
                'language' => 'tr',
            ],
       ];
    }

    protected function getUsers102()
    {
        return [
            [
                'name' => 'Gülşah Örs',
                'email' => 'glsh2208@gmail.com',
                'phone_number' => '5415268595',
                'phone_country_code' => '+90',
                'password' => bcrypt('5415268595'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Hazal Aydın',
                'email' => 'aydinhazal0715@gmail.com',
                'phone_number' => '5532153811',
                'phone_country_code' => '+90',
                'password' => bcrypt('5532153811'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Fatma Budak',
                'email' => 'fatma.budak.07.07@gmail.com',
                'phone_number' => '5397979288',
                'phone_country_code' => '+90',
                'password' => bcrypt('5397979288'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Amanda Yıldırmaz',
                'email' => 'xamandahugginsx10@gmail.com',
                'phone_number' => '5435640256',
                'phone_country_code' => '+90',
                'password' => bcrypt('5435640256'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Hilal Feyza Söylemez',
                'email' => 'hilalfeyzasoylemez@gmail.com',
                'phone_number' => '5060951607',
                'phone_country_code' => '+90',
                'password' => bcrypt('5060951607'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Gözde Özkaya',
                'email' => 'gozde.ozkaya@icloud.com',
                'phone_number' => '5332117814',
                'phone_country_code' => '+90',
                'password' => bcrypt('5332117814'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Azizun Nessa',
                'email' => 'juliebadat@hotmail.com',
                'phone_number' => '5464650675',
                'phone_country_code' => '+90',
                'password' => bcrypt('5464650675'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'Ceyda Tanyeri',
                'email' => 'ceydaaw@hotmail.com',
                'phone_number' => '5395033050',
                'phone_country_code' => '+90',
                'password' => bcrypt('5395033050'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
            [
                'name' => 'İmren Turan',
                'email' => 'i.turanbaran@gmail.com',
                'phone_number' => '5058071378',
                'phone_country_code' => '+90',
                'password' => bcrypt('5058071378'),
                'role' => User::ROLE_TEACHER,
                'status' => 10,
                'language' => 'tr',
            ],
        ];
    }

}

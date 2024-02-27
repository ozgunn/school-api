<?php

namespace App\Console\Commands;

use App\Models\School;
use App\Models\Student;
use App\Models\User;
use App\Models\UserData;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import {--school=} {--class=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $schoolId = $this->option('school');
        $classId = $this->option('class');

        $school = School::findOrFail($schoolId);

        $list = $this->getList($schoolId, $classId);
        foreach ($list as $i) {
            try {
                DB::beginTransaction();
                $user = User::where(['phone_number' => trim($i[3])])->first();
                if (!$user) {
                    $udata = [
                        'name' => trim($i[0]) . " " . trim($i[1]),
                        'email' => trim($i[2]),
                        'phone_number' => trim($i[3]),
                        'phone_country_code' => '+90',
                        'language' => 'tr',
                        'status' => 10,
                        'role' => User::ROLE_PARENT,
                        'password' => bcrypt(Str::random(32)),
                    ];
                    $user = User::create($udata);
                    $this->info("User {$user->id} added");

                    $userData = UserData::create([
                        'user_id' => $user->id,
                        'first_name' => trim($i[0]),
                        'last_name' => trim($i[1]),
                        'country' => 1,
                        'city' => 7,
                    ]);

                    $school->users()->attach($user, [
                        'role' => User::ROLE_PARENT,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }

                $student = Student::create([
                    'school_id' => $schoolId,
                    'class_id' => $classId,
                    'parent_id' => $user->id,
                    'name' => trim($i[4]),
                ]);
                $this->info("Student {$student->id} added");
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                dd($exception->getMessage());
            }


        }
    }

    public function getList($schoolId, $classId)
    {
        $list[102][15] = [
            ["Özge", "AYDIN", "ozge_karagoz@windowslive.com", "5543808804", "Altay Aydın"],
            ["DAMLA", "KÖYSÜREN", "damlagoksu07@hotmail.com", "5322080392", "Ayliz KÖYSÜREN"],
            ["ECEM", "DAĞYAR", "ecem@dagyar.com", "5367428945", "Bal Kayla Dağyar"],
            ["REMZİYE", "ERGÜÇ", "eyis333@hotmail.com", "5334746604", "Gani Ergüç"],
            ["GİZEM", "ÖZÜŞ", "gizemozus@gmail.com", "5375780060", "Aslan Özüş"],
            ["OLENA", "TONTU", "alenaumanets@gmail.com", "5392051094", "Aliz Tontu"],
            ["GAMZE", "SÜZME", "gamzearat81@hotmail.com", "5345407676", "Nefes  Süzme"],
            ["YASEMİN", "RITTMEYER", "zemaltinay@gmail.com", "5336414620", "Oliver RITTMEYER"],
            ["HAZAL", "CENGİZ", "", "5302090330", "Lina Cengiz"],
            ["EVRİM", "ATILGAN", "", "5326278200", "Aras Atılgan"],
        ];
        $list[102][16] = [
            ["MERVE", "AYSU", " turker.merve@gmail.com", " 5319899271", " ATA AYSU"],
            ["PINAR", "ÖZER", " pinarsumerkan@gmail.com", "5356183880", " MASAL ÖZER"],
            ["ZEYNEP", " YERLİTAŞ", " Zeyna-22@hotmail.com", " 5372298859", " NEVİN YADE YERLİTAŞ"],
            ["DERYA", "KIRIL", "temeldry@gmail.com", " 5330595507", " AYBARS KIRIL"],
            ["BÜŞRA", "ARSLAN", " aysebusraarslan@gmail.com", "5388512899", " NİSAN ARSLAN"],
            ["EMEL", " KÖŞK", " ceylan_em@hotmail.com", "5496269640", " ERDAL KAAN KÖŞK"],
            ["YUNUS EMRE", " SALAY", "yunusemresalay@gmail.com", "5417370321", "YAĞIZ EKİN SALAY"],
            ["GÖZDE", "ÖZDEMİR", "ygozdeyilmaz@gmail.com", " 5305624205", " ARDA ÖZDEMİR"],
            ["BENAY", "ÖZKAN", "benayb.arc@gmail.com", " 5324000644", " EMİR BARLAS ÖZKAN"],
            ["ECE", "EKEKON", " gorkemecebirkan@gmail.com", "5363440017", " EFE KEREM EKEKON"],
            ["BENGÜ", "YÖRÜKOĞLU", "cnyorukoglu@gmail.com", "5332500121", " AZADE PERA YÖRÜKOĞLU"],
            ["MAVİ", " YAZICI", " Maviyazici6@gmail.com", "5455595354", " AYBARS YAZICI"],
        ];

        $list[102][19] = [
            ["ESRA", " ALKAN", "alkanesra07@gmail.com", "5312186204", " BİLGAY ALKAN"],
            ["TUĞBA", "TEMEL", "tugbagulsah@gmail.com", "5338115852", " MERT TEMEL"],
            ["ŞEYMA", "TÜRKAY", " seymauzn@hotmail.com", " 5337645576", " SİMAY TÜRKAY"],
            ["ŞERMİN", " ACIPAYAM", " aserminfiliz@gmailç", "5397629166", " TOPRAK ACIPAYAM"],
            ["AYŞE", " MOLON", "ayseiyigunn@gmail.com", "5455469355", " ZEYNEP MOLON"],
            ["ELİF", " TEKE", " elifteke@yahoo.com", " 5064064917", " CAN TEKE"],
            ["BAHRİYE", "KURŞUNLU", " bahriyekursunlu1@hotmail.com", " 5335146607", " DERİN DOĞA KURŞUNLU"],
            ["MELİKE", " KÜÇÜKKAVRADIM", "melikeuysal_ant@hotmail.com", "5067853558", " ESMA ÖYKÜ KÜÇÜKKAVRADIM"],
            ["YEKTARİNA", " YENER", " katyash.06@mail.ru", "5331973201", "EMİR YENER"],
            ["GÜLNAZ", " UZUN", " gulnazshakirovaf@mail.ru", " 5369145198", " EMİN UZUN"],
            ["YULİA", "GÖKAY", "yuliyakotelnyk@gmail.com", " 5050808508", "EVA GÖKAY"],
            ["VERA", " AKSOY", "vera.leo28@gmail.com", " 5330323967", " KİARA AKSOY"],
            ["ÖZLEM", "MALIÇOK", "zekakuplerikresi@gmail.com", " 5318411327", " PARLA MALIÇOK"],
        ];

        $list[102][20] = [
            ["ASLI", "YAVUZ", "sedaaslıyavuz@yahoo.com.tr", "5327725085", "UZAY YAVUZ",],
            ["EZGİ", "SEÇİLMİŞ", "ezgi@lostar@hotmail.com", "5323492414", "ADEL SEÇİLMİŞ",],
            ["BURCU", "ERCAN", "burcukorkmazzz@gmail.com", "5325121858", "ADEL ERCAN",],
            ["EZGİ", "AYSAN", "ezgiaysann@gmail.com", "5338905050", "EMRE AYSAN",],
            ["DAMLA", "KIRICI", "d-ozsu@hotmail.com", "5058168470", "UMUT ALP KIRICI",],
            ["GİZEM", "CANTÜRK", "kafdesign.net@gmail.com", "5423707460", "YAMAN CANTÜRK",],
            ["SİBEL", "İNCEMAN", "sibel-inceman@hotmail.com", "5324984735", "KUZEY İNCEMAN",],
            ["GÖKŞEN", "ÇİÇEK", "goksencck@gmail.com", "5339160617", "FURKAN ÇİÇEK",],
            ["BEZEN", "KİPER", "bezenkiper@gmail.com", "5326630364", "ERKİN KİPER",],
            ["NİL", "AVCIOĞLU", "Nilavcnil@gmail.com", "5331551727", "AKSEL AVCIOĞLU",],
            ["TUBA", "UZUN", "tozdemir@limakhotels.com", "5303424306", "ELA UZUN",],
            ["MARİA", "TUNCER", "mariatuncer@gmail.com", "5334822757", "EVA TUNCER",],
            ["AYBÜKE", "TUMBA", "Dogruaybuke@gmail.com", "5063405289", "ALİ ARAS TUMBA",],
            ["SİNEM", "AKYAZAN", "sinemkale@gmail.com", "5359246328", "MELİS AKYAZAN",],
            ["Münnever", "TİRYAKİ", "munnevertiryaki88@gmail.com", "5077210022", "BORA TİRYAKİ",],
            ["EBRU", "AYVAZOĞLU", "ebruayvazoğlu@hotmail.com", "5322007856", "DOĞA AYVAZOĞLU",],
            ["CANAY", "AYVAZOĞLU", "canayayvazoğlu@gmail.com", "5333208686", "YİĞİT AYVAZOĞLU",],
            ["ÖZGE", "ÖZEN", "Ozgeozenozen@hotmail.com", "5301553633", "EYLÜL ÖZEN",],
            ["ÖZGE", "ÖZEN", "Ozgeozenozen@hotmail.com", "5301553633", "EMİR ÖZEN",],
            ["ÖZGE", "YALÇIN", "Av.ozgeyalcin@gmail.com", "5059185339", "POYRAZ YALÇIN",],
            ["ÇİÇEK", "BAYRAMOĞLU", "cicek0700@gmail.com", "5535986507", "MURAT BAYRAMOĞLU",],
        ];

        $list[102][21] = [
            ["Gülsüm", "Dönmez", "gdonmez@mail.com", "5554441122", "gürsü/fener"],
            ["ŞENGÜL", "HATİPOĞLU", "sengul_adiguzel@hotmail.com", "5332470326", "AHMET EMİR HATİPOĞLU"],
            ["FAEGHEH", "DARYABARI", "Faeghemoayeri@gmail.com", "5362284480", "DARIO DARYABARI"],
            ["SİNEM", "KUL", "sinemaytekinkul@gmail.com", "5542206891", "ADA KUL"],
            ["SEVİM", "ÖZTÜRK", "kavukcusevim@gmail.com", "5396646986", "ROMA ÖZTÜRK"],
            ["GAMZE", "YILDIZ", "gamzeyildiz0772@gmail.com", "5325630772", "KAYRA YILDIZ"],
            ["EKİN", "AÇIKGÖZ", "Ekinackgz@gmail.com", "5074697370", "MAYA AÇIKGÖZ"],
            ["EKİN", "AÇIKGÖZ", "Ekinackgz@gmail.com", "5074697370", "NEVA AÇIKGÖZ"],
            ["HANİFE", "KIRTAŞ", "Hnftul@gmail.com", "5066189618", "RUTKAY KIRTAŞ"],
            ["DAMLA", "KÖYSÜREN", "damlagoksu07@hotmail.com", "5322080392", "AYŞEGÜL KÖYSÜREN"],
            ["YASEMİN", "BAHAR", "basri_bahar@hotmail.com", "5534315868", "TOPRAK BAHAR"],
            ["DUYGU", "BAHAR", "duyguozkanli@hotmail.com", "5324566171", "DURU BAHAR"],
            ["OLHA", "ETKE", "Olha.Etke@gmail.com", "380637776377", "KAROLİNA ETKE"],
            ["AYŞEGÜL", "KURT", "ays07@icloud.com", "5332806788", "BUSE BELİS KURT"],
            ["AFET", "TOPAY", "ismail.topay@topaylar.com.tr", "5334691594", "ÖMER SAMİ TOPAY"],
            ["BAHAR", "HYDYROV", "Bemin8386@gmail.com", "5303636037", "EMİN HYDYROV"],
            ["SVITLANA", "BAYER", "svetayc@hotmail.com", "5362428103", "NİKOLAS BAYER"],
            ["NATALIA", "ÜNAL", "basakunal82@gmail.com", "539853525", "LEO CAN ÜNAL"],
            ["NATALIA", "ÜNAL", "basakunal82@gmail.com", "539853525", "LUNA ÜNAL"],
        ];

        $list[101][10] = [
            ["Füsun", "Erdoğan", "", "5446198944", "Liya su Erdoğan"],
            ["Katerina", "Başer", "", "5378666994", "Melisa Başer"],
            ["Gizem", "Özalp", "", "5062954535", "Ali Çınar Özalp"],
            ["Didem", "Ay", "", "5062738063", "Ayliz Bilge Ay"],
            ["Maryam", "Esparjan", "", "5340827558", "Melodi Esparjan"],
            ["Nil", "Ergun", "", "5336663639", "Ege Ergun"],
            ["Danara", "Tozoğlu", "", "5444210742", "Musa Göktürk Tozoğlu"],
            ["Eren", "Sayarı", "", "5419564202", "Mert Sayarı"],
            ["Gülüzar", "Türkel", "", "5534684697", "Aras Türkel"],
            ["Tatiana", "Konovalova", "", "5314939240", "Renata Konovalova"],
            ["Alanur", "Ilgın", "", "5335219334", "Çağla Ilgın"],
            ["Natalia", "Timonina", "", "5431744679", "Polina Timonina"],
            ["İrina", "İvanova", "", "5347970283", "Milana İvanova"],
            ["Elvan", "Süzen", "", "5321520622", "Utku Süzen"],
        ];

        $list[101][6] = [
            ["MERVE", "ARICI", "", "5333965588", "YİĞİT ARAS ARICI"],
            ["GONCA DÜLDER", "BEDELOĞLU", "", "5535678352", "GÜNEŞ BEDELOĞLU"],
            ["MERVE", "SARI", "", "5323049790", "LİYA SARI"],
            ["bilge bingöl", "SCHİNGLER", "", "5308223182", "ATAHAN SCHİNGLER"],
            ["LİLİA", "RADCHENKO", "", "5074440980", "MİA AYLİN BAŞARAN"],
            ["ÖZDEN", "YAMAK", "", "5542774900", "DURU YAMAK"],
            ["ARZU", "AYGÜN", "", "5458293002", "AYAZ AYGÜN"],
            ["MELİS", "ÖZDEMİR", "", "5324927989", "VERA DENİZ ÖZDEMİR"],
            ["RASHA", "HAİDER", "", "5411145700", "ELENA HAİDER"],
            ["SEVİM", "ULU", "", "5549849911", "ÇAĞATAY ULU"],
            ["FATMA", "ÖZBAKIR", "", "5424932154", "ATLAS ÖZBAKIR"],
            ["AMİNA", "ÖZTÜRK", "", "5330500795", "EMİN ÖZTÜRK"],
        ];

        $list[101][7] = [
            ["Natalya", "USUBOV", "", "5469112050", "Damir USUBOV  "],
            ["Rahşan", "CENİK", "", "5322005363", "Alin Mavi TURGUTALİ "],
            ["Olga", "POLİCHKA", "", "5065313955", "Mathvay POLİCHKA  "],
            ["Seda", "ÜNAL", "", "5309953342", "Karmina Seda ÜNAL   "],
            ["Ebru", "KAÇAR", "", "5439590042", "Uraz Ali KAÇAR  "],
            ["Burçin", "OĞUZ", "", "5534731357", "Mustafa Han OĞUZ  "],
            ["Alina", "ŞEKER", "", "5330349903", "Nazar ŞEKER "],
            ["Aigerim", "BİSSENOVA", "", "5437439830", "Latifa BİSSENOVA  "],
            ["Arzu", "ACAR", "", "5395574509", "Milan Ulaş ACAR "],
            ["Ece Hakan", "ŞAHİN", "", "5368444608", "Kemal ŞAHİN "],
        ];

        $list[101][8] = [
            ["Esra", "Özbay", "", "5325513656", "Arya Özbay"],
            ["Arife", "Kayatepe", "", "5066213105", "Arya safiye kayatepe"],
            ["Gamze", "Gökgöz", "", "5544520773", "Ata Denis gökgöz"],
            ["Gamze", "Irmak", "", "5375160847", "Barlas Ege ırmak"],
            ["Rüya", "Altınpınar", "", "5333398384", "Dila altınpınar"],
            ["Tuğba", "Aykut", "", "5301136605", "Doğa derin aykut"],
            ["Maram", "Hafız", "", "5320567973", "Emir hafız"],
            ["Esra", "Akyüz", "", "5313313507", "Emirhan akyüz"],
            ["Ceren", "Acarbulut", "", "5320501407", "Erol acarbulut"],
            ["Selin", "Arıcan", "", "5453972908", "Melis arıcan"],
            ["Melis", "Geygel", "", "5376005320", "Mert demir geygel"],
            ["Kübra", "Altınay", "", "5369663331", "Nil altınay"],
            ["Busem", "Gürcan", "", "5532405389", "Uzay Gürcan "],
            ["Evrimnaz", "Çizmeci", "", "5548836406", "Sonat çizmeci"],
            ["Merve", "Çoban", "", "5062968716", "Seha çoban"],
            ["Buse", "Gül", "", "5334785257", "Yaz gül"],
        ];

        $list[101][11] = [
            ["Leyla", "Yeşilyurt", "", "5418311344", "ALİSA YEŞİLYURT"],
            ["Berna", "Işıklar", "", "5059522246", "ARYA IŞIKLAR"],
            ["Deniz", "Sarısan", "", "5052401390", "DEMİR SARISAN"],
            ["Güngör", "Kış", "", "5321136621", "ELİF DEREN KIŞ"],
            ["Fatoş", "Yılmaz", "", "5366504901", "EYLÜL ANI YILMAZ"],
            ["Buket Tüzün", "Çağlar", "", "5078732032", "K. YAZ ÇAĞLAR"],
            ["Venera", "Aısına", "", "79258302024", "MERYEM AISINA"],
            ["Yulia", "GÜNER", "", "491624218321", "MİRAY GÜNER"],
            ["Selin", "Yıldırım", "", "5064868768", "OZAN YILDIRIM"],
            ["Medine", "Yılmaz", "", "5396205835", "PERİ YILMAZ"],
            ["Victoria", "Türkel", "", "5356814282", "SU ELLA TÜRKEL"],
            ["Aigerim", "Bissenov", "", "5347439830", "Tamerlan Bissenov"],
            ["Zeliha", "Uğur", "", "5533289495", "Liya Uğur"],
        ];

        $list[101][12] = [
            ["Cansu", "Asgari", "", "5441110102", "Asel Asgari"],
            ["Leyla", "Ataoğlu", "", "5065022009", "Can Ataoğlu"],
            ["Mine", "Karayalçın", "", "5300677318", "Deniz Melek Karayalçın "],
            ["Leen", "Alazem", "", "5464520298", "Ella Alazem"],
            ["Banu", "Kararmaz", "", "5556247643", "Gökçe Kararmaz"],
            ["Başak", "Aksan", "", "5062012311", "Lara Aksan "],
            ["İnna", "Anashka", "", "5347866343", "Michell Anashkna"],
            ["Rasha", "Haider", "", "9659440240", "Yacub Haider"],
            ["Fatma", "Tıraş", "", "5425340706", "Zeynep Rana Tıraş "],
            ["Fatima", "Adiloğlu", "", "96286425503", "Marym Liya Adiloğlu"],
            ["Selcen", "Köşker", "", "5303153183", "Tarık Köşker "],
            ["Nilufer", "Bayram", "", "5337611935", "Sarp Bayram"],
        ];

        $list[101][13] = [
            ["Seda", "ÜNAL", "", "5309953342", "Bade Yaz ÜNAL "],
            ["Çığıl Ece", "YILMAZ", "5058640405", "İpek Elis YILMAZ  "],
            ["Şeyma", "VURAL", "", "5321651489", "Ömer VURAL  "],
            ["Gülçin", "PALAZALI", "", "5057576934", "Deniz PALAZALI  "],
            ["Demet", "SERT", "", "5372574882", "Deren SERT  "],
            ["Çiğdem", "GEYİK", "", "5054870713", "Helin Arya GEYİK  "],
            ["Gülden", "MENGÜÇ", "", "5326066336", "Aden AYDOĞAN  "],
            ["Gül", "ŞAHİN", "", "5422489997", "Ada ŞAHİN "],
            ["Mine", "KARAYALÇIN", "", "5300677318", "Murat Yaşar KARAYALÇIN  "],
            ["Aylin", "ÇİÇEKLİ", "", "5453762021", "Rana Eflin ÇİÇEKLİ  "],
            ["Yuliia", "EKEN", "", "5395152536", "Demir Ekim EKEN "],
            ["Merve", "GÖKAY", "", "5337489797", "Hakan Ayaz GÖKAY  "],
            ["Çiğdem", "KARAKAYA", "", "5393783965", "Sare KARAKAYA "],
            ["Aynur", "ATALAY", "", "5309128607", "Egemen ATALAY   "],
            ["İrem", "EKER", "", "5372550211", "Yusuf EKER  "],
        ];

        $list[101][14] = [
            ["SEDAT", "VARGILI", "", "5333565370", "ADEL VARGILI"],
            ["FUNDA", "YILMAZ", "", "5058058500", "TOLGA UZAY YILMAZ"],
            ["ÇİSE", "RAHMANİ", "", "5511676841", "ADEM RAHMANİ"],
            ["ZELİHA", "BEKMEZOĞLU", "", "5416437507", "BELİZ BEKMEZOĞLU"],
            ["ELVAN", "SÜZEN", "", "5321520622", "DORUK SÜZEN"],
            ["BURCU", "ÖZTÜRK", "", "5367209940", "DURU ÖZTÜRK"],
            ["İLEM", "EKER", "", "5372550211", "DENİZ EKER"],
            ["İRİNA", "GANİCHENKO", "", "5345527344", "DEMİR TAŞDEMİR GANİCHENKO"],
            ["ŞEYDA", "YILDIRIM", "", "5388843131", "ÖMER ENSAR YILDIRIM"],
            ["HADİ", "FARŞÇİ", "", "5512758888", "RAMA FARŞÇİ"],
            ["ENİSE", "ERDAL", "", "5330334222", "ELİZ ERDAL"],
            ["DESTENY", "RAUHİ", "", "5363416071", "İSAAC SAMİ RAUHİ"],
            ["BURCU", "ELMAS", "", "5369659335", "KEREM ELMAS"],
            ["ASLI", "OKUR", "", "5065060506", "METEHAN OKUR"],
            ["YULIA", "GÜNER", "", "491624218321", "KEMAL GÜNER"],
            ["ELİF", "YILDIZ", "", "5529331849", "MUSTAFA EYMEN YILDIZ"],
            ["ELİF", "YILDIZ", "", "5529331849", "MELEK MİHRA YILDIZ"],
            ["ALENA", "URUSOVA", "", "5355564092", "ALEKSANDRA URUSOVA"],
            ["AJMAL", "SANGAR", "", "5383729014", "İSMAİL SANGAR"],
            ["ALİNA", "KASIMOVA", "", "5365513934", "AMALIIA KASIMOVA"],
        ];

        $list[101][9] = [
            ["Pınar", "Aslangiray", "", "5312608201", "Ada Aslangiray"],
            ["Hatice", "Karakaya", "", "5333594333", "Arya Karakaya"],
            ["Esma", "Erdem", "", "5326060836", "Esile Erdem "],
            ["Berrin", "Kılıç", "", "5073934623", "Deniz Berk Kılıç"],
            ["Sevgi", "Akyüz", "", "5317142691", "Isıkhan Akyüz "],
            ["Ezgi", "Salmon", "", "5324635747", "Fiora Salmon"],
            ["Aslıhan", "Kıymalıoğlu", "", "5327081852", "Uras Kıymalıoğlu"],
            ["Desteny", "Carvajales", "", "5314199145", "Shquilla Salim "],
            ["Hatice günay", "Er", "", "5372197471", "Atlas Pamir Er"],
            ["Ceren", "Zirek", "", "5444067337", "Aras Zirek"],
            ["Buket", "Kayalı", "", "5375127678", "Atlas Kayalı"],
            ["Svetlana", "Kazbaev", "", "5385632618", "Martin Kazbaev"],
            ["Büşra", "Şahin", "", "5522988694", "Bilge Şahin "],
            ["Gamze", "Yellice", "", "5342897679", "Ali Yaman Yellice"],
        ];

        $list[102][17] = [
            ["PINAR", "GÜRSOY", "pinargursoy90@hotmail.com", "5419010607", "METE GÜRSOY"],
            ["NATALIA", "ÜNAL", "basakunal82@gmail.com", "5319853525", "TOROS ÜNAL"],
            ["CEREN", "SIRCAN", "Cerenky@gmail.com", "5322712109", "AREL SIRCAN"],
            ["SERENAD", "SAHABİ", "Serenatsahin0732@gmail.com", "5077739285", "SANAT SAHABİ"],
            ["AYLA", "ATACAN", "eryılmazayla@gmail.com", "5337666426", "ATA ARICAN"],
            ["IRYNA", "TOSUN", "irynasheptytska@gmail.com", "5532078621", "ADEN TOSUN"],
            ["NEHİR", "ARCA", "Nehir.arca@isbank.com.tr", "5467660100", "AREL ARCA"],
            ["HÜLYA", "ALTINTAŞ", "hulya_mencik88@hotmail.com", "5374932228", "LİDYA ALTINTAŞ"],
            ["REGİNA", "TANRIÖVEN", "azxc1212@bk.ru", "5531317133", "İREN TANRIÖVEN"],
            ["SELİN", "DEDEOĞLU", "Selinguler8282@gmail.com", "5323154696", "ALP DEDEOĞLU"],
            ["SİNEM", "KAYA", "kursunsinem@gmail.com", "5074122585", "DÜNYA KAYA"],
            ["NAFİKAR", "BAŞKAN", "nafikar.turan@gmail.com", "5078549387", "HALİL EGE BAŞKAN"],
            ["YAŞAM", "SEYREKBASAN", "yasamkoç@hotmail.com", "5066428302", "SADIK ATEŞ SEYREKBASAN"],
            ["ÖZLEM", "YALIN", "ozlem_ozdemir_07@hotmail.com", "5379172594", "BULUT YALIN"],
            ["ZEREN", "CAN", "bozoglanzeren@gmail.com", "5307809840", "ECE CAN"],
            ["HURİYE", "YAPICI", "huri_ss@hotmail.com", "5307809840", "ALP YAPICI"],
            ["ŞERİFE", "ZORLU", "s.zorlu@zorluhukuk.com", "5067052404", "YAĞIZ ZORLU"],
        ];

        return $list[$schoolId][$classId];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TownsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('def_towns')->insert($this->getCounties());

    }

    protected function getCounties()
    {
        $arr = [
                [
                    "ilce_id" => "1",
                    "ilce_title" => "ADALAR",
                    "ilce_key" => "1103",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "2",
                    "ilce_title" => "ARNAVUTKÖY",
                    "ilce_key" => "2048",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "3",
                    "ilce_title" => "ATAŞEHİR",
                    "ilce_key" => "2049",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "4",
                    "ilce_title" => "AVCILAR",
                    "ilce_key" => "2003",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "5",
                    "ilce_title" => "BAĞCILAR",
                    "ilce_key" => "2004",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "6",
                    "ilce_title" => "BAHÇELİEVLER",
                    "ilce_key" => "2005",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "7",
                    "ilce_title" => "BAKIRKÖY",
                    "ilce_key" => "1166",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "8",
                    "ilce_title" => "BAŞAKŞEHİR",
                    "ilce_key" => "2050",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "9",
                    "ilce_title" => "BAYRAMPAŞA",
                    "ilce_key" => "1886",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "10",
                    "ilce_title" => "BEŞİKTAŞ",
                    "ilce_key" => "1183",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "11",
                    "ilce_title" => "BEYKOZ",
                    "ilce_key" => "1185",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "12",
                    "ilce_title" => "BEYLİKDÜZÜ",
                    "ilce_key" => "2051",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "13",
                    "ilce_title" => "BEYOĞLU",
                    "ilce_key" => "1186",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "14",
                    "ilce_title" => "BÜYÜKÇEKMECE",
                    "ilce_key" => "1782",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "15",
                    "ilce_title" => "ÇATALCA",
                    "ilce_key" => "1237",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "16",
                    "ilce_title" => "ÇEKMEKÖY",
                    "ilce_key" => "2052",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "17",
                    "ilce_title" => "ESENLER",
                    "ilce_key" => "2016",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "18",
                    "ilce_title" => "ESENYURT",
                    "ilce_key" => "2053",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "19",
                    "ilce_title" => "EYÜP",
                    "ilce_key" => "1325",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "20",
                    "ilce_title" => "FATİH",
                    "ilce_key" => "1327",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "21",
                    "ilce_title" => "GAZİOSMANPAŞA",
                    "ilce_key" => "1336",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "22",
                    "ilce_title" => "GÜNGÖREN",
                    "ilce_key" => "2010",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "23",
                    "ilce_title" => "KADIKÖY",
                    "ilce_key" => "1421",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "24",
                    "ilce_title" => "KAĞITHANE",
                    "ilce_key" => "1810",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "25",
                    "ilce_title" => "KARTAL",
                    "ilce_key" => "1449",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "26",
                    "ilce_title" => "KÜÇÜKÇEKMECE",
                    "ilce_key" => "1823",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "27",
                    "ilce_title" => "MALTEPE",
                    "ilce_key" => "2012",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "28",
                    "ilce_title" => "PENDİK",
                    "ilce_key" => "1835",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "29",
                    "ilce_title" => "SANCAKTEPE",
                    "ilce_key" => "2054",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "30",
                    "ilce_title" => "SARIYER",
                    "ilce_key" => "1604",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "31",
                    "ilce_title" => "SİLİVRİ",
                    "ilce_key" => "1622",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "32",
                    "ilce_title" => "SULTANBEYLİ",
                    "ilce_key" => "2014",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "33",
                    "ilce_title" => "SULTANGAZİ",
                    "ilce_key" => "2055",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "34",
                    "ilce_title" => "ŞİLE",
                    "ilce_key" => "1659",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "35",
                    "ilce_title" => "ŞİŞLİ",
                    "ilce_key" => "1663",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "36",
                    "ilce_title" => "TUZLA",
                    "ilce_key" => "2015",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "37",
                    "ilce_title" => "ÜMRANİYE",
                    "ilce_key" => "1852",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "38",
                    "ilce_title" => "ÜSKÜDAR",
                    "ilce_key" => "1708",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "39",
                    "ilce_title" => "ZEYTİNBURNU",
                    "ilce_key" => "1739",
                    "ilce_sehirkey" => "34"
                ],
                [
                    "ilce_id" => "40",
                    "ilce_title" => "AKYURT",
                    "ilce_key" => "1872",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "41",
                    "ilce_title" => "ALTINDAĞ",
                    "ilce_key" => "1130",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "42",
                    "ilce_title" => "AYAŞ",
                    "ilce_key" => "1157",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "43",
                    "ilce_title" => "BALA",
                    "ilce_key" => "1167",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "44",
                    "ilce_title" => "BEYPAZARI",
                    "ilce_key" => "1187",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "45",
                    "ilce_title" => "ÇAMLIDERE",
                    "ilce_key" => "1227",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "46",
                    "ilce_title" => "ÇANKAYA",
                    "ilce_key" => "1231",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "47",
                    "ilce_title" => "ÇUBUK",
                    "ilce_key" => "1260",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "48",
                    "ilce_title" => "ELMADAĞ",
                    "ilce_key" => "1302",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "49",
                    "ilce_title" => "ETİMESGUT",
                    "ilce_key" => "1922",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "50",
                    "ilce_title" => "EVREN",
                    "ilce_key" => "1924",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "51",
                    "ilce_title" => "GÖLBAŞI",
                    "ilce_key" => "1744",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "52",
                    "ilce_title" => "GÜDÜL",
                    "ilce_key" => "1365",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "53",
                    "ilce_title" => "HAYMANA",
                    "ilce_key" => "1387",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "54",
                    "ilce_title" => "KAHRAMANKAZAN",
                    "ilce_key" => "1815",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "55",
                    "ilce_title" => "KALECİK",
                    "ilce_key" => "1427",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "56",
                    "ilce_title" => "KEÇİÖREN",
                    "ilce_key" => "1745",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "57",
                    "ilce_title" => "KIZILCAHAMAM",
                    "ilce_key" => "1473",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "58",
                    "ilce_title" => "MAMAK",
                    "ilce_key" => "1746",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "59",
                    "ilce_title" => "NALLIHAN",
                    "ilce_key" => "1539",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "60",
                    "ilce_title" => "POLATLI",
                    "ilce_key" => "1578",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "61",
                    "ilce_title" => "PURSAKLAR",
                    "ilce_key" => "2034",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "62",
                    "ilce_title" => "SİNCAN",
                    "ilce_key" => "1747",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "63",
                    "ilce_title" => "ŞEREFLİKOÇHİSAR",
                    "ilce_key" => "1658",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "64",
                    "ilce_title" => "YENİMAHALLE",
                    "ilce_key" => "1723",
                    "ilce_sehirkey" => "6"
                ],
                [
                    "ilce_id" => "65",
                    "ilce_title" => "ALİAĞA",
                    "ilce_key" => "1128",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "66",
                    "ilce_title" => "BALÇOVA",
                    "ilce_key" => "2006",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "67",
                    "ilce_title" => "BAYINDIR",
                    "ilce_key" => "1178",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "68",
                    "ilce_title" => "BAYRAKLI",
                    "ilce_key" => "2056",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "69",
                    "ilce_title" => "BERGAMA",
                    "ilce_key" => "1181",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "70",
                    "ilce_title" => "BEYDAĞ",
                    "ilce_key" => "1776",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "71",
                    "ilce_title" => "BORNOVA",
                    "ilce_key" => "1203",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "72",
                    "ilce_title" => "BUCA",
                    "ilce_key" => "1780",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "73",
                    "ilce_title" => "ÇEŞME",
                    "ilce_key" => "1251",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "74",
                    "ilce_title" => "ÇİĞLİ",
                    "ilce_key" => "2007",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "75",
                    "ilce_title" => "DİKİLİ",
                    "ilce_key" => "1280",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "76",
                    "ilce_title" => "FOÇA",
                    "ilce_key" => "1334",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "77",
                    "ilce_title" => "GAZİEMİR",
                    "ilce_key" => "2009",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "78",
                    "ilce_title" => "GÜZELBAHÇE",
                    "ilce_key" => "2018",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "79",
                    "ilce_title" => "KARABAĞLAR",
                    "ilce_key" => "2057",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "80",
                    "ilce_title" => "KARABURUN",
                    "ilce_key" => "1432",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "81",
                    "ilce_title" => "KARŞIYAKA",
                    "ilce_key" => "1448",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "82",
                    "ilce_title" => "KEMALPAŞA",
                    "ilce_key" => "1461",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "83",
                    "ilce_title" => "KINIK",
                    "ilce_key" => "1467",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "84",
                    "ilce_title" => "KİRAZ",
                    "ilce_key" => "1477",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "85",
                    "ilce_title" => "KONAK",
                    "ilce_key" => "1819",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "86",
                    "ilce_title" => "MENDERES",
                    "ilce_key" => "1826",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "87",
                    "ilce_title" => "MENEMEN",
                    "ilce_key" => "1521",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "88",
                    "ilce_title" => "NARLIDERE",
                    "ilce_key" => "2013",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "89",
                    "ilce_title" => "ÖDEMİŞ",
                    "ilce_key" => "1563",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "90",
                    "ilce_title" => "SEFERİHİSAR",
                    "ilce_key" => "1611",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "91",
                    "ilce_title" => "SELÇUK",
                    "ilce_key" => "1612",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "92",
                    "ilce_title" => "TİRE",
                    "ilce_key" => "1677",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "93",
                    "ilce_title" => "TORBALI",
                    "ilce_key" => "1682",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "94",
                    "ilce_title" => "URLA",
                    "ilce_key" => "1703",
                    "ilce_sehirkey" => "35"
                ],
                [
                    "ilce_id" => "95",
                    "ilce_title" => "BÜYÜKORHAN",
                    "ilce_key" => "1783",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "96",
                    "ilce_title" => "GEMLİK",
                    "ilce_key" => "1343",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "97",
                    "ilce_title" => "GÜRSU",
                    "ilce_key" => "1935",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "98",
                    "ilce_title" => "HARMANCIK",
                    "ilce_key" => "1799",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "99",
                    "ilce_title" => "İNEGÖL",
                    "ilce_key" => "1411",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "100",
                    "ilce_title" => "İZNİK",
                    "ilce_key" => "1420",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "101",
                    "ilce_title" => "KARACABEY",
                    "ilce_key" => "1434",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "102",
                    "ilce_title" => "KELES",
                    "ilce_key" => "1457",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "103",
                    "ilce_title" => "KESTEL",
                    "ilce_key" => "1960",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "104",
                    "ilce_title" => "MUDANYA",
                    "ilce_key" => "1530",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "105",
                    "ilce_title" => "MUSTAFAKEMALPAŞA",
                    "ilce_key" => "1535",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "106",
                    "ilce_title" => "NİLÜFER",
                    "ilce_key" => "1829",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "107",
                    "ilce_title" => "ORHANELİ",
                    "ilce_key" => "1553",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "108",
                    "ilce_title" => "ORHANGAZİ",
                    "ilce_key" => "1554",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "109",
                    "ilce_title" => "OSMANGAZİ",
                    "ilce_key" => "1832",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "110",
                    "ilce_title" => "YENİŞEHİR",
                    "ilce_key" => "1725",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "111",
                    "ilce_title" => "YILDIRIM",
                    "ilce_key" => "1859",
                    "ilce_sehirkey" => "16"
                ],
                [
                    "ilce_id" => "112",
                    "ilce_title" => "ALADAĞ",
                    "ilce_key" => "1757",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "113",
                    "ilce_title" => "CEYHAN",
                    "ilce_key" => "1219",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "114",
                    "ilce_title" => "ÇUKUROVA",
                    "ilce_key" => "2033",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "115",
                    "ilce_title" => "FEKE",
                    "ilce_key" => "1329",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "116",
                    "ilce_title" => "İMAMOĞLU",
                    "ilce_key" => "1806",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "117",
                    "ilce_title" => "KARAİSALI",
                    "ilce_key" => "1437",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "118",
                    "ilce_title" => "KARATAŞ",
                    "ilce_key" => "1443",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "119",
                    "ilce_title" => "KOZAN",
                    "ilce_key" => "1486",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "120",
                    "ilce_title" => "POZANTI",
                    "ilce_key" => "1580",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "121",
                    "ilce_title" => "SAİMBEYLİ",
                    "ilce_key" => "1588",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "122",
                    "ilce_title" => "SARIÇAM",
                    "ilce_key" => "2032",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "123",
                    "ilce_title" => "SEYHAN",
                    "ilce_key" => "1104",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "124",
                    "ilce_title" => "TUFANBEYLİ",
                    "ilce_key" => "1687",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "125",
                    "ilce_title" => "YUMURTALIK",
                    "ilce_key" => "1734",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "126",
                    "ilce_title" => "YÜREĞİR",
                    "ilce_key" => "1748",
                    "ilce_sehirkey" => "1"
                ],
                [
                    "ilce_id" => "127",
                    "ilce_title" => "BESNİ",
                    "ilce_key" => "1182",
                    "ilce_sehirkey" => "2"
                ],
                [
                    "ilce_id" => "128",
                    "ilce_title" => "ÇELİKHAN",
                    "ilce_key" => "1246",
                    "ilce_sehirkey" => "2"
                ],
                [
                    "ilce_id" => "129",
                    "ilce_title" => "GERGER",
                    "ilce_key" => "1347",
                    "ilce_sehirkey" => "2"
                ],
                [
                    "ilce_id" => "130",
                    "ilce_title" => "GÖLBAŞI",
                    "ilce_key" => "1354",
                    "ilce_sehirkey" => "2"
                ],
                [
                    "ilce_id" => "131",
                    "ilce_title" => "KAHTA",
                    "ilce_key" => "1425",
                    "ilce_sehirkey" => "2"
                ],
                [
                    "ilce_id" => "132",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1105",
                    "ilce_sehirkey" => "2"
                ],
                [
                    "ilce_id" => "133",
                    "ilce_title" => "SAMSAT",
                    "ilce_key" => "1592",
                    "ilce_sehirkey" => "2"
                ],
                [
                    "ilce_id" => "134",
                    "ilce_title" => "SİNCİK",
                    "ilce_key" => "1985",
                    "ilce_sehirkey" => "2"
                ],
                [
                    "ilce_id" => "135",
                    "ilce_title" => "TUT",
                    "ilce_key" => "1989",
                    "ilce_sehirkey" => "2"
                ],
                [
                    "ilce_id" => "136",
                    "ilce_title" => "BAŞMAKÇI",
                    "ilce_key" => "1771",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "137",
                    "ilce_title" => "BAYAT",
                    "ilce_key" => "1773",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "138",
                    "ilce_title" => "BOLVADİN",
                    "ilce_key" => "1200",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "139",
                    "ilce_title" => "ÇAY",
                    "ilce_key" => "1239",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "140",
                    "ilce_title" => "ÇOBANLAR",
                    "ilce_key" => "1906",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "141",
                    "ilce_title" => "DAZKIRI",
                    "ilce_key" => "1267",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "142",
                    "ilce_title" => "DİNAR",
                    "ilce_key" => "1281",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "143",
                    "ilce_title" => "EMİRDAĞ",
                    "ilce_key" => "1306",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "144",
                    "ilce_title" => "EVCİLER",
                    "ilce_key" => "1923",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "145",
                    "ilce_title" => "HOCALAR",
                    "ilce_key" => "1944",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "146",
                    "ilce_title" => "İHSANİYE",
                    "ilce_key" => "1404",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "147",
                    "ilce_title" => "İSCEHİSAR",
                    "ilce_key" => "1809",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "148",
                    "ilce_title" => "KIZILÖREN",
                    "ilce_key" => "1961",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "149",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1108",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "150",
                    "ilce_title" => "SANDIKLI",
                    "ilce_key" => "1594",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "151",
                    "ilce_title" => "SİNANPAŞA",
                    "ilce_key" => "1626",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "152",
                    "ilce_title" => "SULTANDAĞI",
                    "ilce_key" => "1639",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "153",
                    "ilce_title" => "ŞUHUT",
                    "ilce_key" => "1664",
                    "ilce_sehirkey" => "3"
                ],
                [
                    "ilce_id" => "154",
                    "ilce_title" => "DİYADİN",
                    "ilce_key" => "1283",
                    "ilce_sehirkey" => "4"
                ],
                [
                    "ilce_id" => "155",
                    "ilce_title" => "DOĞUBAYAZIT",
                    "ilce_key" => "1287",
                    "ilce_sehirkey" => "4"
                ],
                [
                    "ilce_id" => "156",
                    "ilce_title" => "ELEŞKİRT",
                    "ilce_key" => "1301",
                    "ilce_sehirkey" => "4"
                ],
                [
                    "ilce_id" => "157",
                    "ilce_title" => "HAMUR",
                    "ilce_key" => "1379",
                    "ilce_sehirkey" => "4"
                ],
                [
                    "ilce_id" => "158",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1111",
                    "ilce_sehirkey" => "4"
                ],
                [
                    "ilce_id" => "159",
                    "ilce_title" => "PATNOS",
                    "ilce_key" => "1568",
                    "ilce_sehirkey" => "4"
                ],
                [
                    "ilce_id" => "160",
                    "ilce_title" => "TAŞLIÇAY",
                    "ilce_key" => "1667",
                    "ilce_sehirkey" => "4"
                ],
                [
                    "ilce_id" => "161",
                    "ilce_title" => "TUTAK",
                    "ilce_key" => "1691",
                    "ilce_sehirkey" => "4"
                ],
                [
                    "ilce_id" => "162",
                    "ilce_title" => "AĞAÇÖREN",
                    "ilce_key" => "1860",
                    "ilce_sehirkey" => "68"
                ],
                [
                    "ilce_id" => "163",
                    "ilce_title" => "ESKİL",
                    "ilce_key" => "1921",
                    "ilce_sehirkey" => "68"
                ],
                [
                    "ilce_id" => "164",
                    "ilce_title" => "GÜLAĞAÇ",
                    "ilce_key" => "1932",
                    "ilce_sehirkey" => "68"
                ],
                [
                    "ilce_id" => "165",
                    "ilce_title" => "GÜZELYURT",
                    "ilce_key" => "1861",
                    "ilce_sehirkey" => "68"
                ],
                [
                    "ilce_id" => "166",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1120",
                    "ilce_sehirkey" => "68"
                ],
                [
                    "ilce_id" => "167",
                    "ilce_title" => "ORTAKÖY",
                    "ilce_key" => "1557",
                    "ilce_sehirkey" => "68"
                ],
                [
                    "ilce_id" => "168",
                    "ilce_title" => "SARIYAHŞİ",
                    "ilce_key" => "1866",
                    "ilce_sehirkey" => "68"
                ],
                [
                    "ilce_id" => "169",
                    "ilce_title" => "GÖYNÜCEK",
                    "ilce_key" => "1363",
                    "ilce_sehirkey" => "5"
                ],
                [
                    "ilce_id" => "170",
                    "ilce_title" => "GÜMÜŞHACIKÖY",
                    "ilce_key" => "1368",
                    "ilce_sehirkey" => "5"
                ],
                [
                    "ilce_id" => "171",
                    "ilce_title" => "HAMAMÖZÜ",
                    "ilce_key" => "1938",
                    "ilce_sehirkey" => "5"
                ],
                [
                    "ilce_id" => "172",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1134",
                    "ilce_sehirkey" => "5"
                ],
                [
                    "ilce_id" => "173",
                    "ilce_title" => "MERZİFON",
                    "ilce_key" => "1524",
                    "ilce_sehirkey" => "5"
                ],
                [
                    "ilce_id" => "174",
                    "ilce_title" => "SULUOVA",
                    "ilce_key" => "1641",
                    "ilce_sehirkey" => "5"
                ],
                [
                    "ilce_id" => "175",
                    "ilce_title" => "TAŞOVA",
                    "ilce_key" => "1668",
                    "ilce_sehirkey" => "5"
                ],
                [
                    "ilce_id" => "176",
                    "ilce_title" => "AKSEKİ",
                    "ilce_key" => "1121",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "177",
                    "ilce_title" => "AKSU",
                    "ilce_key" => "2035",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "178",
                    "ilce_title" => "ALANYA",
                    "ilce_key" => "1126",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "179",
                    "ilce_title" => "DEMRE",
                    "ilce_key" => "1811",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "180",
                    "ilce_title" => "DÖŞEMEALTI",
                    "ilce_key" => "2036",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "181",
                    "ilce_title" => "ELMALI",
                    "ilce_key" => "1303",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "182",
                    "ilce_title" => "FİNİKE",
                    "ilce_key" => "1333",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "183",
                    "ilce_title" => "GAZİPAŞA",
                    "ilce_key" => "1337",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "184",
                    "ilce_title" => "GÜNDOĞMUŞ",
                    "ilce_key" => "1370",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "185",
                    "ilce_title" => "İBRADI",
                    "ilce_key" => "1946",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "186",
                    "ilce_title" => "KAŞ",
                    "ilce_key" => "1451",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "187",
                    "ilce_title" => "KEMER",
                    "ilce_key" => "1959",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "188",
                    "ilce_title" => "KEPEZ",
                    "ilce_key" => "2037",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "189",
                    "ilce_title" => "KONYAALTI",
                    "ilce_key" => "2038",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "190",
                    "ilce_title" => "KORKUTELİ",
                    "ilce_key" => "1483",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "191",
                    "ilce_title" => "KUMLUCA",
                    "ilce_key" => "1492",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "192",
                    "ilce_title" => "MANAVGAT",
                    "ilce_key" => "1512",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "193",
                    "ilce_title" => "MURATPAŞA",
                    "ilce_key" => "2039",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "194",
                    "ilce_title" => "SERİK",
                    "ilce_key" => "1616",
                    "ilce_sehirkey" => "7"
                ],
                [
                    "ilce_id" => "195",
                    "ilce_title" => "ÇILDIR",
                    "ilce_key" => "1252",
                    "ilce_sehirkey" => "75"
                ],
                [
                    "ilce_id" => "196",
                    "ilce_title" => "DAMAL",
                    "ilce_key" => "2008",
                    "ilce_sehirkey" => "75"
                ],
                [
                    "ilce_id" => "197",
                    "ilce_title" => "GÖLE",
                    "ilce_key" => "1356",
                    "ilce_sehirkey" => "75"
                ],
                [
                    "ilce_id" => "198",
                    "ilce_title" => "HANAK",
                    "ilce_key" => "1380",
                    "ilce_sehirkey" => "75"
                ],
                [
                    "ilce_id" => "199",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1144",
                    "ilce_sehirkey" => "75"
                ],
                [
                    "ilce_id" => "200",
                    "ilce_title" => "POSOF",
                    "ilce_key" => "1579",
                    "ilce_sehirkey" => "75"
                ],
                [
                    "ilce_id" => "201",
                    "ilce_title" => "ARDANUÇ",
                    "ilce_key" => "1145",
                    "ilce_sehirkey" => "8"
                ],
                [
                    "ilce_id" => "202",
                    "ilce_title" => "ARHAVİ",
                    "ilce_key" => "1147",
                    "ilce_sehirkey" => "8"
                ],
                [
                    "ilce_id" => "203",
                    "ilce_title" => "BORÇKA",
                    "ilce_key" => "1202",
                    "ilce_sehirkey" => "8"
                ],
                [
                    "ilce_id" => "204",
                    "ilce_title" => "HOPA",
                    "ilce_key" => "1395",
                    "ilce_sehirkey" => "8"
                ],
                [
                    "ilce_id" => "205",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1152",
                    "ilce_sehirkey" => "8"
                ],
                [
                    "ilce_id" => "206",
                    "ilce_title" => "MURGUL",
                    "ilce_key" => "1828",
                    "ilce_sehirkey" => "8"
                ],
                [
                    "ilce_id" => "207",
                    "ilce_title" => "ŞAVŞAT",
                    "ilce_key" => "1653",
                    "ilce_sehirkey" => "8"
                ],
                [
                    "ilce_id" => "208",
                    "ilce_title" => "YUSUFELİ",
                    "ilce_key" => "1736",
                    "ilce_sehirkey" => "8"
                ],
                [
                    "ilce_id" => "209",
                    "ilce_title" => "BOZDOĞAN",
                    "ilce_key" => "1206",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "210",
                    "ilce_title" => "BUHARKENT",
                    "ilce_key" => "1781",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "211",
                    "ilce_title" => "ÇİNE",
                    "ilce_key" => "1256",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "212",
                    "ilce_title" => "DİDİM",
                    "ilce_key" => "2000",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "213",
                    "ilce_title" => "EFELER",
                    "ilce_key" => "2076",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "214",
                    "ilce_title" => "GERMENCİK",
                    "ilce_key" => "1348",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "215",
                    "ilce_title" => "İNCİRLİOVA",
                    "ilce_key" => "1807",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "216",
                    "ilce_title" => "KARACASU",
                    "ilce_key" => "1435",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "217",
                    "ilce_title" => "KARPUZLU",
                    "ilce_key" => "1957",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "218",
                    "ilce_title" => "KOÇARLI",
                    "ilce_key" => "1479",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "219",
                    "ilce_title" => "KÖŞK",
                    "ilce_key" => "1968",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "220",
                    "ilce_title" => "KUŞADASI",
                    "ilce_key" => "1497",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "221",
                    "ilce_title" => "KUYUCAK",
                    "ilce_key" => "1498",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "222",
                    "ilce_title" => "NAZİLLİ",
                    "ilce_key" => "1542",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "223",
                    "ilce_title" => "SÖKE",
                    "ilce_key" => "1637",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "224",
                    "ilce_title" => "SULTANHİSAR",
                    "ilce_key" => "1640",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "225",
                    "ilce_title" => "YENİPAZAR",
                    "ilce_key" => "1724",
                    "ilce_sehirkey" => "9"
                ],
                [
                    "ilce_id" => "226",
                    "ilce_title" => "ALTIEYLÜL",
                    "ilce_key" => "2077",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "227",
                    "ilce_title" => "AYVALIK",
                    "ilce_key" => "1161",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "228",
                    "ilce_title" => "BALYA",
                    "ilce_key" => "1169",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "229",
                    "ilce_title" => "BANDIRMA",
                    "ilce_key" => "1171",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "230",
                    "ilce_title" => "BİGADİÇ",
                    "ilce_key" => "1191",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "231",
                    "ilce_title" => "BURHANİYE",
                    "ilce_key" => "1216",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "232",
                    "ilce_title" => "DURSUNBEY",
                    "ilce_key" => "1291",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "233",
                    "ilce_title" => "EDREMİT",
                    "ilce_key" => "1294",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "234",
                    "ilce_title" => "ERDEK",
                    "ilce_key" => "1310",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "235",
                    "ilce_title" => "GÖMEÇ",
                    "ilce_key" => "1928",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "236",
                    "ilce_title" => "GÖNEN",
                    "ilce_key" => "1360",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "237",
                    "ilce_title" => "HAVRAN",
                    "ilce_key" => "1384",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "238",
                    "ilce_title" => "İVRİNDİ",
                    "ilce_key" => "1418",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "239",
                    "ilce_title" => "KARESİ",
                    "ilce_key" => "2078",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "240",
                    "ilce_title" => "KEPSUT",
                    "ilce_key" => "1462",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "241",
                    "ilce_title" => "MANYAS",
                    "ilce_key" => "1514",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "242",
                    "ilce_title" => "MARMARA",
                    "ilce_key" => "1824",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "243",
                    "ilce_title" => "SAVAŞTEPE",
                    "ilce_key" => "1608",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "244",
                    "ilce_title" => "SINDIRGI",
                    "ilce_key" => "1619",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "245",
                    "ilce_title" => "SUSURLUK",
                    "ilce_key" => "1644",
                    "ilce_sehirkey" => "10"
                ],
                [
                    "ilce_id" => "246",
                    "ilce_title" => "AMASRA",
                    "ilce_key" => "1761",
                    "ilce_sehirkey" => "74"
                ],
                [
                    "ilce_id" => "247",
                    "ilce_title" => "KURUCAŞİLE",
                    "ilce_key" => "1496",
                    "ilce_sehirkey" => "74"
                ],
                [
                    "ilce_id" => "248",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1172",
                    "ilce_sehirkey" => "74"
                ],
                [
                    "ilce_id" => "249",
                    "ilce_title" => "ULUS",
                    "ilce_key" => "1701",
                    "ilce_sehirkey" => "74"
                ],
                [
                    "ilce_id" => "250",
                    "ilce_title" => "BEŞİRİ",
                    "ilce_key" => "1184",
                    "ilce_sehirkey" => "72"
                ],
                [
                    "ilce_id" => "251",
                    "ilce_title" => "GERCÜŞ",
                    "ilce_key" => "1345",
                    "ilce_sehirkey" => "72"
                ],
                [
                    "ilce_id" => "252",
                    "ilce_title" => "HASANKEYF",
                    "ilce_key" => "1941",
                    "ilce_sehirkey" => "72"
                ],
                [
                    "ilce_id" => "253",
                    "ilce_title" => "KOZLUK",
                    "ilce_key" => "1487",
                    "ilce_sehirkey" => "72"
                ],
                [
                    "ilce_id" => "254",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1174",
                    "ilce_sehirkey" => "72"
                ],
                [
                    "ilce_id" => "255",
                    "ilce_title" => "SASON",
                    "ilce_key" => "1607",
                    "ilce_sehirkey" => "72"
                ],
                [
                    "ilce_id" => "256",
                    "ilce_title" => "AYDINTEPE",
                    "ilce_key" => "1767",
                    "ilce_sehirkey" => "69"
                ],
                [
                    "ilce_id" => "257",
                    "ilce_title" => "DEMİRÖZÜ",
                    "ilce_key" => "1788",
                    "ilce_sehirkey" => "69"
                ],
                [
                    "ilce_id" => "258",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1176",
                    "ilce_sehirkey" => "69"
                ],
                [
                    "ilce_id" => "259",
                    "ilce_title" => "BOZÜYÜK",
                    "ilce_key" => "1210",
                    "ilce_sehirkey" => "11"
                ],
                [
                    "ilce_id" => "260",
                    "ilce_title" => "GÖLPAZARI",
                    "ilce_key" => "1359",
                    "ilce_sehirkey" => "11"
                ],
                [
                    "ilce_id" => "261",
                    "ilce_title" => "İNHİSAR",
                    "ilce_key" => "1948",
                    "ilce_sehirkey" => "11"
                ],
                [
                    "ilce_id" => "262",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1192",
                    "ilce_sehirkey" => "11"
                ],
                [
                    "ilce_id" => "263",
                    "ilce_title" => "OSMANELİ",
                    "ilce_key" => "1559",
                    "ilce_sehirkey" => "11"
                ],
                [
                    "ilce_id" => "264",
                    "ilce_title" => "PAZARYERİ",
                    "ilce_key" => "1571",
                    "ilce_sehirkey" => "11"
                ],
                [
                    "ilce_id" => "265",
                    "ilce_title" => "SÖĞÜT",
                    "ilce_key" => "1636",
                    "ilce_sehirkey" => "11"
                ],
                [
                    "ilce_id" => "266",
                    "ilce_title" => "YENİPAZAR",
                    "ilce_key" => "1857",
                    "ilce_sehirkey" => "11"
                ],
                [
                    "ilce_id" => "267",
                    "ilce_title" => "ADAKLI",
                    "ilce_key" => "1750",
                    "ilce_sehirkey" => "12"
                ],
                [
                    "ilce_id" => "268",
                    "ilce_title" => "GENÇ",
                    "ilce_key" => "1344",
                    "ilce_sehirkey" => "12"
                ],
                [
                    "ilce_id" => "269",
                    "ilce_title" => "KARLIOVA",
                    "ilce_key" => "1446",
                    "ilce_sehirkey" => "12"
                ],
                [
                    "ilce_id" => "270",
                    "ilce_title" => "KİĞI",
                    "ilce_key" => "1475",
                    "ilce_sehirkey" => "12"
                ],
                [
                    "ilce_id" => "271",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1193",
                    "ilce_sehirkey" => "12"
                ],
                [
                    "ilce_id" => "272",
                    "ilce_title" => "SOLHAN",
                    "ilce_key" => "1633",
                    "ilce_sehirkey" => "12"
                ],
                [
                    "ilce_id" => "273",
                    "ilce_title" => "YAYLADERE",
                    "ilce_key" => "1855",
                    "ilce_sehirkey" => "12"
                ],
                [
                    "ilce_id" => "274",
                    "ilce_title" => "YEDİSU",
                    "ilce_key" => "1996",
                    "ilce_sehirkey" => "12"
                ],
                [
                    "ilce_id" => "275",
                    "ilce_title" => "ADİLCEVAZ",
                    "ilce_key" => "1106",
                    "ilce_sehirkey" => "13"
                ],
                [
                    "ilce_id" => "276",
                    "ilce_title" => "AHLAT",
                    "ilce_key" => "1112",
                    "ilce_sehirkey" => "13"
                ],
                [
                    "ilce_id" => "277",
                    "ilce_title" => "GÜROYMAK",
                    "ilce_key" => "1798",
                    "ilce_sehirkey" => "13"
                ],
                [
                    "ilce_id" => "278",
                    "ilce_title" => "HİZAN",
                    "ilce_key" => "1394",
                    "ilce_sehirkey" => "13"
                ],
                [
                    "ilce_id" => "279",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1196",
                    "ilce_sehirkey" => "13"
                ],
                [
                    "ilce_id" => "280",
                    "ilce_title" => "MUTKİ",
                    "ilce_key" => "1537",
                    "ilce_sehirkey" => "13"
                ],
                [
                    "ilce_id" => "281",
                    "ilce_title" => "TATVAN",
                    "ilce_key" => "1669",
                    "ilce_sehirkey" => "13"
                ],
                [
                    "ilce_id" => "282",
                    "ilce_title" => "DÖRTDİVAN",
                    "ilce_key" => "1916",
                    "ilce_sehirkey" => "14"
                ],
                [
                    "ilce_id" => "283",
                    "ilce_title" => "GEREDE",
                    "ilce_key" => "1346",
                    "ilce_sehirkey" => "14"
                ],
                [
                    "ilce_id" => "284",
                    "ilce_title" => "GÖYNÜK",
                    "ilce_key" => "1364",
                    "ilce_sehirkey" => "14"
                ],
                [
                    "ilce_id" => "285",
                    "ilce_title" => "KIBRISCIK",
                    "ilce_key" => "1466",
                    "ilce_sehirkey" => "14"
                ],
                [
                    "ilce_id" => "286",
                    "ilce_title" => "MENGEN",
                    "ilce_key" => "1522",
                    "ilce_sehirkey" => "14"
                ],
                [
                    "ilce_id" => "287",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1199",
                    "ilce_sehirkey" => "14"
                ],
                [
                    "ilce_id" => "288",
                    "ilce_title" => "MUDURNU",
                    "ilce_key" => "1531",
                    "ilce_sehirkey" => "14"
                ],
                [
                    "ilce_id" => "289",
                    "ilce_title" => "SEBEN",
                    "ilce_key" => "1610",
                    "ilce_sehirkey" => "14"
                ],
                [
                    "ilce_id" => "290",
                    "ilce_title" => "YENİÇAĞA",
                    "ilce_key" => "1997",
                    "ilce_sehirkey" => "14"
                ],
                [
                    "ilce_id" => "291",
                    "ilce_title" => "AĞLASUN",
                    "ilce_key" => "1109",
                    "ilce_sehirkey" => "15"
                ],
                [
                    "ilce_id" => "292",
                    "ilce_title" => "ALTINYAYLA",
                    "ilce_key" => "1874",
                    "ilce_sehirkey" => "15"
                ],
                [
                    "ilce_id" => "293",
                    "ilce_title" => "BUCAK",
                    "ilce_key" => "1211",
                    "ilce_sehirkey" => "15"
                ],
                [
                    "ilce_id" => "294",
                    "ilce_title" => "ÇAVDIR",
                    "ilce_key" => "1899",
                    "ilce_sehirkey" => "15"
                ],
                [
                    "ilce_id" => "295",
                    "ilce_title" => "ÇELTİKÇİ",
                    "ilce_key" => "1903",
                    "ilce_sehirkey" => "15"
                ],
                [
                    "ilce_id" => "296",
                    "ilce_title" => "GÖLHİSAR",
                    "ilce_key" => "1357",
                    "ilce_sehirkey" => "15"
                ],
                [
                    "ilce_id" => "297",
                    "ilce_title" => "KARAMANLI",
                    "ilce_key" => "1813",
                    "ilce_sehirkey" => "15"
                ],
                [
                    "ilce_id" => "298",
                    "ilce_title" => "KEMER",
                    "ilce_key" => "1816",
                    "ilce_sehirkey" => "15"
                ],
                [
                    "ilce_id" => "299",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1215",
                    "ilce_sehirkey" => "15"
                ],
                [
                    "ilce_id" => "300",
                    "ilce_title" => "TEFENNİ",
                    "ilce_key" => "1672",
                    "ilce_sehirkey" => "15"
                ],
                [
                    "ilce_id" => "301",
                    "ilce_title" => "YEŞİLOVA",
                    "ilce_key" => "1728",
                    "ilce_sehirkey" => "15"
                ],
                [
                    "ilce_id" => "302",
                    "ilce_title" => "AYVACIK",
                    "ilce_key" => "1160",
                    "ilce_sehirkey" => "17"
                ],
                [
                    "ilce_id" => "303",
                    "ilce_title" => "BAYRAMİÇ",
                    "ilce_key" => "1180",
                    "ilce_sehirkey" => "17"
                ],
                [
                    "ilce_id" => "304",
                    "ilce_title" => "BİGA",
                    "ilce_key" => "1190",
                    "ilce_sehirkey" => "17"
                ],
                [
                    "ilce_id" => "305",
                    "ilce_title" => "BOZCAADA",
                    "ilce_key" => "1205",
                    "ilce_sehirkey" => "17"
                ],
                [
                    "ilce_id" => "306",
                    "ilce_title" => "ÇAN",
                    "ilce_key" => "1229",
                    "ilce_sehirkey" => "17"
                ],
                [
                    "ilce_id" => "307",
                    "ilce_title" => "ECEABAT",
                    "ilce_key" => "1293",
                    "ilce_sehirkey" => "17"
                ],
                [
                    "ilce_id" => "308",
                    "ilce_title" => "EZİNE",
                    "ilce_key" => "1326",
                    "ilce_sehirkey" => "17"
                ],
                [
                    "ilce_id" => "309",
                    "ilce_title" => "GELİBOLU",
                    "ilce_key" => "1340",
                    "ilce_sehirkey" => "17"
                ],
                [
                    "ilce_id" => "310",
                    "ilce_title" => "GÖKÇEADA",
                    "ilce_key" => "1408",
                    "ilce_sehirkey" => "17"
                ],
                [
                    "ilce_id" => "311",
                    "ilce_title" => "LAPSEKİ",
                    "ilce_key" => "1503",
                    "ilce_sehirkey" => "17"
                ],
                [
                    "ilce_id" => "312",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1230",
                    "ilce_sehirkey" => "17"
                ],
                [
                    "ilce_id" => "313",
                    "ilce_title" => "YENİCE",
                    "ilce_key" => "1722",
                    "ilce_sehirkey" => "17"
                ],
                [
                    "ilce_id" => "314",
                    "ilce_title" => "ATKARACALAR",
                    "ilce_key" => "1765",
                    "ilce_sehirkey" => "18"
                ],
                [
                    "ilce_id" => "315",
                    "ilce_title" => "BAYRAMÖREN",
                    "ilce_key" => "1885",
                    "ilce_sehirkey" => "18"
                ],
                [
                    "ilce_id" => "316",
                    "ilce_title" => "ÇERKEŞ",
                    "ilce_key" => "1248",
                    "ilce_sehirkey" => "18"
                ],
                [
                    "ilce_id" => "317",
                    "ilce_title" => "ELDİVAN",
                    "ilce_key" => "1300",
                    "ilce_sehirkey" => "18"
                ],
                [
                    "ilce_id" => "318",
                    "ilce_title" => "ILGAZ",
                    "ilce_key" => "1399",
                    "ilce_sehirkey" => "18"
                ],
                [
                    "ilce_id" => "319",
                    "ilce_title" => "KIZILIRMAK",
                    "ilce_key" => "1817",
                    "ilce_sehirkey" => "18"
                ],
                [
                    "ilce_id" => "320",
                    "ilce_title" => "KORGUN",
                    "ilce_key" => "1963",
                    "ilce_sehirkey" => "18"
                ],
                [
                    "ilce_id" => "321",
                    "ilce_title" => "KURŞUNLU",
                    "ilce_key" => "1494",
                    "ilce_sehirkey" => "18"
                ],
                [
                    "ilce_id" => "322",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1232",
                    "ilce_sehirkey" => "18"
                ],
                [
                    "ilce_id" => "323",
                    "ilce_title" => "ORTA",
                    "ilce_key" => "1555",
                    "ilce_sehirkey" => "18"
                ],
                [
                    "ilce_id" => "324",
                    "ilce_title" => "ŞABANÖZÜ",
                    "ilce_key" => "1649",
                    "ilce_sehirkey" => "18"
                ],
                [
                    "ilce_id" => "325",
                    "ilce_title" => "YAPRAKLI",
                    "ilce_key" => "1718",
                    "ilce_sehirkey" => "18"
                ],
                [
                    "ilce_id" => "326",
                    "ilce_title" => "ALACA",
                    "ilce_key" => "1124",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "327",
                    "ilce_title" => "BAYAT",
                    "ilce_key" => "1177",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "328",
                    "ilce_title" => "BOĞAZKALE",
                    "ilce_key" => "1778",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "329",
                    "ilce_title" => "DODURGA",
                    "ilce_key" => "1911",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "330",
                    "ilce_title" => "İSKİLİP",
                    "ilce_key" => "1414",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "331",
                    "ilce_title" => "KARGI",
                    "ilce_key" => "1445",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "332",
                    "ilce_title" => "LAÇİN",
                    "ilce_key" => "1972",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "333",
                    "ilce_title" => "MECİTÖZÜ",
                    "ilce_key" => "1520",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "334",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1259",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "335",
                    "ilce_title" => "OĞUZLAR",
                    "ilce_key" => "1976",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "336",
                    "ilce_title" => "ORTAKÖY",
                    "ilce_key" => "1556",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "337",
                    "ilce_title" => "OSMANCIK",
                    "ilce_key" => "1558",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "338",
                    "ilce_title" => "SUNGURLU",
                    "ilce_key" => "1642",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "339",
                    "ilce_title" => "UĞURLUDAĞ",
                    "ilce_key" => "1850",
                    "ilce_sehirkey" => "19"
                ],
                [
                    "ilce_id" => "340",
                    "ilce_title" => "ACIPAYAM",
                    "ilce_key" => "1102",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "341",
                    "ilce_title" => "BABADAĞ",
                    "ilce_key" => "1769",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "342",
                    "ilce_title" => "BAKLAN",
                    "ilce_key" => "1881",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "343",
                    "ilce_title" => "BEKİLLİ",
                    "ilce_key" => "1774",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "344",
                    "ilce_title" => "BEYAĞAÇ",
                    "ilce_key" => "1888",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "345",
                    "ilce_title" => "BOZKURT",
                    "ilce_key" => "1889",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "346",
                    "ilce_title" => "BULDAN",
                    "ilce_key" => "1214",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "347",
                    "ilce_title" => "ÇAL",
                    "ilce_key" => "1224",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "348",
                    "ilce_title" => "ÇAMELİ",
                    "ilce_key" => "1226",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "349",
                    "ilce_title" => "ÇARDAK",
                    "ilce_key" => "1233",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "350",
                    "ilce_title" => "ÇİVRİL",
                    "ilce_key" => "1257",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "351",
                    "ilce_title" => "GÜNEY",
                    "ilce_key" => "1371",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "352",
                    "ilce_title" => "HONAZ",
                    "ilce_key" => "1803",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "353",
                    "ilce_title" => "KALE",
                    "ilce_key" => "1426",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "354",
                    "ilce_title" => "MERKEZEFENDİ",
                    "ilce_key" => "2079",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "355",
                    "ilce_title" => "PAMUKKALE",
                    "ilce_key" => "1871",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "356",
                    "ilce_title" => "SARAYKÖY",
                    "ilce_key" => "1597",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "357",
                    "ilce_title" => "SERİNHİSAR",
                    "ilce_key" => "1840",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "358",
                    "ilce_title" => "TAVAS",
                    "ilce_key" => "1670",
                    "ilce_sehirkey" => "20"
                ],
                [
                    "ilce_id" => "359",
                    "ilce_title" => "BAĞLAR",
                    "ilce_key" => "2040",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "360",
                    "ilce_title" => "BİSMİL",
                    "ilce_key" => "1195",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "361",
                    "ilce_title" => "ÇERMİK",
                    "ilce_key" => "1249",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "362",
                    "ilce_title" => "ÇINAR",
                    "ilce_key" => "1253",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "363",
                    "ilce_title" => "ÇÜNGÜŞ",
                    "ilce_key" => "1263",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "364",
                    "ilce_title" => "DİCLE",
                    "ilce_key" => "1278",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "365",
                    "ilce_title" => "EĞİL",
                    "ilce_key" => "1791",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "366",
                    "ilce_title" => "ERGANİ",
                    "ilce_key" => "1315",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "367",
                    "ilce_title" => "HANİ",
                    "ilce_key" => "1381",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "368",
                    "ilce_title" => "HAZRO",
                    "ilce_key" => "1389",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "369",
                    "ilce_title" => "KAYAPINAR",
                    "ilce_key" => "2041",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "370",
                    "ilce_title" => "KOCAKÖY",
                    "ilce_key" => "1962",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "371",
                    "ilce_title" => "KULP",
                    "ilce_key" => "1490",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "372",
                    "ilce_title" => "LİCE",
                    "ilce_key" => "1504",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "373",
                    "ilce_title" => "SİLVAN",
                    "ilce_key" => "1624",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "374",
                    "ilce_title" => "SUR",
                    "ilce_key" => "2042",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "375",
                    "ilce_title" => "YENİŞEHİR",
                    "ilce_key" => "2043",
                    "ilce_sehirkey" => "21"
                ],
                [
                    "ilce_id" => "376",
                    "ilce_title" => "BAŞİSKELE",
                    "ilce_key" => "2058",
                    "ilce_sehirkey" => "41"
                ],
                [
                    "ilce_id" => "377",
                    "ilce_title" => "ÇAYIROVA",
                    "ilce_key" => "2059",
                    "ilce_sehirkey" => "41"
                ],
                [
                    "ilce_id" => "378",
                    "ilce_title" => "DARICA",
                    "ilce_key" => "2060",
                    "ilce_sehirkey" => "41"
                ],
                [
                    "ilce_id" => "379",
                    "ilce_title" => "DERİNCE",
                    "ilce_key" => "2030",
                    "ilce_sehirkey" => "41"
                ],
                [
                    "ilce_id" => "380",
                    "ilce_title" => "DİLOVASI",
                    "ilce_key" => "2061",
                    "ilce_sehirkey" => "41"
                ],
                [
                    "ilce_id" => "381",
                    "ilce_title" => "GEBZE",
                    "ilce_key" => "1338",
                    "ilce_sehirkey" => "41"
                ],
                [
                    "ilce_id" => "382",
                    "ilce_title" => "GÖLCÜK",
                    "ilce_key" => "1355",
                    "ilce_sehirkey" => "41"
                ],
                [
                    "ilce_id" => "383",
                    "ilce_title" => "İZMİT",
                    "ilce_key" => "2062",
                    "ilce_sehirkey" => "41"
                ],
                [
                    "ilce_id" => "384",
                    "ilce_title" => "KANDIRA",
                    "ilce_key" => "1430",
                    "ilce_sehirkey" => "41"
                ],
                [
                    "ilce_id" => "385",
                    "ilce_title" => "KARAMÜRSEL",
                    "ilce_key" => "1440",
                    "ilce_sehirkey" => "41"
                ],
                [
                    "ilce_id" => "386",
                    "ilce_title" => "KARTEPE",
                    "ilce_key" => "2063",
                    "ilce_sehirkey" => "41"
                ],
                [
                    "ilce_id" => "387",
                    "ilce_title" => "KÖRFEZ",
                    "ilce_key" => "1821",
                    "ilce_sehirkey" => "41"
                ],
                [
                    "ilce_id" => "388",
                    "ilce_title" => "AHIRLI",
                    "ilce_key" => "1868",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "389",
                    "ilce_title" => "AKÖREN",
                    "ilce_key" => "1753",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "390",
                    "ilce_title" => "AKŞEHİR",
                    "ilce_key" => "1122",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "391",
                    "ilce_title" => "ALTINEKİN",
                    "ilce_key" => "1760",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "392",
                    "ilce_title" => "BEYŞEHİR",
                    "ilce_key" => "1188",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "393",
                    "ilce_title" => "BOZKIR",
                    "ilce_key" => "1207",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "394",
                    "ilce_title" => "CİHANBEYLİ",
                    "ilce_key" => "1222",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "395",
                    "ilce_title" => "ÇELTİK",
                    "ilce_key" => "1902",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "396",
                    "ilce_title" => "ÇUMRA",
                    "ilce_key" => "1262",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "397",
                    "ilce_title" => "DERBENT",
                    "ilce_key" => "1907",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "398",
                    "ilce_title" => "DEREBUCAK",
                    "ilce_key" => "1789",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "399",
                    "ilce_title" => "DOĞANHİSAR",
                    "ilce_key" => "1285",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "400",
                    "ilce_title" => "EMİRGAZİ",
                    "ilce_key" => "1920",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "401",
                    "ilce_title" => "EREĞLİ",
                    "ilce_key" => "1312",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "402",
                    "ilce_title" => "GÜNEYSINIR",
                    "ilce_key" => "1933",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "403",
                    "ilce_title" => "HADİM",
                    "ilce_key" => "1375",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "404",
                    "ilce_title" => "HALKAPINAR",
                    "ilce_key" => "1937",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "405",
                    "ilce_title" => "HÜYÜK",
                    "ilce_key" => "1804",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "406",
                    "ilce_title" => "ILGIN",
                    "ilce_key" => "1400",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "407",
                    "ilce_title" => "KADINHANI",
                    "ilce_key" => "1422",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "408",
                    "ilce_title" => "KARAPINAR",
                    "ilce_key" => "1441",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "409",
                    "ilce_title" => "KARATAY",
                    "ilce_key" => "1814",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "410",
                    "ilce_title" => "KULU",
                    "ilce_key" => "1491",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "411",
                    "ilce_title" => "MERAM",
                    "ilce_key" => "1827",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "412",
                    "ilce_title" => "SARAYÖNÜ",
                    "ilce_key" => "1598",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "413",
                    "ilce_title" => "SELÇUKLU",
                    "ilce_key" => "1839",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "414",
                    "ilce_title" => "SEYDİŞEHİR",
                    "ilce_key" => "1617",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "415",
                    "ilce_title" => "TAŞKENT",
                    "ilce_key" => "1848",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "416",
                    "ilce_title" => "TUZLUKÇU",
                    "ilce_key" => "1990",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "417",
                    "ilce_title" => "YALIHÜYÜK",
                    "ilce_key" => "1994",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "418",
                    "ilce_title" => "YUNAK",
                    "ilce_key" => "1735",
                    "ilce_sehirkey" => "42"
                ],
                [
                    "ilce_id" => "419",
                    "ilce_title" => "ALTINTAŞ",
                    "ilce_key" => "1132",
                    "ilce_sehirkey" => "43"
                ],
                [
                    "ilce_id" => "420",
                    "ilce_title" => "ASLANAPA",
                    "ilce_key" => "1764",
                    "ilce_sehirkey" => "43"
                ],
                [
                    "ilce_id" => "421",
                    "ilce_title" => "ÇAVDARHİSAR",
                    "ilce_key" => "1898",
                    "ilce_sehirkey" => "43"
                ],
                [
                    "ilce_id" => "422",
                    "ilce_title" => "DOMANİÇ",
                    "ilce_key" => "1288",
                    "ilce_sehirkey" => "43"
                ],
                [
                    "ilce_id" => "423",
                    "ilce_title" => "DUMLUPINAR",
                    "ilce_key" => "1790",
                    "ilce_sehirkey" => "43"
                ],
                [
                    "ilce_id" => "424",
                    "ilce_title" => "EMET",
                    "ilce_key" => "1304",
                    "ilce_sehirkey" => "43"
                ],
                [
                    "ilce_id" => "425",
                    "ilce_title" => "GEDİZ",
                    "ilce_key" => "1339",
                    "ilce_sehirkey" => "43"
                ],
                [
                    "ilce_id" => "426",
                    "ilce_title" => "HİSARCIK",
                    "ilce_key" => "1802",
                    "ilce_sehirkey" => "43"
                ],
                [
                    "ilce_id" => "427",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1500",
                    "ilce_sehirkey" => "43"
                ],
                [
                    "ilce_id" => "428",
                    "ilce_title" => "PAZARLAR",
                    "ilce_key" => "1979",
                    "ilce_sehirkey" => "43"
                ],
                [
                    "ilce_id" => "429",
                    "ilce_title" => "SİMAV",
                    "ilce_key" => "1625",
                    "ilce_sehirkey" => "43"
                ],
                [
                    "ilce_id" => "430",
                    "ilce_title" => "ŞAPHANE",
                    "ilce_key" => "1843",
                    "ilce_sehirkey" => "43"
                ],
                [
                    "ilce_id" => "431",
                    "ilce_title" => "TAVŞANLI",
                    "ilce_key" => "1671",
                    "ilce_sehirkey" => "43"
                ],
                [
                    "ilce_id" => "432",
                    "ilce_title" => "AKÇADAĞ",
                    "ilce_key" => "1114",
                    "ilce_sehirkey" => "44"
                ],
                [
                    "ilce_id" => "433",
                    "ilce_title" => "ARAPGİR",
                    "ilce_key" => "1143",
                    "ilce_sehirkey" => "44"
                ],
                [
                    "ilce_id" => "434",
                    "ilce_title" => "ARGUVAN",
                    "ilce_key" => "1148",
                    "ilce_sehirkey" => "44"
                ],
                [
                    "ilce_id" => "435",
                    "ilce_title" => "BATTALGAZİ",
                    "ilce_key" => "1772",
                    "ilce_sehirkey" => "44"
                ],
                [
                    "ilce_id" => "436",
                    "ilce_title" => "DARENDE",
                    "ilce_key" => "1265",
                    "ilce_sehirkey" => "44"
                ],
                [
                    "ilce_id" => "437",
                    "ilce_title" => "DOĞANŞEHİR",
                    "ilce_key" => "1286",
                    "ilce_sehirkey" => "44"
                ],
                [
                    "ilce_id" => "438",
                    "ilce_title" => "DOĞANYOL",
                    "ilce_key" => "1914",
                    "ilce_sehirkey" => "44"
                ],
                [
                    "ilce_id" => "439",
                    "ilce_title" => "HEKİMHAN",
                    "ilce_key" => "1390",
                    "ilce_sehirkey" => "44"
                ],
                [
                    "ilce_id" => "440",
                    "ilce_title" => "KALE",
                    "ilce_key" => "1953",
                    "ilce_sehirkey" => "44"
                ],
                [
                    "ilce_id" => "441",
                    "ilce_title" => "KULUNCAK",
                    "ilce_key" => "1969",
                    "ilce_sehirkey" => "44"
                ],
                [
                    "ilce_id" => "442",
                    "ilce_title" => "PÜTÜRGE",
                    "ilce_key" => "1582",
                    "ilce_sehirkey" => "44"
                ],
                [
                    "ilce_id" => "443",
                    "ilce_title" => "YAZIHAN",
                    "ilce_key" => "1995",
                    "ilce_sehirkey" => "44"
                ],
                [
                    "ilce_id" => "444",
                    "ilce_title" => "YEŞİLYURT",
                    "ilce_key" => "1729",
                    "ilce_sehirkey" => "44"
                ],
                [
                    "ilce_id" => "445",
                    "ilce_title" => "AHMETLİ",
                    "ilce_key" => "1751",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "446",
                    "ilce_title" => "AKHİSAR",
                    "ilce_key" => "1118",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "447",
                    "ilce_title" => "ALAŞEHİR",
                    "ilce_key" => "1127",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "448",
                    "ilce_title" => "DEMİRCİ",
                    "ilce_key" => "1269",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "449",
                    "ilce_title" => "GÖLMARMARA",
                    "ilce_key" => "1793",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "450",
                    "ilce_title" => "GÖRDES",
                    "ilce_key" => "1362",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "451",
                    "ilce_title" => "KIRKAĞAÇ",
                    "ilce_key" => "1470",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "452",
                    "ilce_title" => "KÖPRÜBAŞI",
                    "ilce_key" => "1965",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "453",
                    "ilce_title" => "KULA",
                    "ilce_key" => "1489",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "454",
                    "ilce_title" => "SALİHLİ",
                    "ilce_key" => "1590",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "455",
                    "ilce_title" => "SARIGÖL",
                    "ilce_key" => "1600",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "456",
                    "ilce_title" => "SARUHANLI",
                    "ilce_key" => "1606",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "457",
                    "ilce_title" => "SELENDİ",
                    "ilce_key" => "1613",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "458",
                    "ilce_title" => "SOMA",
                    "ilce_key" => "1634",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "459",
                    "ilce_title" => "ŞEHZADELER",
                    "ilce_key" => "2086",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "460",
                    "ilce_title" => "TURGUTLU",
                    "ilce_key" => "1689",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "461",
                    "ilce_title" => "YUNUSEMRE",
                    "ilce_key" => "2087",
                    "ilce_sehirkey" => "45"
                ],
                [
                    "ilce_id" => "462",
                    "ilce_title" => "ARTUKLU",
                    "ilce_key" => "2088",
                    "ilce_sehirkey" => "47"
                ],
                [
                    "ilce_id" => "463",
                    "ilce_title" => "DARGEÇİT",
                    "ilce_key" => "1787",
                    "ilce_sehirkey" => "47"
                ],
                [
                    "ilce_id" => "464",
                    "ilce_title" => "DERİK",
                    "ilce_key" => "1273",
                    "ilce_sehirkey" => "47"
                ],
                [
                    "ilce_id" => "465",
                    "ilce_title" => "KIZILTEPE",
                    "ilce_key" => "1474",
                    "ilce_sehirkey" => "47"
                ],
                [
                    "ilce_id" => "466",
                    "ilce_title" => "MAZIDAĞI",
                    "ilce_key" => "1519",
                    "ilce_sehirkey" => "47"
                ],
                [
                    "ilce_id" => "467",
                    "ilce_title" => "MİDYAT",
                    "ilce_key" => "1526",
                    "ilce_sehirkey" => "47"
                ],
                [
                    "ilce_id" => "468",
                    "ilce_title" => "NUSAYBİN",
                    "ilce_key" => "1547",
                    "ilce_sehirkey" => "47"
                ],
                [
                    "ilce_id" => "469",
                    "ilce_title" => "ÖMERLİ",
                    "ilce_key" => "1564",
                    "ilce_sehirkey" => "47"
                ],
                [
                    "ilce_id" => "470",
                    "ilce_title" => "SAVUR",
                    "ilce_key" => "1609",
                    "ilce_sehirkey" => "47"
                ],
                [
                    "ilce_id" => "471",
                    "ilce_title" => "YEŞİLLİ",
                    "ilce_key" => "2002",
                    "ilce_sehirkey" => "47"
                ],
                [
                    "ilce_id" => "472",
                    "ilce_title" => "AKDENİZ",
                    "ilce_key" => "2064",
                    "ilce_sehirkey" => "33"
                ],
                [
                    "ilce_id" => "473",
                    "ilce_title" => "ANAMUR",
                    "ilce_key" => "1135",
                    "ilce_sehirkey" => "33"
                ],
                [
                    "ilce_id" => "474",
                    "ilce_title" => "AYDINCIK",
                    "ilce_key" => "1766",
                    "ilce_sehirkey" => "33"
                ],
                [
                    "ilce_id" => "475",
                    "ilce_title" => "BOZYAZI",
                    "ilce_key" => "1779",
                    "ilce_sehirkey" => "33"
                ],
                [
                    "ilce_id" => "476",
                    "ilce_title" => "ÇAMLIYAYLA",
                    "ilce_key" => "1892",
                    "ilce_sehirkey" => "33"
                ],
                [
                    "ilce_id" => "477",
                    "ilce_title" => "ERDEMLİ",
                    "ilce_key" => "1311",
                    "ilce_sehirkey" => "33"
                ],
                [
                    "ilce_id" => "478",
                    "ilce_title" => "GÜLNAR",
                    "ilce_key" => "1366",
                    "ilce_sehirkey" => "33"
                ],
                [
                    "ilce_id" => "479",
                    "ilce_title" => "MEZİTLİ",
                    "ilce_key" => "2065",
                    "ilce_sehirkey" => "33"
                ],
                [
                    "ilce_id" => "480",
                    "ilce_title" => "MUT",
                    "ilce_key" => "1536",
                    "ilce_sehirkey" => "33"
                ],
                [
                    "ilce_id" => "481",
                    "ilce_title" => "SİLİFKE",
                    "ilce_key" => "1621",
                    "ilce_sehirkey" => "33"
                ],
                [
                    "ilce_id" => "482",
                    "ilce_title" => "TARSUS",
                    "ilce_key" => "1665",
                    "ilce_sehirkey" => "33"
                ],
                [
                    "ilce_id" => "483",
                    "ilce_title" => "TOROSLAR",
                    "ilce_key" => "2066",
                    "ilce_sehirkey" => "33"
                ],
                [
                    "ilce_id" => "484",
                    "ilce_title" => "YENİŞEHİR",
                    "ilce_key" => "2067",
                    "ilce_sehirkey" => "33"
                ],
                [
                    "ilce_id" => "485",
                    "ilce_title" => "BODRUM",
                    "ilce_key" => "1197",
                    "ilce_sehirkey" => "48"
                ],
                [
                    "ilce_id" => "486",
                    "ilce_title" => "DALAMAN",
                    "ilce_key" => "1742",
                    "ilce_sehirkey" => "48"
                ],
                [
                    "ilce_id" => "487",
                    "ilce_title" => "DATÇA",
                    "ilce_key" => "1266",
                    "ilce_sehirkey" => "48"
                ],
                [
                    "ilce_id" => "488",
                    "ilce_title" => "FETHİYE",
                    "ilce_key" => "1331",
                    "ilce_sehirkey" => "48"
                ],
                [
                    "ilce_id" => "489",
                    "ilce_title" => "KAVAKLIDERE",
                    "ilce_key" => "1958",
                    "ilce_sehirkey" => "48"
                ],
                [
                    "ilce_id" => "490",
                    "ilce_title" => "KÖYCEĞİZ",
                    "ilce_key" => "1488",
                    "ilce_sehirkey" => "48"
                ],
                [
                    "ilce_id" => "491",
                    "ilce_title" => "MARMARİS",
                    "ilce_key" => "1517",
                    "ilce_sehirkey" => "48"
                ],
                [
                    "ilce_id" => "492",
                    "ilce_title" => "MENTEŞE",
                    "ilce_key" => "2089",
                    "ilce_sehirkey" => "48"
                ],
                [
                    "ilce_id" => "493",
                    "ilce_title" => "MİLAS",
                    "ilce_key" => "1528",
                    "ilce_sehirkey" => "48"
                ],
                [
                    "ilce_id" => "494",
                    "ilce_title" => "ORTACA",
                    "ilce_key" => "1831",
                    "ilce_sehirkey" => "48"
                ],
                [
                    "ilce_id" => "495",
                    "ilce_title" => "SEYDİKEMER",
                    "ilce_key" => "2090",
                    "ilce_sehirkey" => "48"
                ],
                [
                    "ilce_id" => "496",
                    "ilce_title" => "ULA",
                    "ilce_key" => "1695",
                    "ilce_sehirkey" => "48"
                ],
                [
                    "ilce_id" => "497",
                    "ilce_title" => "YATAĞAN",
                    "ilce_key" => "1719",
                    "ilce_sehirkey" => "48"
                ],
                [
                    "ilce_id" => "498",
                    "ilce_title" => "BULANIK",
                    "ilce_key" => "1213",
                    "ilce_sehirkey" => "49"
                ],
                [
                    "ilce_id" => "499",
                    "ilce_title" => "HASKÖY",
                    "ilce_key" => "1801",
                    "ilce_sehirkey" => "49"
                ],
                [
                    "ilce_id" => "500",
                    "ilce_title" => "KORKUT",
                    "ilce_key" => "1964",
                    "ilce_sehirkey" => "49"
                ],
                [
                    "ilce_id" => "501",
                    "ilce_title" => "MALAZGİRT",
                    "ilce_key" => "1510",
                    "ilce_sehirkey" => "49"
                ],
                [
                    "ilce_id" => "502",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1534",
                    "ilce_sehirkey" => "49"
                ],
                [
                    "ilce_id" => "503",
                    "ilce_title" => "VARTO",
                    "ilce_key" => "1711",
                    "ilce_sehirkey" => "49"
                ],
                [
                    "ilce_id" => "504",
                    "ilce_title" => "ACIGÖL",
                    "ilce_key" => "1749",
                    "ilce_sehirkey" => "50"
                ],
                [
                    "ilce_id" => "505",
                    "ilce_title" => "AVANOS",
                    "ilce_key" => "1155",
                    "ilce_sehirkey" => "50"
                ],
                [
                    "ilce_id" => "506",
                    "ilce_title" => "DERİNKUYU",
                    "ilce_key" => "1274",
                    "ilce_sehirkey" => "50"
                ],
                [
                    "ilce_id" => "507",
                    "ilce_title" => "GÜLŞEHİR",
                    "ilce_key" => "1367",
                    "ilce_sehirkey" => "50"
                ],
                [
                    "ilce_id" => "508",
                    "ilce_title" => "HACIBEKTAŞ",
                    "ilce_key" => "1374",
                    "ilce_sehirkey" => "50"
                ],
                [
                    "ilce_id" => "509",
                    "ilce_title" => "KOZAKLI",
                    "ilce_key" => "1485",
                    "ilce_sehirkey" => "50"
                ],
                [
                    "ilce_id" => "510",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1543",
                    "ilce_sehirkey" => "50"
                ],
                [
                    "ilce_id" => "511",
                    "ilce_title" => "ÜRGÜP",
                    "ilce_key" => "1707",
                    "ilce_sehirkey" => "50"
                ],
                [
                    "ilce_id" => "512",
                    "ilce_title" => "ALTUNHİSAR",
                    "ilce_key" => "1876",
                    "ilce_sehirkey" => "51"
                ],
                [
                    "ilce_id" => "513",
                    "ilce_title" => "BOR",
                    "ilce_key" => "1201",
                    "ilce_sehirkey" => "51"
                ],
                [
                    "ilce_id" => "514",
                    "ilce_title" => "ÇAMARDI",
                    "ilce_key" => "1225",
                    "ilce_sehirkey" => "51"
                ],
                [
                    "ilce_id" => "515",
                    "ilce_title" => "ÇİFTLİK",
                    "ilce_key" => "1904",
                    "ilce_sehirkey" => "51"
                ],
                [
                    "ilce_id" => "516",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1544",
                    "ilce_sehirkey" => "51"
                ],
                [
                    "ilce_id" => "517",
                    "ilce_title" => "ULUKIŞLA",
                    "ilce_key" => "1700",
                    "ilce_sehirkey" => "51"
                ],
                [
                    "ilce_id" => "518",
                    "ilce_title" => "AKKUŞ",
                    "ilce_key" => "1119",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "519",
                    "ilce_title" => "ALTINORDU",
                    "ilce_key" => "2103",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "520",
                    "ilce_title" => "AYBASTI",
                    "ilce_key" => "1158",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "521",
                    "ilce_title" => "ÇAMAŞ",
                    "ilce_key" => "1891",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "522",
                    "ilce_title" => "ÇATALPINAR",
                    "ilce_key" => "1897",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "523",
                    "ilce_title" => "ÇAYBAŞI",
                    "ilce_key" => "1900",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "524",
                    "ilce_title" => "FATSA",
                    "ilce_key" => "1328",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "525",
                    "ilce_title" => "GÖLKÖY",
                    "ilce_key" => "1358",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "526",
                    "ilce_title" => "GÜLYALI",
                    "ilce_key" => "1795",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "527",
                    "ilce_title" => "GÜRGENTEPE",
                    "ilce_key" => "1797",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "528",
                    "ilce_title" => "İKİZCE",
                    "ilce_key" => "1947",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "529",
                    "ilce_title" => "KABADÜZ",
                    "ilce_key" => "1950",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "530",
                    "ilce_title" => "KABATAŞ",
                    "ilce_key" => "1951",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "531",
                    "ilce_title" => "KORGAN",
                    "ilce_key" => "1482",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "532",
                    "ilce_title" => "KUMRU",
                    "ilce_key" => "1493",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "533",
                    "ilce_title" => "MESUDİYE",
                    "ilce_key" => "1525",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "534",
                    "ilce_title" => "PERŞEMBE",
                    "ilce_key" => "1573",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "535",
                    "ilce_title" => "ULUBEY",
                    "ilce_key" => "1696",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "536",
                    "ilce_title" => "ÜNYE",
                    "ilce_key" => "1706",
                    "ilce_sehirkey" => "52"
                ],
                [
                    "ilce_id" => "537",
                    "ilce_title" => "BAHÇE",
                    "ilce_key" => "1165",
                    "ilce_sehirkey" => "80"
                ],
                [
                    "ilce_id" => "538",
                    "ilce_title" => "DÜZİÇİ",
                    "ilce_key" => "1743",
                    "ilce_sehirkey" => "80"
                ],
                [
                    "ilce_id" => "539",
                    "ilce_title" => "HASANBEYLİ",
                    "ilce_key" => "2027",
                    "ilce_sehirkey" => "80"
                ],
                [
                    "ilce_id" => "540",
                    "ilce_title" => "KADİRLİ",
                    "ilce_key" => "1423",
                    "ilce_sehirkey" => "80"
                ],
                [
                    "ilce_id" => "541",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1560",
                    "ilce_sehirkey" => "80"
                ],
                [
                    "ilce_id" => "542",
                    "ilce_title" => "SUMBAS",
                    "ilce_key" => "2028",
                    "ilce_sehirkey" => "80"
                ],
                [
                    "ilce_id" => "543",
                    "ilce_title" => "TOPRAKKALE",
                    "ilce_key" => "2029",
                    "ilce_sehirkey" => "80"
                ],
                [
                    "ilce_id" => "544",
                    "ilce_title" => "ARDEŞEN",
                    "ilce_key" => "1146",
                    "ilce_sehirkey" => "53"
                ],
                [
                    "ilce_id" => "545",
                    "ilce_title" => "ÇAMLIHEMŞİN",
                    "ilce_key" => "1228",
                    "ilce_sehirkey" => "53"
                ],
                [
                    "ilce_id" => "546",
                    "ilce_title" => "ÇAYELİ",
                    "ilce_key" => "1241",
                    "ilce_sehirkey" => "53"
                ],
                [
                    "ilce_id" => "547",
                    "ilce_title" => "DEREPAZARI",
                    "ilce_key" => "1908",
                    "ilce_sehirkey" => "53"
                ],
                [
                    "ilce_id" => "548",
                    "ilce_title" => "FINDIKLI",
                    "ilce_key" => "1332",
                    "ilce_sehirkey" => "53"
                ],
                [
                    "ilce_id" => "549",
                    "ilce_title" => "GÜNEYSU",
                    "ilce_key" => "1796",
                    "ilce_sehirkey" => "53"
                ],
                [
                    "ilce_id" => "550",
                    "ilce_title" => "HEMŞİN",
                    "ilce_key" => "1943",
                    "ilce_sehirkey" => "53"
                ],
                [
                    "ilce_id" => "551",
                    "ilce_title" => "İKİZDERE",
                    "ilce_key" => "1405",
                    "ilce_sehirkey" => "53"
                ],
                [
                    "ilce_id" => "552",
                    "ilce_title" => "İYİDERE",
                    "ilce_key" => "1949",
                    "ilce_sehirkey" => "53"
                ],
                [
                    "ilce_id" => "553",
                    "ilce_title" => "KALKANDERE",
                    "ilce_key" => "1428",
                    "ilce_sehirkey" => "53"
                ],
                [
                    "ilce_id" => "554",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1586",
                    "ilce_sehirkey" => "53"
                ],
                [
                    "ilce_id" => "555",
                    "ilce_title" => "PAZAR",
                    "ilce_key" => "1569",
                    "ilce_sehirkey" => "53"
                ],
                [
                    "ilce_id" => "556",
                    "ilce_title" => "ADAPAZARI",
                    "ilce_key" => "2068",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "557",
                    "ilce_title" => "AKYAZI",
                    "ilce_key" => "1123",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "558",
                    "ilce_title" => "ARİFİYE",
                    "ilce_key" => "2069",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "559",
                    "ilce_title" => "ERENLER",
                    "ilce_key" => "2070",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "560",
                    "ilce_title" => "FERİZLİ",
                    "ilce_key" => "1925",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "561",
                    "ilce_title" => "GEYVE",
                    "ilce_key" => "1351",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "562",
                    "ilce_title" => "HENDEK",
                    "ilce_key" => "1391",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "563",
                    "ilce_title" => "KARAPÜRÇEK",
                    "ilce_key" => "1955",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "564",
                    "ilce_title" => "KARASU",
                    "ilce_key" => "1442",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "565",
                    "ilce_title" => "KAYNARCA",
                    "ilce_key" => "1453",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "566",
                    "ilce_title" => "KOCAALİ",
                    "ilce_key" => "1818",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "567",
                    "ilce_title" => "PAMUKOVA",
                    "ilce_key" => "1833",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "568",
                    "ilce_title" => "SAPANCA",
                    "ilce_key" => "1595",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "569",
                    "ilce_title" => "SERDİVAN",
                    "ilce_key" => "2071",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "570",
                    "ilce_title" => "SÖĞÜTLÜ",
                    "ilce_key" => "1986",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "571",
                    "ilce_title" => "TARAKLI",
                    "ilce_key" => "1847",
                    "ilce_sehirkey" => "54"
                ],
                [
                    "ilce_id" => "572",
                    "ilce_title" => "ALAÇAM",
                    "ilce_key" => "1125",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "573",
                    "ilce_title" => "ASARCIK",
                    "ilce_key" => "1763",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "574",
                    "ilce_title" => "ATAKUM",
                    "ilce_key" => "2072",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "575",
                    "ilce_title" => "AYVACIK",
                    "ilce_key" => "1879",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "576",
                    "ilce_title" => "BAFRA",
                    "ilce_key" => "1164",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "577",
                    "ilce_title" => "CANİK",
                    "ilce_key" => "2073",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "578",
                    "ilce_title" => "ÇARŞAMBA",
                    "ilce_key" => "1234",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "579",
                    "ilce_title" => "HAVZA",
                    "ilce_key" => "1386",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "580",
                    "ilce_title" => "İLKADIM",
                    "ilce_key" => "2074",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "581",
                    "ilce_title" => "KAVAK",
                    "ilce_key" => "1452",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "582",
                    "ilce_title" => "LADİK",
                    "ilce_key" => "1501",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "583",
                    "ilce_title" => "SALIPAZARI",
                    "ilce_key" => "1838",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "584",
                    "ilce_title" => "TEKKEKÖY",
                    "ilce_key" => "1849",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "585",
                    "ilce_title" => "TERME",
                    "ilce_key" => "1676",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "586",
                    "ilce_title" => "VEZİRKÖPRÜ",
                    "ilce_key" => "1712",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "587",
                    "ilce_title" => "YAKAKENT",
                    "ilce_key" => "1993",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "588",
                    "ilce_title" => "19 MAYIS",
                    "ilce_key" => "1830",
                    "ilce_sehirkey" => "55"
                ],
                [
                    "ilce_id" => "589",
                    "ilce_title" => "BAYKAN",
                    "ilce_key" => "1179",
                    "ilce_sehirkey" => "56"
                ],
                [
                    "ilce_id" => "590",
                    "ilce_title" => "ERUH",
                    "ilce_key" => "1317",
                    "ilce_sehirkey" => "56"
                ],
                [
                    "ilce_id" => "591",
                    "ilce_title" => "KURTALAN",
                    "ilce_key" => "1495",
                    "ilce_sehirkey" => "56"
                ],
                [
                    "ilce_id" => "592",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1620",
                    "ilce_sehirkey" => "56"
                ],
                [
                    "ilce_id" => "593",
                    "ilce_title" => "PERVARİ",
                    "ilce_key" => "1575",
                    "ilce_sehirkey" => "56"
                ],
                [
                    "ilce_id" => "594",
                    "ilce_title" => "ŞİRVAN",
                    "ilce_key" => "1662",
                    "ilce_sehirkey" => "56"
                ],
                [
                    "ilce_id" => "595",
                    "ilce_title" => "TİLLO",
                    "ilce_key" => "1878",
                    "ilce_sehirkey" => "56"
                ],
                [
                    "ilce_id" => "596",
                    "ilce_title" => "AYANCIK",
                    "ilce_key" => "1156",
                    "ilce_sehirkey" => "57"
                ],
                [
                    "ilce_id" => "597",
                    "ilce_title" => "BOYABAT",
                    "ilce_key" => "1204",
                    "ilce_sehirkey" => "57"
                ],
                [
                    "ilce_id" => "598",
                    "ilce_title" => "DİKMEN",
                    "ilce_key" => "1910",
                    "ilce_sehirkey" => "57"
                ],
                [
                    "ilce_id" => "599",
                    "ilce_title" => "DURAĞAN",
                    "ilce_key" => "1290",
                    "ilce_sehirkey" => "57"
                ],
                [
                    "ilce_id" => "600",
                    "ilce_title" => "ERFELEK",
                    "ilce_key" => "1314",
                    "ilce_sehirkey" => "57"
                ],
                [
                    "ilce_id" => "601",
                    "ilce_title" => "GERZE",
                    "ilce_key" => "1349",
                    "ilce_sehirkey" => "57"
                ],
                [
                    "ilce_id" => "602",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1627",
                    "ilce_sehirkey" => "57"
                ],
                [
                    "ilce_id" => "603",
                    "ilce_title" => "SARAYDÜZÜ",
                    "ilce_key" => "1981",
                    "ilce_sehirkey" => "57"
                ],
                [
                    "ilce_id" => "604",
                    "ilce_title" => "TÜRKELİ",
                    "ilce_key" => "1693",
                    "ilce_sehirkey" => "57"
                ],
                [
                    "ilce_id" => "605",
                    "ilce_title" => "BEYTÜŞŞEBAP",
                    "ilce_key" => "1189",
                    "ilce_sehirkey" => "73"
                ],
                [
                    "ilce_id" => "606",
                    "ilce_title" => "CİZRE",
                    "ilce_key" => "1223",
                    "ilce_sehirkey" => "73"
                ],
                [
                    "ilce_id" => "607",
                    "ilce_title" => "GÜÇLÜKONAK",
                    "ilce_key" => "1931",
                    "ilce_sehirkey" => "73"
                ],
                [
                    "ilce_id" => "608",
                    "ilce_title" => "İDİL",
                    "ilce_key" => "1403",
                    "ilce_sehirkey" => "73"
                ],
                [
                    "ilce_id" => "609",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1661",
                    "ilce_sehirkey" => "73"
                ],
                [
                    "ilce_id" => "610",
                    "ilce_title" => "SİLOPİ",
                    "ilce_key" => "1623",
                    "ilce_sehirkey" => "73"
                ],
                [
                    "ilce_id" => "611",
                    "ilce_title" => "ULUDERE",
                    "ilce_key" => "1698",
                    "ilce_sehirkey" => "73"
                ],
                [
                    "ilce_id" => "612",
                    "ilce_title" => "AKINCILAR",
                    "ilce_key" => "1870",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "613",
                    "ilce_title" => "ALTINYAYLA",
                    "ilce_key" => "1875",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "614",
                    "ilce_title" => "DİVRİĞİ",
                    "ilce_key" => "1282",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "615",
                    "ilce_title" => "DOĞANŞAR",
                    "ilce_key" => "1913",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "616",
                    "ilce_title" => "GEMEREK",
                    "ilce_key" => "1342",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "617",
                    "ilce_title" => "GÖLOVA",
                    "ilce_key" => "1927",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "618",
                    "ilce_title" => "GÜRÜN",
                    "ilce_key" => "1373",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "619",
                    "ilce_title" => "HAFİK",
                    "ilce_key" => "1376",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "620",
                    "ilce_title" => "İMRANLI",
                    "ilce_key" => "1407",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "621",
                    "ilce_title" => "KANGAL",
                    "ilce_key" => "1431",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "622",
                    "ilce_title" => "KOYULHİSAR",
                    "ilce_key" => "1484",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "623",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1628",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "624",
                    "ilce_title" => "SUŞEHRİ",
                    "ilce_key" => "1646",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "625",
                    "ilce_title" => "ŞARKIŞLA",
                    "ilce_key" => "1650",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "626",
                    "ilce_title" => "ULAŞ",
                    "ilce_key" => "1991",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "627",
                    "ilce_title" => "YILDIZELİ",
                    "ilce_key" => "1731",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "628",
                    "ilce_title" => "ZARA",
                    "ilce_key" => "1738",
                    "ilce_sehirkey" => "58"
                ],
                [
                    "ilce_id" => "629",
                    "ilce_title" => "ÇERKEZKÖY",
                    "ilce_key" => "1250",
                    "ilce_sehirkey" => "59"
                ],
                [
                    "ilce_id" => "630",
                    "ilce_title" => "ÇORLU",
                    "ilce_key" => "1258",
                    "ilce_sehirkey" => "59"
                ],
                [
                    "ilce_id" => "631",
                    "ilce_title" => "ERGENE",
                    "ilce_key" => "2094",
                    "ilce_sehirkey" => "59"
                ],
                [
                    "ilce_id" => "632",
                    "ilce_title" => "HAYRABOLU",
                    "ilce_key" => "1388",
                    "ilce_sehirkey" => "59"
                ],
                [
                    "ilce_id" => "633",
                    "ilce_title" => "KAPAKLI",
                    "ilce_key" => "2095",
                    "ilce_sehirkey" => "59"
                ],
                [
                    "ilce_id" => "634",
                    "ilce_title" => "MALKARA",
                    "ilce_key" => "1511",
                    "ilce_sehirkey" => "59"
                ],
                [
                    "ilce_id" => "635",
                    "ilce_title" => "MARMARAEREĞLİSİ",
                    "ilce_key" => "1825",
                    "ilce_sehirkey" => "59"
                ],
                [
                    "ilce_id" => "636",
                    "ilce_title" => "MURATLI",
                    "ilce_key" => "1538",
                    "ilce_sehirkey" => "59"
                ],
                [
                    "ilce_id" => "637",
                    "ilce_title" => "SARAY",
                    "ilce_key" => "1596",
                    "ilce_sehirkey" => "59"
                ],
                [
                    "ilce_id" => "638",
                    "ilce_title" => "SÜLEYMANPAŞA",
                    "ilce_key" => "2096",
                    "ilce_sehirkey" => "59"
                ],
                [
                    "ilce_id" => "639",
                    "ilce_title" => "ŞARKÖY",
                    "ilce_key" => "1652",
                    "ilce_sehirkey" => "59"
                ],
                [
                    "ilce_id" => "640",
                    "ilce_title" => "ALMUS",
                    "ilce_key" => "1129",
                    "ilce_sehirkey" => "60"
                ],
                [
                    "ilce_id" => "641",
                    "ilce_title" => "ARTOVA",
                    "ilce_key" => "1151",
                    "ilce_sehirkey" => "60"
                ],
                [
                    "ilce_id" => "642",
                    "ilce_title" => "BAŞÇİFTLİK",
                    "ilce_key" => "1883",
                    "ilce_sehirkey" => "60"
                ],
                [
                    "ilce_id" => "643",
                    "ilce_title" => "ERBAA",
                    "ilce_key" => "1308",
                    "ilce_sehirkey" => "60"
                ],
                [
                    "ilce_id" => "644",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1679",
                    "ilce_sehirkey" => "60"
                ],
                [
                    "ilce_id" => "645",
                    "ilce_title" => "NİKSAR",
                    "ilce_key" => "1545",
                    "ilce_sehirkey" => "60"
                ],
                [
                    "ilce_id" => "646",
                    "ilce_title" => "PAZAR",
                    "ilce_key" => "1834",
                    "ilce_sehirkey" => "60"
                ],
                [
                    "ilce_id" => "647",
                    "ilce_title" => "REŞADİYE",
                    "ilce_key" => "1584",
                    "ilce_sehirkey" => "60"
                ],
                [
                    "ilce_id" => "648",
                    "ilce_title" => "SULUSARAY",
                    "ilce_key" => "1987",
                    "ilce_sehirkey" => "60"
                ],
                [
                    "ilce_id" => "649",
                    "ilce_title" => "TURHAL",
                    "ilce_key" => "1690",
                    "ilce_sehirkey" => "60"
                ],
                [
                    "ilce_id" => "650",
                    "ilce_title" => "YEŞİLYURT",
                    "ilce_key" => "1858",
                    "ilce_sehirkey" => "60"
                ],
                [
                    "ilce_id" => "651",
                    "ilce_title" => "ZİLE",
                    "ilce_key" => "1740",
                    "ilce_sehirkey" => "60"
                ],
                [
                    "ilce_id" => "652",
                    "ilce_title" => "AKÇAABAT",
                    "ilce_key" => "1113",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "653",
                    "ilce_title" => "ARAKLI",
                    "ilce_key" => "1141",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "654",
                    "ilce_title" => "ARSİN",
                    "ilce_key" => "1150",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "655",
                    "ilce_title" => "BEŞİKDÜZÜ",
                    "ilce_key" => "1775",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "656",
                    "ilce_title" => "ÇARŞIBAŞI",
                    "ilce_key" => "1896",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "657",
                    "ilce_title" => "ÇAYKARA",
                    "ilce_key" => "1244",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "658",
                    "ilce_title" => "DERNEKPAZARI",
                    "ilce_key" => "1909",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "659",
                    "ilce_title" => "DÜZKÖY",
                    "ilce_key" => "1917",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "660",
                    "ilce_title" => "HAYRAT",
                    "ilce_key" => "1942",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "661",
                    "ilce_title" => "KÖPRÜBAŞI",
                    "ilce_key" => "1966",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "662",
                    "ilce_title" => "MAÇKA",
                    "ilce_key" => "1507",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "663",
                    "ilce_title" => "OF",
                    "ilce_key" => "1548",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "664",
                    "ilce_title" => "ORTAHİSAR",
                    "ilce_key" => "2097",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "665",
                    "ilce_title" => "SÜRMENE",
                    "ilce_key" => "1647",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "666",
                    "ilce_title" => "ŞALPAZARI",
                    "ilce_key" => "1842",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "667",
                    "ilce_title" => "TONYA",
                    "ilce_key" => "1681",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "668",
                    "ilce_title" => "VAKFIKEBİR",
                    "ilce_key" => "1709",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "669",
                    "ilce_title" => "YOMRA",
                    "ilce_key" => "1732",
                    "ilce_sehirkey" => "61"
                ],
                [
                    "ilce_id" => "670",
                    "ilce_title" => "ÇEMİŞGEZEK",
                    "ilce_key" => "1247",
                    "ilce_sehirkey" => "62"
                ],
                [
                    "ilce_id" => "671",
                    "ilce_title" => "HOZAT",
                    "ilce_key" => "1397",
                    "ilce_sehirkey" => "62"
                ],
                [
                    "ilce_id" => "672",
                    "ilce_title" => "MAZGİRT",
                    "ilce_key" => "1518",
                    "ilce_sehirkey" => "62"
                ],
                [
                    "ilce_id" => "673",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1688",
                    "ilce_sehirkey" => "62"
                ],
                [
                    "ilce_id" => "674",
                    "ilce_title" => "NAZIMİYE",
                    "ilce_key" => "1541",
                    "ilce_sehirkey" => "62"
                ],
                [
                    "ilce_id" => "675",
                    "ilce_title" => "OVACIK",
                    "ilce_key" => "1562",
                    "ilce_sehirkey" => "62"
                ],
                [
                    "ilce_id" => "676",
                    "ilce_title" => "PERTEK",
                    "ilce_key" => "1574",
                    "ilce_sehirkey" => "62"
                ],
                [
                    "ilce_id" => "677",
                    "ilce_title" => "PÜLÜMÜR",
                    "ilce_key" => "1581",
                    "ilce_sehirkey" => "62"
                ],
                [
                    "ilce_id" => "678",
                    "ilce_title" => "AKÇAKALE",
                    "ilce_key" => "1115",
                    "ilce_sehirkey" => "63"
                ],
                [
                    "ilce_id" => "679",
                    "ilce_title" => "BİRECİK",
                    "ilce_key" => "1194",
                    "ilce_sehirkey" => "63"
                ],
                [
                    "ilce_id" => "680",
                    "ilce_title" => "BOZOVA",
                    "ilce_key" => "1209",
                    "ilce_sehirkey" => "63"
                ],
                [
                    "ilce_id" => "681",
                    "ilce_title" => "CEYLANPINAR",
                    "ilce_key" => "1220",
                    "ilce_sehirkey" => "63"
                ],
                [
                    "ilce_id" => "682",
                    "ilce_title" => "EYYÜBİYE",
                    "ilce_key" => "2091",
                    "ilce_sehirkey" => "63"
                ],
                [
                    "ilce_id" => "683",
                    "ilce_title" => "HALFETİ",
                    "ilce_key" => "1378",
                    "ilce_sehirkey" => "63"
                ],
                [
                    "ilce_id" => "684",
                    "ilce_title" => "HALİLİYE",
                    "ilce_key" => "2092",
                    "ilce_sehirkey" => "63"
                ],
                [
                    "ilce_id" => "685",
                    "ilce_title" => "HARRAN",
                    "ilce_key" => "1800",
                    "ilce_sehirkey" => "63"
                ],
                [
                    "ilce_id" => "686",
                    "ilce_title" => "HİLVAN",
                    "ilce_key" => "1393",
                    "ilce_sehirkey" => "63"
                ],
                [
                    "ilce_id" => "687",
                    "ilce_title" => "KARAKÖPRÜ",
                    "ilce_key" => "2093",
                    "ilce_sehirkey" => "63"
                ],
                [
                    "ilce_id" => "688",
                    "ilce_title" => "SİVEREK",
                    "ilce_key" => "1630",
                    "ilce_sehirkey" => "63"
                ],
                [
                    "ilce_id" => "689",
                    "ilce_title" => "SURUÇ",
                    "ilce_key" => "1643",
                    "ilce_sehirkey" => "63"
                ],
                [
                    "ilce_id" => "690",
                    "ilce_title" => "VİRANŞEHİR",
                    "ilce_key" => "1713",
                    "ilce_sehirkey" => "63"
                ],
                [
                    "ilce_id" => "691",
                    "ilce_title" => "BANAZ",
                    "ilce_key" => "1170",
                    "ilce_sehirkey" => "64"
                ],
                [
                    "ilce_id" => "692",
                    "ilce_title" => "EŞME",
                    "ilce_key" => "1323",
                    "ilce_sehirkey" => "64"
                ],
                [
                    "ilce_id" => "693",
                    "ilce_title" => "KARAHALLI",
                    "ilce_key" => "1436",
                    "ilce_sehirkey" => "64"
                ],
                [
                    "ilce_id" => "694",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1704",
                    "ilce_sehirkey" => "64"
                ],
                [
                    "ilce_id" => "695",
                    "ilce_title" => "SİVASLI",
                    "ilce_key" => "1629",
                    "ilce_sehirkey" => "64"
                ],
                [
                    "ilce_id" => "696",
                    "ilce_title" => "ULUBEY",
                    "ilce_key" => "1697",
                    "ilce_sehirkey" => "64"
                ],
                [
                    "ilce_id" => "697",
                    "ilce_title" => "BAHÇESARAY",
                    "ilce_key" => "1770",
                    "ilce_sehirkey" => "65"
                ],
                [
                    "ilce_id" => "698",
                    "ilce_title" => "BAŞKALE",
                    "ilce_key" => "1175",
                    "ilce_sehirkey" => "65"
                ],
                [
                    "ilce_id" => "699",
                    "ilce_title" => "ÇALDIRAN",
                    "ilce_key" => "1786",
                    "ilce_sehirkey" => "65"
                ],
                [
                    "ilce_id" => "700",
                    "ilce_title" => "ÇATAK",
                    "ilce_key" => "1236",
                    "ilce_sehirkey" => "65"
                ],
                [
                    "ilce_id" => "701",
                    "ilce_title" => "EDREMİT",
                    "ilce_key" => "1918",
                    "ilce_sehirkey" => "65"
                ],
                [
                    "ilce_id" => "702",
                    "ilce_title" => "ERCİŞ",
                    "ilce_key" => "1309",
                    "ilce_sehirkey" => "65"
                ],
                [
                    "ilce_id" => "703",
                    "ilce_title" => "GEVAŞ",
                    "ilce_key" => "1350",
                    "ilce_sehirkey" => "65"
                ],
                [
                    "ilce_id" => "704",
                    "ilce_title" => "GÜRPINAR",
                    "ilce_key" => "1372",
                    "ilce_sehirkey" => "65"
                ],
                [
                    "ilce_id" => "705",
                    "ilce_title" => "İPEKYOLU",
                    "ilce_key" => "2098",
                    "ilce_sehirkey" => "65"
                ],
                [
                    "ilce_id" => "706",
                    "ilce_title" => "MURADİYE",
                    "ilce_key" => "1533",
                    "ilce_sehirkey" => "65"
                ],
                [
                    "ilce_id" => "707",
                    "ilce_title" => "ÖZALP",
                    "ilce_key" => "1565",
                    "ilce_sehirkey" => "65"
                ],
                [
                    "ilce_id" => "708",
                    "ilce_title" => "SARAY",
                    "ilce_key" => "1980",
                    "ilce_sehirkey" => "65"
                ],
                [
                    "ilce_id" => "709",
                    "ilce_title" => "TUŞBA",
                    "ilce_key" => "2099",
                    "ilce_sehirkey" => "65"
                ],
                [
                    "ilce_id" => "710",
                    "ilce_title" => "ALTINOVA",
                    "ilce_key" => "2019",
                    "ilce_sehirkey" => "77"
                ],
                [
                    "ilce_id" => "711",
                    "ilce_title" => "ARMUTLU",
                    "ilce_key" => "2020",
                    "ilce_sehirkey" => "77"
                ],
                [
                    "ilce_id" => "712",
                    "ilce_title" => "ÇINARCIK",
                    "ilce_key" => "2021",
                    "ilce_sehirkey" => "77"
                ],
                [
                    "ilce_id" => "713",
                    "ilce_title" => "ÇİFTLİKKÖY",
                    "ilce_key" => "2022",
                    "ilce_sehirkey" => "77"
                ],
                [
                    "ilce_id" => "714",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1716",
                    "ilce_sehirkey" => "77"
                ],
                [
                    "ilce_id" => "715",
                    "ilce_title" => "TERMAL",
                    "ilce_key" => "2026",
                    "ilce_sehirkey" => "77"
                ],
                [
                    "ilce_id" => "716",
                    "ilce_title" => "AKDAĞMADENİ",
                    "ilce_key" => "1117",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "717",
                    "ilce_title" => "AYDINCIK",
                    "ilce_key" => "1877",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "718",
                    "ilce_title" => "BOĞAZLIYAN",
                    "ilce_key" => "1198",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "719",
                    "ilce_title" => "ÇANDIR",
                    "ilce_key" => "1895",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "720",
                    "ilce_title" => "ÇAYIRALAN",
                    "ilce_key" => "1242",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "721",
                    "ilce_title" => "ÇEKEREK",
                    "ilce_key" => "1245",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "722",
                    "ilce_title" => "KADIŞEHRİ",
                    "ilce_key" => "1952",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "723",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1733",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "724",
                    "ilce_title" => "SARAYKENT",
                    "ilce_key" => "1982",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "725",
                    "ilce_title" => "SARIKAYA",
                    "ilce_key" => "1602",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "726",
                    "ilce_title" => "SORGUN",
                    "ilce_key" => "1635",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "727",
                    "ilce_title" => "ŞEFAATLİ",
                    "ilce_key" => "1655",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "728",
                    "ilce_title" => "YENİFAKILI",
                    "ilce_key" => "1998",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "729",
                    "ilce_title" => "YERKÖY",
                    "ilce_key" => "1726",
                    "ilce_sehirkey" => "66"
                ],
                [
                    "ilce_id" => "730",
                    "ilce_title" => "ALAPLI",
                    "ilce_key" => "1758",
                    "ilce_sehirkey" => "67"
                ],
                [
                    "ilce_id" => "731",
                    "ilce_title" => "ÇAYCUMA",
                    "ilce_key" => "1240",
                    "ilce_sehirkey" => "67"
                ],
                [
                    "ilce_id" => "732",
                    "ilce_title" => "DEVREK",
                    "ilce_key" => "1276",
                    "ilce_sehirkey" => "67"
                ],
                [
                    "ilce_id" => "733",
                    "ilce_title" => "EREĞLİ",
                    "ilce_key" => "1313",
                    "ilce_sehirkey" => "67"
                ],
                [
                    "ilce_id" => "734",
                    "ilce_title" => "GÖKÇEBEY",
                    "ilce_key" => "1926",
                    "ilce_sehirkey" => "67"
                ],
                [
                    "ilce_id" => "735",
                    "ilce_title" => "KİLİMLİ",
                    "ilce_key" => "2100",
                    "ilce_sehirkey" => "67"
                ],
                [
                    "ilce_id" => "736",
                    "ilce_title" => "KOZLU",
                    "ilce_key" => "2101",
                    "ilce_sehirkey" => "67"
                ],
                [
                    "ilce_id" => "737",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1741",
                    "ilce_sehirkey" => "67"
                ],
                [
                    "ilce_id" => "738",
                    "ilce_title" => "AKÇAKOCA",
                    "ilce_key" => "1116",
                    "ilce_sehirkey" => "81"
                ],
                [
                    "ilce_id" => "739",
                    "ilce_title" => "CUMAYERİ",
                    "ilce_key" => "1784",
                    "ilce_sehirkey" => "81"
                ],
                [
                    "ilce_id" => "740",
                    "ilce_title" => "ÇİLİMLİ",
                    "ilce_key" => "1905",
                    "ilce_sehirkey" => "81"
                ],
                [
                    "ilce_id" => "741",
                    "ilce_title" => "GÖLYAKA",
                    "ilce_key" => "1794",
                    "ilce_sehirkey" => "81"
                ],
                [
                    "ilce_id" => "742",
                    "ilce_title" => "GÜMÜŞOVA",
                    "ilce_key" => "2017",
                    "ilce_sehirkey" => "81"
                ],
                [
                    "ilce_id" => "743",
                    "ilce_title" => "KAYNAŞLI",
                    "ilce_key" => "2031",
                    "ilce_sehirkey" => "81"
                ],
                [
                    "ilce_id" => "744",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1292",
                    "ilce_sehirkey" => "81"
                ],
                [
                    "ilce_id" => "745",
                    "ilce_title" => "YIĞILCA",
                    "ilce_key" => "1730",
                    "ilce_sehirkey" => "81"
                ],
                [
                    "ilce_id" => "746",
                    "ilce_title" => "ENEZ",
                    "ilce_key" => "1307",
                    "ilce_sehirkey" => "22"
                ],
                [
                    "ilce_id" => "747",
                    "ilce_title" => "HAVSA",
                    "ilce_key" => "1385",
                    "ilce_sehirkey" => "22"
                ],
                [
                    "ilce_id" => "748",
                    "ilce_title" => "İPSALA",
                    "ilce_key" => "1412",
                    "ilce_sehirkey" => "22"
                ],
                [
                    "ilce_id" => "749",
                    "ilce_title" => "KEŞAN",
                    "ilce_key" => "1464",
                    "ilce_sehirkey" => "22"
                ],
                [
                    "ilce_id" => "750",
                    "ilce_title" => "LALAPAŞA",
                    "ilce_key" => "1502",
                    "ilce_sehirkey" => "22"
                ],
                [
                    "ilce_id" => "751",
                    "ilce_title" => "MERİÇ",
                    "ilce_key" => "1523",
                    "ilce_sehirkey" => "22"
                ],
                [
                    "ilce_id" => "752",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1295",
                    "ilce_sehirkey" => "22"
                ],
                [
                    "ilce_id" => "753",
                    "ilce_title" => "SÜLOĞLU",
                    "ilce_key" => "1988",
                    "ilce_sehirkey" => "22"
                ],
                [
                    "ilce_id" => "754",
                    "ilce_title" => "UZUNKÖPRÜ",
                    "ilce_key" => "1705",
                    "ilce_sehirkey" => "22"
                ],
                [
                    "ilce_id" => "755",
                    "ilce_title" => "AĞIN",
                    "ilce_key" => "1110",
                    "ilce_sehirkey" => "23"
                ],
                [
                    "ilce_id" => "756",
                    "ilce_title" => "ALACAKAYA",
                    "ilce_key" => "1873",
                    "ilce_sehirkey" => "23"
                ],
                [
                    "ilce_id" => "757",
                    "ilce_title" => "ARICAK",
                    "ilce_key" => "1762",
                    "ilce_sehirkey" => "23"
                ],
                [
                    "ilce_id" => "758",
                    "ilce_title" => "BASKİL",
                    "ilce_key" => "1173",
                    "ilce_sehirkey" => "23"
                ],
                [
                    "ilce_id" => "759",
                    "ilce_title" => "KARAKOÇAN",
                    "ilce_key" => "1438",
                    "ilce_sehirkey" => "23"
                ],
                [
                    "ilce_id" => "760",
                    "ilce_title" => "KEBAN",
                    "ilce_key" => "1455",
                    "ilce_sehirkey" => "23"
                ],
                [
                    "ilce_id" => "761",
                    "ilce_title" => "KOVANCILAR",
                    "ilce_key" => "1820",
                    "ilce_sehirkey" => "23"
                ],
                [
                    "ilce_id" => "762",
                    "ilce_title" => "MADEN",
                    "ilce_key" => "1506",
                    "ilce_sehirkey" => "23"
                ],
                [
                    "ilce_id" => "763",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1298",
                    "ilce_sehirkey" => "23"
                ],
                [
                    "ilce_id" => "764",
                    "ilce_title" => "PALU",
                    "ilce_key" => "1566",
                    "ilce_sehirkey" => "23"
                ],
                [
                    "ilce_id" => "765",
                    "ilce_title" => "SİVRİCE",
                    "ilce_key" => "1631",
                    "ilce_sehirkey" => "23"
                ],
                [
                    "ilce_id" => "766",
                    "ilce_title" => "ÇAYIRLI",
                    "ilce_key" => "1243",
                    "ilce_sehirkey" => "24"
                ],
                [
                    "ilce_id" => "767",
                    "ilce_title" => "İLİÇ",
                    "ilce_key" => "1406",
                    "ilce_sehirkey" => "24"
                ],
                [
                    "ilce_id" => "768",
                    "ilce_title" => "KEMAH",
                    "ilce_key" => "1459",
                    "ilce_sehirkey" => "24"
                ],
                [
                    "ilce_id" => "769",
                    "ilce_title" => "KEMALİYE",
                    "ilce_key" => "1460",
                    "ilce_sehirkey" => "24"
                ],
                [
                    "ilce_id" => "770",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1318",
                    "ilce_sehirkey" => "24"
                ],
                [
                    "ilce_id" => "771",
                    "ilce_title" => "OTLUKBELİ",
                    "ilce_key" => "1977",
                    "ilce_sehirkey" => "24"
                ],
                [
                    "ilce_id" => "772",
                    "ilce_title" => "REFAHİYE",
                    "ilce_key" => "1583",
                    "ilce_sehirkey" => "24"
                ],
                [
                    "ilce_id" => "773",
                    "ilce_title" => "TERCAN",
                    "ilce_key" => "1675",
                    "ilce_sehirkey" => "24"
                ],
                [
                    "ilce_id" => "774",
                    "ilce_title" => "ÜZÜMLÜ",
                    "ilce_key" => "1853",
                    "ilce_sehirkey" => "24"
                ],
                [
                    "ilce_id" => "775",
                    "ilce_title" => "AŞKALE",
                    "ilce_key" => "1153",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "776",
                    "ilce_title" => "AZİZİYE",
                    "ilce_key" => "1945",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "777",
                    "ilce_title" => "ÇAT",
                    "ilce_key" => "1235",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "778",
                    "ilce_title" => "HINIS",
                    "ilce_key" => "1392",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "779",
                    "ilce_title" => "HORASAN",
                    "ilce_key" => "1396",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "780",
                    "ilce_title" => "İSPİR",
                    "ilce_key" => "1416",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "781",
                    "ilce_title" => "KARAÇOBAN",
                    "ilce_key" => "1812",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "782",
                    "ilce_title" => "KARAYAZI",
                    "ilce_key" => "1444",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "783",
                    "ilce_title" => "KÖPRÜKÖY",
                    "ilce_key" => "1967",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "784",
                    "ilce_title" => "NARMAN",
                    "ilce_key" => "1540",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "785",
                    "ilce_title" => "OLTU",
                    "ilce_key" => "1550",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "786",
                    "ilce_title" => "OLUR",
                    "ilce_key" => "1551",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "787",
                    "ilce_title" => "PALANDÖKEN",
                    "ilce_key" => "2044",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "788",
                    "ilce_title" => "PASİNLER",
                    "ilce_key" => "1567",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "789",
                    "ilce_title" => "PAZARYOLU",
                    "ilce_key" => "1865",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "790",
                    "ilce_title" => "ŞENKAYA",
                    "ilce_key" => "1657",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "791",
                    "ilce_title" => "TEKMAN",
                    "ilce_key" => "1674",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "792",
                    "ilce_title" => "TORTUM",
                    "ilce_key" => "1683",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "793",
                    "ilce_title" => "UZUNDERE",
                    "ilce_key" => "1851",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "794",
                    "ilce_title" => "YAKUTİYE",
                    "ilce_key" => "2045",
                    "ilce_sehirkey" => "25"
                ],
                [
                    "ilce_id" => "795",
                    "ilce_title" => "ALPU",
                    "ilce_key" => "1759",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "796",
                    "ilce_title" => "BEYLİKOVA",
                    "ilce_key" => "1777",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "797",
                    "ilce_title" => "ÇİFTELER",
                    "ilce_key" => "1255",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "798",
                    "ilce_title" => "GÜNYÜZÜ",
                    "ilce_key" => "1934",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "799",
                    "ilce_title" => "HAN",
                    "ilce_key" => "1939",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "800",
                    "ilce_title" => "İNÖNÜ",
                    "ilce_key" => "1808",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "801",
                    "ilce_title" => "MAHMUDİYE",
                    "ilce_key" => "1508",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "802",
                    "ilce_title" => "MİHALGAZİ",
                    "ilce_key" => "1973",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "803",
                    "ilce_title" => "MİHALIÇÇIK",
                    "ilce_key" => "1527",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "804",
                    "ilce_title" => "ODUNPAZARI",
                    "ilce_key" => "2046",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "805",
                    "ilce_title" => "SARICAKAYA",
                    "ilce_key" => "1599",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "806",
                    "ilce_title" => "SEYİTGAZİ",
                    "ilce_key" => "1618",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "807",
                    "ilce_title" => "SİVRİHİSAR",
                    "ilce_key" => "1632",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "808",
                    "ilce_title" => "TEPEBAŞI",
                    "ilce_key" => "2047",
                    "ilce_sehirkey" => "26"
                ],
                [
                    "ilce_id" => "809",
                    "ilce_title" => "ARABAN",
                    "ilce_key" => "1139",
                    "ilce_sehirkey" => "27"
                ],
                [
                    "ilce_id" => "810",
                    "ilce_title" => "İSLAHİYE",
                    "ilce_key" => "1415",
                    "ilce_sehirkey" => "27"
                ],
                [
                    "ilce_id" => "811",
                    "ilce_title" => "KARKAMIŞ",
                    "ilce_key" => "1956",
                    "ilce_sehirkey" => "27"
                ],
                [
                    "ilce_id" => "812",
                    "ilce_title" => "NİZİP",
                    "ilce_key" => "1546",
                    "ilce_sehirkey" => "27"
                ],
                [
                    "ilce_id" => "813",
                    "ilce_title" => "NURDAĞI",
                    "ilce_key" => "1974",
                    "ilce_sehirkey" => "27"
                ],
                [
                    "ilce_id" => "814",
                    "ilce_title" => "OĞUZELİ",
                    "ilce_key" => "1549",
                    "ilce_sehirkey" => "27"
                ],
                [
                    "ilce_id" => "815",
                    "ilce_title" => "ŞAHİNBEY",
                    "ilce_key" => "1841",
                    "ilce_sehirkey" => "27"
                ],
                [
                    "ilce_id" => "816",
                    "ilce_title" => "ŞEHİTKAMİL",
                    "ilce_key" => "1844",
                    "ilce_sehirkey" => "27"
                ],
                [
                    "ilce_id" => "817",
                    "ilce_title" => "YAVUZELİ",
                    "ilce_key" => "1720",
                    "ilce_sehirkey" => "27"
                ],
                [
                    "ilce_id" => "818",
                    "ilce_title" => "ALUCRA",
                    "ilce_key" => "1133",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "819",
                    "ilce_title" => "BULANCAK",
                    "ilce_key" => "1212",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "820",
                    "ilce_title" => "ÇAMOLUK",
                    "ilce_key" => "1893",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "821",
                    "ilce_title" => "ÇANAKÇI",
                    "ilce_key" => "1894",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "822",
                    "ilce_title" => "DERELİ",
                    "ilce_key" => "1272",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "823",
                    "ilce_title" => "DOĞANKENT",
                    "ilce_key" => "1912",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "824",
                    "ilce_title" => "ESPİYE",
                    "ilce_key" => "1320",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "825",
                    "ilce_title" => "EYNESİL",
                    "ilce_key" => "1324",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "826",
                    "ilce_title" => "GÖRELE",
                    "ilce_key" => "1361",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "827",
                    "ilce_title" => "GÜCE",
                    "ilce_key" => "1930",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "828",
                    "ilce_title" => "KEŞAP",
                    "ilce_key" => "1465",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "829",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1352",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "830",
                    "ilce_title" => "PİRAZİZ",
                    "ilce_key" => "1837",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "831",
                    "ilce_title" => "ŞEBİNKARAHİSAR",
                    "ilce_key" => "1654",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "832",
                    "ilce_title" => "TİREBOLU",
                    "ilce_key" => "1678",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "833",
                    "ilce_title" => "YAĞLIDERE",
                    "ilce_key" => "1854",
                    "ilce_sehirkey" => "28"
                ],
                [
                    "ilce_id" => "834",
                    "ilce_title" => "KELKİT",
                    "ilce_key" => "1458",
                    "ilce_sehirkey" => "29"
                ],
                [
                    "ilce_id" => "835",
                    "ilce_title" => "KÖSE",
                    "ilce_key" => "1822",
                    "ilce_sehirkey" => "29"
                ],
                [
                    "ilce_id" => "836",
                    "ilce_title" => "KÜRTÜN",
                    "ilce_key" => "1971",
                    "ilce_sehirkey" => "29"
                ],
                [
                    "ilce_id" => "837",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1369",
                    "ilce_sehirkey" => "29"
                ],
                [
                    "ilce_id" => "838",
                    "ilce_title" => "ŞİRAN",
                    "ilce_key" => "1660",
                    "ilce_sehirkey" => "29"
                ],
                [
                    "ilce_id" => "839",
                    "ilce_title" => "TORUL",
                    "ilce_key" => "1684",
                    "ilce_sehirkey" => "29"
                ],
                [
                    "ilce_id" => "840",
                    "ilce_title" => "ÇUKURCA",
                    "ilce_key" => "1261",
                    "ilce_sehirkey" => "30"
                ],
                [
                    "ilce_id" => "841",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1377",
                    "ilce_sehirkey" => "30"
                ],
                [
                    "ilce_id" => "842",
                    "ilce_title" => "ŞEMDİNLİ",
                    "ilce_key" => "1656",
                    "ilce_sehirkey" => "30"
                ],
                [
                    "ilce_id" => "843",
                    "ilce_title" => "YÜKSEKOVA",
                    "ilce_key" => "1737",
                    "ilce_sehirkey" => "30"
                ],
                [
                    "ilce_id" => "844",
                    "ilce_title" => "ALTINÖZÜ",
                    "ilce_key" => "1131",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "845",
                    "ilce_title" => "ANTAKYA",
                    "ilce_key" => "2080",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "846",
                    "ilce_title" => "ARSUZ",
                    "ilce_key" => "2081",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "847",
                    "ilce_title" => "BELEN",
                    "ilce_key" => "1887",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "848",
                    "ilce_title" => "DEFNE",
                    "ilce_key" => "2082",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "849",
                    "ilce_title" => "DÖRTYOL",
                    "ilce_key" => "1289",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "850",
                    "ilce_title" => "ERZİN",
                    "ilce_key" => "1792",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "851",
                    "ilce_title" => "HASSA",
                    "ilce_key" => "1382",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "852",
                    "ilce_title" => "İSKENDERUN",
                    "ilce_key" => "1413",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "853",
                    "ilce_title" => "KIRIKHAN",
                    "ilce_key" => "1468",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "854",
                    "ilce_title" => "KUMLU",
                    "ilce_key" => "1970",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "855",
                    "ilce_title" => "PAYAS",
                    "ilce_key" => "2083",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "856",
                    "ilce_title" => "REYHANLI",
                    "ilce_key" => "1585",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "857",
                    "ilce_title" => "SAMANDAĞ",
                    "ilce_key" => "1591",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "858",
                    "ilce_title" => "YAYLADAĞI",
                    "ilce_key" => "1721",
                    "ilce_sehirkey" => "31"
                ],
                [
                    "ilce_id" => "859",
                    "ilce_title" => "ARALIK",
                    "ilce_key" => "1142",
                    "ilce_sehirkey" => "76"
                ],
                [
                    "ilce_id" => "860",
                    "ilce_title" => "KARAKOYUNLU",
                    "ilce_key" => "2011",
                    "ilce_sehirkey" => "76"
                ],
                [
                    "ilce_id" => "861",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1398",
                    "ilce_sehirkey" => "76"
                ],
                [
                    "ilce_id" => "862",
                    "ilce_title" => "TUZLUCA",
                    "ilce_key" => "1692",
                    "ilce_sehirkey" => "76"
                ],
                [
                    "ilce_id" => "863",
                    "ilce_title" => "AKSU",
                    "ilce_key" => "1755",
                    "ilce_sehirkey" => "32"
                ],
                [
                    "ilce_id" => "864",
                    "ilce_title" => "ATABEY",
                    "ilce_key" => "1154",
                    "ilce_sehirkey" => "32"
                ],
                [
                    "ilce_id" => "865",
                    "ilce_title" => "EĞİRDİR",
                    "ilce_key" => "1297",
                    "ilce_sehirkey" => "32"
                ],
                [
                    "ilce_id" => "866",
                    "ilce_title" => "GELENDOST",
                    "ilce_key" => "1341",
                    "ilce_sehirkey" => "32"
                ],
                [
                    "ilce_id" => "867",
                    "ilce_title" => "GÖNEN",
                    "ilce_key" => "1929",
                    "ilce_sehirkey" => "32"
                ],
                [
                    "ilce_id" => "868",
                    "ilce_title" => "KEÇİBORLU",
                    "ilce_key" => "1456",
                    "ilce_sehirkey" => "32"
                ],
                [
                    "ilce_id" => "869",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1401",
                    "ilce_sehirkey" => "32"
                ],
                [
                    "ilce_id" => "870",
                    "ilce_title" => "SENİRKENT",
                    "ilce_key" => "1615",
                    "ilce_sehirkey" => "32"
                ],
                [
                    "ilce_id" => "871",
                    "ilce_title" => "SÜTÇÜLER",
                    "ilce_key" => "1648",
                    "ilce_sehirkey" => "32"
                ],
                [
                    "ilce_id" => "872",
                    "ilce_title" => "ŞARKİKARAAĞAÇ",
                    "ilce_key" => "1651",
                    "ilce_sehirkey" => "32"
                ],
                [
                    "ilce_id" => "873",
                    "ilce_title" => "ULUBORLU",
                    "ilce_key" => "1699",
                    "ilce_sehirkey" => "32"
                ],
                [
                    "ilce_id" => "874",
                    "ilce_title" => "YALVAÇ",
                    "ilce_key" => "1717",
                    "ilce_sehirkey" => "32"
                ],
                [
                    "ilce_id" => "875",
                    "ilce_title" => "YENİŞARBADEMLİ",
                    "ilce_key" => "2001",
                    "ilce_sehirkey" => "32"
                ],
                [
                    "ilce_id" => "876",
                    "ilce_title" => "AFŞİN",
                    "ilce_key" => "1107",
                    "ilce_sehirkey" => "46"
                ],
                [
                    "ilce_id" => "877",
                    "ilce_title" => "ANDIRIN",
                    "ilce_key" => "1136",
                    "ilce_sehirkey" => "46"
                ],
                [
                    "ilce_id" => "878",
                    "ilce_title" => "ÇAĞLAYANCERİT",
                    "ilce_key" => "1785",
                    "ilce_sehirkey" => "46"
                ],
                [
                    "ilce_id" => "879",
                    "ilce_title" => "DULKADİROĞLU",
                    "ilce_key" => "2084",
                    "ilce_sehirkey" => "46"
                ],
                [
                    "ilce_id" => "880",
                    "ilce_title" => "EKİNÖZÜ",
                    "ilce_key" => "1919",
                    "ilce_sehirkey" => "46"
                ],
                [
                    "ilce_id" => "881",
                    "ilce_title" => "ELBİSTAN",
                    "ilce_key" => "1299",
                    "ilce_sehirkey" => "46"
                ],
                [
                    "ilce_id" => "882",
                    "ilce_title" => "GÖKSUN",
                    "ilce_key" => "1353",
                    "ilce_sehirkey" => "46"
                ],
                [
                    "ilce_id" => "883",
                    "ilce_title" => "NURHAK",
                    "ilce_key" => "1975",
                    "ilce_sehirkey" => "46"
                ],
                [
                    "ilce_id" => "884",
                    "ilce_title" => "ONİKİŞUBAT",
                    "ilce_key" => "2085",
                    "ilce_sehirkey" => "46"
                ],
                [
                    "ilce_id" => "885",
                    "ilce_title" => "PAZARCIK",
                    "ilce_key" => "1570",
                    "ilce_sehirkey" => "46"
                ],
                [
                    "ilce_id" => "886",
                    "ilce_title" => "TÜRKOĞLU",
                    "ilce_key" => "1694",
                    "ilce_sehirkey" => "46"
                ],
                [
                    "ilce_id" => "887",
                    "ilce_title" => "EFLANİ",
                    "ilce_key" => "1296",
                    "ilce_sehirkey" => "78"
                ],
                [
                    "ilce_id" => "888",
                    "ilce_title" => "ESKİPAZAR",
                    "ilce_key" => "1321",
                    "ilce_sehirkey" => "78"
                ],
                [
                    "ilce_id" => "889",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1433",
                    "ilce_sehirkey" => "78"
                ],
                [
                    "ilce_id" => "890",
                    "ilce_title" => "OVACIK",
                    "ilce_key" => "1561",
                    "ilce_sehirkey" => "78"
                ],
                [
                    "ilce_id" => "891",
                    "ilce_title" => "SAFRANBOLU",
                    "ilce_key" => "1587",
                    "ilce_sehirkey" => "78"
                ],
                [
                    "ilce_id" => "892",
                    "ilce_title" => "YENİCE",
                    "ilce_key" => "1856",
                    "ilce_sehirkey" => "78"
                ],
                [
                    "ilce_id" => "893",
                    "ilce_title" => "AYRANCI",
                    "ilce_key" => "1768",
                    "ilce_sehirkey" => "70"
                ],
                [
                    "ilce_id" => "894",
                    "ilce_title" => "BAŞYAYLA",
                    "ilce_key" => "1884",
                    "ilce_sehirkey" => "70"
                ],
                [
                    "ilce_id" => "895",
                    "ilce_title" => "ERMENEK",
                    "ilce_key" => "1316",
                    "ilce_sehirkey" => "70"
                ],
                [
                    "ilce_id" => "896",
                    "ilce_title" => "KAZIMKARABEKİR",
                    "ilce_key" => "1862",
                    "ilce_sehirkey" => "70"
                ],
                [
                    "ilce_id" => "897",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1439",
                    "ilce_sehirkey" => "70"
                ],
                [
                    "ilce_id" => "898",
                    "ilce_title" => "SARIVELİLER",
                    "ilce_key" => "1983",
                    "ilce_sehirkey" => "70"
                ],
                [
                    "ilce_id" => "899",
                    "ilce_title" => "AKYAKA",
                    "ilce_key" => "1756",
                    "ilce_sehirkey" => "36"
                ],
                [
                    "ilce_id" => "900",
                    "ilce_title" => "ARPAÇAY",
                    "ilce_key" => "1149",
                    "ilce_sehirkey" => "36"
                ],
                [
                    "ilce_id" => "901",
                    "ilce_title" => "DİGOR",
                    "ilce_key" => "1279",
                    "ilce_sehirkey" => "36"
                ],
                [
                    "ilce_id" => "902",
                    "ilce_title" => "KAĞIZMAN",
                    "ilce_key" => "1424",
                    "ilce_sehirkey" => "36"
                ],
                [
                    "ilce_id" => "903",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1447",
                    "ilce_sehirkey" => "36"
                ],
                [
                    "ilce_id" => "904",
                    "ilce_title" => "SARIKAMIŞ",
                    "ilce_key" => "1601",
                    "ilce_sehirkey" => "36"
                ],
                [
                    "ilce_id" => "905",
                    "ilce_title" => "SELİM",
                    "ilce_key" => "1614",
                    "ilce_sehirkey" => "36"
                ],
                [
                    "ilce_id" => "906",
                    "ilce_title" => "SUSUZ",
                    "ilce_key" => "1645",
                    "ilce_sehirkey" => "36"
                ],
                [
                    "ilce_id" => "907",
                    "ilce_title" => "ABANA",
                    "ilce_key" => "1101",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "908",
                    "ilce_title" => "AĞLI",
                    "ilce_key" => "1867",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "909",
                    "ilce_title" => "ARAÇ",
                    "ilce_key" => "1140",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "910",
                    "ilce_title" => "AZDAVAY",
                    "ilce_key" => "1162",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "911",
                    "ilce_title" => "BOZKURT",
                    "ilce_key" => "1208",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "912",
                    "ilce_title" => "CİDE",
                    "ilce_key" => "1221",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "913",
                    "ilce_title" => "ÇATALZEYTİN",
                    "ilce_key" => "1238",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "914",
                    "ilce_title" => "DADAY",
                    "ilce_key" => "1264",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "915",
                    "ilce_title" => "DEVREKANİ",
                    "ilce_key" => "1277",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "916",
                    "ilce_title" => "DOĞANYURT",
                    "ilce_key" => "1915",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "917",
                    "ilce_title" => "HANÖNÜ",
                    "ilce_key" => "1940",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "918",
                    "ilce_title" => "İHSANGAZİ",
                    "ilce_key" => "1805",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "919",
                    "ilce_title" => "İNEBOLU",
                    "ilce_key" => "1410",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "920",
                    "ilce_title" => "KÜRE",
                    "ilce_key" => "1499",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "921",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1450",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "922",
                    "ilce_title" => "PINARBAŞI",
                    "ilce_key" => "1836",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "923",
                    "ilce_title" => "SEYDİLER",
                    "ilce_key" => "1984",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "924",
                    "ilce_title" => "ŞENPAZAR",
                    "ilce_key" => "1845",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "925",
                    "ilce_title" => "TAŞKÖPRÜ",
                    "ilce_key" => "1666",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "926",
                    "ilce_title" => "TOSYA",
                    "ilce_key" => "1685",
                    "ilce_sehirkey" => "37"
                ],
                [
                    "ilce_id" => "927",
                    "ilce_title" => "AKKIŞLA",
                    "ilce_key" => "1752",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "928",
                    "ilce_title" => "BÜNYAN",
                    "ilce_key" => "1218",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "929",
                    "ilce_title" => "DEVELİ",
                    "ilce_key" => "1275",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "930",
                    "ilce_title" => "FELAHİYE",
                    "ilce_key" => "1330",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "931",
                    "ilce_title" => "HACILAR",
                    "ilce_key" => "1936",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "932",
                    "ilce_title" => "İNCESU",
                    "ilce_key" => "1409",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "933",
                    "ilce_title" => "KOCASİNAN",
                    "ilce_key" => "1863",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "934",
                    "ilce_title" => "MELİKGAZİ",
                    "ilce_key" => "1864",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "935",
                    "ilce_title" => "ÖZVATAN",
                    "ilce_key" => "1978",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "936",
                    "ilce_title" => "PINARBAŞI",
                    "ilce_key" => "1576",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "937",
                    "ilce_title" => "SARIOĞLAN",
                    "ilce_key" => "1603",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "938",
                    "ilce_title" => "SARIZ",
                    "ilce_key" => "1605",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "939",
                    "ilce_title" => "TALAS",
                    "ilce_key" => "1846",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "940",
                    "ilce_title" => "TOMARZA",
                    "ilce_key" => "1680",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "941",
                    "ilce_title" => "YAHYALI",
                    "ilce_key" => "1715",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "942",
                    "ilce_title" => "YEŞİLHİSAR",
                    "ilce_key" => "1727",
                    "ilce_sehirkey" => "38"
                ],
                [
                    "ilce_id" => "943",
                    "ilce_title" => "ELBEYLİ",
                    "ilce_key" => "2023",
                    "ilce_sehirkey" => "79"
                ],
                [
                    "ilce_id" => "944",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1476",
                    "ilce_sehirkey" => "79"
                ],
                [
                    "ilce_id" => "945",
                    "ilce_title" => "MUSABEYLİ",
                    "ilce_key" => "2024",
                    "ilce_sehirkey" => "79"
                ],
                [
                    "ilce_id" => "946",
                    "ilce_title" => "POLATELİ",
                    "ilce_key" => "2025",
                    "ilce_sehirkey" => "79"
                ],
                [
                    "ilce_id" => "947",
                    "ilce_title" => "BAHŞİLİ",
                    "ilce_key" => "1880",
                    "ilce_sehirkey" => "71"
                ],
                [
                    "ilce_id" => "948",
                    "ilce_title" => "BALIŞEYH",
                    "ilce_key" => "1882",
                    "ilce_sehirkey" => "71"
                ],
                [
                    "ilce_id" => "949",
                    "ilce_title" => "ÇELEBİ",
                    "ilce_key" => "1901",
                    "ilce_sehirkey" => "71"
                ],
                [
                    "ilce_id" => "950",
                    "ilce_title" => "DELİCE",
                    "ilce_key" => "1268",
                    "ilce_sehirkey" => "71"
                ],
                [
                    "ilce_id" => "951",
                    "ilce_title" => "KARAKEÇİLİ",
                    "ilce_key" => "1954",
                    "ilce_sehirkey" => "71"
                ],
                [
                    "ilce_id" => "952",
                    "ilce_title" => "KESKİN",
                    "ilce_key" => "1463",
                    "ilce_sehirkey" => "71"
                ],
                [
                    "ilce_id" => "953",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1469",
                    "ilce_sehirkey" => "71"
                ],
                [
                    "ilce_id" => "954",
                    "ilce_title" => "SULAKYURT",
                    "ilce_key" => "1638",
                    "ilce_sehirkey" => "71"
                ],
                [
                    "ilce_id" => "955",
                    "ilce_title" => "YAHŞİHAN",
                    "ilce_key" => "1992",
                    "ilce_sehirkey" => "71"
                ],
                [
                    "ilce_id" => "956",
                    "ilce_title" => "BABAESKİ",
                    "ilce_key" => "1163",
                    "ilce_sehirkey" => "39"
                ],
                [
                    "ilce_id" => "957",
                    "ilce_title" => "DEMİRKÖY",
                    "ilce_key" => "1270",
                    "ilce_sehirkey" => "39"
                ],
                [
                    "ilce_id" => "958",
                    "ilce_title" => "KOFÇAZ",
                    "ilce_key" => "1480",
                    "ilce_sehirkey" => "39"
                ],
                [
                    "ilce_id" => "959",
                    "ilce_title" => "LÜLEBURGAZ",
                    "ilce_key" => "1505",
                    "ilce_sehirkey" => "39"
                ],
                [
                    "ilce_id" => "960",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1471",
                    "ilce_sehirkey" => "39"
                ],
                [
                    "ilce_id" => "961",
                    "ilce_title" => "PEHLİVANKÖY",
                    "ilce_key" => "1572",
                    "ilce_sehirkey" => "39"
                ],
                [
                    "ilce_id" => "962",
                    "ilce_title" => "PINARHİSAR",
                    "ilce_key" => "1577",
                    "ilce_sehirkey" => "39"
                ],
                [
                    "ilce_id" => "963",
                    "ilce_title" => "VİZE",
                    "ilce_key" => "1714",
                    "ilce_sehirkey" => "39"
                ],
                [
                    "ilce_id" => "964",
                    "ilce_title" => "AKÇAKENT",
                    "ilce_key" => "1869",
                    "ilce_sehirkey" => "40"
                ],
                [
                    "ilce_id" => "965",
                    "ilce_title" => "AKPINAR",
                    "ilce_key" => "1754",
                    "ilce_sehirkey" => "40"
                ],
                [
                    "ilce_id" => "966",
                    "ilce_title" => "BOZTEPE",
                    "ilce_key" => "1890",
                    "ilce_sehirkey" => "40"
                ],
                [
                    "ilce_id" => "967",
                    "ilce_title" => "ÇİÇEKDAĞI",
                    "ilce_key" => "1254",
                    "ilce_sehirkey" => "40"
                ],
                [
                    "ilce_id" => "968",
                    "ilce_title" => "KAMAN",
                    "ilce_key" => "1429",
                    "ilce_sehirkey" => "40"
                ],
                [
                    "ilce_id" => "969",
                    "ilce_title" => "MERKEZ",
                    "ilce_key" => "1472",
                    "ilce_sehirkey" => "40"
                ],
                [
                    "ilce_id" => "970",
                    "ilce_title" => "MUCUR",
                    "ilce_key" => "1529",
                    "ilce_sehirkey" => "40"
                ]
        ];

        $counties = [];
        foreach ($arr as $i) {
            $city = DB::table('def_cities')->find($i['ilce_sehirkey']);

            $counties[] = ['name' => $i['ilce_title'], 'city' => $city->id];
        }

        return $counties;
    }

}

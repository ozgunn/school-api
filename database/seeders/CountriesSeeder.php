<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('def_countries')->insert($this->getCountries());
    }

    protected function getCountries() {
        $country_list = array(
            array("name" => "Turkey","code" => "TR","phone_code" => 90,"region" => "Asia"),
            array("name" => "Afghanistan","code" => "AF","phone_code" => 93,"region" => "Asia"),
            array("name" => "Aland Islands","code" => "AX","phone_code" => 358,"region" => "Europe"),
            array("name" => "Albania","code" => "AL","phone_code" => 355,"region" => "Europe"),
            array("name" => "Algeria","code" => "DZ","phone_code" => 213,"region" => "Africa"),
            array("name" => "American Samoa","code" => "AS","phone_code" => 1684,"region" => "Oceania"),
            array("name" => "Andorra","code" => "AD","phone_code" => 376,"region" => "Europe"),
            array("name" => "Angola","code" => "AO","phone_code" => 244,"region" => "Africa"),
            array("name" => "Anguilla","code" => "AI","phone_code" => 1264,"region" => "North America"),
            array("name" => "Antarctica","code" => "AQ","phone_code" => 672,"region" => "Antarctica"),
            array("name" => "Antigua and Barbuda","code" => "AG","phone_code" => 1268,"region" => "North America"),
            array("name" => "Argentina","code" => "AR","phone_code" => 54,"region" => "South America"),
            array("name" => "Armenia","code" => "AM","phone_code" => 374,"region" => "Asia"),
            array("name" => "Aruba","code" => "AW","phone_code" => 297,"region" => "North America"),
            array("name" => "Australia","code" => "AU","phone_code" => 61,"region" => "Oceania"),
            array("name" => "Austria","code" => "AT","phone_code" => 43,"region" => "Europe"),
            array("name" => "Azerbaijan","code" => "AZ","phone_code" => 994,"region" => "Asia"),
            array("name" => "Bahamas","code" => "BS","phone_code" => 1242,"region" => "North America"),
            array("name" => "Bahrain","code" => "BH","phone_code" => 973,"region" => "Asia"),
            array("name" => "Bangladesh","code" => "BD","phone_code" => 880,"region" => "Asia"),
            array("name" => "Barbados","code" => "BB","phone_code" => 1246,"region" => "North America"),
            array("name" => "Belarus","code" => "BY","phone_code" => 375,"region" => "Europe"),
            array("name" => "Belgium","code" => "BE","phone_code" => 32,"region" => "Europe"),
            array("name" => "Belize","code" => "BZ","phone_code" => 501,"region" => "North America"),
            array("name" => "Benin","code" => "BJ","phone_code" => 229,"region" => "Africa"),
            array("name" => "Bermuda","code" => "BM","phone_code" => 1441,"region" => "North America"),
            array("name" => "Bhutan","code" => "BT","phone_code" => 975,"region" => "Asia"),
            array("name" => "Bolivia","code" => "BO","phone_code" => 591,"region" => "South America"),
            array("name" => "Bonaire, Sint Eustatius and Saba","code" => "BQ","phone_code" => 599,"region" => "North America"),
            array("name" => "Bosnia and Herzegovina","code" => "BA","phone_code" => 387,"region" => "Europe"),
            array("name" => "Botswana","code" => "BW","phone_code" => 267,"region" => "Africa"),
            array("name" => "Bouvet Island","code" => "BV","phone_code" => 55,"region" => "Antarctica"),
            array("name" => "Brazil","code" => "BR","phone_code" => 55,"region" => "South America"),
            array("name" => "British Indian Ocean Territory","code" => "IO","phone_code" => 246,"region" => "Asia"),
            array("name" => "Brunei Darussalam","code" => "BN","phone_code" => 673,"region" => "Asia"),
            array("name" => "Bulgaria","code" => "BG","phone_code" => 359,"region" => "Europe"),
            array("name" => "Burkina Faso","code" => "BF","phone_code" => 226,"region" => "Africa"),
            array("name" => "Burundi","code" => "BI","phone_code" => 257,"region" => "Africa"),
            array("name" => "Cambodia","code" => "KH","phone_code" => 855,"region" => "Asia"),
            array("name" => "Cameroon","code" => "CM","phone_code" => 237,"region" => "Africa"),
            array("name" => "Canada","code" => "CA","phone_code" => 1,"region" => "North America"),
            array("name" => "Cape Verde","code" => "CV","phone_code" => 238,"region" => "Africa"),
            array("name" => "Cayman Islands","code" => "KY","phone_code" => 1345,"region" => "North America"),
            array("name" => "Central African Republic","code" => "CF","phone_code" => 236,"region" => "Africa"),
            array("name" => "Chad","code" => "TD","phone_code" => 235,"region" => "Africa"),
            array("name" => "Chile","code" => "CL","phone_code" => 56,"region" => "South America"),
            array("name" => "China","code" => "CN","phone_code" => 86,"region" => "Asia"),
            array("name" => "Christmas Island","code" => "CX","phone_code" => 61,"region" => "Asia"),
            array("name" => "Cocos (Keeling) Islands","code" => "CC","phone_code" => 672,"region" => "Asia"),
            array("name" => "Colombia","code" => "CO","phone_code" => 57,"region" => "South America"),
            array("name" => "Comoros","code" => "KM","phone_code" => 269,"region" => "Africa"),
            array("name" => "Congo","code" => "CG","phone_code" => 242,"region" => "Africa"),
            array("name" => "Congo, Democratic Republic of the Congo","code" => "CD","phone_code" => 242,"region" => "Africa"),
            array("name" => "Cook Islands","code" => "CK","phone_code" => 682,"region" => "Oceania"),
            array("name" => "Costa Rica","code" => "CR","phone_code" => 506,"region" => "North America"),
            array("name" => "Cote D'Ivoire","code" => "CI","phone_code" => 225,"region" => "Africa"),
            array("name" => "Croatia","code" => "HR","phone_code" => 385,"region" => "Europe"),
            array("name" => "Cuba","code" => "CU","phone_code" => 53,"region" => "North America"),
            array("name" => "Curacao","code" => "CW","phone_code" => 599,"region" => "North America"),
            array("name" => "Cyprus","code" => "CY","phone_code" => 357,"region" => "Asia"),
            array("name" => "Czech Republic","code" => "CZ","phone_code" => 420,"region" => "Europe"),
            array("name" => "Denmark","code" => "DK","phone_code" => 45,"region" => "Europe"),
            array("name" => "Djibouti","code" => "DJ","phone_code" => 253,"region" => "Africa"),
            array("name" => "Dominica","code" => "DM","phone_code" => 1767,"region" => "North America"),
            array("name" => "Dominican Republic","code" => "DO","phone_code" => 1809,"region" => "North America"),
            array("name" => "Ecuador","code" => "EC","phone_code" => 593,"region" => "South America"),
            array("name" => "Egypt","code" => "EG","phone_code" => 20,"region" => "Africa"),
            array("name" => "El Salvador","code" => "SV","phone_code" => 503,"region" => "North America"),
            array("name" => "Equatorial Guinea","code" => "GQ","phone_code" => 240,"region" => "Africa"),
            array("name" => "Eritrea","code" => "ER","phone_code" => 291,"region" => "Africa"),
            array("name" => "Estonia","code" => "EE","phone_code" => 372,"region" => "Europe"),
            array("name" => "Ethiopia","code" => "ET","phone_code" => 251,"region" => "Africa"),
            array("name" => "Falkland Islands (Malvinas)","code" => "FK","phone_code" => 500,"region" => "South America"),
            array("name" => "Faroe Islands","code" => "FO","phone_code" => 298,"region" => "Europe"),
            array("name" => "Fiji","code" => "FJ","phone_code" => 679,"region" => "Oceania"),
            array("name" => "Finland","code" => "FI","phone_code" => 358,"region" => "Europe"),
            array("name" => "France","code" => "FR","phone_code" => 33,"region" => "Europe"),
            array("name" => "French Guiana","code" => "GF","phone_code" => 594,"region" => "South America"),
            array("name" => "French Polynesia","code" => "PF","phone_code" => 689,"region" => "Oceania"),
            array("name" => "French Southern Territories","code" => "TF","phone_code" => 262,"region" => "Antarctica"),
            array("name" => "Gabon","code" => "GA","phone_code" => 241,"region" => "Africa"),
            array("name" => "Gambia","code" => "GM","phone_code" => 220,"region" => "Africa"),
            array("name" => "Georgia","code" => "GE","phone_code" => 995,"region" => "Asia"),
            array("name" => "Germany","code" => "DE","phone_code" => 49,"region" => "Europe"),
            array("name" => "Ghana","code" => "GH","phone_code" => 233,"region" => "Africa"),
            array("name" => "Gibraltar","code" => "GI","phone_code" => 350,"region" => "Europe"),
            array("name" => "Greece","code" => "GR","phone_code" => 30,"region" => "Europe"),
            array("name" => "Greenland","code" => "GL","phone_code" => 299,"region" => "North America"),
            array("name" => "Grenada","code" => "GD","phone_code" => 1473,"region" => "North America"),
            array("name" => "Guadeloupe","code" => "GP","phone_code" => 590,"region" => "North America"),
            array("name" => "Guam","code" => "GU","phone_code" => 1671,"region" => "Oceania"),
            array("name" => "Guatemala","code" => "GT","phone_code" => 502,"region" => "North America"),
            array("name" => "Guernsey","code" => "GG","phone_code" => 44,"region" => "Europe"),
            array("name" => "Guinea","code" => "GN","phone_code" => 224,"region" => "Africa"),
            array("name" => "Guinea-Bissau","code" => "GW","phone_code" => 245,"region" => "Africa"),
            array("name" => "Guyana","code" => "GY","phone_code" => 592,"region" => "South America"),
            array("name" => "Haiti","code" => "HT","phone_code" => 509,"region" => "North America"),
            array("name" => "Heard Island and McDonald Islands","code" => "HM","phone_code" => 0,"region" => "Antarctica"),
            array("name" => "Holy See (Vatican City State)","code" => "VA","phone_code" => 39,"region" => "Europe"),
            array("name" => "Honduras","code" => "HN","phone_code" => 504,"region" => "North America"),
            array("name" => "Hong Kong","code" => "HK","phone_code" => 852,"region" => "Asia"),
            array("name" => "Hungary","code" => "HU","phone_code" => 36,"region" => "Europe"),
            array("name" => "Iceland","code" => "IS","phone_code" => 354,"region" => "Europe"),
            array("name" => "India","code" => "IN","phone_code" => 91,"region" => "Asia"),
            array("name" => "Indonesia","code" => "ID","phone_code" => 62,"region" => "Asia"),
            array("name" => "Iran, Islamic Republic of","code" => "IR","phone_code" => 98,"region" => "Asia"),
            array("name" => "Iraq","code" => "IQ","phone_code" => 964,"region" => "Asia"),
            array("name" => "Ireland","code" => "IE","phone_code" => 353,"region" => "Europe"),
            array("name" => "Isle of Man","code" => "IM","phone_code" => 44,"region" => "Europe"),
            array("name" => "Israel","code" => "IL","phone_code" => 972,"region" => "Asia"),
            array("name" => "Italy","code" => "IT","phone_code" => 39,"region" => "Europe"),
            array("name" => "Jamaica","code" => "JM","phone_code" => 1876,"region" => "North America"),
            array("name" => "Japan","code" => "JP","phone_code" => 81,"region" => "Asia"),
            array("name" => "Jersey","code" => "JE","phone_code" => 44,"region" => "Europe"),
            array("name" => "Jordan","code" => "JO","phone_code" => 962,"region" => "Asia"),
            array("name" => "Kazakhstan","code" => "KZ","phone_code" => 7,"region" => "Asia"),
            array("name" => "Kenya","code" => "KE","phone_code" => 254,"region" => "Africa"),
            array("name" => "Kiribati","code" => "KI","phone_code" => 686,"region" => "Oceania"),
            array("name" => "Korea, Democratic People's Republic of","code" => "KP","phone_code" => 850,"region" => "Asia"),
            array("name" => "Korea, Republic of","code" => "KR","phone_code" => 82,"region" => "Asia"),
            array("name" => "Kosovo","code" => "XK","phone_code" => 381,"region" => "Europe"),
            array("name" => "Kuwait","code" => "KW","phone_code" => 965,"region" => "Asia"),
            array("name" => "Kyrgyzstan","code" => "KG","phone_code" => 996,"region" => "Asia"),
            array("name" => "Lao People's Democratic Republic","code" => "LA","phone_code" => 856,"region" => "Asia"),
            array("name" => "Latvia","code" => "LV","phone_code" => 371,"region" => "Europe"),
            array("name" => "Lebanon","code" => "LB","phone_code" => 961,"region" => "Asia"),
            array("name" => "Lesotho","code" => "LS","phone_code" => 266,"region" => "Africa"),
            array("name" => "Liberia","code" => "LR","phone_code" => 231,"region" => "Africa"),
            array("name" => "Libyan Arab Jamahiriya","code" => "LY","phone_code" => 218,"region" => "Africa"),
            array("name" => "Liechtenstein","code" => "LI","phone_code" => 423,"region" => "Europe"),
            array("name" => "Lithuania","code" => "LT","phone_code" => 370,"region" => "Europe"),
            array("name" => "Luxembourg","code" => "LU","phone_code" => 352,"region" => "Europe"),
            array("name" => "Macao","code" => "MO","phone_code" => 853,"region" => "Asia"),
            array("name" => "Macedonia, the Former Yugoslav Republic of","code" => "MK","phone_code" => 389,"region" => "Europe"),
            array("name" => "Madagascar","code" => "MG","phone_code" => 261,"region" => "Africa"),
            array("name" => "Malawi","code" => "MW","phone_code" => 265,"region" => "Africa"),
            array("name" => "Malaysia","code" => "MY","phone_code" => 60,"region" => "Asia"),
            array("name" => "Maldives","code" => "MV","phone_code" => 960,"region" => "Asia"),
            array("name" => "Mali","code" => "ML","phone_code" => 223,"region" => "Africa"),
            array("name" => "Malta","code" => "MT","phone_code" => 356,"region" => "Europe"),
            array("name" => "Marshall Islands","code" => "MH","phone_code" => 692,"region" => "Oceania"),
            array("name" => "Martinique","code" => "MQ","phone_code" => 596,"region" => "North America"),
            array("name" => "Mauritania","code" => "MR","phone_code" => 222,"region" => "Africa"),
            array("name" => "Mauritius","code" => "MU","phone_code" => 230,"region" => "Africa"),
            array("name" => "Mayotte","code" => "YT","phone_code" => 262,"region" => "Africa"),
            array("name" => "Mexico","code" => "MX","phone_code" => 52,"region" => "North America"),
            array("name" => "Micronesia, Federated States of","code" => "FM","phone_code" => 691,"region" => "Oceania"),
            array("name" => "Moldova, Republic of","code" => "MD","phone_code" => 373,"region" => "Europe"),
            array("name" => "Monaco","code" => "MC","phone_code" => 377,"region" => "Europe"),
            array("name" => "Mongolia","code" => "MN","phone_code" => 976,"region" => "Asia"),
            array("name" => "Montenegro","code" => "ME","phone_code" => 382,"region" => "Europe"),
            array("name" => "Montserrat","code" => "MS","phone_code" => 1664,"region" => "North America"),
            array("name" => "Morocco","code" => "MA","phone_code" => 212,"region" => "Africa"),
            array("name" => "Mozambique","code" => "MZ","phone_code" => 258,"region" => "Africa"),
            array("name" => "Myanmar","code" => "MM","phone_code" => 95,"region" => "Asia"),
            array("name" => "Namibia","code" => "NA","phone_code" => 264,"region" => "Africa"),
            array("name" => "Nauru","code" => "NR","phone_code" => 674,"region" => "Oceania"),
            array("name" => "Nepal","code" => "NP","phone_code" => 977,"region" => "Asia"),
            array("name" => "Netherlands","code" => "NL","phone_code" => 31,"region" => "Europe"),
            array("name" => "Netherlands Antilles","code" => "AN","phone_code" => 599,"region" => "North America"),
            array("name" => "New Caledonia","code" => "NC","phone_code" => 687,"region" => "Oceania"),
            array("name" => "New Zealand","code" => "NZ","phone_code" => 64,"region" => "Oceania"),
            array("name" => "Nicaragua","code" => "NI","phone_code" => 505,"region" => "North America"),
            array("name" => "Niger","code" => "NE","phone_code" => 227,"region" => "Africa"),
            array("name" => "Nigeria","code" => "NG","phone_code" => 234,"region" => "Africa"),
            array("name" => "Niue","code" => "NU","phone_code" => 683,"region" => "Oceania"),
            array("name" => "Norfolk Island","code" => "NF","phone_code" => 672,"region" => "Oceania"),
            array("name" => "Northern Mariana Islands","code" => "MP","phone_code" => 1670,"region" => "Oceania"),
            array("name" => "Norway","code" => "NO","phone_code" => 47,"region" => "Europe"),
            array("name" => "Oman","code" => "OM","phone_code" => 968,"region" => "Asia"),
            array("name" => "Pakistan","code" => "PK","phone_code" => 92,"region" => "Asia"),
            array("name" => "Palau","code" => "PW","phone_code" => 680,"region" => "Oceania"),
            array("name" => "Palestinian Territory, Occupied","code" => "PS","phone_code" => 970,"region" => "Asia"),
            array("name" => "Panama","code" => "PA","phone_code" => 507,"region" => "North America"),
            array("name" => "Papua New Guinea","code" => "PG","phone_code" => 675,"region" => "Oceania"),
            array("name" => "Paraguay","code" => "PY","phone_code" => 595,"region" => "South America"),
            array("name" => "Peru","code" => "PE","phone_code" => 51,"region" => "South America"),
            array("name" => "Philippines","code" => "PH","phone_code" => 63,"region" => "Asia"),
            array("name" => "Pitcairn","code" => "PN","phone_code" => 64,"region" => "Oceania"),
            array("name" => "Poland","code" => "PL","phone_code" => 48,"region" => "Europe"),
            array("name" => "Portugal","code" => "PT","phone_code" => 351,"region" => "Europe"),
            array("name" => "Puerto Rico","code" => "PR","phone_code" => 1787,"region" => "North America"),
            array("name" => "Qatar","code" => "QA","phone_code" => 974,"region" => "Asia"),
            array("name" => "Reunion","code" => "RE","phone_code" => 262,"region" => "Africa"),
            array("name" => "Romania","code" => "RO","phone_code" => 40,"region" => "Europe"),
            array("name" => "Russian Federation","code" => "RU","phone_code" => 7,"region" => "Asia"),
            array("name" => "Rwanda","code" => "RW","phone_code" => 250,"region" => "Africa"),
            array("name" => "Saint Barthelemy","code" => "BL","phone_code" => 590,"region" => "North America"),
            array("name" => "Saint Helena","code" => "SH","phone_code" => 290,"region" => "Africa"),
            array("name" => "Saint Kitts and Nevis","code" => "KN","phone_code" => 1869,"region" => "North America"),
            array("name" => "Saint Lucia","code" => "LC","phone_code" => 1758,"region" => "North America"),
            array("name" => "Saint Martin","code" => "MF","phone_code" => 590,"region" => "North America"),
            array("name" => "Saint Pierre and Miquelon","code" => "PM","phone_code" => 508,"region" => "North America"),
            array("name" => "Saint Vincent and the Grenadines","code" => "VC","phone_code" => 1784,"region" => "North America"),
            array("name" => "Samoa","code" => "WS","phone_code" => 684,"region" => "Oceania"),
            array("name" => "San Marino","code" => "SM","phone_code" => 378,"region" => "Europe"),
            array("name" => "Sao Tome and Principe","code" => "ST","phone_code" => 239,"region" => "Africa"),
            array("name" => "Saudi Arabia","code" => "SA","phone_code" => 966,"region" => "Asia"),
            array("name" => "Senegal","code" => "SN","phone_code" => 221,"region" => "Africa"),
            array("name" => "Serbia","code" => "RS","phone_code" => 381,"region" => "Europe"),
            array("name" => "Serbia and Montenegro","code" => "CS","phone_code" => 381,"region" => "Europe"),
            array("name" => "Seychelles","code" => "SC","phone_code" => 248,"region" => "Africa"),
            array("name" => "Sierra Leone","code" => "SL","phone_code" => 232,"region" => "Africa"),
            array("name" => "Singapore","code" => "SG","phone_code" => 65,"region" => "Asia"),
            array("name" => "St Martin","code" => "SX","phone_code" => 1,"region" => "North America"),
            array("name" => "Slovakia","code" => "SK","phone_code" => 421,"region" => "Europe"),
            array("name" => "Slovenia","code" => "SI","phone_code" => 386,"region" => "Europe"),
            array("name" => "Solomon Islands","code" => "SB","phone_code" => 677,"region" => "Oceania"),
            array("name" => "Somalia","code" => "SO","phone_code" => 252,"region" => "Africa"),
            array("name" => "South Africa","code" => "ZA","phone_code" => 27,"region" => "Africa"),
            array("name" => "South Georgia and the South Sandwich Islands","code" => "GS","phone_code" => 500,"region" => "Antarctica"),
            array("name" => "South Sudan","code" => "SS","phone_code" => 211,"region" => "Africa"),
            array("name" => "Spain","code" => "ES","phone_code" => 34,"region" => "Europe"),
            array("name" => "Sri Lanka","code" => "LK","phone_code" => 94,"region" => "Asia"),
            array("name" => "Sudan","code" => "SD","phone_code" => 249,"region" => "Africa"),
            array("name" => "Suriname","code" => "SR","phone_code" => 597,"region" => "South America"),
            array("name" => "Svalbard and Jan Mayen","code" => "SJ","phone_code" => 47,"region" => "Europe"),
            array("name" => "Swaziland","code" => "SZ","phone_code" => 268,"region" => "Africa"),
            array("name" => "Sweden","code" => "SE","phone_code" => 46,"region" => "Europe"),
            array("name" => "Switzerland","code" => "CH","phone_code" => 41,"region" => "Europe"),
            array("name" => "Syrian Arab Republic","code" => "SY","phone_code" => 963,"region" => "Asia"),
            array("name" => "Taiwan, Province of China","code" => "TW","phone_code" => 886,"region" => "Asia"),
            array("name" => "Tajikistan","code" => "TJ","phone_code" => 992,"region" => "Asia"),
            array("name" => "Tanzania, United Republic of","code" => "TZ","phone_code" => 255,"region" => "Africa"),
            array("name" => "Thailand","code" => "TH","phone_code" => 66,"region" => "Asia"),
            array("name" => "Timor-Leste","code" => "TL","phone_code" => 670,"region" => "Asia"),
            array("name" => "Togo","code" => "TG","phone_code" => 228,"region" => "Africa"),
            array("name" => "Tokelau","code" => "TK","phone_code" => 690,"region" => "Oceania"),
            array("name" => "Tonga","code" => "TO","phone_code" => 676,"region" => "Oceania"),
            array("name" => "Trinidad and Tobago","code" => "TT","phone_code" => 1868,"region" => "North America"),
            array("name" => "Tunisia","code" => "TN","phone_code" => 216,"region" => "Africa"),
            array("name" => "Turkmenistan","code" => "TM","phone_code" => 7370,"region" => "Asia"),
            array("name" => "Turks and Caicos Islands","code" => "TC","phone_code" => 1649,"region" => "North America"),
            array("name" => "Tuvalu","code" => "TV","phone_code" => 688,"region" => "Oceania"),
            array("name" => "Uganda","code" => "UG","phone_code" => 256,"region" => "Africa"),
            array("name" => "Ukraine","code" => "UA","phone_code" => 380,"region" => "Europe"),
            array("name" => "United Arab Emirates","code" => "AE","phone_code" => 971,"region" => "Asia"),
            array("name" => "United Kingdom","code" => "GB","phone_code" => 44,"region" => "Europe"),
            array("name" => "United States","code" => "US","phone_code" => 1,"region" => "North America"),
            array("name" => "United States Minor Outlying Islands","code" => "UM","phone_code" => 1,"region" => "North America"),
            array("name" => "Uruguay","code" => "UY","phone_code" => 598,"region" => "South America"),
            array("name" => "Uzbekistan","code" => "UZ","phone_code" => 998,"region" => "Asia"),
            array("name" => "Vanuatu","code" => "VU","phone_code" => 678,"region" => "Oceania"),
            array("name" => "Venezuela","code" => "VE","phone_code" => 58,"region" => "South America"),
            array("name" => "Viet Nam","code" => "VN","phone_code" => 84,"region" => "Asia"),
            array("name" => "Virgin Islands, British","code" => "VG","phone_code" => 1284,"region" => "North America"),
            array("name" => "Virgin Islands, U.s.","code" => "VI","phone_code" => 1340,"region" => "North America"),
            array("name" => "Wallis and Futuna","code" => "WF","phone_code" => 681,"region" => "Oceania"),
            array("name" => "Western Sahara","code" => "EH","phone_code" => 212,"region" => "Africa"),
            array("name" => "Yemen","code" => "YE","phone_code" => 967,"region" => "Asia"),
            array("name" => "Zambia","code" => "ZM","phone_code" => 260,"region" => "Africa"),
            array("name" => "Zimbabwe","code" => "ZW","phone_code" => 263,"region" => "Africa")
        );
        return $country_list;
    }
}
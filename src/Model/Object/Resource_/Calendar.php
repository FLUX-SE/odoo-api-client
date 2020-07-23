<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource_;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : resource.calendar
 * Name : resource.calendar
 * Info :
 * Calendar model for a resource. It has
 *
 *           - attendance_ids: list of resource.calendar.attendance that are a working
 *                                               interval in a given weekday.
 *           - leave_ids: list of leaves linked to this calendar. A leave can be general
 *                                     or linked to a specific resource, depending on its resource_id.
 *
 *         All methods in this class use intervals. An interval is a tuple holding
 *         (begin_datetime, end_datetime). A list of intervals is therefore a list of
 *         tuples, holding several intervals of work or leaves.
 */
final class Calendar extends Base
{
    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $company_id;

    /**
     * Working Time
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $attendance_ids;

    /**
     * Time Off
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $leave_ids;

    /**
     * Global Time Off
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $global_leave_ids;

    /**
     * Average Hour per Day
     * Average hours per day a resource is supposed to work with this calendar.
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $hours_per_day;

    /**
     * Timezone
     * This field is used in order to define in which timezone the resources will work.
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> Africa/Abidjan (Africa/Abidjan)
     *     -> Africa/Accra (Africa/Accra)
     *     -> Africa/Addis_Ababa (Africa/Addis_Ababa)
     *     -> Africa/Algiers (Africa/Algiers)
     *     -> Africa/Asmara (Africa/Asmara)
     *     -> Africa/Asmera (Africa/Asmera)
     *     -> Africa/Bamako (Africa/Bamako)
     *     -> Africa/Bangui (Africa/Bangui)
     *     -> Africa/Banjul (Africa/Banjul)
     *     -> Africa/Bissau (Africa/Bissau)
     *     -> Africa/Blantyre (Africa/Blantyre)
     *     -> Africa/Brazzaville (Africa/Brazzaville)
     *     -> Africa/Bujumbura (Africa/Bujumbura)
     *     -> Africa/Cairo (Africa/Cairo)
     *     -> Africa/Casablanca (Africa/Casablanca)
     *     -> Africa/Ceuta (Africa/Ceuta)
     *     -> Africa/Conakry (Africa/Conakry)
     *     -> Africa/Dakar (Africa/Dakar)
     *     -> Africa/Dar_es_Salaam (Africa/Dar_es_Salaam)
     *     -> Africa/Djibouti (Africa/Djibouti)
     *     -> Africa/Douala (Africa/Douala)
     *     -> Africa/El_Aaiun (Africa/El_Aaiun)
     *     -> Africa/Freetown (Africa/Freetown)
     *     -> Africa/Gaborone (Africa/Gaborone)
     *     -> Africa/Harare (Africa/Harare)
     *     -> Africa/Johannesburg (Africa/Johannesburg)
     *     -> Africa/Juba (Africa/Juba)
     *     -> Africa/Kampala (Africa/Kampala)
     *     -> Africa/Khartoum (Africa/Khartoum)
     *     -> Africa/Kigali (Africa/Kigali)
     *     -> Africa/Kinshasa (Africa/Kinshasa)
     *     -> Africa/Lagos (Africa/Lagos)
     *     -> Africa/Libreville (Africa/Libreville)
     *     -> Africa/Lome (Africa/Lome)
     *     -> Africa/Luanda (Africa/Luanda)
     *     -> Africa/Lubumbashi (Africa/Lubumbashi)
     *     -> Africa/Lusaka (Africa/Lusaka)
     *     -> Africa/Malabo (Africa/Malabo)
     *     -> Africa/Maputo (Africa/Maputo)
     *     -> Africa/Maseru (Africa/Maseru)
     *     -> Africa/Mbabane (Africa/Mbabane)
     *     -> Africa/Mogadishu (Africa/Mogadishu)
     *     -> Africa/Monrovia (Africa/Monrovia)
     *     -> Africa/Nairobi (Africa/Nairobi)
     *     -> Africa/Ndjamena (Africa/Ndjamena)
     *     -> Africa/Niamey (Africa/Niamey)
     *     -> Africa/Nouakchott (Africa/Nouakchott)
     *     -> Africa/Ouagadougou (Africa/Ouagadougou)
     *     -> Africa/Porto-Novo (Africa/Porto-Novo)
     *     -> Africa/Sao_Tome (Africa/Sao_Tome)
     *     -> Africa/Timbuktu (Africa/Timbuktu)
     *     -> Africa/Tripoli (Africa/Tripoli)
     *     -> Africa/Tunis (Africa/Tunis)
     *     -> Africa/Windhoek (Africa/Windhoek)
     *     -> America/Adak (America/Adak)
     *     -> America/Anchorage (America/Anchorage)
     *     -> America/Anguilla (America/Anguilla)
     *     -> America/Antigua (America/Antigua)
     *     -> America/Araguaina (America/Araguaina)
     *     -> America/Argentina/Buenos_Aires (America/Argentina/Buenos_Aires)
     *     -> America/Argentina/Catamarca (America/Argentina/Catamarca)
     *     -> America/Argentina/ComodRivadavia (America/Argentina/ComodRivadavia)
     *     -> America/Argentina/Cordoba (America/Argentina/Cordoba)
     *     -> America/Argentina/Jujuy (America/Argentina/Jujuy)
     *     -> America/Argentina/La_Rioja (America/Argentina/La_Rioja)
     *     -> America/Argentina/Mendoza (America/Argentina/Mendoza)
     *     -> America/Argentina/Rio_Gallegos (America/Argentina/Rio_Gallegos)
     *     -> America/Argentina/Salta (America/Argentina/Salta)
     *     -> America/Argentina/San_Juan (America/Argentina/San_Juan)
     *     -> America/Argentina/San_Luis (America/Argentina/San_Luis)
     *     -> America/Argentina/Tucuman (America/Argentina/Tucuman)
     *     -> America/Argentina/Ushuaia (America/Argentina/Ushuaia)
     *     -> America/Aruba (America/Aruba)
     *     -> America/Asuncion (America/Asuncion)
     *     -> America/Atikokan (America/Atikokan)
     *     -> America/Atka (America/Atka)
     *     -> America/Bahia (America/Bahia)
     *     -> America/Bahia_Banderas (America/Bahia_Banderas)
     *     -> America/Barbados (America/Barbados)
     *     -> America/Belem (America/Belem)
     *     -> America/Belize (America/Belize)
     *     -> America/Blanc-Sablon (America/Blanc-Sablon)
     *     -> America/Boa_Vista (America/Boa_Vista)
     *     -> America/Bogota (America/Bogota)
     *     -> America/Boise (America/Boise)
     *     -> America/Buenos_Aires (America/Buenos_Aires)
     *     -> America/Cambridge_Bay (America/Cambridge_Bay)
     *     -> America/Campo_Grande (America/Campo_Grande)
     *     -> America/Cancun (America/Cancun)
     *     -> America/Caracas (America/Caracas)
     *     -> America/Catamarca (America/Catamarca)
     *     -> America/Cayenne (America/Cayenne)
     *     -> America/Cayman (America/Cayman)
     *     -> America/Chicago (America/Chicago)
     *     -> America/Chihuahua (America/Chihuahua)
     *     -> America/Coral_Harbour (America/Coral_Harbour)
     *     -> America/Cordoba (America/Cordoba)
     *     -> America/Costa_Rica (America/Costa_Rica)
     *     -> America/Creston (America/Creston)
     *     -> America/Cuiaba (America/Cuiaba)
     *     -> America/Curacao (America/Curacao)
     *     -> America/Danmarkshavn (America/Danmarkshavn)
     *     -> America/Dawson (America/Dawson)
     *     -> America/Dawson_Creek (America/Dawson_Creek)
     *     -> America/Denver (America/Denver)
     *     -> America/Detroit (America/Detroit)
     *     -> America/Dominica (America/Dominica)
     *     -> America/Edmonton (America/Edmonton)
     *     -> America/Eirunepe (America/Eirunepe)
     *     -> America/El_Salvador (America/El_Salvador)
     *     -> America/Ensenada (America/Ensenada)
     *     -> America/Fort_Nelson (America/Fort_Nelson)
     *     -> America/Fort_Wayne (America/Fort_Wayne)
     *     -> America/Fortaleza (America/Fortaleza)
     *     -> America/Glace_Bay (America/Glace_Bay)
     *     -> America/Godthab (America/Godthab)
     *     -> America/Goose_Bay (America/Goose_Bay)
     *     -> America/Grand_Turk (America/Grand_Turk)
     *     -> America/Grenada (America/Grenada)
     *     -> America/Guadeloupe (America/Guadeloupe)
     *     -> America/Guatemala (America/Guatemala)
     *     -> America/Guayaquil (America/Guayaquil)
     *     -> America/Guyana (America/Guyana)
     *     -> America/Halifax (America/Halifax)
     *     -> America/Havana (America/Havana)
     *     -> America/Hermosillo (America/Hermosillo)
     *     -> America/Indiana/Indianapolis (America/Indiana/Indianapolis)
     *     -> America/Indiana/Knox (America/Indiana/Knox)
     *     -> America/Indiana/Marengo (America/Indiana/Marengo)
     *     -> America/Indiana/Petersburg (America/Indiana/Petersburg)
     *     -> America/Indiana/Tell_City (America/Indiana/Tell_City)
     *     -> America/Indiana/Vevay (America/Indiana/Vevay)
     *     -> America/Indiana/Vincennes (America/Indiana/Vincennes)
     *     -> America/Indiana/Winamac (America/Indiana/Winamac)
     *     -> America/Indianapolis (America/Indianapolis)
     *     -> America/Inuvik (America/Inuvik)
     *     -> America/Iqaluit (America/Iqaluit)
     *     -> America/Jamaica (America/Jamaica)
     *     -> America/Jujuy (America/Jujuy)
     *     -> America/Juneau (America/Juneau)
     *     -> America/Kentucky/Louisville (America/Kentucky/Louisville)
     *     -> America/Kentucky/Monticello (America/Kentucky/Monticello)
     *     -> America/Knox_IN (America/Knox_IN)
     *     -> America/Kralendijk (America/Kralendijk)
     *     -> America/La_Paz (America/La_Paz)
     *     -> America/Lima (America/Lima)
     *     -> America/Los_Angeles (America/Los_Angeles)
     *     -> America/Louisville (America/Louisville)
     *     -> America/Lower_Princes (America/Lower_Princes)
     *     -> America/Maceio (America/Maceio)
     *     -> America/Managua (America/Managua)
     *     -> America/Manaus (America/Manaus)
     *     -> America/Marigot (America/Marigot)
     *     -> America/Martinique (America/Martinique)
     *     -> America/Matamoros (America/Matamoros)
     *     -> America/Mazatlan (America/Mazatlan)
     *     -> America/Mendoza (America/Mendoza)
     *     -> America/Menominee (America/Menominee)
     *     -> America/Merida (America/Merida)
     *     -> America/Metlakatla (America/Metlakatla)
     *     -> America/Mexico_City (America/Mexico_City)
     *     -> America/Miquelon (America/Miquelon)
     *     -> America/Moncton (America/Moncton)
     *     -> America/Monterrey (America/Monterrey)
     *     -> America/Montevideo (America/Montevideo)
     *     -> America/Montreal (America/Montreal)
     *     -> America/Montserrat (America/Montserrat)
     *     -> America/Nassau (America/Nassau)
     *     -> America/New_York (America/New_York)
     *     -> America/Nipigon (America/Nipigon)
     *     -> America/Nome (America/Nome)
     *     -> America/Noronha (America/Noronha)
     *     -> America/North_Dakota/Beulah (America/North_Dakota/Beulah)
     *     -> America/North_Dakota/Center (America/North_Dakota/Center)
     *     -> America/North_Dakota/New_Salem (America/North_Dakota/New_Salem)
     *     -> America/Nuuk (America/Nuuk)
     *     -> America/Ojinaga (America/Ojinaga)
     *     -> America/Panama (America/Panama)
     *     -> America/Pangnirtung (America/Pangnirtung)
     *     -> America/Paramaribo (America/Paramaribo)
     *     -> America/Phoenix (America/Phoenix)
     *     -> America/Port-au-Prince (America/Port-au-Prince)
     *     -> America/Port_of_Spain (America/Port_of_Spain)
     *     -> America/Porto_Acre (America/Porto_Acre)
     *     -> America/Porto_Velho (America/Porto_Velho)
     *     -> America/Puerto_Rico (America/Puerto_Rico)
     *     -> America/Punta_Arenas (America/Punta_Arenas)
     *     -> America/Rainy_River (America/Rainy_River)
     *     -> America/Rankin_Inlet (America/Rankin_Inlet)
     *     -> America/Recife (America/Recife)
     *     -> America/Regina (America/Regina)
     *     -> America/Resolute (America/Resolute)
     *     -> America/Rio_Branco (America/Rio_Branco)
     *     -> America/Rosario (America/Rosario)
     *     -> America/Santa_Isabel (America/Santa_Isabel)
     *     -> America/Santarem (America/Santarem)
     *     -> America/Santiago (America/Santiago)
     *     -> America/Santo_Domingo (America/Santo_Domingo)
     *     -> America/Sao_Paulo (America/Sao_Paulo)
     *     -> America/Scoresbysund (America/Scoresbysund)
     *     -> America/Shiprock (America/Shiprock)
     *     -> America/Sitka (America/Sitka)
     *     -> America/St_Barthelemy (America/St_Barthelemy)
     *     -> America/St_Johns (America/St_Johns)
     *     -> America/St_Kitts (America/St_Kitts)
     *     -> America/St_Lucia (America/St_Lucia)
     *     -> America/St_Thomas (America/St_Thomas)
     *     -> America/St_Vincent (America/St_Vincent)
     *     -> America/Swift_Current (America/Swift_Current)
     *     -> America/Tegucigalpa (America/Tegucigalpa)
     *     -> America/Thule (America/Thule)
     *     -> America/Thunder_Bay (America/Thunder_Bay)
     *     -> America/Tijuana (America/Tijuana)
     *     -> America/Toronto (America/Toronto)
     *     -> America/Tortola (America/Tortola)
     *     -> America/Vancouver (America/Vancouver)
     *     -> America/Virgin (America/Virgin)
     *     -> America/Whitehorse (America/Whitehorse)
     *     -> America/Winnipeg (America/Winnipeg)
     *     -> America/Yakutat (America/Yakutat)
     *     -> America/Yellowknife (America/Yellowknife)
     *     -> Antarctica/Casey (Antarctica/Casey)
     *     -> Antarctica/Davis (Antarctica/Davis)
     *     -> Antarctica/DumontDUrville (Antarctica/DumontDUrville)
     *     -> Antarctica/Macquarie (Antarctica/Macquarie)
     *     -> Antarctica/Mawson (Antarctica/Mawson)
     *     -> Antarctica/McMurdo (Antarctica/McMurdo)
     *     -> Antarctica/Palmer (Antarctica/Palmer)
     *     -> Antarctica/Rothera (Antarctica/Rothera)
     *     -> Antarctica/South_Pole (Antarctica/South_Pole)
     *     -> Antarctica/Syowa (Antarctica/Syowa)
     *     -> Antarctica/Troll (Antarctica/Troll)
     *     -> Antarctica/Vostok (Antarctica/Vostok)
     *     -> Arctic/Longyearbyen (Arctic/Longyearbyen)
     *     -> Asia/Aden (Asia/Aden)
     *     -> Asia/Almaty (Asia/Almaty)
     *     -> Asia/Amman (Asia/Amman)
     *     -> Asia/Anadyr (Asia/Anadyr)
     *     -> Asia/Aqtau (Asia/Aqtau)
     *     -> Asia/Aqtobe (Asia/Aqtobe)
     *     -> Asia/Ashgabat (Asia/Ashgabat)
     *     -> Asia/Ashkhabad (Asia/Ashkhabad)
     *     -> Asia/Atyrau (Asia/Atyrau)
     *     -> Asia/Baghdad (Asia/Baghdad)
     *     -> Asia/Bahrain (Asia/Bahrain)
     *     -> Asia/Baku (Asia/Baku)
     *     -> Asia/Bangkok (Asia/Bangkok)
     *     -> Asia/Barnaul (Asia/Barnaul)
     *     -> Asia/Beirut (Asia/Beirut)
     *     -> Asia/Bishkek (Asia/Bishkek)
     *     -> Asia/Brunei (Asia/Brunei)
     *     -> Asia/Calcutta (Asia/Calcutta)
     *     -> Asia/Chita (Asia/Chita)
     *     -> Asia/Choibalsan (Asia/Choibalsan)
     *     -> Asia/Chongqing (Asia/Chongqing)
     *     -> Asia/Chungking (Asia/Chungking)
     *     -> Asia/Colombo (Asia/Colombo)
     *     -> Asia/Dacca (Asia/Dacca)
     *     -> Asia/Damascus (Asia/Damascus)
     *     -> Asia/Dhaka (Asia/Dhaka)
     *     -> Asia/Dili (Asia/Dili)
     *     -> Asia/Dubai (Asia/Dubai)
     *     -> Asia/Dushanbe (Asia/Dushanbe)
     *     -> Asia/Famagusta (Asia/Famagusta)
     *     -> Asia/Gaza (Asia/Gaza)
     *     -> Asia/Harbin (Asia/Harbin)
     *     -> Asia/Hebron (Asia/Hebron)
     *     -> Asia/Ho_Chi_Minh (Asia/Ho_Chi_Minh)
     *     -> Asia/Hong_Kong (Asia/Hong_Kong)
     *     -> Asia/Hovd (Asia/Hovd)
     *     -> Asia/Irkutsk (Asia/Irkutsk)
     *     -> Asia/Istanbul (Asia/Istanbul)
     *     -> Asia/Jakarta (Asia/Jakarta)
     *     -> Asia/Jayapura (Asia/Jayapura)
     *     -> Asia/Jerusalem (Asia/Jerusalem)
     *     -> Asia/Kabul (Asia/Kabul)
     *     -> Asia/Kamchatka (Asia/Kamchatka)
     *     -> Asia/Karachi (Asia/Karachi)
     *     -> Asia/Kashgar (Asia/Kashgar)
     *     -> Asia/Kathmandu (Asia/Kathmandu)
     *     -> Asia/Katmandu (Asia/Katmandu)
     *     -> Asia/Khandyga (Asia/Khandyga)
     *     -> Asia/Kolkata (Asia/Kolkata)
     *     -> Asia/Krasnoyarsk (Asia/Krasnoyarsk)
     *     -> Asia/Kuala_Lumpur (Asia/Kuala_Lumpur)
     *     -> Asia/Kuching (Asia/Kuching)
     *     -> Asia/Kuwait (Asia/Kuwait)
     *     -> Asia/Macao (Asia/Macao)
     *     -> Asia/Macau (Asia/Macau)
     *     -> Asia/Magadan (Asia/Magadan)
     *     -> Asia/Makassar (Asia/Makassar)
     *     -> Asia/Manila (Asia/Manila)
     *     -> Asia/Muscat (Asia/Muscat)
     *     -> Asia/Nicosia (Asia/Nicosia)
     *     -> Asia/Novokuznetsk (Asia/Novokuznetsk)
     *     -> Asia/Novosibirsk (Asia/Novosibirsk)
     *     -> Asia/Omsk (Asia/Omsk)
     *     -> Asia/Oral (Asia/Oral)
     *     -> Asia/Phnom_Penh (Asia/Phnom_Penh)
     *     -> Asia/Pontianak (Asia/Pontianak)
     *     -> Asia/Pyongyang (Asia/Pyongyang)
     *     -> Asia/Qatar (Asia/Qatar)
     *     -> Asia/Qostanay (Asia/Qostanay)
     *     -> Asia/Qyzylorda (Asia/Qyzylorda)
     *     -> Asia/Rangoon (Asia/Rangoon)
     *     -> Asia/Riyadh (Asia/Riyadh)
     *     -> Asia/Saigon (Asia/Saigon)
     *     -> Asia/Sakhalin (Asia/Sakhalin)
     *     -> Asia/Samarkand (Asia/Samarkand)
     *     -> Asia/Seoul (Asia/Seoul)
     *     -> Asia/Shanghai (Asia/Shanghai)
     *     -> Asia/Singapore (Asia/Singapore)
     *     -> Asia/Srednekolymsk (Asia/Srednekolymsk)
     *     -> Asia/Taipei (Asia/Taipei)
     *     -> Asia/Tashkent (Asia/Tashkent)
     *     -> Asia/Tbilisi (Asia/Tbilisi)
     *     -> Asia/Tehran (Asia/Tehran)
     *     -> Asia/Tel_Aviv (Asia/Tel_Aviv)
     *     -> Asia/Thimbu (Asia/Thimbu)
     *     -> Asia/Thimphu (Asia/Thimphu)
     *     -> Asia/Tokyo (Asia/Tokyo)
     *     -> Asia/Tomsk (Asia/Tomsk)
     *     -> Asia/Ujung_Pandang (Asia/Ujung_Pandang)
     *     -> Asia/Ulaanbaatar (Asia/Ulaanbaatar)
     *     -> Asia/Ulan_Bator (Asia/Ulan_Bator)
     *     -> Asia/Urumqi (Asia/Urumqi)
     *     -> Asia/Ust-Nera (Asia/Ust-Nera)
     *     -> Asia/Vientiane (Asia/Vientiane)
     *     -> Asia/Vladivostok (Asia/Vladivostok)
     *     -> Asia/Yakutsk (Asia/Yakutsk)
     *     -> Asia/Yangon (Asia/Yangon)
     *     -> Asia/Yekaterinburg (Asia/Yekaterinburg)
     *     -> Asia/Yerevan (Asia/Yerevan)
     *     -> Atlantic/Azores (Atlantic/Azores)
     *     -> Atlantic/Bermuda (Atlantic/Bermuda)
     *     -> Atlantic/Canary (Atlantic/Canary)
     *     -> Atlantic/Cape_Verde (Atlantic/Cape_Verde)
     *     -> Atlantic/Faeroe (Atlantic/Faeroe)
     *     -> Atlantic/Faroe (Atlantic/Faroe)
     *     -> Atlantic/Jan_Mayen (Atlantic/Jan_Mayen)
     *     -> Atlantic/Madeira (Atlantic/Madeira)
     *     -> Atlantic/Reykjavik (Atlantic/Reykjavik)
     *     -> Atlantic/South_Georgia (Atlantic/South_Georgia)
     *     -> Atlantic/St_Helena (Atlantic/St_Helena)
     *     -> Atlantic/Stanley (Atlantic/Stanley)
     *     -> Australia/ACT (Australia/ACT)
     *     -> Australia/Adelaide (Australia/Adelaide)
     *     -> Australia/Brisbane (Australia/Brisbane)
     *     -> Australia/Broken_Hill (Australia/Broken_Hill)
     *     -> Australia/Canberra (Australia/Canberra)
     *     -> Australia/Currie (Australia/Currie)
     *     -> Australia/Darwin (Australia/Darwin)
     *     -> Australia/Eucla (Australia/Eucla)
     *     -> Australia/Hobart (Australia/Hobart)
     *     -> Australia/LHI (Australia/LHI)
     *     -> Australia/Lindeman (Australia/Lindeman)
     *     -> Australia/Lord_Howe (Australia/Lord_Howe)
     *     -> Australia/Melbourne (Australia/Melbourne)
     *     -> Australia/NSW (Australia/NSW)
     *     -> Australia/North (Australia/North)
     *     -> Australia/Perth (Australia/Perth)
     *     -> Australia/Queensland (Australia/Queensland)
     *     -> Australia/South (Australia/South)
     *     -> Australia/Sydney (Australia/Sydney)
     *     -> Australia/Tasmania (Australia/Tasmania)
     *     -> Australia/Victoria (Australia/Victoria)
     *     -> Australia/West (Australia/West)
     *     -> Australia/Yancowinna (Australia/Yancowinna)
     *     -> Brazil/Acre (Brazil/Acre)
     *     -> Brazil/DeNoronha (Brazil/DeNoronha)
     *     -> Brazil/East (Brazil/East)
     *     -> Brazil/West (Brazil/West)
     *     -> CET (CET)
     *     -> CST6CDT (CST6CDT)
     *     -> Canada/Atlantic (Canada/Atlantic)
     *     -> Canada/Central (Canada/Central)
     *     -> Canada/Eastern (Canada/Eastern)
     *     -> Canada/Mountain (Canada/Mountain)
     *     -> Canada/Newfoundland (Canada/Newfoundland)
     *     -> Canada/Pacific (Canada/Pacific)
     *     -> Canada/Saskatchewan (Canada/Saskatchewan)
     *     -> Canada/Yukon (Canada/Yukon)
     *     -> Chile/Continental (Chile/Continental)
     *     -> Chile/EasterIsland (Chile/EasterIsland)
     *     -> Cuba (Cuba)
     *     -> EET (EET)
     *     -> EST (EST)
     *     -> EST5EDT (EST5EDT)
     *     -> Egypt (Egypt)
     *     -> Eire (Eire)
     *     -> Europe/Amsterdam (Europe/Amsterdam)
     *     -> Europe/Andorra (Europe/Andorra)
     *     -> Europe/Astrakhan (Europe/Astrakhan)
     *     -> Europe/Athens (Europe/Athens)
     *     -> Europe/Belfast (Europe/Belfast)
     *     -> Europe/Belgrade (Europe/Belgrade)
     *     -> Europe/Berlin (Europe/Berlin)
     *     -> Europe/Bratislava (Europe/Bratislava)
     *     -> Europe/Brussels (Europe/Brussels)
     *     -> Europe/Bucharest (Europe/Bucharest)
     *     -> Europe/Budapest (Europe/Budapest)
     *     -> Europe/Busingen (Europe/Busingen)
     *     -> Europe/Chisinau (Europe/Chisinau)
     *     -> Europe/Copenhagen (Europe/Copenhagen)
     *     -> Europe/Dublin (Europe/Dublin)
     *     -> Europe/Gibraltar (Europe/Gibraltar)
     *     -> Europe/Guernsey (Europe/Guernsey)
     *     -> Europe/Helsinki (Europe/Helsinki)
     *     -> Europe/Isle_of_Man (Europe/Isle_of_Man)
     *     -> Europe/Istanbul (Europe/Istanbul)
     *     -> Europe/Jersey (Europe/Jersey)
     *     -> Europe/Kaliningrad (Europe/Kaliningrad)
     *     -> Europe/Kiev (Europe/Kiev)
     *     -> Europe/Kirov (Europe/Kirov)
     *     -> Europe/Lisbon (Europe/Lisbon)
     *     -> Europe/Ljubljana (Europe/Ljubljana)
     *     -> Europe/London (Europe/London)
     *     -> Europe/Luxembourg (Europe/Luxembourg)
     *     -> Europe/Madrid (Europe/Madrid)
     *     -> Europe/Malta (Europe/Malta)
     *     -> Europe/Mariehamn (Europe/Mariehamn)
     *     -> Europe/Minsk (Europe/Minsk)
     *     -> Europe/Monaco (Europe/Monaco)
     *     -> Europe/Moscow (Europe/Moscow)
     *     -> Europe/Nicosia (Europe/Nicosia)
     *     -> Europe/Oslo (Europe/Oslo)
     *     -> Europe/Paris (Europe/Paris)
     *     -> Europe/Podgorica (Europe/Podgorica)
     *     -> Europe/Prague (Europe/Prague)
     *     -> Europe/Riga (Europe/Riga)
     *     -> Europe/Rome (Europe/Rome)
     *     -> Europe/Samara (Europe/Samara)
     *     -> Europe/San_Marino (Europe/San_Marino)
     *     -> Europe/Sarajevo (Europe/Sarajevo)
     *     -> Europe/Saratov (Europe/Saratov)
     *     -> Europe/Simferopol (Europe/Simferopol)
     *     -> Europe/Skopje (Europe/Skopje)
     *     -> Europe/Sofia (Europe/Sofia)
     *     -> Europe/Stockholm (Europe/Stockholm)
     *     -> Europe/Tallinn (Europe/Tallinn)
     *     -> Europe/Tirane (Europe/Tirane)
     *     -> Europe/Tiraspol (Europe/Tiraspol)
     *     -> Europe/Ulyanovsk (Europe/Ulyanovsk)
     *     -> Europe/Uzhgorod (Europe/Uzhgorod)
     *     -> Europe/Vaduz (Europe/Vaduz)
     *     -> Europe/Vatican (Europe/Vatican)
     *     -> Europe/Vienna (Europe/Vienna)
     *     -> Europe/Vilnius (Europe/Vilnius)
     *     -> Europe/Volgograd (Europe/Volgograd)
     *     -> Europe/Warsaw (Europe/Warsaw)
     *     -> Europe/Zagreb (Europe/Zagreb)
     *     -> Europe/Zaporozhye (Europe/Zaporozhye)
     *     -> Europe/Zurich (Europe/Zurich)
     *     -> GB (GB)
     *     -> GB-Eire (GB-Eire)
     *     -> GMT (GMT)
     *     -> GMT+0 (GMT+0)
     *     -> GMT-0 (GMT-0)
     *     -> GMT0 (GMT0)
     *     -> Greenwich (Greenwich)
     *     -> HST (HST)
     *     -> Hongkong (Hongkong)
     *     -> Iceland (Iceland)
     *     -> Indian/Antananarivo (Indian/Antananarivo)
     *     -> Indian/Chagos (Indian/Chagos)
     *     -> Indian/Christmas (Indian/Christmas)
     *     -> Indian/Cocos (Indian/Cocos)
     *     -> Indian/Comoro (Indian/Comoro)
     *     -> Indian/Kerguelen (Indian/Kerguelen)
     *     -> Indian/Mahe (Indian/Mahe)
     *     -> Indian/Maldives (Indian/Maldives)
     *     -> Indian/Mauritius (Indian/Mauritius)
     *     -> Indian/Mayotte (Indian/Mayotte)
     *     -> Indian/Reunion (Indian/Reunion)
     *     -> Iran (Iran)
     *     -> Israel (Israel)
     *     -> Jamaica (Jamaica)
     *     -> Japan (Japan)
     *     -> Kwajalein (Kwajalein)
     *     -> Libya (Libya)
     *     -> MET (MET)
     *     -> MST (MST)
     *     -> MST7MDT (MST7MDT)
     *     -> Mexico/BajaNorte (Mexico/BajaNorte)
     *     -> Mexico/BajaSur (Mexico/BajaSur)
     *     -> Mexico/General (Mexico/General)
     *     -> NZ (NZ)
     *     -> NZ-CHAT (NZ-CHAT)
     *     -> Navajo (Navajo)
     *     -> PRC (PRC)
     *     -> PST8PDT (PST8PDT)
     *     -> Pacific/Apia (Pacific/Apia)
     *     -> Pacific/Auckland (Pacific/Auckland)
     *     -> Pacific/Bougainville (Pacific/Bougainville)
     *     -> Pacific/Chatham (Pacific/Chatham)
     *     -> Pacific/Chuuk (Pacific/Chuuk)
     *     -> Pacific/Easter (Pacific/Easter)
     *     -> Pacific/Efate (Pacific/Efate)
     *     -> Pacific/Enderbury (Pacific/Enderbury)
     *     -> Pacific/Fakaofo (Pacific/Fakaofo)
     *     -> Pacific/Fiji (Pacific/Fiji)
     *     -> Pacific/Funafuti (Pacific/Funafuti)
     *     -> Pacific/Galapagos (Pacific/Galapagos)
     *     -> Pacific/Gambier (Pacific/Gambier)
     *     -> Pacific/Guadalcanal (Pacific/Guadalcanal)
     *     -> Pacific/Guam (Pacific/Guam)
     *     -> Pacific/Honolulu (Pacific/Honolulu)
     *     -> Pacific/Johnston (Pacific/Johnston)
     *     -> Pacific/Kiritimati (Pacific/Kiritimati)
     *     -> Pacific/Kosrae (Pacific/Kosrae)
     *     -> Pacific/Kwajalein (Pacific/Kwajalein)
     *     -> Pacific/Majuro (Pacific/Majuro)
     *     -> Pacific/Marquesas (Pacific/Marquesas)
     *     -> Pacific/Midway (Pacific/Midway)
     *     -> Pacific/Nauru (Pacific/Nauru)
     *     -> Pacific/Niue (Pacific/Niue)
     *     -> Pacific/Norfolk (Pacific/Norfolk)
     *     -> Pacific/Noumea (Pacific/Noumea)
     *     -> Pacific/Pago_Pago (Pacific/Pago_Pago)
     *     -> Pacific/Palau (Pacific/Palau)
     *     -> Pacific/Pitcairn (Pacific/Pitcairn)
     *     -> Pacific/Pohnpei (Pacific/Pohnpei)
     *     -> Pacific/Ponape (Pacific/Ponape)
     *     -> Pacific/Port_Moresby (Pacific/Port_Moresby)
     *     -> Pacific/Rarotonga (Pacific/Rarotonga)
     *     -> Pacific/Saipan (Pacific/Saipan)
     *     -> Pacific/Samoa (Pacific/Samoa)
     *     -> Pacific/Tahiti (Pacific/Tahiti)
     *     -> Pacific/Tarawa (Pacific/Tarawa)
     *     -> Pacific/Tongatapu (Pacific/Tongatapu)
     *     -> Pacific/Truk (Pacific/Truk)
     *     -> Pacific/Wake (Pacific/Wake)
     *     -> Pacific/Wallis (Pacific/Wallis)
     *     -> Pacific/Yap (Pacific/Yap)
     *     -> Poland (Poland)
     *     -> Portugal (Portugal)
     *     -> ROC (ROC)
     *     -> ROK (ROK)
     *     -> Singapore (Singapore)
     *     -> Turkey (Turkey)
     *     -> UCT (UCT)
     *     -> US/Alaska (US/Alaska)
     *     -> US/Aleutian (US/Aleutian)
     *     -> US/Arizona (US/Arizona)
     *     -> US/Central (US/Central)
     *     -> US/East-Indiana (US/East-Indiana)
     *     -> US/Eastern (US/Eastern)
     *     -> US/Hawaii (US/Hawaii)
     *     -> US/Indiana-Starke (US/Indiana-Starke)
     *     -> US/Michigan (US/Michigan)
     *     -> US/Mountain (US/Mountain)
     *     -> US/Pacific (US/Pacific)
     *     -> US/Samoa (US/Samoa)
     *     -> UTC (UTC)
     *     -> Universal (Universal)
     *     -> W-SU (W-SU)
     *     -> WET (WET)
     *     -> Zulu (Zulu)
     *     -> Etc/GMT (Etc/GMT)
     *     -> Etc/GMT+0 (Etc/GMT+0)
     *     -> Etc/GMT+1 (Etc/GMT+1)
     *     -> Etc/GMT+10 (Etc/GMT+10)
     *     -> Etc/GMT+11 (Etc/GMT+11)
     *     -> Etc/GMT+12 (Etc/GMT+12)
     *     -> Etc/GMT+2 (Etc/GMT+2)
     *     -> Etc/GMT+3 (Etc/GMT+3)
     *     -> Etc/GMT+4 (Etc/GMT+4)
     *     -> Etc/GMT+5 (Etc/GMT+5)
     *     -> Etc/GMT+6 (Etc/GMT+6)
     *     -> Etc/GMT+7 (Etc/GMT+7)
     *     -> Etc/GMT+8 (Etc/GMT+8)
     *     -> Etc/GMT+9 (Etc/GMT+9)
     *     -> Etc/GMT-0 (Etc/GMT-0)
     *     -> Etc/GMT-1 (Etc/GMT-1)
     *     -> Etc/GMT-10 (Etc/GMT-10)
     *     -> Etc/GMT-11 (Etc/GMT-11)
     *     -> Etc/GMT-12 (Etc/GMT-12)
     *     -> Etc/GMT-13 (Etc/GMT-13)
     *     -> Etc/GMT-14 (Etc/GMT-14)
     *     -> Etc/GMT-2 (Etc/GMT-2)
     *     -> Etc/GMT-3 (Etc/GMT-3)
     *     -> Etc/GMT-4 (Etc/GMT-4)
     *     -> Etc/GMT-5 (Etc/GMT-5)
     *     -> Etc/GMT-6 (Etc/GMT-6)
     *     -> Etc/GMT-7 (Etc/GMT-7)
     *     -> Etc/GMT-8 (Etc/GMT-8)
     *     -> Etc/GMT-9 (Etc/GMT-9)
     *     -> Etc/GMT0 (Etc/GMT0)
     *     -> Etc/Greenwich (Etc/Greenwich)
     *     -> Etc/UCT (Etc/UCT)
     *     -> Etc/UTC (Etc/UTC)
     *     -> Etc/Universal (Etc/Universal)
     *     -> Etc/Zulu (Etc/Zulu)
     *
     *
     * @var string
     */
    private $tz;

    /**
     * Calendar in 2 weeks mode
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $two_weeks_calendar;

    /**
     * Explanation
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $two_weeks_explanation;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Name
     *        Searchable : yes
     *        Sortable : yes
     * @param string $tz Timezone
     *        This field is used in order to define in which timezone the resources will work.
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> Africa/Abidjan (Africa/Abidjan)
     *            -> Africa/Accra (Africa/Accra)
     *            -> Africa/Addis_Ababa (Africa/Addis_Ababa)
     *            -> Africa/Algiers (Africa/Algiers)
     *            -> Africa/Asmara (Africa/Asmara)
     *            -> Africa/Asmera (Africa/Asmera)
     *            -> Africa/Bamako (Africa/Bamako)
     *            -> Africa/Bangui (Africa/Bangui)
     *            -> Africa/Banjul (Africa/Banjul)
     *            -> Africa/Bissau (Africa/Bissau)
     *            -> Africa/Blantyre (Africa/Blantyre)
     *            -> Africa/Brazzaville (Africa/Brazzaville)
     *            -> Africa/Bujumbura (Africa/Bujumbura)
     *            -> Africa/Cairo (Africa/Cairo)
     *            -> Africa/Casablanca (Africa/Casablanca)
     *            -> Africa/Ceuta (Africa/Ceuta)
     *            -> Africa/Conakry (Africa/Conakry)
     *            -> Africa/Dakar (Africa/Dakar)
     *            -> Africa/Dar_es_Salaam (Africa/Dar_es_Salaam)
     *            -> Africa/Djibouti (Africa/Djibouti)
     *            -> Africa/Douala (Africa/Douala)
     *            -> Africa/El_Aaiun (Africa/El_Aaiun)
     *            -> Africa/Freetown (Africa/Freetown)
     *            -> Africa/Gaborone (Africa/Gaborone)
     *            -> Africa/Harare (Africa/Harare)
     *            -> Africa/Johannesburg (Africa/Johannesburg)
     *            -> Africa/Juba (Africa/Juba)
     *            -> Africa/Kampala (Africa/Kampala)
     *            -> Africa/Khartoum (Africa/Khartoum)
     *            -> Africa/Kigali (Africa/Kigali)
     *            -> Africa/Kinshasa (Africa/Kinshasa)
     *            -> Africa/Lagos (Africa/Lagos)
     *            -> Africa/Libreville (Africa/Libreville)
     *            -> Africa/Lome (Africa/Lome)
     *            -> Africa/Luanda (Africa/Luanda)
     *            -> Africa/Lubumbashi (Africa/Lubumbashi)
     *            -> Africa/Lusaka (Africa/Lusaka)
     *            -> Africa/Malabo (Africa/Malabo)
     *            -> Africa/Maputo (Africa/Maputo)
     *            -> Africa/Maseru (Africa/Maseru)
     *            -> Africa/Mbabane (Africa/Mbabane)
     *            -> Africa/Mogadishu (Africa/Mogadishu)
     *            -> Africa/Monrovia (Africa/Monrovia)
     *            -> Africa/Nairobi (Africa/Nairobi)
     *            -> Africa/Ndjamena (Africa/Ndjamena)
     *            -> Africa/Niamey (Africa/Niamey)
     *            -> Africa/Nouakchott (Africa/Nouakchott)
     *            -> Africa/Ouagadougou (Africa/Ouagadougou)
     *            -> Africa/Porto-Novo (Africa/Porto-Novo)
     *            -> Africa/Sao_Tome (Africa/Sao_Tome)
     *            -> Africa/Timbuktu (Africa/Timbuktu)
     *            -> Africa/Tripoli (Africa/Tripoli)
     *            -> Africa/Tunis (Africa/Tunis)
     *            -> Africa/Windhoek (Africa/Windhoek)
     *            -> America/Adak (America/Adak)
     *            -> America/Anchorage (America/Anchorage)
     *            -> America/Anguilla (America/Anguilla)
     *            -> America/Antigua (America/Antigua)
     *            -> America/Araguaina (America/Araguaina)
     *            -> America/Argentina/Buenos_Aires (America/Argentina/Buenos_Aires)
     *            -> America/Argentina/Catamarca (America/Argentina/Catamarca)
     *            -> America/Argentina/ComodRivadavia (America/Argentina/ComodRivadavia)
     *            -> America/Argentina/Cordoba (America/Argentina/Cordoba)
     *            -> America/Argentina/Jujuy (America/Argentina/Jujuy)
     *            -> America/Argentina/La_Rioja (America/Argentina/La_Rioja)
     *            -> America/Argentina/Mendoza (America/Argentina/Mendoza)
     *            -> America/Argentina/Rio_Gallegos (America/Argentina/Rio_Gallegos)
     *            -> America/Argentina/Salta (America/Argentina/Salta)
     *            -> America/Argentina/San_Juan (America/Argentina/San_Juan)
     *            -> America/Argentina/San_Luis (America/Argentina/San_Luis)
     *            -> America/Argentina/Tucuman (America/Argentina/Tucuman)
     *            -> America/Argentina/Ushuaia (America/Argentina/Ushuaia)
     *            -> America/Aruba (America/Aruba)
     *            -> America/Asuncion (America/Asuncion)
     *            -> America/Atikokan (America/Atikokan)
     *            -> America/Atka (America/Atka)
     *            -> America/Bahia (America/Bahia)
     *            -> America/Bahia_Banderas (America/Bahia_Banderas)
     *            -> America/Barbados (America/Barbados)
     *            -> America/Belem (America/Belem)
     *            -> America/Belize (America/Belize)
     *            -> America/Blanc-Sablon (America/Blanc-Sablon)
     *            -> America/Boa_Vista (America/Boa_Vista)
     *            -> America/Bogota (America/Bogota)
     *            -> America/Boise (America/Boise)
     *            -> America/Buenos_Aires (America/Buenos_Aires)
     *            -> America/Cambridge_Bay (America/Cambridge_Bay)
     *            -> America/Campo_Grande (America/Campo_Grande)
     *            -> America/Cancun (America/Cancun)
     *            -> America/Caracas (America/Caracas)
     *            -> America/Catamarca (America/Catamarca)
     *            -> America/Cayenne (America/Cayenne)
     *            -> America/Cayman (America/Cayman)
     *            -> America/Chicago (America/Chicago)
     *            -> America/Chihuahua (America/Chihuahua)
     *            -> America/Coral_Harbour (America/Coral_Harbour)
     *            -> America/Cordoba (America/Cordoba)
     *            -> America/Costa_Rica (America/Costa_Rica)
     *            -> America/Creston (America/Creston)
     *            -> America/Cuiaba (America/Cuiaba)
     *            -> America/Curacao (America/Curacao)
     *            -> America/Danmarkshavn (America/Danmarkshavn)
     *            -> America/Dawson (America/Dawson)
     *            -> America/Dawson_Creek (America/Dawson_Creek)
     *            -> America/Denver (America/Denver)
     *            -> America/Detroit (America/Detroit)
     *            -> America/Dominica (America/Dominica)
     *            -> America/Edmonton (America/Edmonton)
     *            -> America/Eirunepe (America/Eirunepe)
     *            -> America/El_Salvador (America/El_Salvador)
     *            -> America/Ensenada (America/Ensenada)
     *            -> America/Fort_Nelson (America/Fort_Nelson)
     *            -> America/Fort_Wayne (America/Fort_Wayne)
     *            -> America/Fortaleza (America/Fortaleza)
     *            -> America/Glace_Bay (America/Glace_Bay)
     *            -> America/Godthab (America/Godthab)
     *            -> America/Goose_Bay (America/Goose_Bay)
     *            -> America/Grand_Turk (America/Grand_Turk)
     *            -> America/Grenada (America/Grenada)
     *            -> America/Guadeloupe (America/Guadeloupe)
     *            -> America/Guatemala (America/Guatemala)
     *            -> America/Guayaquil (America/Guayaquil)
     *            -> America/Guyana (America/Guyana)
     *            -> America/Halifax (America/Halifax)
     *            -> America/Havana (America/Havana)
     *            -> America/Hermosillo (America/Hermosillo)
     *            -> America/Indiana/Indianapolis (America/Indiana/Indianapolis)
     *            -> America/Indiana/Knox (America/Indiana/Knox)
     *            -> America/Indiana/Marengo (America/Indiana/Marengo)
     *            -> America/Indiana/Petersburg (America/Indiana/Petersburg)
     *            -> America/Indiana/Tell_City (America/Indiana/Tell_City)
     *            -> America/Indiana/Vevay (America/Indiana/Vevay)
     *            -> America/Indiana/Vincennes (America/Indiana/Vincennes)
     *            -> America/Indiana/Winamac (America/Indiana/Winamac)
     *            -> America/Indianapolis (America/Indianapolis)
     *            -> America/Inuvik (America/Inuvik)
     *            -> America/Iqaluit (America/Iqaluit)
     *            -> America/Jamaica (America/Jamaica)
     *            -> America/Jujuy (America/Jujuy)
     *            -> America/Juneau (America/Juneau)
     *            -> America/Kentucky/Louisville (America/Kentucky/Louisville)
     *            -> America/Kentucky/Monticello (America/Kentucky/Monticello)
     *            -> America/Knox_IN (America/Knox_IN)
     *            -> America/Kralendijk (America/Kralendijk)
     *            -> America/La_Paz (America/La_Paz)
     *            -> America/Lima (America/Lima)
     *            -> America/Los_Angeles (America/Los_Angeles)
     *            -> America/Louisville (America/Louisville)
     *            -> America/Lower_Princes (America/Lower_Princes)
     *            -> America/Maceio (America/Maceio)
     *            -> America/Managua (America/Managua)
     *            -> America/Manaus (America/Manaus)
     *            -> America/Marigot (America/Marigot)
     *            -> America/Martinique (America/Martinique)
     *            -> America/Matamoros (America/Matamoros)
     *            -> America/Mazatlan (America/Mazatlan)
     *            -> America/Mendoza (America/Mendoza)
     *            -> America/Menominee (America/Menominee)
     *            -> America/Merida (America/Merida)
     *            -> America/Metlakatla (America/Metlakatla)
     *            -> America/Mexico_City (America/Mexico_City)
     *            -> America/Miquelon (America/Miquelon)
     *            -> America/Moncton (America/Moncton)
     *            -> America/Monterrey (America/Monterrey)
     *            -> America/Montevideo (America/Montevideo)
     *            -> America/Montreal (America/Montreal)
     *            -> America/Montserrat (America/Montserrat)
     *            -> America/Nassau (America/Nassau)
     *            -> America/New_York (America/New_York)
     *            -> America/Nipigon (America/Nipigon)
     *            -> America/Nome (America/Nome)
     *            -> America/Noronha (America/Noronha)
     *            -> America/North_Dakota/Beulah (America/North_Dakota/Beulah)
     *            -> America/North_Dakota/Center (America/North_Dakota/Center)
     *            -> America/North_Dakota/New_Salem (America/North_Dakota/New_Salem)
     *            -> America/Nuuk (America/Nuuk)
     *            -> America/Ojinaga (America/Ojinaga)
     *            -> America/Panama (America/Panama)
     *            -> America/Pangnirtung (America/Pangnirtung)
     *            -> America/Paramaribo (America/Paramaribo)
     *            -> America/Phoenix (America/Phoenix)
     *            -> America/Port-au-Prince (America/Port-au-Prince)
     *            -> America/Port_of_Spain (America/Port_of_Spain)
     *            -> America/Porto_Acre (America/Porto_Acre)
     *            -> America/Porto_Velho (America/Porto_Velho)
     *            -> America/Puerto_Rico (America/Puerto_Rico)
     *            -> America/Punta_Arenas (America/Punta_Arenas)
     *            -> America/Rainy_River (America/Rainy_River)
     *            -> America/Rankin_Inlet (America/Rankin_Inlet)
     *            -> America/Recife (America/Recife)
     *            -> America/Regina (America/Regina)
     *            -> America/Resolute (America/Resolute)
     *            -> America/Rio_Branco (America/Rio_Branco)
     *            -> America/Rosario (America/Rosario)
     *            -> America/Santa_Isabel (America/Santa_Isabel)
     *            -> America/Santarem (America/Santarem)
     *            -> America/Santiago (America/Santiago)
     *            -> America/Santo_Domingo (America/Santo_Domingo)
     *            -> America/Sao_Paulo (America/Sao_Paulo)
     *            -> America/Scoresbysund (America/Scoresbysund)
     *            -> America/Shiprock (America/Shiprock)
     *            -> America/Sitka (America/Sitka)
     *            -> America/St_Barthelemy (America/St_Barthelemy)
     *            -> America/St_Johns (America/St_Johns)
     *            -> America/St_Kitts (America/St_Kitts)
     *            -> America/St_Lucia (America/St_Lucia)
     *            -> America/St_Thomas (America/St_Thomas)
     *            -> America/St_Vincent (America/St_Vincent)
     *            -> America/Swift_Current (America/Swift_Current)
     *            -> America/Tegucigalpa (America/Tegucigalpa)
     *            -> America/Thule (America/Thule)
     *            -> America/Thunder_Bay (America/Thunder_Bay)
     *            -> America/Tijuana (America/Tijuana)
     *            -> America/Toronto (America/Toronto)
     *            -> America/Tortola (America/Tortola)
     *            -> America/Vancouver (America/Vancouver)
     *            -> America/Virgin (America/Virgin)
     *            -> America/Whitehorse (America/Whitehorse)
     *            -> America/Winnipeg (America/Winnipeg)
     *            -> America/Yakutat (America/Yakutat)
     *            -> America/Yellowknife (America/Yellowknife)
     *            -> Antarctica/Casey (Antarctica/Casey)
     *            -> Antarctica/Davis (Antarctica/Davis)
     *            -> Antarctica/DumontDUrville (Antarctica/DumontDUrville)
     *            -> Antarctica/Macquarie (Antarctica/Macquarie)
     *            -> Antarctica/Mawson (Antarctica/Mawson)
     *            -> Antarctica/McMurdo (Antarctica/McMurdo)
     *            -> Antarctica/Palmer (Antarctica/Palmer)
     *            -> Antarctica/Rothera (Antarctica/Rothera)
     *            -> Antarctica/South_Pole (Antarctica/South_Pole)
     *            -> Antarctica/Syowa (Antarctica/Syowa)
     *            -> Antarctica/Troll (Antarctica/Troll)
     *            -> Antarctica/Vostok (Antarctica/Vostok)
     *            -> Arctic/Longyearbyen (Arctic/Longyearbyen)
     *            -> Asia/Aden (Asia/Aden)
     *            -> Asia/Almaty (Asia/Almaty)
     *            -> Asia/Amman (Asia/Amman)
     *            -> Asia/Anadyr (Asia/Anadyr)
     *            -> Asia/Aqtau (Asia/Aqtau)
     *            -> Asia/Aqtobe (Asia/Aqtobe)
     *            -> Asia/Ashgabat (Asia/Ashgabat)
     *            -> Asia/Ashkhabad (Asia/Ashkhabad)
     *            -> Asia/Atyrau (Asia/Atyrau)
     *            -> Asia/Baghdad (Asia/Baghdad)
     *            -> Asia/Bahrain (Asia/Bahrain)
     *            -> Asia/Baku (Asia/Baku)
     *            -> Asia/Bangkok (Asia/Bangkok)
     *            -> Asia/Barnaul (Asia/Barnaul)
     *            -> Asia/Beirut (Asia/Beirut)
     *            -> Asia/Bishkek (Asia/Bishkek)
     *            -> Asia/Brunei (Asia/Brunei)
     *            -> Asia/Calcutta (Asia/Calcutta)
     *            -> Asia/Chita (Asia/Chita)
     *            -> Asia/Choibalsan (Asia/Choibalsan)
     *            -> Asia/Chongqing (Asia/Chongqing)
     *            -> Asia/Chungking (Asia/Chungking)
     *            -> Asia/Colombo (Asia/Colombo)
     *            -> Asia/Dacca (Asia/Dacca)
     *            -> Asia/Damascus (Asia/Damascus)
     *            -> Asia/Dhaka (Asia/Dhaka)
     *            -> Asia/Dili (Asia/Dili)
     *            -> Asia/Dubai (Asia/Dubai)
     *            -> Asia/Dushanbe (Asia/Dushanbe)
     *            -> Asia/Famagusta (Asia/Famagusta)
     *            -> Asia/Gaza (Asia/Gaza)
     *            -> Asia/Harbin (Asia/Harbin)
     *            -> Asia/Hebron (Asia/Hebron)
     *            -> Asia/Ho_Chi_Minh (Asia/Ho_Chi_Minh)
     *            -> Asia/Hong_Kong (Asia/Hong_Kong)
     *            -> Asia/Hovd (Asia/Hovd)
     *            -> Asia/Irkutsk (Asia/Irkutsk)
     *            -> Asia/Istanbul (Asia/Istanbul)
     *            -> Asia/Jakarta (Asia/Jakarta)
     *            -> Asia/Jayapura (Asia/Jayapura)
     *            -> Asia/Jerusalem (Asia/Jerusalem)
     *            -> Asia/Kabul (Asia/Kabul)
     *            -> Asia/Kamchatka (Asia/Kamchatka)
     *            -> Asia/Karachi (Asia/Karachi)
     *            -> Asia/Kashgar (Asia/Kashgar)
     *            -> Asia/Kathmandu (Asia/Kathmandu)
     *            -> Asia/Katmandu (Asia/Katmandu)
     *            -> Asia/Khandyga (Asia/Khandyga)
     *            -> Asia/Kolkata (Asia/Kolkata)
     *            -> Asia/Krasnoyarsk (Asia/Krasnoyarsk)
     *            -> Asia/Kuala_Lumpur (Asia/Kuala_Lumpur)
     *            -> Asia/Kuching (Asia/Kuching)
     *            -> Asia/Kuwait (Asia/Kuwait)
     *            -> Asia/Macao (Asia/Macao)
     *            -> Asia/Macau (Asia/Macau)
     *            -> Asia/Magadan (Asia/Magadan)
     *            -> Asia/Makassar (Asia/Makassar)
     *            -> Asia/Manila (Asia/Manila)
     *            -> Asia/Muscat (Asia/Muscat)
     *            -> Asia/Nicosia (Asia/Nicosia)
     *            -> Asia/Novokuznetsk (Asia/Novokuznetsk)
     *            -> Asia/Novosibirsk (Asia/Novosibirsk)
     *            -> Asia/Omsk (Asia/Omsk)
     *            -> Asia/Oral (Asia/Oral)
     *            -> Asia/Phnom_Penh (Asia/Phnom_Penh)
     *            -> Asia/Pontianak (Asia/Pontianak)
     *            -> Asia/Pyongyang (Asia/Pyongyang)
     *            -> Asia/Qatar (Asia/Qatar)
     *            -> Asia/Qostanay (Asia/Qostanay)
     *            -> Asia/Qyzylorda (Asia/Qyzylorda)
     *            -> Asia/Rangoon (Asia/Rangoon)
     *            -> Asia/Riyadh (Asia/Riyadh)
     *            -> Asia/Saigon (Asia/Saigon)
     *            -> Asia/Sakhalin (Asia/Sakhalin)
     *            -> Asia/Samarkand (Asia/Samarkand)
     *            -> Asia/Seoul (Asia/Seoul)
     *            -> Asia/Shanghai (Asia/Shanghai)
     *            -> Asia/Singapore (Asia/Singapore)
     *            -> Asia/Srednekolymsk (Asia/Srednekolymsk)
     *            -> Asia/Taipei (Asia/Taipei)
     *            -> Asia/Tashkent (Asia/Tashkent)
     *            -> Asia/Tbilisi (Asia/Tbilisi)
     *            -> Asia/Tehran (Asia/Tehran)
     *            -> Asia/Tel_Aviv (Asia/Tel_Aviv)
     *            -> Asia/Thimbu (Asia/Thimbu)
     *            -> Asia/Thimphu (Asia/Thimphu)
     *            -> Asia/Tokyo (Asia/Tokyo)
     *            -> Asia/Tomsk (Asia/Tomsk)
     *            -> Asia/Ujung_Pandang (Asia/Ujung_Pandang)
     *            -> Asia/Ulaanbaatar (Asia/Ulaanbaatar)
     *            -> Asia/Ulan_Bator (Asia/Ulan_Bator)
     *            -> Asia/Urumqi (Asia/Urumqi)
     *            -> Asia/Ust-Nera (Asia/Ust-Nera)
     *            -> Asia/Vientiane (Asia/Vientiane)
     *            -> Asia/Vladivostok (Asia/Vladivostok)
     *            -> Asia/Yakutsk (Asia/Yakutsk)
     *            -> Asia/Yangon (Asia/Yangon)
     *            -> Asia/Yekaterinburg (Asia/Yekaterinburg)
     *            -> Asia/Yerevan (Asia/Yerevan)
     *            -> Atlantic/Azores (Atlantic/Azores)
     *            -> Atlantic/Bermuda (Atlantic/Bermuda)
     *            -> Atlantic/Canary (Atlantic/Canary)
     *            -> Atlantic/Cape_Verde (Atlantic/Cape_Verde)
     *            -> Atlantic/Faeroe (Atlantic/Faeroe)
     *            -> Atlantic/Faroe (Atlantic/Faroe)
     *            -> Atlantic/Jan_Mayen (Atlantic/Jan_Mayen)
     *            -> Atlantic/Madeira (Atlantic/Madeira)
     *            -> Atlantic/Reykjavik (Atlantic/Reykjavik)
     *            -> Atlantic/South_Georgia (Atlantic/South_Georgia)
     *            -> Atlantic/St_Helena (Atlantic/St_Helena)
     *            -> Atlantic/Stanley (Atlantic/Stanley)
     *            -> Australia/ACT (Australia/ACT)
     *            -> Australia/Adelaide (Australia/Adelaide)
     *            -> Australia/Brisbane (Australia/Brisbane)
     *            -> Australia/Broken_Hill (Australia/Broken_Hill)
     *            -> Australia/Canberra (Australia/Canberra)
     *            -> Australia/Currie (Australia/Currie)
     *            -> Australia/Darwin (Australia/Darwin)
     *            -> Australia/Eucla (Australia/Eucla)
     *            -> Australia/Hobart (Australia/Hobart)
     *            -> Australia/LHI (Australia/LHI)
     *            -> Australia/Lindeman (Australia/Lindeman)
     *            -> Australia/Lord_Howe (Australia/Lord_Howe)
     *            -> Australia/Melbourne (Australia/Melbourne)
     *            -> Australia/NSW (Australia/NSW)
     *            -> Australia/North (Australia/North)
     *            -> Australia/Perth (Australia/Perth)
     *            -> Australia/Queensland (Australia/Queensland)
     *            -> Australia/South (Australia/South)
     *            -> Australia/Sydney (Australia/Sydney)
     *            -> Australia/Tasmania (Australia/Tasmania)
     *            -> Australia/Victoria (Australia/Victoria)
     *            -> Australia/West (Australia/West)
     *            -> Australia/Yancowinna (Australia/Yancowinna)
     *            -> Brazil/Acre (Brazil/Acre)
     *            -> Brazil/DeNoronha (Brazil/DeNoronha)
     *            -> Brazil/East (Brazil/East)
     *            -> Brazil/West (Brazil/West)
     *            -> CET (CET)
     *            -> CST6CDT (CST6CDT)
     *            -> Canada/Atlantic (Canada/Atlantic)
     *            -> Canada/Central (Canada/Central)
     *            -> Canada/Eastern (Canada/Eastern)
     *            -> Canada/Mountain (Canada/Mountain)
     *            -> Canada/Newfoundland (Canada/Newfoundland)
     *            -> Canada/Pacific (Canada/Pacific)
     *            -> Canada/Saskatchewan (Canada/Saskatchewan)
     *            -> Canada/Yukon (Canada/Yukon)
     *            -> Chile/Continental (Chile/Continental)
     *            -> Chile/EasterIsland (Chile/EasterIsland)
     *            -> Cuba (Cuba)
     *            -> EET (EET)
     *            -> EST (EST)
     *            -> EST5EDT (EST5EDT)
     *            -> Egypt (Egypt)
     *            -> Eire (Eire)
     *            -> Europe/Amsterdam (Europe/Amsterdam)
     *            -> Europe/Andorra (Europe/Andorra)
     *            -> Europe/Astrakhan (Europe/Astrakhan)
     *            -> Europe/Athens (Europe/Athens)
     *            -> Europe/Belfast (Europe/Belfast)
     *            -> Europe/Belgrade (Europe/Belgrade)
     *            -> Europe/Berlin (Europe/Berlin)
     *            -> Europe/Bratislava (Europe/Bratislava)
     *            -> Europe/Brussels (Europe/Brussels)
     *            -> Europe/Bucharest (Europe/Bucharest)
     *            -> Europe/Budapest (Europe/Budapest)
     *            -> Europe/Busingen (Europe/Busingen)
     *            -> Europe/Chisinau (Europe/Chisinau)
     *            -> Europe/Copenhagen (Europe/Copenhagen)
     *            -> Europe/Dublin (Europe/Dublin)
     *            -> Europe/Gibraltar (Europe/Gibraltar)
     *            -> Europe/Guernsey (Europe/Guernsey)
     *            -> Europe/Helsinki (Europe/Helsinki)
     *            -> Europe/Isle_of_Man (Europe/Isle_of_Man)
     *            -> Europe/Istanbul (Europe/Istanbul)
     *            -> Europe/Jersey (Europe/Jersey)
     *            -> Europe/Kaliningrad (Europe/Kaliningrad)
     *            -> Europe/Kiev (Europe/Kiev)
     *            -> Europe/Kirov (Europe/Kirov)
     *            -> Europe/Lisbon (Europe/Lisbon)
     *            -> Europe/Ljubljana (Europe/Ljubljana)
     *            -> Europe/London (Europe/London)
     *            -> Europe/Luxembourg (Europe/Luxembourg)
     *            -> Europe/Madrid (Europe/Madrid)
     *            -> Europe/Malta (Europe/Malta)
     *            -> Europe/Mariehamn (Europe/Mariehamn)
     *            -> Europe/Minsk (Europe/Minsk)
     *            -> Europe/Monaco (Europe/Monaco)
     *            -> Europe/Moscow (Europe/Moscow)
     *            -> Europe/Nicosia (Europe/Nicosia)
     *            -> Europe/Oslo (Europe/Oslo)
     *            -> Europe/Paris (Europe/Paris)
     *            -> Europe/Podgorica (Europe/Podgorica)
     *            -> Europe/Prague (Europe/Prague)
     *            -> Europe/Riga (Europe/Riga)
     *            -> Europe/Rome (Europe/Rome)
     *            -> Europe/Samara (Europe/Samara)
     *            -> Europe/San_Marino (Europe/San_Marino)
     *            -> Europe/Sarajevo (Europe/Sarajevo)
     *            -> Europe/Saratov (Europe/Saratov)
     *            -> Europe/Simferopol (Europe/Simferopol)
     *            -> Europe/Skopje (Europe/Skopje)
     *            -> Europe/Sofia (Europe/Sofia)
     *            -> Europe/Stockholm (Europe/Stockholm)
     *            -> Europe/Tallinn (Europe/Tallinn)
     *            -> Europe/Tirane (Europe/Tirane)
     *            -> Europe/Tiraspol (Europe/Tiraspol)
     *            -> Europe/Ulyanovsk (Europe/Ulyanovsk)
     *            -> Europe/Uzhgorod (Europe/Uzhgorod)
     *            -> Europe/Vaduz (Europe/Vaduz)
     *            -> Europe/Vatican (Europe/Vatican)
     *            -> Europe/Vienna (Europe/Vienna)
     *            -> Europe/Vilnius (Europe/Vilnius)
     *            -> Europe/Volgograd (Europe/Volgograd)
     *            -> Europe/Warsaw (Europe/Warsaw)
     *            -> Europe/Zagreb (Europe/Zagreb)
     *            -> Europe/Zaporozhye (Europe/Zaporozhye)
     *            -> Europe/Zurich (Europe/Zurich)
     *            -> GB (GB)
     *            -> GB-Eire (GB-Eire)
     *            -> GMT (GMT)
     *            -> GMT+0 (GMT+0)
     *            -> GMT-0 (GMT-0)
     *            -> GMT0 (GMT0)
     *            -> Greenwich (Greenwich)
     *            -> HST (HST)
     *            -> Hongkong (Hongkong)
     *            -> Iceland (Iceland)
     *            -> Indian/Antananarivo (Indian/Antananarivo)
     *            -> Indian/Chagos (Indian/Chagos)
     *            -> Indian/Christmas (Indian/Christmas)
     *            -> Indian/Cocos (Indian/Cocos)
     *            -> Indian/Comoro (Indian/Comoro)
     *            -> Indian/Kerguelen (Indian/Kerguelen)
     *            -> Indian/Mahe (Indian/Mahe)
     *            -> Indian/Maldives (Indian/Maldives)
     *            -> Indian/Mauritius (Indian/Mauritius)
     *            -> Indian/Mayotte (Indian/Mayotte)
     *            -> Indian/Reunion (Indian/Reunion)
     *            -> Iran (Iran)
     *            -> Israel (Israel)
     *            -> Jamaica (Jamaica)
     *            -> Japan (Japan)
     *            -> Kwajalein (Kwajalein)
     *            -> Libya (Libya)
     *            -> MET (MET)
     *            -> MST (MST)
     *            -> MST7MDT (MST7MDT)
     *            -> Mexico/BajaNorte (Mexico/BajaNorte)
     *            -> Mexico/BajaSur (Mexico/BajaSur)
     *            -> Mexico/General (Mexico/General)
     *            -> NZ (NZ)
     *            -> NZ-CHAT (NZ-CHAT)
     *            -> Navajo (Navajo)
     *            -> PRC (PRC)
     *            -> PST8PDT (PST8PDT)
     *            -> Pacific/Apia (Pacific/Apia)
     *            -> Pacific/Auckland (Pacific/Auckland)
     *            -> Pacific/Bougainville (Pacific/Bougainville)
     *            -> Pacific/Chatham (Pacific/Chatham)
     *            -> Pacific/Chuuk (Pacific/Chuuk)
     *            -> Pacific/Easter (Pacific/Easter)
     *            -> Pacific/Efate (Pacific/Efate)
     *            -> Pacific/Enderbury (Pacific/Enderbury)
     *            -> Pacific/Fakaofo (Pacific/Fakaofo)
     *            -> Pacific/Fiji (Pacific/Fiji)
     *            -> Pacific/Funafuti (Pacific/Funafuti)
     *            -> Pacific/Galapagos (Pacific/Galapagos)
     *            -> Pacific/Gambier (Pacific/Gambier)
     *            -> Pacific/Guadalcanal (Pacific/Guadalcanal)
     *            -> Pacific/Guam (Pacific/Guam)
     *            -> Pacific/Honolulu (Pacific/Honolulu)
     *            -> Pacific/Johnston (Pacific/Johnston)
     *            -> Pacific/Kiritimati (Pacific/Kiritimati)
     *            -> Pacific/Kosrae (Pacific/Kosrae)
     *            -> Pacific/Kwajalein (Pacific/Kwajalein)
     *            -> Pacific/Majuro (Pacific/Majuro)
     *            -> Pacific/Marquesas (Pacific/Marquesas)
     *            -> Pacific/Midway (Pacific/Midway)
     *            -> Pacific/Nauru (Pacific/Nauru)
     *            -> Pacific/Niue (Pacific/Niue)
     *            -> Pacific/Norfolk (Pacific/Norfolk)
     *            -> Pacific/Noumea (Pacific/Noumea)
     *            -> Pacific/Pago_Pago (Pacific/Pago_Pago)
     *            -> Pacific/Palau (Pacific/Palau)
     *            -> Pacific/Pitcairn (Pacific/Pitcairn)
     *            -> Pacific/Pohnpei (Pacific/Pohnpei)
     *            -> Pacific/Ponape (Pacific/Ponape)
     *            -> Pacific/Port_Moresby (Pacific/Port_Moresby)
     *            -> Pacific/Rarotonga (Pacific/Rarotonga)
     *            -> Pacific/Saipan (Pacific/Saipan)
     *            -> Pacific/Samoa (Pacific/Samoa)
     *            -> Pacific/Tahiti (Pacific/Tahiti)
     *            -> Pacific/Tarawa (Pacific/Tarawa)
     *            -> Pacific/Tongatapu (Pacific/Tongatapu)
     *            -> Pacific/Truk (Pacific/Truk)
     *            -> Pacific/Wake (Pacific/Wake)
     *            -> Pacific/Wallis (Pacific/Wallis)
     *            -> Pacific/Yap (Pacific/Yap)
     *            -> Poland (Poland)
     *            -> Portugal (Portugal)
     *            -> ROC (ROC)
     *            -> ROK (ROK)
     *            -> Singapore (Singapore)
     *            -> Turkey (Turkey)
     *            -> UCT (UCT)
     *            -> US/Alaska (US/Alaska)
     *            -> US/Aleutian (US/Aleutian)
     *            -> US/Arizona (US/Arizona)
     *            -> US/Central (US/Central)
     *            -> US/East-Indiana (US/East-Indiana)
     *            -> US/Eastern (US/Eastern)
     *            -> US/Hawaii (US/Hawaii)
     *            -> US/Indiana-Starke (US/Indiana-Starke)
     *            -> US/Michigan (US/Michigan)
     *            -> US/Mountain (US/Mountain)
     *            -> US/Pacific (US/Pacific)
     *            -> US/Samoa (US/Samoa)
     *            -> UTC (UTC)
     *            -> Universal (Universal)
     *            -> W-SU (W-SU)
     *            -> WET (WET)
     *            -> Zulu (Zulu)
     *            -> Etc/GMT (Etc/GMT)
     *            -> Etc/GMT+0 (Etc/GMT+0)
     *            -> Etc/GMT+1 (Etc/GMT+1)
     *            -> Etc/GMT+10 (Etc/GMT+10)
     *            -> Etc/GMT+11 (Etc/GMT+11)
     *            -> Etc/GMT+12 (Etc/GMT+12)
     *            -> Etc/GMT+2 (Etc/GMT+2)
     *            -> Etc/GMT+3 (Etc/GMT+3)
     *            -> Etc/GMT+4 (Etc/GMT+4)
     *            -> Etc/GMT+5 (Etc/GMT+5)
     *            -> Etc/GMT+6 (Etc/GMT+6)
     *            -> Etc/GMT+7 (Etc/GMT+7)
     *            -> Etc/GMT+8 (Etc/GMT+8)
     *            -> Etc/GMT+9 (Etc/GMT+9)
     *            -> Etc/GMT-0 (Etc/GMT-0)
     *            -> Etc/GMT-1 (Etc/GMT-1)
     *            -> Etc/GMT-10 (Etc/GMT-10)
     *            -> Etc/GMT-11 (Etc/GMT-11)
     *            -> Etc/GMT-12 (Etc/GMT-12)
     *            -> Etc/GMT-13 (Etc/GMT-13)
     *            -> Etc/GMT-14 (Etc/GMT-14)
     *            -> Etc/GMT-2 (Etc/GMT-2)
     *            -> Etc/GMT-3 (Etc/GMT-3)
     *            -> Etc/GMT-4 (Etc/GMT-4)
     *            -> Etc/GMT-5 (Etc/GMT-5)
     *            -> Etc/GMT-6 (Etc/GMT-6)
     *            -> Etc/GMT-7 (Etc/GMT-7)
     *            -> Etc/GMT-8 (Etc/GMT-8)
     *            -> Etc/GMT-9 (Etc/GMT-9)
     *            -> Etc/GMT0 (Etc/GMT0)
     *            -> Etc/Greenwich (Etc/Greenwich)
     *            -> Etc/UCT (Etc/UCT)
     *            -> Etc/UTC (Etc/UTC)
     *            -> Etc/Universal (Etc/Universal)
     *            -> Etc/Zulu (Etc/Zulu)
     *
     */
    public function __construct(string $name, string $tz)
    {
        $this->name = $name;
        $this->tz = $tz;
    }

    /**
     * @param string|null $two_weeks_explanation
     */
    public function setTwoWeeksExplanation(?string $two_weeks_explanation): void
    {
        $this->two_weeks_explanation = $two_weeks_explanation;
    }

    /**
     * @param float|null $hours_per_day
     */
    public function setHoursPerDay(?float $hours_per_day): void
    {
        $this->hours_per_day = $hours_per_day;
    }

    /**
     * @return string
     */
    public function getTz(): string
    {
        return $this->tz;
    }

    /**
     * @param string $tz
     */
    public function setTz(string $tz): void
    {
        $this->tz = $tz;
    }

    /**
     * @return bool|null
     */
    public function isTwoWeeksCalendar(): ?bool
    {
        return $this->two_weeks_calendar;
    }

    /**
     * @param bool|null $two_weeks_calendar
     */
    public function setTwoWeeksCalendar(?bool $two_weeks_calendar): void
    {
        $this->two_weeks_calendar = $two_weeks_calendar;
    }

    /**
     * @return string|null
     */
    public function getTwoWeeksExplanation(): ?string
    {
        return $this->two_weeks_explanation;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeGlobalLeaveIds(OdooRelation $item): void
    {
        if (null === $this->global_leave_ids) {
            $this->global_leave_ids = [];
        }

        if ($this->hasGlobalLeaveIds($item)) {
            $index = array_search($item, $this->global_leave_ids);
            unset($this->global_leave_ids[$index]);
        }
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return float|null
     */
    public function getHoursPerDay(): ?float
    {
        return $this->hours_per_day;
    }

    /**
     * @param OdooRelation $item
     */
    public function addGlobalLeaveIds(OdooRelation $item): void
    {
        if ($this->hasGlobalLeaveIds($item)) {
            return;
        }

        if (null === $this->global_leave_ids) {
            $this->global_leave_ids = [];
        }

        $this->global_leave_ids[] = $item;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAttendanceIds(OdooRelation $item): void
    {
        if ($this->hasAttendanceIds($item)) {
            return;
        }

        if (null === $this->attendance_ids) {
            $this->attendance_ids = [];
        }

        $this->attendance_ids[] = $item;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getAttendanceIds(): ?array
    {
        return $this->attendance_ids;
    }

    /**
     * @param OdooRelation[]|null $attendance_ids
     */
    public function setAttendanceIds(?array $attendance_ids): void
    {
        $this->attendance_ids = $attendance_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAttendanceIds(OdooRelation $item): bool
    {
        if (null === $this->attendance_ids) {
            return false;
        }

        return in_array($item, $this->attendance_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAttendanceIds(OdooRelation $item): void
    {
        if (null === $this->attendance_ids) {
            $this->attendance_ids = [];
        }

        if ($this->hasAttendanceIds($item)) {
            $index = array_search($item, $this->attendance_ids);
            unset($this->attendance_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasGlobalLeaveIds(OdooRelation $item): bool
    {
        if (null === $this->global_leave_ids) {
            return false;
        }

        return in_array($item, $this->global_leave_ids);
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getLeaveIds(): ?array
    {
        return $this->leave_ids;
    }

    /**
     * @param OdooRelation[]|null $leave_ids
     */
    public function setLeaveIds(?array $leave_ids): void
    {
        $this->leave_ids = $leave_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasLeaveIds(OdooRelation $item): bool
    {
        if (null === $this->leave_ids) {
            return false;
        }

        return in_array($item, $this->leave_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addLeaveIds(OdooRelation $item): void
    {
        if ($this->hasLeaveIds($item)) {
            return;
        }

        if (null === $this->leave_ids) {
            $this->leave_ids = [];
        }

        $this->leave_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeLeaveIds(OdooRelation $item): void
    {
        if (null === $this->leave_ids) {
            $this->leave_ids = [];
        }

        if ($this->hasLeaveIds($item)) {
            $index = array_search($item, $this->leave_ids);
            unset($this->leave_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getGlobalLeaveIds(): ?array
    {
        return $this->global_leave_ids;
    }

    /**
     * @param OdooRelation[]|null $global_leave_ids
     */
    public function setGlobalLeaveIds(?array $global_leave_ids): void
    {
        $this->global_leave_ids = $global_leave_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'resource.calendar';
    }
}

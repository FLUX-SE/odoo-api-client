<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : res.partner
 * ---
 * Name : res.partner
 * ---
 * Info :
 * Update partner to add a field about notification preferences. Add a generic opt-out field that can be used
 *               to restrict usage of automatic email templates.
 */
class Partner extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $name;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $date;

    /**
     * Title
     * ---
     * Relation : many2one (res.partner.title)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner\Title
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $title;

    /**
     * Related Company
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $parent_id;

    /**
     * Parent name
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $parent_name;

    /**
     * Contact
     * ---
     * Relation : one2many (res.partner -> parent_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $child_ids;

    /**
     * Reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $ref;

    /**
     * Language
     * ---
     * All the emails and documents sent to this contact will be translated in this language.
     * ---
     * Selection :
     *     -> en_US (English (US))
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $lang;

    /**
     * Active Lang Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $active_lang_count;

    /**
     * Timezone
     * ---
     * When printing documents and exporting/importing data, time values are computed according to this timezone.
     * If the timezone is not set, UTC (Coordinated Universal Time) is used.
     * Anywhere else, time values are computed according to the time offset of your web client.
     * ---
     * Selection :
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
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $tz;

    /**
     * Timezone offset
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $tz_offset;

    /**
     * Tax ID
     * ---
     * The Tax Identification Number. Complete it if the contact is subjected to government taxes. Used in some legal
     * statements.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $vat;

    /**
     * Partner with same Tax ID
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $same_vat_partner_id;

    /**
     * Banks
     * ---
     * Relation : one2many (res.partner.bank -> partner_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner\Bank
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $bank_ids;

    /**
     * Website Link
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $website;

    /**
     * Notes
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $comment;

    /**
     * Tags
     * ---
     * Relation : many2many (res.partner.category)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner\Category
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $category_id;

    /**
     * Credit Limit
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $credit_limit;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $active;

    /**
     * Employee
     * ---
     * Check this box if this contact is an Employee.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $employee;

    /**
     * Job Position
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $function;

    /**
     * Address Type
     * ---
     * Invoice & Delivery addresses are used in sales orders. Private addresses are only visible by authorized users.
     * ---
     * Selection :
     *     -> contact (Contact)
     *     -> invoice (Invoice Address)
     *     -> delivery (Delivery Address)
     *     -> other (Other Address)
     *     -> private (Private Address)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $type;

    /**
     * Street
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $street;

    /**
     * Street2
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $street2;

    /**
     * Zip
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $zip;

    /**
     * City
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $city;

    /**
     * State
     * ---
     * Relation : many2one (res.country.state)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Country\State
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $state_id;

    /**
     * Country
     * ---
     * Relation : many2one (res.country)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Country
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $country_id;

    /**
     * Geo Latitude
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $partner_latitude;

    /**
     * Geo Longitude
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $partner_longitude;

    /**
     * Formatted Email
     * ---
     * Format email address "Name <email@domain>"
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $email_formatted;

    /**
     * Mobile
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $mobile;

    /**
     * Is a Company
     * ---
     * Check if the contact is a company, otherwise it is a person
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $is_company;

    /**
     * Industry
     * ---
     * Relation : many2one (res.partner.industry)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner\Industry
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $industry_id;

    /**
     * Company Type
     * ---
     * Selection :
     *     -> person (Individual)
     *     -> company (Company)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $company_type;

    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $company_id;

    /**
     * Color Index
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $color;

    /**
     * Users
     * ---
     * Relation : one2many (res.users -> partner_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $user_ids;

    /**
     * Share Partner
     * ---
     * Either customer (not a user), either shared user. Indicated the current partner is a customer without access
     * or with a limited access created for sharing data.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    protected $partner_share;

    /**
     * Complete Address
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $contact_address;

    /**
     * Commercial Entity
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $commercial_partner_id;

    /**
     * Company Name Entity
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $commercial_company_name;

    /**
     * Company Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $company_name;

    /**
     * Barcode
     * ---
     * Use a barcode to identify this contact.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $barcode;

    /**
     * Self
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $self;

    /**
     * IM Status
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $im_status;

    /**
     * Activities
     * ---
     * Relation : one2many (mail.activity -> res_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Activity
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $activity_ids;

    /**
     * Activity State
     * ---
     * Status based on activities
     * Overdue: Due date is already passed
     * Today: Activity date is today
     * Planned: Future activities.
     * ---
     * Selection :
     *     -> overdue (Overdue)
     *     -> today (Today)
     *     -> planned (Planned)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_state;

    /**
     * Responsible User
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $activity_user_id;

    /**
     * Next Activity Type
     * ---
     * Relation : many2one (mail.activity.type)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $activity_type_id;

    /**
     * Activity Type Icon
     * ---
     * Font awesome icon e.g. fa-tasks
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_type_icon;

    /**
     * Next Activity Deadline
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    protected $activity_date_deadline;

    /**
     * Next Activity Summary
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_summary;

    /**
     * Activity Exception Decoration
     * ---
     * Type of the exception activity on record.
     * ---
     * Selection :
     *     -> warning (Alert)
     *     -> danger (Error)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_exception_decoration;

    /**
     * Icon
     * ---
     * Icon to indicate an exception activity.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $activity_exception_icon;

    /**
     * Is Follower
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_is_follower;

    /**
     * Followers
     * ---
     * Relation : one2many (mail.followers -> res_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Followers
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $message_follower_ids;

    /**
     * Followers (Partners)
     * ---
     * Relation : many2many (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $message_partner_ids;

    /**
     * Followers (Channels)
     * ---
     * Relation : many2many (mail.channel)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Channel
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $message_channel_ids;

    /**
     * Messages
     * ---
     * Relation : one2many (mail.message -> res_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $message_ids;

    /**
     * Unread Messages
     * ---
     * If checked, new messages require your attention.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_unread;

    /**
     * Unread Messages Counter
     * ---
     * Number of unread messages
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $message_unread_counter;

    /**
     * Action Needed
     * ---
     * If checked, new messages require your attention.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_needaction;

    /**
     * Number of Actions
     * ---
     * Number of messages which requires an action
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $message_needaction_counter;

    /**
     * Message Delivery error
     * ---
     * If checked, some messages have a delivery error.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_has_error;

    /**
     * Number of errors
     * ---
     * Number of messages with delivery error
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $message_has_error_counter;

    /**
     * Attachment Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $message_attachment_count;

    /**
     * Main Attachment
     * ---
     * Relation : many2one (ir.attachment)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Attachment
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $message_main_attachment_id;

    /**
     * Normalized Email
     * ---
     * This field is used to search on email address as the primary email field can contain more than strictly an
     * email address.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $email_normalized;

    /**
     * Blacklist
     * ---
     * If the email address is on the blacklist, the contact won't receive mass mailing anymore, from any list
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $is_blacklisted;

    /**
     * Bounce
     * ---
     * Counter of the number of bounced emails for this contact
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $message_bounce;

    /**
     * Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $email;

    /**
     * Phone
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $phone;

    /**
     * Channels
     * ---
     * Relation : many2many (mail.channel)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Channel
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $channel_ids;

    /**
     * Salesperson
     * ---
     * The internal user in charge of this contact.
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $user_id;

    /**
     * Contact Address Complete
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $contact_address_complete;

    /**
     * Medium-sized image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_medium;

    /**
     * Signup Token
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $signup_token;

    /**
     * Signup Token Type
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $signup_type;

    /**
     * Signup Expiration
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $signup_expiration;

    /**
     * Signup Token is Valid
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $signup_valid;

    /**
     * Signup URL
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $signup_url;

    /**
     * Sanitized Number
     * ---
     * Field used to store sanitized phone number. Helps speeding up searches and comparisons.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $phone_sanitized;

    /**
     * Phone Blacklisted
     * ---
     * If the sanitized phone number is on the blacklist, the contact won't receive mass mailing sms anymore, from
     * any list
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $phone_sanitized_blacklisted;

    /**
     * Blacklisted Phone is Phone
     * ---
     * Indicates if a blacklisted sanitized phone number is a phone number. Helps distinguish which number is
     * blacklisted             when there is both a mobile and phone field in a model.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $phone_blacklisted;

    /**
     * Blacklisted Phone Is Mobile
     * ---
     * Indicates if a blacklisted sanitized phone number is a mobile number. Helps distinguish which number is
     * blacklisted             when there is both a mobile and phone field in a model.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $mobile_blacklisted;

    /**
     * Pricelist
     * ---
     * This pricelist will be used, instead of the default one, for sales to the current partner
     * ---
     * Relation : many2one (product.pricelist)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Product\Pricelist
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $property_product_pricelist;

    /**
     * OCN Token
     * ---
     * Used for sending notification to registered devices
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $ocn_token;

    /**
     * Company database ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $partner_gid;

    /**
     * Additional info
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $additional_info;

    /**
     * Website Messages
     * ---
     * Website communication history
     * ---
     * Relation : one2many (mail.message -> res_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Message
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $website_message_ids;

    /**
     * SMS Delivery error
     * ---
     * If checked, some messages have a delivery error.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $message_has_sms_error;

    /**
     * Total Receivable
     * ---
     * Total amount this customer owes you.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    protected $credit;

    /**
     * Total Payable
     * ---
     * Total amount you have to pay to this vendor.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var float|null
     */
    protected $debit;

    /**
     * Payable Limit
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    protected $debit_limit;

    /**
     * Total Invoiced
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    protected $total_invoiced;

    /**
     * Currency
     * ---
     * Utility field to express amount currency
     * ---
     * Relation : many2one (res.currency)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Currency
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $currency_id;

    /**
     * Journal Items
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $journal_item_count;

    /**
     * Account Payable
     * ---
     * This account will be used instead of the default one as the payable account for the current partner
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    protected $property_account_payable_id;

    /**
     * Account Receivable
     * ---
     * This account will be used instead of the default one as the receivable account for the current partner
     * ---
     * Relation : many2one (account.account)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation
     */
    protected $property_account_receivable_id;

    /**
     * Fiscal Position
     * ---
     * The fiscal position determines the taxes/accounts used for this contact.
     * ---
     * Relation : many2one (account.fiscal.position)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Fiscal\Position
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $property_account_position_id;

    /**
     * Customer Payment Terms
     * ---
     * This payment term will be used instead of the default one for sales orders and customer invoices
     * ---
     * Relation : many2one (account.payment.term)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Payment\Term
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $property_payment_term_id;

    /**
     * Vendor Payment Terms
     * ---
     * This payment term will be used instead of the default one for purchase orders and vendor bills
     * ---
     * Relation : many2one (account.payment.term)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Payment\Term
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $property_supplier_payment_term_id;

    /**
     * Companies that refers to partner
     * ---
     * Relation : one2many (res.company -> partner_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $ref_company_ids;

    /**
     * Has Unreconciled Entries
     * ---
     * The partner has at least one unreconciled debit and credit since last time the invoices & payments matching
     * was performed.
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    protected $has_unreconciled_entries;

    /**
     * Latest Invoices & Payments Matching Date
     * ---
     * Last time the invoices & payments matching was performed for this partner. It is set either if there's not at
     * least an unreconciled debit and an unreconciled credit or if you click the "Done" button.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $last_time_entries_checked;

    /**
     * Invoices
     * ---
     * Relation : one2many (account.move -> partner_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $invoice_ids;

    /**
     * Partner Contracts
     * ---
     * Relation : one2many (account.analytic.account -> partner_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Analytic\Account
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $contract_ids;

    /**
     * Bank
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $bank_account_count;

    /**
     * Degree of trust you have in this debtor
     * ---
     * Selection :
     *     -> good (Good Debtor)
     *     -> normal (Normal Debtor)
     *     -> bad (Bad Debtor)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $trust;

    /**
     * Invoice
     * ---
     * Selecting the "Warning" option will notify user with the message, Selecting "Blocking Message" will throw an
     * exception with the message and block the flow. The Message has to be written in the next field.
     * ---
     * Selection :
     *     -> no-message (No Message)
     *     -> warning (Warning)
     *     -> block (Blocking Message)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $invoice_warn;

    /**
     * Message for Invoice
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $invoice_warn_msg;

    /**
     * Supplier Rank
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $supplier_rank;

    /**
     * Customer Rank
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $customer_rank;

    /**
     * Payment Method
     * ---
     * Preferred payment method when paying this vendor. This is used to filter vendor bills by preferred payment
     * method to register payments in mass. Use cases: create bank files for batch wires, check runs.
     * ---
     * Relation : many2one (account.payment.method)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Payment\Method
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $property_payment_method_id;

    /**
     * Online Partner Vendor Name
     * ---
     * Technical field used to store information from plaid/yodlee to match partner (used when a purchase is made)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $online_partner_vendor_name;

    /**
     * Online Partner Bank Account
     * ---
     * Technical field used to store information from plaid/yodlee to match partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $online_partner_bank_account;

    /**
     * Payment Tokens
     * ---
     * Relation : one2many (payment.token -> partner_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Payment\Token
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $payment_token_ids;

    /**
     * Count Payment Token
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $payment_token_count;

    /**
     * Online Partner Information
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $online_partner_information;

    /**
     * SIRET
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $siret;

    /**
     * Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_1920;

    /**
     * Image 1024
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_1024;

    /**
     * Image 512
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_512;

    /**
     * Image 256
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_256;

    /**
     * Image 128
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    protected $image_128;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $write_date;

    /**
     * @param OdooRelation $property_account_payable_id Account Payable
     *        ---
     *        This account will be used instead of the default one as the payable account for the current partner
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param OdooRelation $property_account_receivable_id Account Receivable
     *        ---
     *        This account will be used instead of the default one as the receivable account for the current partner
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(
        OdooRelation $property_account_payable_id,
        OdooRelation $property_account_receivable_id
    ) {
        $this->property_account_payable_id = $property_account_payable_id;
        $this->property_account_receivable_id = $property_account_receivable_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("property_product_pricelist")
     */
    public function getPropertyProductPricelist(): ?OdooRelation
    {
        return $this->property_product_pricelist;
    }

    /**
     * @return string|null
     *
     * @SerializedName("additional_info")
     */
    public function getAdditionalInfo(): ?string
    {
        return $this->additional_info;
    }

    /**
     * @param int|null $partner_gid
     */
    public function setPartnerGid(?int $partner_gid): void
    {
        $this->partner_gid = $partner_gid;
    }

    /**
     * @return int|null
     *
     * @SerializedName("partner_gid")
     */
    public function getPartnerGid(): ?int
    {
        return $this->partner_gid;
    }

    /**
     * @param string|null $ocn_token
     */
    public function setOcnToken(?string $ocn_token): void
    {
        $this->ocn_token = $ocn_token;
    }

    /**
     * @return string|null
     *
     * @SerializedName("ocn_token")
     */
    public function getOcnToken(): ?string
    {
        return $this->ocn_token;
    }

    /**
     * @param OdooRelation|null $property_product_pricelist
     */
    public function setPropertyProductPricelist(?OdooRelation $property_product_pricelist): void
    {
        $this->property_product_pricelist = $property_product_pricelist;
    }

    /**
     * @param bool|null $mobile_blacklisted
     */
    public function setMobileBlacklisted(?bool $mobile_blacklisted): void
    {
        $this->mobile_blacklisted = $mobile_blacklisted;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("website_message_ids")
     */
    public function getWebsiteMessageIds(): ?array
    {
        return $this->website_message_ids;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("mobile_blacklisted")
     */
    public function isMobileBlacklisted(): ?bool
    {
        return $this->mobile_blacklisted;
    }

    /**
     * @param bool|null $phone_blacklisted
     */
    public function setPhoneBlacklisted(?bool $phone_blacklisted): void
    {
        $this->phone_blacklisted = $phone_blacklisted;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("phone_blacklisted")
     */
    public function isPhoneBlacklisted(): ?bool
    {
        return $this->phone_blacklisted;
    }

    /**
     * @param bool|null $phone_sanitized_blacklisted
     */
    public function setPhoneSanitizedBlacklisted(?bool $phone_sanitized_blacklisted): void
    {
        $this->phone_sanitized_blacklisted = $phone_sanitized_blacklisted;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("phone_sanitized_blacklisted")
     */
    public function isPhoneSanitizedBlacklisted(): ?bool
    {
        return $this->phone_sanitized_blacklisted;
    }

    /**
     * @param string|null $phone_sanitized
     */
    public function setPhoneSanitized(?string $phone_sanitized): void
    {
        $this->phone_sanitized = $phone_sanitized;
    }

    /**
     * @return string|null
     *
     * @SerializedName("phone_sanitized")
     */
    public function getPhoneSanitized(): ?string
    {
        return $this->phone_sanitized;
    }

    /**
     * @param string|null $additional_info
     */
    public function setAdditionalInfo(?string $additional_info): void
    {
        $this->additional_info = $additional_info;
    }

    /**
     * @param OdooRelation[]|null $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @return string|null
     *
     * @SerializedName("signup_url")
     */
    public function getSignupUrl(): ?string
    {
        return $this->signup_url;
    }

    /**
     * @return float|null
     *
     * @SerializedName("debit_limit")
     */
    public function getDebitLimit(): ?float
    {
        return $this->debit_limit;
    }

    /**
     * @return int|null
     *
     * @SerializedName("journal_item_count")
     */
    public function getJournalItemCount(): ?int
    {
        return $this->journal_item_count;
    }

    /**
     * @param OdooRelation|null $currency_id
     */
    public function setCurrencyId(?OdooRelation $currency_id): void
    {
        $this->currency_id = $currency_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("currency_id")
     */
    public function getCurrencyId(): ?OdooRelation
    {
        return $this->currency_id;
    }

    /**
     * @param float|null $total_invoiced
     */
    public function setTotalInvoiced(?float $total_invoiced): void
    {
        $this->total_invoiced = $total_invoiced;
    }

    /**
     * @return float|null
     *
     * @SerializedName("total_invoiced")
     */
    public function getTotalInvoiced(): ?float
    {
        return $this->total_invoiced;
    }

    /**
     * @param float|null $debit_limit
     */
    public function setDebitLimit(?float $debit_limit): void
    {
        $this->debit_limit = $debit_limit;
    }

    /**
     * @param float|null $debit
     */
    public function setDebit(?float $debit): void
    {
        $this->debit = $debit;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasWebsiteMessageIds(OdooRelation $item): bool
    {
        if (null === $this->website_message_ids) {
            return false;
        }

        return in_array($item, $this->website_message_ids);
    }

    /**
     * @return float|null
     *
     * @SerializedName("debit")
     */
    public function getDebit(): ?float
    {
        return $this->debit;
    }

    /**
     * @param float|null $credit
     */
    public function setCredit(?float $credit): void
    {
        $this->credit = $credit;
    }

    /**
     * @return float|null
     *
     * @SerializedName("credit")
     */
    public function getCredit(): ?float
    {
        return $this->credit;
    }

    /**
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("message_has_sms_error")
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeWebsiteMessageIds(OdooRelation $item): void
    {
        if (null === $this->website_message_ids) {
            $this->website_message_ids = [];
        }

        if ($this->hasWebsiteMessageIds($item)) {
            $index = array_search($item, $this->website_message_ids);
            unset($this->website_message_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addWebsiteMessageIds(OdooRelation $item): void
    {
        if ($this->hasWebsiteMessageIds($item)) {
            return;
        }

        if (null === $this->website_message_ids) {
            $this->website_message_ids = [];
        }

        $this->website_message_ids[] = $item;
    }

    /**
     * @param string|null $signup_url
     */
    public function setSignupUrl(?string $signup_url): void
    {
        $this->signup_url = $signup_url;
    }

    /**
     * @param bool|null $signup_valid
     */
    public function setSignupValid(?bool $signup_valid): void
    {
        $this->signup_valid = $signup_valid;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("property_account_payable_id")
     */
    public function getPropertyAccountPayableId(): OdooRelation
    {
        return $this->property_account_payable_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("email_normalized")
     */
    public function getEmailNormalized(): ?string
    {
        return $this->email_normalized;
    }

    /**
     * @return string|null
     *
     * @SerializedName("email")
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param int|null $message_bounce
     */
    public function setMessageBounce(?int $message_bounce): void
    {
        $this->message_bounce = $message_bounce;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_bounce")
     */
    public function getMessageBounce(): ?int
    {
        return $this->message_bounce;
    }

    /**
     * @param bool|null $is_blacklisted
     */
    public function setIsBlacklisted(?bool $is_blacklisted): void
    {
        $this->is_blacklisted = $is_blacklisted;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_blacklisted")
     */
    public function isIsBlacklisted(): ?bool
    {
        return $this->is_blacklisted;
    }

    /**
     * @param string|null $email_normalized
     */
    public function setEmailNormalized(?string $email_normalized): void
    {
        $this->email_normalized = $email_normalized;
    }

    /**
     * @param OdooRelation|null $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?OdooRelation $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("phone")
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("message_main_attachment_id")
     */
    public function getMessageMainAttachmentId(): ?OdooRelation
    {
        return $this->message_main_attachment_id;
    }

    /**
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_attachment_count")
     */
    public function getMessageAttachmentCount(): ?int
    {
        return $this->message_attachment_count;
    }

    /**
     * @param int|null $message_has_error_counter
     */
    public function setMessageHasErrorCounter(?int $message_has_error_counter): void
    {
        $this->message_has_error_counter = $message_has_error_counter;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_has_error_counter")
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
    }

    /**
     * @param bool|null $message_has_error
     */
    public function setMessageHasError(?bool $message_has_error): void
    {
        $this->message_has_error = $message_has_error;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("message_has_error")
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("signup_valid")
     */
    public function isSignupValid(): ?bool
    {
        return $this->signup_valid;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_medium")
     */
    public function getImageMedium()
    {
        return $this->image_medium;
    }

    /**
     * @param DateTimeInterface|null $signup_expiration
     */
    public function setSignupExpiration(?DateTimeInterface $signup_expiration): void
    {
        $this->signup_expiration = $signup_expiration;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("signup_expiration")
     */
    public function getSignupExpiration(): ?DateTimeInterface
    {
        return $this->signup_expiration;
    }

    /**
     * @param string|null $signup_type
     */
    public function setSignupType(?string $signup_type): void
    {
        $this->signup_type = $signup_type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("signup_type")
     */
    public function getSignupType(): ?string
    {
        return $this->signup_type;
    }

    /**
     * @param string|null $signup_token
     */
    public function setSignupToken(?string $signup_token): void
    {
        $this->signup_token = $signup_token;
    }

    /**
     * @return string|null
     *
     * @SerializedName("signup_token")
     */
    public function getSignupToken(): ?string
    {
        return $this->signup_token;
    }

    /**
     * @param mixed|null $image_medium
     */
    public function setImageMedium($image_medium): void
    {
        $this->image_medium = $image_medium;
    }

    /**
     * @param string|null $contact_address_complete
     */
    public function setContactAddressComplete(?string $contact_address_complete): void
    {
        $this->contact_address_complete = $contact_address_complete;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("channel_ids")
     */
    public function getChannelIds(): ?array
    {
        return $this->channel_ids;
    }

    /**
     * @return string|null
     *
     * @SerializedName("contact_address_complete")
     */
    public function getContactAddressComplete(): ?string
    {
        return $this->contact_address_complete;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("user_id")
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChannelIds(OdooRelation $item): void
    {
        if (null === $this->channel_ids) {
            $this->channel_ids = [];
        }

        if ($this->hasChannelIds($item)) {
            $index = array_search($item, $this->channel_ids);
            unset($this->channel_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addChannelIds(OdooRelation $item): void
    {
        if ($this->hasChannelIds($item)) {
            return;
        }

        if (null === $this->channel_ids) {
            $this->channel_ids = [];
        }

        $this->channel_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChannelIds(OdooRelation $item): bool
    {
        if (null === $this->channel_ids) {
            return false;
        }

        return in_array($item, $this->channel_ids);
    }

    /**
     * @param OdooRelation[]|null $channel_ids
     */
    public function setChannelIds(?array $channel_ids): void
    {
        $this->channel_ids = $channel_ids;
    }

    /**
     * @param int|null $journal_item_count
     */
    public function setJournalItemCount(?int $journal_item_count): void
    {
        $this->journal_item_count = $journal_item_count;
    }

    /**
     * @param OdooRelation $property_account_payable_id
     */
    public function setPropertyAccountPayableId(OdooRelation $property_account_payable_id): void
    {
        $this->property_account_payable_id = $property_account_payable_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_needaction_counter")
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
    }

    /**
     * @param OdooRelation $item
     */
    public function addPaymentTokenIds(OdooRelation $item): void
    {
        if ($this->hasPaymentTokenIds($item)) {
            return;
        }

        if (null === $this->payment_token_ids) {
            $this->payment_token_ids = [];
        }

        $this->payment_token_ids[] = $item;
    }

    /**
     * @return string|null
     *
     * @SerializedName("siret")
     */
    public function getSiret(): ?string
    {
        return $this->siret;
    }

    /**
     * @param string|null $online_partner_information
     */
    public function setOnlinePartnerInformation(?string $online_partner_information): void
    {
        $this->online_partner_information = $online_partner_information;
    }

    /**
     * @return string|null
     *
     * @SerializedName("online_partner_information")
     */
    public function getOnlinePartnerInformation(): ?string
    {
        return $this->online_partner_information;
    }

    /**
     * @param int|null $payment_token_count
     */
    public function setPaymentTokenCount(?int $payment_token_count): void
    {
        $this->payment_token_count = $payment_token_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("payment_token_count")
     */
    public function getPaymentTokenCount(): ?int
    {
        return $this->payment_token_count;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePaymentTokenIds(OdooRelation $item): void
    {
        if (null === $this->payment_token_ids) {
            $this->payment_token_ids = [];
        }

        if ($this->hasPaymentTokenIds($item)) {
            $index = array_search($item, $this->payment_token_ids);
            unset($this->payment_token_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPaymentTokenIds(OdooRelation $item): bool
    {
        if (null === $this->payment_token_ids) {
            return false;
        }

        return in_array($item, $this->payment_token_ids);
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_1920")
     */
    public function getImage1920()
    {
        return $this->image_1920;
    }

    /**
     * @param OdooRelation[]|null $payment_token_ids
     */
    public function setPaymentTokenIds(?array $payment_token_ids): void
    {
        $this->payment_token_ids = $payment_token_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("payment_token_ids")
     */
    public function getPaymentTokenIds(): ?array
    {
        return $this->payment_token_ids;
    }

    /**
     * @param string|null $online_partner_bank_account
     */
    public function setOnlinePartnerBankAccount(?string $online_partner_bank_account): void
    {
        $this->online_partner_bank_account = $online_partner_bank_account;
    }

    /**
     * @return string|null
     *
     * @SerializedName("online_partner_bank_account")
     */
    public function getOnlinePartnerBankAccount(): ?string
    {
        return $this->online_partner_bank_account;
    }

    /**
     * @param string|null $online_partner_vendor_name
     */
    public function setOnlinePartnerVendorName(?string $online_partner_vendor_name): void
    {
        $this->online_partner_vendor_name = $online_partner_vendor_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("online_partner_vendor_name")
     */
    public function getOnlinePartnerVendorName(): ?string
    {
        return $this->online_partner_vendor_name;
    }

    /**
     * @param OdooRelation|null $property_payment_method_id
     */
    public function setPropertyPaymentMethodId(?OdooRelation $property_payment_method_id): void
    {
        $this->property_payment_method_id = $property_payment_method_id;
    }

    /**
     * @param string|null $siret
     */
    public function setSiret(?string $siret): void
    {
        $this->siret = $siret;
    }

    /**
     * @param mixed|null $image_1920
     */
    public function setImage1920($image_1920): void
    {
        $this->image_1920 = $image_1920;
    }

    /**
     * @param int|null $customer_rank
     */
    public function setCustomerRank(?int $customer_rank): void
    {
        $this->customer_rank = $customer_rank;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("write_date")
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("write_uid")
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("create_date")
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_1024")
     */
    public function getImage1024()
    {
        return $this->image_1024;
    }

    /**
     * @param mixed|null $image_128
     */
    public function setImage128($image_128): void
    {
        $this->image_128 = $image_128;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_128")
     */
    public function getImage128()
    {
        return $this->image_128;
    }

    /**
     * @param mixed|null $image_256
     */
    public function setImage256($image_256): void
    {
        $this->image_256 = $image_256;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_256")
     */
    public function getImage256()
    {
        return $this->image_256;
    }

    /**
     * @param mixed|null $image_512
     */
    public function setImage512($image_512): void
    {
        $this->image_512 = $image_512;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("image_512")
     */
    public function getImage512()
    {
        return $this->image_512;
    }

    /**
     * @param mixed|null $image_1024
     */
    public function setImage1024($image_1024): void
    {
        $this->image_1024 = $image_1024;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("property_payment_method_id")
     */
    public function getPropertyPaymentMethodId(): ?OdooRelation
    {
        return $this->property_payment_method_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("customer_rank")
     */
    public function getCustomerRank(): ?int
    {
        return $this->customer_rank;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("property_account_receivable_id")
     */
    public function getPropertyAccountReceivableId(): OdooRelation
    {
        return $this->property_account_receivable_id;
    }

    /**
     * @param OdooRelation[]|null $ref_company_ids
     */
    public function setRefCompanyIds(?array $ref_company_ids): void
    {
        $this->ref_company_ids = $ref_company_ids;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("last_time_entries_checked")
     */
    public function getLastTimeEntriesChecked(): ?DateTimeInterface
    {
        return $this->last_time_entries_checked;
    }

    /**
     * @param bool|null $has_unreconciled_entries
     */
    public function setHasUnreconciledEntries(?bool $has_unreconciled_entries): void
    {
        $this->has_unreconciled_entries = $has_unreconciled_entries;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("has_unreconciled_entries")
     */
    public function isHasUnreconciledEntries(): ?bool
    {
        return $this->has_unreconciled_entries;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRefCompanyIds(OdooRelation $item): void
    {
        if (null === $this->ref_company_ids) {
            $this->ref_company_ids = [];
        }

        if ($this->hasRefCompanyIds($item)) {
            $index = array_search($item, $this->ref_company_ids);
            unset($this->ref_company_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addRefCompanyIds(OdooRelation $item): void
    {
        if ($this->hasRefCompanyIds($item)) {
            return;
        }

        if (null === $this->ref_company_ids) {
            $this->ref_company_ids = [];
        }

        $this->ref_company_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRefCompanyIds(OdooRelation $item): bool
    {
        if (null === $this->ref_company_ids) {
            return false;
        }

        return in_array($item, $this->ref_company_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("ref_company_ids")
     */
    public function getRefCompanyIds(): ?array
    {
        return $this->ref_company_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("invoice_ids")
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
    }

    /**
     * @param OdooRelation|null $property_supplier_payment_term_id
     */
    public function setPropertySupplierPaymentTermId(?OdooRelation $property_supplier_payment_term_id): void
    {
        $this->property_supplier_payment_term_id = $property_supplier_payment_term_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("property_supplier_payment_term_id")
     */
    public function getPropertySupplierPaymentTermId(): ?OdooRelation
    {
        return $this->property_supplier_payment_term_id;
    }

    /**
     * @param OdooRelation|null $property_payment_term_id
     */
    public function setPropertyPaymentTermId(?OdooRelation $property_payment_term_id): void
    {
        $this->property_payment_term_id = $property_payment_term_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("property_payment_term_id")
     */
    public function getPropertyPaymentTermId(): ?OdooRelation
    {
        return $this->property_payment_term_id;
    }

    /**
     * @param OdooRelation|null $property_account_position_id
     */
    public function setPropertyAccountPositionId(?OdooRelation $property_account_position_id): void
    {
        $this->property_account_position_id = $property_account_position_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("property_account_position_id")
     */
    public function getPropertyAccountPositionId(): ?OdooRelation
    {
        return $this->property_account_position_id;
    }

    /**
     * @param OdooRelation $property_account_receivable_id
     */
    public function setPropertyAccountReceivableId(OdooRelation $property_account_receivable_id): void
    {
        $this->property_account_receivable_id = $property_account_receivable_id;
    }

    /**
     * @param DateTimeInterface|null $last_time_entries_checked
     */
    public function setLastTimeEntriesChecked(?DateTimeInterface $last_time_entries_checked): void
    {
        $this->last_time_entries_checked = $last_time_entries_checked;
    }

    /**
     * @param OdooRelation[]|null $invoice_ids
     */
    public function setInvoiceIds(?array $invoice_ids): void
    {
        $this->invoice_ids = $invoice_ids;
    }

    /**
     * @param int|null $supplier_rank
     */
    public function setSupplierRank(?int $supplier_rank): void
    {
        $this->supplier_rank = $supplier_rank;
    }

    /**
     * @param int|null $bank_account_count
     */
    public function setBankAccountCount(?int $bank_account_count): void
    {
        $this->bank_account_count = $bank_account_count;
    }

    /**
     * @return int|null
     *
     * @SerializedName("supplier_rank")
     */
    public function getSupplierRank(): ?int
    {
        return $this->supplier_rank;
    }

    /**
     * @param string|null $invoice_warn_msg
     */
    public function setInvoiceWarnMsg(?string $invoice_warn_msg): void
    {
        $this->invoice_warn_msg = $invoice_warn_msg;
    }

    /**
     * @return string|null
     *
     * @SerializedName("invoice_warn_msg")
     */
    public function getInvoiceWarnMsg(): ?string
    {
        return $this->invoice_warn_msg;
    }

    /**
     * @param string|null $invoice_warn
     */
    public function setInvoiceWarn(?string $invoice_warn): void
    {
        $this->invoice_warn = $invoice_warn;
    }

    /**
     * @return string|null
     *
     * @SerializedName("invoice_warn")
     */
    public function getInvoiceWarn(): ?string
    {
        return $this->invoice_warn;
    }

    /**
     * @param string|null $trust
     */
    public function setTrust(?string $trust): void
    {
        $this->trust = $trust;
    }

    /**
     * @return string|null
     *
     * @SerializedName("trust")
     */
    public function getTrust(): ?string
    {
        return $this->trust;
    }

    /**
     * @return int|null
     *
     * @SerializedName("bank_account_count")
     */
    public function getBankAccountCount(): ?int
    {
        return $this->bank_account_count;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInvoiceIds(OdooRelation $item): bool
    {
        if (null === $this->invoice_ids) {
            return false;
        }

        return in_array($item, $this->invoice_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeContractIds(OdooRelation $item): void
    {
        if (null === $this->contract_ids) {
            $this->contract_ids = [];
        }

        if ($this->hasContractIds($item)) {
            $index = array_search($item, $this->contract_ids);
            unset($this->contract_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addContractIds(OdooRelation $item): void
    {
        if ($this->hasContractIds($item)) {
            return;
        }

        if (null === $this->contract_ids) {
            $this->contract_ids = [];
        }

        $this->contract_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasContractIds(OdooRelation $item): bool
    {
        if (null === $this->contract_ids) {
            return false;
        }

        return in_array($item, $this->contract_ids);
    }

    /**
     * @param OdooRelation[]|null $contract_ids
     */
    public function setContractIds(?array $contract_ids): void
    {
        $this->contract_ids = $contract_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("contract_ids")
     */
    public function getContractIds(): ?array
    {
        return $this->contract_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeInvoiceIds(OdooRelation $item): void
    {
        if (null === $this->invoice_ids) {
            $this->invoice_ids = [];
        }

        if ($this->hasInvoiceIds($item)) {
            $index = array_search($item, $this->invoice_ids);
            unset($this->invoice_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addInvoiceIds(OdooRelation $item): void
    {
        if ($this->hasInvoiceIds($item)) {
            return;
        }

        if (null === $this->invoice_ids) {
            $this->invoice_ids = [];
        }

        $this->invoice_ids[] = $item;
    }

    /**
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
    }

    /**
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
    }

    /**
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param bool|null $employee
     */
    public function setEmployee(?bool $employee): void
    {
        $this->employee = $employee;
    }

    /**
     * @param string|null $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string|null
     *
     * @SerializedName("street")
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("type")
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $function
     */
    public function setFunction(?string $function): void
    {
        $this->function = $function;
    }

    /**
     * @return string|null
     *
     * @SerializedName("function")
     */
    public function getFunction(): ?string
    {
        return $this->function;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("employee")
     */
    public function isEmployee(): ?bool
    {
        return $this->employee;
    }

    /**
     * @param string|null $street2
     */
    public function setStreet2(?string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param float|null $credit_limit
     */
    public function setCreditLimit(?float $credit_limit): void
    {
        $this->credit_limit = $credit_limit;
    }

    /**
     * @return float|null
     *
     * @SerializedName("credit_limit")
     */
    public function getCreditLimit(): ?float
    {
        return $this->credit_limit;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeCategoryId(OdooRelation $item): void
    {
        if (null === $this->category_id) {
            $this->category_id = [];
        }

        if ($this->hasCategoryId($item)) {
            $index = array_search($item, $this->category_id);
            unset($this->category_id[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addCategoryId(OdooRelation $item): void
    {
        if ($this->hasCategoryId($item)) {
            return;
        }

        if (null === $this->category_id) {
            $this->category_id = [];
        }

        $this->category_id[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasCategoryId(OdooRelation $item): bool
    {
        if (null === $this->category_id) {
            return false;
        }

        return in_array($item, $this->category_id);
    }

    /**
     * @return string|null
     *
     * @SerializedName("street2")
     */
    public function getStreet2(): ?string
    {
        return $this->street2;
    }

    /**
     * @return string|null
     *
     * @SerializedName("zip")
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("category_id")
     */
    public function getCategoryId(): ?array
    {
        return $this->category_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("partner_longitude")
     */
    public function getPartnerLongitude(): ?float
    {
        return $this->partner_longitude;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_company")
     */
    public function isIsCompany(): ?bool
    {
        return $this->is_company;
    }

    /**
     * @param string|null $mobile
     */
    public function setMobile(?string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return string|null
     *
     * @SerializedName("mobile")
     */
    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    /**
     * @param string|null $email_formatted
     */
    public function setEmailFormatted(?string $email_formatted): void
    {
        $this->email_formatted = $email_formatted;
    }

    /**
     * @return string|null
     *
     * @SerializedName("email_formatted")
     */
    public function getEmailFormatted(): ?string
    {
        return $this->email_formatted;
    }

    /**
     * @param float|null $partner_longitude
     */
    public function setPartnerLongitude(?float $partner_longitude): void
    {
        $this->partner_longitude = $partner_longitude;
    }

    /**
     * @param float|null $partner_latitude
     */
    public function setPartnerLatitude(?float $partner_latitude): void
    {
        $this->partner_latitude = $partner_latitude;
    }

    /**
     * @param string|null $zip
     */
    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return float|null
     *
     * @SerializedName("partner_latitude")
     */
    public function getPartnerLatitude(): ?float
    {
        return $this->partner_latitude;
    }

    /**
     * @param OdooRelation|null $country_id
     */
    public function setCountryId(?OdooRelation $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("country_id")
     */
    public function getCountryId(): ?OdooRelation
    {
        return $this->country_id;
    }

    /**
     * @param OdooRelation|null $state_id
     */
    public function setStateId(?OdooRelation $state_id): void
    {
        $this->state_id = $state_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("state_id")
     */
    public function getStateId(): ?OdooRelation
    {
        return $this->state_id;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     *
     * @SerializedName("city")
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param OdooRelation[]|null $category_id
     */
    public function setCategoryId(?array $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("industry_id")
     */
    public function getIndustryId(): ?OdooRelation
    {
        return $this->industry_id;
    }

    /**
     * @param string|null $parent_name
     */
    public function setParentName(?string $parent_name): void
    {
        $this->parent_name = $parent_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("ref")
     */
    public function getRef(): ?string
    {
        return $this->ref;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeChildIds(OdooRelation $item): void
    {
        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        if ($this->hasChildIds($item)) {
            $index = array_search($item, $this->child_ids);
            unset($this->child_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addChildIds(OdooRelation $item): void
    {
        if ($this->hasChildIds($item)) {
            return;
        }

        if (null === $this->child_ids) {
            $this->child_ids = [];
        }

        $this->child_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasChildIds(OdooRelation $item): bool
    {
        if (null === $this->child_ids) {
            return false;
        }

        return in_array($item, $this->child_ids);
    }

    /**
     * @param OdooRelation[]|null $child_ids
     */
    public function setChildIds(?array $child_ids): void
    {
        $this->child_ids = $child_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("child_ids")
     */
    public function getChildIds(): ?array
    {
        return $this->child_ids;
    }

    /**
     * @return string|null
     *
     * @SerializedName("parent_name")
     */
    public function getParentName(): ?string
    {
        return $this->parent_name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("lang")
     */
    public function getLang(): ?string
    {
        return $this->lang;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("parent_id")
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @param OdooRelation|null $title
     */
    public function setTitle(?OdooRelation $title): void
    {
        $this->title = $title;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("title")
     */
    public function getTitle(): ?OdooRelation
    {
        return $this->title;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("date")
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string|null $ref
     */
    public function setRef(?string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @param string|null $lang
     */
    public function setLang(?string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return string|null
     *
     * @SerializedName("comment")
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param OdooRelation|null $same_vat_partner_id
     */
    public function setSameVatPartnerId(?OdooRelation $same_vat_partner_id): void
    {
        $this->same_vat_partner_id = $same_vat_partner_id;
    }

    /**
     * @param string|null $website
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return string|null
     *
     * @SerializedName("website")
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeBankIds(OdooRelation $item): void
    {
        if (null === $this->bank_ids) {
            $this->bank_ids = [];
        }

        if ($this->hasBankIds($item)) {
            $index = array_search($item, $this->bank_ids);
            unset($this->bank_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addBankIds(OdooRelation $item): void
    {
        if ($this->hasBankIds($item)) {
            return;
        }

        if (null === $this->bank_ids) {
            $this->bank_ids = [];
        }

        $this->bank_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasBankIds(OdooRelation $item): bool
    {
        if (null === $this->bank_ids) {
            return false;
        }

        return in_array($item, $this->bank_ids);
    }

    /**
     * @param OdooRelation[]|null $bank_ids
     */
    public function setBankIds(?array $bank_ids): void
    {
        $this->bank_ids = $bank_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("bank_ids")
     */
    public function getBankIds(): ?array
    {
        return $this->bank_ids;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("same_vat_partner_id")
     */
    public function getSameVatPartnerId(): ?OdooRelation
    {
        return $this->same_vat_partner_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("active_lang_count")
     */
    public function getActiveLangCount(): ?int
    {
        return $this->active_lang_count;
    }

    /**
     * @param string|null $vat
     */
    public function setVat(?string $vat): void
    {
        $this->vat = $vat;
    }

    /**
     * @return string|null
     *
     * @SerializedName("vat")
     */
    public function getVat(): ?string
    {
        return $this->vat;
    }

    /**
     * @param string|null $tz_offset
     */
    public function setTzOffset(?string $tz_offset): void
    {
        $this->tz_offset = $tz_offset;
    }

    /**
     * @return string|null
     *
     * @SerializedName("tz_offset")
     */
    public function getTzOffset(): ?string
    {
        return $this->tz_offset;
    }

    /**
     * @param string|null $tz
     */
    public function setTz(?string $tz): void
    {
        $this->tz = $tz;
    }

    /**
     * @return string|null
     *
     * @SerializedName("tz")
     */
    public function getTz(): ?string
    {
        return $this->tz;
    }

    /**
     * @param int|null $active_lang_count
     */
    public function setActiveLangCount(?int $active_lang_count): void
    {
        $this->active_lang_count = $active_lang_count;
    }

    /**
     * @param bool|null $is_company
     */
    public function setIsCompany(?bool $is_company): void
    {
        $this->is_company = $is_company;
    }

    /**
     * @param OdooRelation|null $industry_id
     */
    public function setIndustryId(?OdooRelation $industry_id): void
    {
        $this->industry_id = $industry_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("message_needaction")
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("message_is_follower")
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessageFollowerIds(OdooRelation $item): void
    {
        if (null === $this->message_follower_ids) {
            $this->message_follower_ids = [];
        }

        if ($this->hasMessageFollowerIds($item)) {
            $index = array_search($item, $this->message_follower_ids);
            unset($this->message_follower_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessageFollowerIds(OdooRelation $item): void
    {
        if ($this->hasMessageFollowerIds($item)) {
            return;
        }

        if (null === $this->message_follower_ids) {
            $this->message_follower_ids = [];
        }

        $this->message_follower_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessageFollowerIds(OdooRelation $item): bool
    {
        if (null === $this->message_follower_ids) {
            return false;
        }

        return in_array($item, $this->message_follower_ids);
    }

    /**
     * @param OdooRelation[]|null $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_follower_ids")
     */
    public function getMessageFollowerIds(): ?array
    {
        return $this->message_follower_ids;
    }

    /**
     * @param bool|null $message_is_follower
     */
    public function setMessageIsFollower(?bool $message_is_follower): void
    {
        $this->message_is_follower = $message_is_follower;
    }

    /**
     * @param string|null $activity_exception_icon
     */
    public function setActivityExceptionIcon(?string $activity_exception_icon): void
    {
        $this->activity_exception_icon = $activity_exception_icon;
    }

    /**
     * @param OdooRelation[]|null $message_partner_ids
     */
    public function setMessagePartnerIds(?array $message_partner_ids): void
    {
        $this->message_partner_ids = $message_partner_ids;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_exception_icon")
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
    }

    /**
     * @param string|null $activity_exception_decoration
     */
    public function setActivityExceptionDecoration(?string $activity_exception_decoration): void
    {
        $this->activity_exception_decoration = $activity_exception_decoration;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_exception_decoration")
     */
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @param string|null $activity_summary
     */
    public function setActivitySummary(?string $activity_summary): void
    {
        $this->activity_summary = $activity_summary;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_summary")
     */
    public function getActivitySummary(): ?string
    {
        return $this->activity_summary;
    }

    /**
     * @param DateTimeInterface|null $activity_date_deadline
     */
    public function setActivityDateDeadline(?DateTimeInterface $activity_date_deadline): void
    {
        $this->activity_date_deadline = $activity_date_deadline;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("activity_date_deadline")
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_partner_ids")
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessagePartnerIds(OdooRelation $item): bool
    {
        if (null === $this->message_partner_ids) {
            return false;
        }

        return in_array($item, $this->message_partner_ids);
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_type_icon")
     */
    public function getActivityTypeIcon(): ?string
    {
        return $this->activity_type_icon;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessageIds(OdooRelation $item): bool
    {
        if (null === $this->message_ids) {
            return false;
        }

        return in_array($item, $this->message_ids);
    }

    /**
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
    }

    /**
     * @return int|null
     *
     * @SerializedName("message_unread_counter")
     */
    public function getMessageUnreadCounter(): ?int
    {
        return $this->message_unread_counter;
    }

    /**
     * @param bool|null $message_unread
     */
    public function setMessageUnread(?bool $message_unread): void
    {
        $this->message_unread = $message_unread;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("message_unread")
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessageIds(OdooRelation $item): void
    {
        if (null === $this->message_ids) {
            $this->message_ids = [];
        }

        if ($this->hasMessageIds($item)) {
            $index = array_search($item, $this->message_ids);
            unset($this->message_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessageIds(OdooRelation $item): void
    {
        if ($this->hasMessageIds($item)) {
            return;
        }

        if (null === $this->message_ids) {
            $this->message_ids = [];
        }

        $this->message_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessagePartnerIds(OdooRelation $item): void
    {
        if ($this->hasMessagePartnerIds($item)) {
            return;
        }

        if (null === $this->message_partner_ids) {
            $this->message_partner_ids = [];
        }

        $this->message_partner_ids[] = $item;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_ids")
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessageChannelIds(OdooRelation $item): void
    {
        if (null === $this->message_channel_ids) {
            $this->message_channel_ids = [];
        }

        if ($this->hasMessageChannelIds($item)) {
            $index = array_search($item, $this->message_channel_ids);
            unset($this->message_channel_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessageChannelIds(OdooRelation $item): void
    {
        if ($this->hasMessageChannelIds($item)) {
            return;
        }

        if (null === $this->message_channel_ids) {
            $this->message_channel_ids = [];
        }

        $this->message_channel_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessageChannelIds(OdooRelation $item): bool
    {
        if (null === $this->message_channel_ids) {
            return false;
        }

        return in_array($item, $this->message_channel_ids);
    }

    /**
     * @param OdooRelation[]|null $message_channel_ids
     */
    public function setMessageChannelIds(?array $message_channel_ids): void
    {
        $this->message_channel_ids = $message_channel_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_channel_ids")
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessagePartnerIds(OdooRelation $item): void
    {
        if (null === $this->message_partner_ids) {
            $this->message_partner_ids = [];
        }

        if ($this->hasMessagePartnerIds($item)) {
            $index = array_search($item, $this->message_partner_ids);
            unset($this->message_partner_ids[$index]);
        }
    }

    /**
     * @param string|null $activity_type_icon
     */
    public function setActivityTypeIcon(?string $activity_type_icon): void
    {
        $this->activity_type_icon = $activity_type_icon;
    }

    /**
     * @param OdooRelation|null $activity_type_id
     */
    public function setActivityTypeId(?OdooRelation $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("company_type")
     */
    public function getCompanyType(): ?string
    {
        return $this->company_type;
    }

    /**
     * @param OdooRelation $item
     */
    public function addUserIds(OdooRelation $item): void
    {
        if ($this->hasUserIds($item)) {
            return;
        }

        if (null === $this->user_ids) {
            $this->user_ids = [];
        }

        $this->user_ids[] = $item;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("commercial_partner_id")
     */
    public function getCommercialPartnerId(): ?OdooRelation
    {
        return $this->commercial_partner_id;
    }

    /**
     * @param string|null $contact_address
     */
    public function setContactAddress(?string $contact_address): void
    {
        $this->contact_address = $contact_address;
    }

    /**
     * @return string|null
     *
     * @SerializedName("contact_address")
     */
    public function getContactAddress(): ?string
    {
        return $this->contact_address;
    }

    /**
     * @param bool|null $partner_share
     */
    public function setPartnerShare(?bool $partner_share): void
    {
        $this->partner_share = $partner_share;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("partner_share")
     */
    public function isPartnerShare(): ?bool
    {
        return $this->partner_share;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeUserIds(OdooRelation $item): void
    {
        if (null === $this->user_ids) {
            $this->user_ids = [];
        }

        if ($this->hasUserIds($item)) {
            $index = array_search($item, $this->user_ids);
            unset($this->user_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasUserIds(OdooRelation $item): bool
    {
        if (null === $this->user_ids) {
            return false;
        }

        return in_array($item, $this->user_ids);
    }

    /**
     * @return string|null
     *
     * @SerializedName("commercial_company_name")
     */
    public function getCommercialCompanyName(): ?string
    {
        return $this->commercial_company_name;
    }

    /**
     * @param OdooRelation[]|null $user_ids
     */
    public function setUserIds(?array $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("user_ids")
     */
    public function getUserIds(): ?array
    {
        return $this->user_ids;
    }

    /**
     * @param int|null $color
     */
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }

    /**
     * @return int|null
     *
     * @SerializedName("color")
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @param OdooRelation|null $company_id
     */
    public function setCompanyId(?OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param string|null $company_type
     */
    public function setCompanyType(?string $company_type): void
    {
        $this->company_type = $company_type;
    }

    /**
     * @param OdooRelation|null $commercial_partner_id
     */
    public function setCommercialPartnerId(?OdooRelation $commercial_partner_id): void
    {
        $this->commercial_partner_id = $commercial_partner_id;
    }

    /**
     * @param string|null $commercial_company_name
     */
    public function setCommercialCompanyName(?string $commercial_company_name): void
    {
        $this->commercial_company_name = $commercial_company_name;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("activity_type_id")
     */
    public function getActivityTypeId(): ?OdooRelation
    {
        return $this->activity_type_id;
    }

    /**
     * @param OdooRelation[]|null $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @param OdooRelation|null $activity_user_id
     */
    public function setActivityUserId(?OdooRelation $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("activity_user_id")
     */
    public function getActivityUserId(): ?OdooRelation
    {
        return $this->activity_user_id;
    }

    /**
     * @param string|null $activity_state
     */
    public function setActivityState(?string $activity_state): void
    {
        $this->activity_state = $activity_state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("activity_state")
     */
    public function getActivityState(): ?string
    {
        return $this->activity_state;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeActivityIds(OdooRelation $item): void
    {
        if (null === $this->activity_ids) {
            $this->activity_ids = [];
        }

        if ($this->hasActivityIds($item)) {
            $index = array_search($item, $this->activity_ids);
            unset($this->activity_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addActivityIds(OdooRelation $item): void
    {
        if ($this->hasActivityIds($item)) {
            return;
        }

        if (null === $this->activity_ids) {
            $this->activity_ids = [];
        }

        $this->activity_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasActivityIds(OdooRelation $item): bool
    {
        if (null === $this->activity_ids) {
            return false;
        }

        return in_array($item, $this->activity_ids);
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("activity_ids")
     */
    public function getActivityIds(): ?array
    {
        return $this->activity_ids;
    }

    /**
     * @return string|null
     *
     * @SerializedName("company_name")
     */
    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    /**
     * @param string|null $im_status
     */
    public function setImStatus(?string $im_status): void
    {
        $this->im_status = $im_status;
    }

    /**
     * @return string|null
     *
     * @SerializedName("im_status")
     */
    public function getImStatus(): ?string
    {
        return $this->im_status;
    }

    /**
     * @param OdooRelation|null $self
     */
    public function setSelf(?OdooRelation $self): void
    {
        $this->self = $self;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("self")
     */
    public function getSelf(): ?OdooRelation
    {
        return $this->self;
    }

    /**
     * @param string|null $barcode
     */
    public function setBarcode(?string $barcode): void
    {
        $this->barcode = $barcode;
    }

    /**
     * @return string|null
     *
     * @SerializedName("barcode")
     */
    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    /**
     * @param string|null $company_name
     */
    public function setCompanyName(?string $company_name): void
    {
        $this->company_name = $company_name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.partner';
    }
}

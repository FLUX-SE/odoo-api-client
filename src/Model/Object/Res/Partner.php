<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : res.partner
 * Name : res.partner
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner\Title
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
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
     * Selection : (default value, usually null)
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner\Bank
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner\Category
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
     * Selection : (default value, usually null)
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Country\State
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Country
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
     * Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $email;

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
     * Phone
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $phone;

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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner\Industry
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
     * Selection : (default value, usually null)
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
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
     * Self
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
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
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity
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
     * Selection : (default value, usually null)
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $activity_type_id;

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
     * Selection : (default value, usually null)
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
     * @see \Flux\OdooApiClient\Model\Object\Mail\Followers
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
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
     * @see \Flux\OdooApiClient\Model\Object\Mail\Channel
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
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message
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
     * @see \Flux\OdooApiClient\Model\Object\Ir\Attachment
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
     * Channels
     * ---
     * Relation : many2many (mail.channel)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Channel
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @var string|null
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
     * If the email address is on the blacklist, the contact won't receive mass mailing anymore, from any list
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    protected $phone_blacklisted;

    /**
     * Pricelist
     * ---
     * This pricelist will be used, instead of the default one, for sales to the current partner
     * ---
     * Relation : many2one (product.pricelist)
     * @see \Flux\OdooApiClient\Model\Object\Product\Pricelist
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $property_product_pricelist;

    /**
     * Sales Team
     * ---
     * If set, this Sales Team will be used for sales and assignations related to this partner
     * ---
     * Relation : many2one (crm.team)
     * @see \Flux\OdooApiClient\Model\Object\Crm\Team
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $team_id;

    /**
     * Website Messages
     * ---
     * Website communication history
     * ---
     * Relation : one2many (mail.message -> res_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Message
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Currency
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Account
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Fiscal\Position
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Payment\Term
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Payment\Term
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Company
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
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
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Account
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
     * Selection : (default value, usually null)
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
     * Selection : (default value, usually null)
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
     * @see \Flux\OdooApiClient\Model\Object\Payment\Token
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
     * SIRET
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $siret;

    /**
     * Sale Order Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    protected $sale_order_count;

    /**
     * Sales Order
     * ---
     * Relation : one2many (sale.order -> partner_id)
     * @see \Flux\OdooApiClient\Model\Object\Sale\Order
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $sale_order_ids;

    /**
     * Sales Warnings
     * ---
     * Selecting the "Warning" option will notify user with the message, Selecting "Blocking Message" will throw an
     * exception with the message and block the flow. The Message has to be written in the next field.
     * ---
     * Selection : (default value, usually null)
     *     -> no-message (No Message)
     *     -> warning (Warning)
     *     -> block (Blocking Message)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $sale_warn;

    /**
     * Message for Sales Order
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $sale_warn_msg;

    /**
     * Next Action Date
     * ---
     * The date before which no action should be taken.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    protected $payment_next_action_date;

    /**
     * Unreconciled Aml
     * ---
     * Relation : one2many (account.move.line -> partner_id)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move\Line
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $unreconciled_aml_ids;

    /**
     * Unpaid Invoices
     * ---
     * Relation : one2many (account.move)
     * @see \Flux\OdooApiClient\Model\Object\Account\Move
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    protected $unpaid_invoices;

    /**
     * Total Due
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    protected $total_due;

    /**
     * Total Overdue
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var float|null
     */
    protected $total_overdue;

    /**
     * Follow-up Status
     * ---
     * Selection : (default value, usually null)
     *     -> in_need_of_action (In need of action)
     *     -> with_overdue_invoices (With overdue invoices)
     *     -> no_action_needed (No action needed)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $followup_status;

    /**
     * Follow-up Level
     * ---
     * Relation : many2one (account_followup.followup.line)
     * @see \Flux\OdooApiClient\Model\Object\AccountFollowup\Followup\Line
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $followup_level;

    /**
     * Follow-up Responsible
     * ---
     * Optionally you can assign a user to this field, which will make him responsible for the action.
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    protected $payment_responsible_id;

    /**
     * Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $image_1920;

    /**
     * Image 1024
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $image_1024;

    /**
     * Image 512
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $image_512;

    /**
     * Image 256
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $image_256;

    /**
     * Image 128
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    protected $image_128;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
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
     *        @see \Flux\OdooApiClient\Model\Object\Account\Account
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param OdooRelation $property_account_receivable_id Account Receivable
     *        ---
     *        This account will be used instead of the default one as the receivable account for the current partner
     *        ---
     *        Relation : many2one (account.account)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Account
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
     * @return float|null
     */
    public function getTotalInvoiced(): ?float
    {
        return $this->total_invoiced;
    }

    /**
     * @param OdooRelation $property_account_payable_id
     */
    public function setPropertyAccountPayableId(OdooRelation $property_account_payable_id): void
    {
        $this->property_account_payable_id = $property_account_payable_id;
    }

    /**
     * @return OdooRelation
     */
    public function getPropertyAccountPayableId(): OdooRelation
    {
        return $this->property_account_payable_id;
    }

    /**
     * @param int|null $journal_item_count
     */
    public function setJournalItemCount(?int $journal_item_count): void
    {
        $this->journal_item_count = $journal_item_count;
    }

    /**
     * @return int|null
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
     * @param float|null $debit_limit
     */
    public function setDebitLimit(?float $debit_limit): void
    {
        $this->debit_limit = $debit_limit;
    }

    /**
     * @param OdooRelation $property_account_receivable_id
     */
    public function setPropertyAccountReceivableId(OdooRelation $property_account_receivable_id): void
    {
        $this->property_account_receivable_id = $property_account_receivable_id;
    }

    /**
     * @return float|null
     */
    public function getDebitLimit(): ?float
    {
        return $this->debit_limit;
    }

    /**
     * @param float|null $debit
     */
    public function setDebit(?float $debit): void
    {
        $this->debit = $debit;
    }

    /**
     * @return float|null
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
     */
    public function isMessageHasSmsError(): ?bool
    {
        return $this->message_has_sms_error;
    }

    /**
     * @return OdooRelation
     */
    public function getPropertyAccountReceivableId(): OdooRelation
    {
        return $this->property_account_receivable_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyAccountPositionId(): ?OdooRelation
    {
        return $this->property_account_position_id;
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
     * @return bool|null
     */
    public function isHasUnreconciledEntries(): ?bool
    {
        return $this->has_unreconciled_entries;
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
     * @param OdooRelation[]|null $invoice_ids
     */
    public function setInvoiceIds(?array $invoice_ids): void
    {
        $this->invoice_ids = $invoice_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoice_ids;
    }

    /**
     * @param DateTimeInterface|null $last_time_entries_checked
     */
    public function setLastTimeEntriesChecked(?DateTimeInterface $last_time_entries_checked): void
    {
        $this->last_time_entries_checked = $last_time_entries_checked;
    }

    /**
     * @return DateTimeInterface|null
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
     * @param OdooRelation|null $property_account_position_id
     */
    public function setPropertyAccountPositionId(?OdooRelation $property_account_position_id): void
    {
        $this->property_account_position_id = $property_account_position_id;
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
     * @param OdooRelation[]|null $ref_company_ids
     */
    public function setRefCompanyIds(?array $ref_company_ids): void
    {
        $this->ref_company_ids = $ref_company_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getRefCompanyIds(): ?array
    {
        return $this->ref_company_ids;
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
     */
    public function getPropertyPaymentTermId(): ?OdooRelation
    {
        return $this->property_payment_term_id;
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
     * @return OdooRelation[]|null
     */
    public function getContractIds(): ?array
    {
        return $this->contract_ids;
    }

    /**
     * @return OdooRelation|null
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
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
     */
    public function getSignupToken(): ?string
    {
        return $this->signup_token;
    }

    /**
     * @param string|null $image_medium
     */
    public function setImageMedium(?string $image_medium): void
    {
        $this->image_medium = $image_medium;
    }

    /**
     * @return string|null
     */
    public function getImageMedium(): ?string
    {
        return $this->image_medium;
    }

    /**
     * @param string|null $contact_address_complete
     */
    public function setContactAddressComplete(?string $contact_address_complete): void
    {
        $this->contact_address_complete = $contact_address_complete;
    }

    /**
     * @return string|null
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
     * @param string|null $signup_type
     */
    public function setSignupType(?string $signup_type): void
    {
        $this->signup_type = $signup_type;
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
     * @return OdooRelation[]|null
     */
    public function getChannelIds(): ?array
    {
        return $this->channel_ids;
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
     * @return string|null
     */
    public function getSignupType(): ?string
    {
        return $this->signup_type;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getSignupExpiration(): ?DateTimeInterface
    {
        return $this->signup_expiration;
    }

    /**
     * @param OdooRelation[]|null $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
    }

    /**
     * @param string|null $phone_sanitized
     */
    public function setPhoneSanitized(?string $phone_sanitized): void
    {
        $this->phone_sanitized = $phone_sanitized;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getWebsiteMessageIds(): ?array
    {
        return $this->website_message_ids;
    }

    /**
     * @param OdooRelation|null $team_id
     */
    public function setTeamId(?OdooRelation $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTeamId(): ?OdooRelation
    {
        return $this->team_id;
    }

    /**
     * @param OdooRelation|null $property_product_pricelist
     */
    public function setPropertyProductPricelist(?OdooRelation $property_product_pricelist): void
    {
        $this->property_product_pricelist = $property_product_pricelist;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPropertyProductPricelist(): ?OdooRelation
    {
        return $this->property_product_pricelist;
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
     */
    public function isPhoneBlacklisted(): ?bool
    {
        return $this->phone_blacklisted;
    }

    /**
     * @return string|null
     */
    public function getPhoneSanitized(): ?string
    {
        return $this->phone_sanitized;
    }

    /**
     * @param DateTimeInterface|null $signup_expiration
     */
    public function setSignupExpiration(?DateTimeInterface $signup_expiration): void
    {
        $this->signup_expiration = $signup_expiration;
    }

    /**
     * @param string|null $additional_info
     */
    public function setAdditionalInfo(?string $additional_info): void
    {
        $this->additional_info = $additional_info;
    }

    /**
     * @return string|null
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
     */
    public function getPartnerGid(): ?int
    {
        return $this->partner_gid;
    }

    /**
     * @param string|null $signup_url
     */
    public function setSignupUrl(?string $signup_url): void
    {
        $this->signup_url = $signup_url;
    }

    /**
     * @return string|null
     */
    public function getSignupUrl(): ?string
    {
        return $this->signup_url;
    }

    /**
     * @param bool|null $signup_valid
     */
    public function setSignupValid(?bool $signup_valid): void
    {
        $this->signup_valid = $signup_valid;
    }

    /**
     * @return bool|null
     */
    public function isSignupValid(): ?bool
    {
        return $this->signup_valid;
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
     * @param OdooRelation[]|null $contract_ids
     */
    public function setContractIds(?array $contract_ids): void
    {
        $this->contract_ids = $contract_ids;
    }

    /**
     * @param string|null $email_normalized
     */
    public function setEmailNormalized(?string $email_normalized): void
    {
        $this->email_normalized = $email_normalized;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeUnpaidInvoices(OdooRelation $item): void
    {
        if (null === $this->unpaid_invoices) {
            $this->unpaid_invoices = [];
        }

        if ($this->hasUnpaidInvoices($item)) {
            $index = array_search($item, $this->unpaid_invoices);
            unset($this->unpaid_invoices[$index]);
        }
    }

    /**
     * @return OdooRelation|null
     */
    public function getFollowupLevel(): ?OdooRelation
    {
        return $this->followup_level;
    }

    /**
     * @param string|null $followup_status
     */
    public function setFollowupStatus(?string $followup_status): void
    {
        $this->followup_status = $followup_status;
    }

    /**
     * @return string|null
     */
    public function getFollowupStatus(): ?string
    {
        return $this->followup_status;
    }

    /**
     * @param float|null $total_overdue
     */
    public function setTotalOverdue(?float $total_overdue): void
    {
        $this->total_overdue = $total_overdue;
    }

    /**
     * @return float|null
     */
    public function getTotalOverdue(): ?float
    {
        return $this->total_overdue;
    }

    /**
     * @param float|null $total_due
     */
    public function setTotalDue(?float $total_due): void
    {
        $this->total_due = $total_due;
    }

    /**
     * @return float|null
     */
    public function getTotalDue(): ?float
    {
        return $this->total_due;
    }

    /**
     * @param OdooRelation $item
     */
    public function addUnpaidInvoices(OdooRelation $item): void
    {
        if ($this->hasUnpaidInvoices($item)) {
            return;
        }

        if (null === $this->unpaid_invoices) {
            $this->unpaid_invoices = [];
        }

        $this->unpaid_invoices[] = $item;
    }

    /**
     * @return OdooRelation|null
     */
    public function getPaymentResponsibleId(): ?OdooRelation
    {
        return $this->payment_responsible_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasUnpaidInvoices(OdooRelation $item): bool
    {
        if (null === $this->unpaid_invoices) {
            return false;
        }

        return in_array($item, $this->unpaid_invoices);
    }

    /**
     * @param OdooRelation[]|null $unpaid_invoices
     */
    public function setUnpaidInvoices(?array $unpaid_invoices): void
    {
        $this->unpaid_invoices = $unpaid_invoices;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getUnpaidInvoices(): ?array
    {
        return $this->unpaid_invoices;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeUnreconciledAmlIds(OdooRelation $item): void
    {
        if (null === $this->unreconciled_aml_ids) {
            $this->unreconciled_aml_ids = [];
        }

        if ($this->hasUnreconciledAmlIds($item)) {
            $index = array_search($item, $this->unreconciled_aml_ids);
            unset($this->unreconciled_aml_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addUnreconciledAmlIds(OdooRelation $item): void
    {
        if ($this->hasUnreconciledAmlIds($item)) {
            return;
        }

        if (null === $this->unreconciled_aml_ids) {
            $this->unreconciled_aml_ids = [];
        }

        $this->unreconciled_aml_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasUnreconciledAmlIds(OdooRelation $item): bool
    {
        if (null === $this->unreconciled_aml_ids) {
            return false;
        }

        return in_array($item, $this->unreconciled_aml_ids);
    }

    /**
     * @param OdooRelation[]|null $unreconciled_aml_ids
     */
    public function setUnreconciledAmlIds(?array $unreconciled_aml_ids): void
    {
        $this->unreconciled_aml_ids = $unreconciled_aml_ids;
    }

    /**
     * @param OdooRelation|null $followup_level
     */
    public function setFollowupLevel(?OdooRelation $followup_level): void
    {
        $this->followup_level = $followup_level;
    }

    /**
     * @param OdooRelation|null $payment_responsible_id
     */
    public function setPaymentResponsibleId(?OdooRelation $payment_responsible_id): void
    {
        $this->payment_responsible_id = $payment_responsible_id;
    }

    /**
     * @param DateTimeInterface|null $payment_next_action_date
     */
    public function setPaymentNextActionDate(?DateTimeInterface $payment_next_action_date): void
    {
        $this->payment_next_action_date = $payment_next_action_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
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
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param string|null $image_128
     */
    public function setImage128(?string $image_128): void
    {
        $this->image_128 = $image_128;
    }

    /**
     * @return string|null
     */
    public function getImage1920(): ?string
    {
        return $this->image_1920;
    }

    /**
     * @return string|null
     */
    public function getImage128(): ?string
    {
        return $this->image_128;
    }

    /**
     * @param string|null $image_256
     */
    public function setImage256(?string $image_256): void
    {
        $this->image_256 = $image_256;
    }

    /**
     * @return string|null
     */
    public function getImage256(): ?string
    {
        return $this->image_256;
    }

    /**
     * @param string|null $image_512
     */
    public function setImage512(?string $image_512): void
    {
        $this->image_512 = $image_512;
    }

    /**
     * @return string|null
     */
    public function getImage512(): ?string
    {
        return $this->image_512;
    }

    /**
     * @param string|null $image_1024
     */
    public function setImage1024(?string $image_1024): void
    {
        $this->image_1024 = $image_1024;
    }

    /**
     * @return string|null
     */
    public function getImage1024(): ?string
    {
        return $this->image_1024;
    }

    /**
     * @param string|null $image_1920
     */
    public function setImage1920(?string $image_1920): void
    {
        $this->image_1920 = $image_1920;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getUnreconciledAmlIds(): ?array
    {
        return $this->unreconciled_aml_ids;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getPaymentNextActionDate(): ?DateTimeInterface
    {
        return $this->payment_next_action_date;
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
     * @return string|null
     */
    public function getInvoiceWarnMsg(): ?string
    {
        return $this->invoice_warn_msg;
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
     */
    public function getOnlinePartnerVendorName(): ?string
    {
        return $this->online_partner_vendor_name;
    }

    /**
     * @param int|null $customer_rank
     */
    public function setCustomerRank(?int $customer_rank): void
    {
        $this->customer_rank = $customer_rank;
    }

    /**
     * @return int|null
     */
    public function getCustomerRank(): ?int
    {
        return $this->customer_rank;
    }

    /**
     * @param int|null $supplier_rank
     */
    public function setSupplierRank(?int $supplier_rank): void
    {
        $this->supplier_rank = $supplier_rank;
    }

    /**
     * @return int|null
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
     * @param string|null $invoice_warn
     */
    public function setInvoiceWarn(?string $invoice_warn): void
    {
        $this->invoice_warn = $invoice_warn;
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
     */
    public function getTrust(): ?string
    {
        return $this->trust;
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
     */
    public function getBankAccountCount(): ?int
    {
        return $this->bank_account_count;
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
     * @return string|null
     */
    public function getOnlinePartnerBankAccount(): ?string
    {
        return $this->online_partner_bank_account;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPaymentTokenIds(): ?array
    {
        return $this->payment_token_ids;
    }

    /**
     * @param string|null $sale_warn_msg
     */
    public function setSaleWarnMsg(?string $sale_warn_msg): void
    {
        $this->sale_warn_msg = $sale_warn_msg;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getSaleOrderIds(): ?array
    {
        return $this->sale_order_ids;
    }

    /**
     * @return string|null
     */
    public function getSaleWarnMsg(): ?string
    {
        return $this->sale_warn_msg;
    }

    /**
     * @param string|null $sale_warn
     */
    public function setSaleWarn(?string $sale_warn): void
    {
        $this->sale_warn = $sale_warn;
    }

    /**
     * @return string|null
     */
    public function getSaleWarn(): ?string
    {
        return $this->sale_warn;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSaleOrderIds(OdooRelation $item): void
    {
        if (null === $this->sale_order_ids) {
            $this->sale_order_ids = [];
        }

        if ($this->hasSaleOrderIds($item)) {
            $index = array_search($item, $this->sale_order_ids);
            unset($this->sale_order_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addSaleOrderIds(OdooRelation $item): void
    {
        if ($this->hasSaleOrderIds($item)) {
            return;
        }

        if (null === $this->sale_order_ids) {
            $this->sale_order_ids = [];
        }

        $this->sale_order_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSaleOrderIds(OdooRelation $item): bool
    {
        if (null === $this->sale_order_ids) {
            return false;
        }

        return in_array($item, $this->sale_order_ids);
    }

    /**
     * @param OdooRelation[]|null $sale_order_ids
     */
    public function setSaleOrderIds(?array $sale_order_ids): void
    {
        $this->sale_order_ids = $sale_order_ids;
    }

    /**
     * @param int|null $sale_order_count
     */
    public function setSaleOrderCount(?int $sale_order_count): void
    {
        $this->sale_order_count = $sale_order_count;
    }

    /**
     * @param OdooRelation[]|null $payment_token_ids
     */
    public function setPaymentTokenIds(?array $payment_token_ids): void
    {
        $this->payment_token_ids = $payment_token_ids;
    }

    /**
     * @return int|null
     */
    public function getSaleOrderCount(): ?int
    {
        return $this->sale_order_count;
    }

    /**
     * @param string|null $siret
     */
    public function setSiret(?string $siret): void
    {
        $this->siret = $siret;
    }

    /**
     * @return string|null
     */
    public function getSiret(): ?string
    {
        return $this->siret;
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
     * @return bool|null
     */
    public function isIsBlacklisted(): ?bool
    {
        return $this->is_blacklisted;
    }

    /**
     * @return string|null
     */
    public function getEmailNormalized(): ?string
    {
        return $this->email_normalized;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
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
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @param string|null $street2
     */
    public function setStreet2(?string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * @return string|null
     */
    public function getStreet2(): ?string
    {
        return $this->street2;
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
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getFunction(): ?string
    {
        return $this->function;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param bool|null $employee
     */
    public function setEmployee(?bool $employee): void
    {
        $this->employee = $employee;
    }

    /**
     * @return bool|null
     */
    public function isEmployee(): ?bool
    {
        return $this->employee;
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
     * @param string|null $zip
     */
    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
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
     */
    public function getEmailFormatted(): ?string
    {
        return $this->email_formatted;
    }

    /**
     * @param bool|null $is_company
     */
    public function setIsCompany(?bool $is_company): void
    {
        $this->is_company = $is_company;
    }

    /**
     * @return bool|null
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
     */
    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $email_formatted
     */
    public function setEmailFormatted(?string $email_formatted): void
    {
        $this->email_formatted = $email_formatted;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return OdooRelation|null
     */
    public function getStateId(): ?OdooRelation
    {
        return $this->state_id;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param float|null $partner_longitude
     */
    public function setPartnerLongitude(?float $partner_longitude): void
    {
        $this->partner_longitude = $partner_longitude;
    }

    /**
     * @return float|null
     */
    public function getPartnerLongitude(): ?float
    {
        return $this->partner_longitude;
    }

    /**
     * @param float|null $partner_latitude
     */
    public function setPartnerLatitude(?float $partner_latitude): void
    {
        $this->partner_latitude = $partner_latitude;
    }

    /**
     * @return float|null
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
     * @param OdooRelation[]|null $category_id
     */
    public function setCategoryId(?array $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @param OdooRelation|null $industry_id
     */
    public function setIndustryId(?OdooRelation $industry_id): void
    {
        $this->industry_id = $industry_id;
    }

    /**
     * @param string|null $parent_name
     */
    public function setParentName(?string $parent_name): void
    {
        $this->parent_name = $parent_name;
    }

    /**
     * @param string|null $ref
     */
    public function setRef(?string $ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @return string|null
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
     */
    public function getChildIds(): ?array
    {
        return $this->child_ids;
    }

    /**
     * @return string|null
     */
    public function getParentName(): ?string
    {
        return $this->parent_name;
    }

    /**
     * @param string|null $lang
     */
    public function setLang(?string $lang): void
    {
        $this->lang = $lang;
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
     * @return string|null
     */
    public function getLang(): ?string
    {
        return $this->lang;
    }

    /**
     * @return int|null
     */
    public function getActiveLangCount(): ?int
    {
        return $this->active_lang_count;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getCategoryId(): ?array
    {
        return $this->category_id;
    }

    /**
     * @param OdooRelation[]|null $bank_ids
     */
    public function setBankIds(?array $bank_ids): void
    {
        $this->bank_ids = $bank_ids;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
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
     * @return OdooRelation[]|null
     */
    public function getBankIds(): ?array
    {
        return $this->bank_ids;
    }

    /**
     * @param int|null $active_lang_count
     */
    public function setActiveLangCount(?int $active_lang_count): void
    {
        $this->active_lang_count = $active_lang_count;
    }

    /**
     * @param OdooRelation|null $same_vat_partner_id
     */
    public function setSameVatPartnerId(?OdooRelation $same_vat_partner_id): void
    {
        $this->same_vat_partner_id = $same_vat_partner_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSameVatPartnerId(): ?OdooRelation
    {
        return $this->same_vat_partner_id;
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
     */
    public function getTz(): ?string
    {
        return $this->tz;
    }

    /**
     * @return OdooRelation|null
     */
    public function getIndustryId(): ?OdooRelation
    {
        return $this->industry_id;
    }

    /**
     * @return string|null
     */
    public function getCompanyType(): ?string
    {
        return $this->company_type;
    }

    /**
     * @param OdooRelation|null $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?OdooRelation $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
    }

    /**
     * @param OdooRelation[]|null $message_partner_ids
     */
    public function setMessagePartnerIds(?array $message_partner_ids): void
    {
        $this->message_partner_ids = $message_partner_ids;
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
     * @return OdooRelation[]|null
     */
    public function getMessagePartnerIds(): ?array
    {
        return $this->message_partner_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
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
     * @return bool|null
     */
    public function isMessageIsFollower(): ?bool
    {
        return $this->message_is_follower;
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
     * @param OdooRelation[]|null $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @return string|null
     */
    public function getActivityExceptionIcon(): ?string
    {
        return $this->activity_exception_icon;
    }

    /**
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
    }

    /**
     * @return OdooRelation|null
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
     */
    public function isMessageHasError(): ?bool
    {
        return $this->message_has_error;
    }

    /**
     * @return int|null
     */
    public function getMessageNeedactionCounter(): ?int
    {
        return $this->message_needaction_counter;
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
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
    }

    /**
     * @return bool|null
     */
    public function isMessageNeedaction(): ?bool
    {
        return $this->message_needaction;
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
     * @param string|null $activity_exception_icon
     */
    public function setActivityExceptionIcon(?string $activity_exception_icon): void
    {
        $this->activity_exception_icon = $activity_exception_icon;
    }

    /**
     * @param string|null $activity_exception_decoration
     */
    public function setActivityExceptionDecoration(?string $activity_exception_decoration): void
    {
        $this->activity_exception_decoration = $activity_exception_decoration;
    }

    /**
     * @param string|null $company_type
     */
    public function setCompanyType(?string $company_type): void
    {
        $this->company_type = $company_type;
    }

    /**
     * @return bool|null
     */
    public function isPartnerShare(): ?bool
    {
        return $this->partner_share;
    }

    /**
     * @param string|null $commercial_company_name
     */
    public function setCommercialCompanyName(?string $commercial_company_name): void
    {
        $this->commercial_company_name = $commercial_company_name;
    }

    /**
     * @return string|null
     */
    public function getCommercialCompanyName(): ?string
    {
        return $this->commercial_company_name;
    }

    /**
     * @param OdooRelation|null $commercial_partner_id
     */
    public function setCommercialPartnerId(?OdooRelation $commercial_partner_id): void
    {
        $this->commercial_partner_id = $commercial_partner_id;
    }

    /**
     * @return OdooRelation|null
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
     * @param string|null $company_name
     */
    public function setCompanyName(?string $company_name): void
    {
        $this->company_name = $company_name;
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
     * @param OdooRelation[]|null $user_ids
     */
    public function setUserIds(?array $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @return OdooRelation[]|null
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
     */
    public function getCompanyId(): ?OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSelf(): ?OdooRelation
    {
        return $this->self;
    }

    /**
     * @return string|null
     */
    public function getActivityExceptionDecoration(): ?string
    {
        return $this->activity_exception_decoration;
    }

    /**
     * @return OdooRelation|null
     */
    public function getActivityUserId(): ?OdooRelation
    {
        return $this->activity_user_id;
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
     */
    public function getActivityDateDeadline(): ?DateTimeInterface
    {
        return $this->activity_date_deadline;
    }

    /**
     * @param OdooRelation|null $activity_type_id
     */
    public function setActivityTypeId(?OdooRelation $activity_type_id): void
    {
        $this->activity_type_id = $activity_type_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getActivityTypeId(): ?OdooRelation
    {
        return $this->activity_type_id;
    }

    /**
     * @param OdooRelation|null $activity_user_id
     */
    public function setActivityUserId(?OdooRelation $activity_user_id): void
    {
        $this->activity_user_id = $activity_user_id;
    }

    /**
     * @param string|null $activity_state
     */
    public function setActivityState(?string $activity_state): void
    {
        $this->activity_state = $activity_state;
    }

    /**
     * @param OdooRelation|null $self
     */
    public function setSelf(?OdooRelation $self): void
    {
        $this->self = $self;
    }

    /**
     * @return string|null
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
     * @param OdooRelation[]|null $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getActivityIds(): ?array
    {
        return $this->activity_ids;
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
     */
    public function getImStatus(): ?string
    {
        return $this->im_status;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.partner';
    }
}

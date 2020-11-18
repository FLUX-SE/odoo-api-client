<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Calendar;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : calendar.event
 * ---
 * Name : calendar.event
 * ---
 * Info :
 * Model for Calendar Event
 *
 *                 Special context keys :
 *                         - `no_mail_to_attendees` : disabled sending email to attendees when creating/editing a
 * meeting
 */
final class Event extends Base
{
    /**
     * Meeting Subject
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Status
     * ---
     * Selection :
     *     -> draft (Unconfirmed)
     *     -> open (Confirmed)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Attendee
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_attendee;

    /**
     * Attendee Status
     * ---
     * Selection :
     *     -> needsAction (Needs Action)
     *     -> tentative (Uncertain)
     *     -> declined (Declined)
     *     -> accepted (Accepted)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $attendee_status;

    /**
     * Event Time
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $display_time;

    /**
     * Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $display_start;

    /**
     * Start
     * ---
     * Start date of an event, without time for full days events
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $start;

    /**
     * Stop
     * ---
     * Stop date of an event, without time for full days events
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface
     */
    private $stop;

    /**
     * All Day
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $allday;

    /**
     * Start Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $start_date;

    /**
     * Start DateTime
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $start_datetime;

    /**
     * End Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $stop_date;

    /**
     * End Datetime
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $stop_datetime;

    /**
     * Timezone
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
    private $event_tz;

    /**
     * Duration
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $duration;

    /**
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $description;

    /**
     * Privacy
     * ---
     * Selection :
     *     -> public (Everyone)
     *     -> private (Only me)
     *     -> confidential (Only internal users)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $privacy;

    /**
     * Location
     * ---
     * Location of Event
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $location;

    /**
     * Show Time as
     * ---
     * Selection :
     *     -> free (Free)
     *     -> busy (Busy)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $show_as;

    /**
     * Document ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $res_id;

    /**
     * Document Model
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $res_model_id;

    /**
     * Document Model Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_model;

    /**
     * Activities
     * ---
     * Relation : one2many (mail.activity -> calendar_event_id)
     * @see \Flux\OdooApiClient\Model\Object\Mail\Activity
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $activity_ids;

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
    private $message_ids;

    /**
     * Recurrent Rule
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $rrule;

    /**
     * Recurrence
     * ---
     * Let the event automatically repeat at that interval
     * ---
     * Selection :
     *     -> daily (Days)
     *     -> weekly (Weeks)
     *     -> monthly (Months)
     *     -> yearly (Years)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $rrule_type;

    /**
     * Recurrent
     * ---
     * Recurrent Meeting
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $recurrency;

    /**
     * Recurrent ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $recurrent_id;

    /**
     * Recurrent ID date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $recurrent_id_date;

    /**
     * Recurrence Termination
     * ---
     * Selection :
     *     -> count (Number of repetitions)
     *     -> end_date (End date)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $end_type;

    /**
     * Repeat Every
     * ---
     * Repeat every (Days/Week/Month/Year)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $interval;

    /**
     * Repeat
     * ---
     * Repeat x times
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $count;

    /**
     * Mon
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $mo;

    /**
     * Tue
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $tu;

    /**
     * Wed
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $we;

    /**
     * Thu
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $th;

    /**
     * Fri
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $fr;

    /**
     * Sat
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $sa;

    /**
     * Sun
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $su;

    /**
     * Option
     * ---
     * Selection :
     *     -> date (Date of month)
     *     -> day (Day of month)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $month_by;

    /**
     * Date of month
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $day;

    /**
     * Weekday
     * ---
     * Selection :
     *     -> MO (Monday)
     *     -> TU (Tuesday)
     *     -> WE (Wednesday)
     *     -> TH (Thursday)
     *     -> FR (Friday)
     *     -> SA (Saturday)
     *     -> SU (Sunday)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $week_list;

    /**
     * By day
     * ---
     * Selection :
     *     -> 1 (First)
     *     -> 2 (Second)
     *     -> 3 (Third)
     *     -> 4 (Fourth)
     *     -> 5 (Fifth)
     *     -> -1 (Last)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $byday;

    /**
     * Repeat Until
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $final_date;

    /**
     * Owner
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Responsible
     * ---
     * Partner-related data of the user
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $partner_id;

    /**
     * Active
     * ---
     * If the active field is set to false, it will allow you to hide the event alarm information without removing
     * it.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Tags
     * ---
     * Relation : many2many (calendar.event.type)
     * @see \Flux\OdooApiClient\Model\Object\Calendar\Event\Type
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $categ_ids;

    /**
     * Participant
     * ---
     * Relation : one2many (calendar.attendee -> event_id)
     * @see \Flux\OdooApiClient\Model\Object\Calendar\Attendee
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $attendee_ids;

    /**
     * Attendees
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $partner_ids;

    /**
     * Reminders
     * ---
     * Relation : many2many (calendar.alarm)
     * @see \Flux\OdooApiClient\Model\Object\Calendar\Alarm
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $alarm_ids;

    /**
     * Is the Event Highlighted
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_highlighted;

    /**
     * Odoo Update Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $oe_update_date;

    /**
     * Is Follower
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $message_is_follower;

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
    private $message_follower_ids;

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
    private $message_partner_ids;

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
    private $message_channel_ids;

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
    private $message_unread;

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
    private $message_unread_counter;

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
    private $message_needaction;

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
    private $message_needaction_counter;

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
    private $message_has_error;

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
    private $message_has_error_counter;

    /**
     * Attachment Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $message_attachment_count;

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
    private $message_main_attachment_id;

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
    private $website_message_ids;

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
    private $message_has_sms_error;

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
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

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
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Meeting Subject
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $start Start
     *        ---
     *        Start date of an event, without time for full days events
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $stop Stop
     *        ---
     *        Stop date of an event, without time for full days events
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, DateTimeInterface $start, DateTimeInterface $stop)
    {
        $this->name = $name;
        $this->start = $start;
        $this->stop = $stop;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAlarmIds(OdooRelation $item): void
    {
        if ($this->hasAlarmIds($item)) {
            return;
        }

        if (null === $this->alarm_ids) {
            $this->alarm_ids = [];
        }

        $this->alarm_ids[] = $item;
    }

    /**
     * @param OdooRelation[]|null $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->partner_ids) {
            return false;
        }

        return in_array($item, $this->partner_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addPartnerIds(OdooRelation $item): void
    {
        if ($this->hasPartnerIds($item)) {
            return;
        }

        if (null === $this->partner_ids) {
            $this->partner_ids = [];
        }

        $this->partner_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removePartnerIds(OdooRelation $item): void
    {
        if (null === $this->partner_ids) {
            $this->partner_ids = [];
        }

        if ($this->hasPartnerIds($item)) {
            $index = array_search($item, $this->partner_ids);
            unset($this->partner_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("alarm_ids")
     */
    public function getAlarmIds(): ?array
    {
        return $this->alarm_ids;
    }

    /**
     * @param OdooRelation[]|null $alarm_ids
     */
    public function setAlarmIds(?array $alarm_ids): void
    {
        $this->alarm_ids = $alarm_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAlarmIds(OdooRelation $item): bool
    {
        if (null === $this->alarm_ids) {
            return false;
        }

        return in_array($item, $this->alarm_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAlarmIds(OdooRelation $item): void
    {
        if (null === $this->alarm_ids) {
            $this->alarm_ids = [];
        }

        if ($this->hasAlarmIds($item)) {
            $index = array_search($item, $this->alarm_ids);
            unset($this->alarm_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAttendeeIds(OdooRelation $item): void
    {
        if (null === $this->attendee_ids) {
            $this->attendee_ids = [];
        }

        if ($this->hasAttendeeIds($item)) {
            $index = array_search($item, $this->attendee_ids);
            unset($this->attendee_ids[$index]);
        }
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_highlighted")
     */
    public function isIsHighlighted(): ?bool
    {
        return $this->is_highlighted;
    }

    /**
     * @param bool|null $is_highlighted
     */
    public function setIsHighlighted(?bool $is_highlighted): void
    {
        $this->is_highlighted = $is_highlighted;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("oe_update_date")
     */
    public function getOeUpdateDate(): ?DateTimeInterface
    {
        return $this->oe_update_date;
    }

    /**
     * @param DateTimeInterface|null $oe_update_date
     */
    public function setOeUpdateDate(?DateTimeInterface $oe_update_date): void
    {
        $this->oe_update_date = $oe_update_date;
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
     * @param bool|null $message_is_follower
     */
    public function setMessageIsFollower(?bool $message_is_follower): void
    {
        $this->message_is_follower = $message_is_follower;
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
     * @param OdooRelation[]|null $message_follower_ids
     */
    public function setMessageFollowerIds(?array $message_follower_ids): void
    {
        $this->message_follower_ids = $message_follower_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("partner_ids")
     */
    public function getPartnerIds(): ?array
    {
        return $this->partner_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addAttendeeIds(OdooRelation $item): void
    {
        if ($this->hasAttendeeIds($item)) {
            return;
        }

        if (null === $this->attendee_ids) {
            $this->attendee_ids = [];
        }

        $this->attendee_ids[] = $item;
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
     * @param OdooRelation|null $partner_id
     */
    public function setPartnerId(?OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @param string|null $week_list
     */
    public function setWeekList(?string $week_list): void
    {
        $this->week_list = $week_list;
    }

    /**
     * @return string|null
     *
     * @SerializedName("byday")
     */
    public function getByday(): ?string
    {
        return $this->byday;
    }

    /**
     * @param string|null $byday
     */
    public function setByday(?string $byday): void
    {
        $this->byday = $byday;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("final_date")
     */
    public function getFinalDate(): ?DateTimeInterface
    {
        return $this->final_date;
    }

    /**
     * @param DateTimeInterface|null $final_date
     */
    public function setFinalDate(?DateTimeInterface $final_date): void
    {
        $this->final_date = $final_date;
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
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("partner_id")
     */
    public function getPartnerId(): ?OdooRelation
    {
        return $this->partner_id;
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAttendeeIds(OdooRelation $item): bool
    {
        if (null === $this->attendee_ids) {
            return false;
        }

        return in_array($item, $this->attendee_ids);
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("categ_ids")
     */
    public function getCategIds(): ?array
    {
        return $this->categ_ids;
    }

    /**
     * @param OdooRelation[]|null $categ_ids
     */
    public function setCategIds(?array $categ_ids): void
    {
        $this->categ_ids = $categ_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasCategIds(OdooRelation $item): bool
    {
        if (null === $this->categ_ids) {
            return false;
        }

        return in_array($item, $this->categ_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addCategIds(OdooRelation $item): void
    {
        if ($this->hasCategIds($item)) {
            return;
        }

        if (null === $this->categ_ids) {
            $this->categ_ids = [];
        }

        $this->categ_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeCategIds(OdooRelation $item): void
    {
        if (null === $this->categ_ids) {
            $this->categ_ids = [];
        }

        if ($this->hasCategIds($item)) {
            $index = array_search($item, $this->categ_ids);
            unset($this->categ_ids[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("attendee_ids")
     */
    public function getAttendeeIds(): ?array
    {
        return $this->attendee_ids;
    }

    /**
     * @param OdooRelation[]|null $attendee_ids
     */
    public function setAttendeeIds(?array $attendee_ids): void
    {
        $this->attendee_ids = $attendee_ids;
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
     * @param int|null $day
     */
    public function setDay(?int $day): void
    {
        $this->day = $day;
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
     * @param int|null $message_attachment_count
     */
    public function setMessageAttachmentCount(?int $message_attachment_count): void
    {
        $this->message_attachment_count = $message_attachment_count;
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
     * @param OdooRelation|null $message_main_attachment_id
     */
    public function setMessageMainAttachmentId(?OdooRelation $message_main_attachment_id): void
    {
        $this->message_main_attachment_id = $message_main_attachment_id;
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
     * @param OdooRelation[]|null $website_message_ids
     */
    public function setWebsiteMessageIds(?array $website_message_ids): void
    {
        $this->website_message_ids = $website_message_ids;
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
     * @param bool|null $message_has_sms_error
     */
    public function setMessageHasSmsError(?bool $message_has_sms_error): void
    {
        $this->message_has_sms_error = $message_has_sms_error;
    }

    /**
     * @param int|null $message_has_error_counter
     */
    public function setMessageHasErrorCounter(?int $message_has_error_counter): void
    {
        $this->message_has_error_counter = $message_has_error_counter;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
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
     * @return int|null
     *
     * @SerializedName("message_has_error_counter")
     */
    public function getMessageHasErrorCounter(): ?int
    {
        return $this->message_has_error_counter;
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
     * @param OdooRelation[]|null $message_partner_ids
     */
    public function setMessagePartnerIds(?array $message_partner_ids): void
    {
        $this->message_partner_ids = $message_partner_ids;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_channel_ids")
     */
    public function getMessageChannelIds(): ?array
    {
        return $this->message_channel_ids;
    }

    /**
     * @param OdooRelation[]|null $message_channel_ids
     */
    public function setMessageChannelIds(?array $message_channel_ids): void
    {
        $this->message_channel_ids = $message_channel_ids;
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
     * @return bool|null
     *
     * @SerializedName("message_unread")
     */
    public function isMessageUnread(): ?bool
    {
        return $this->message_unread;
    }

    /**
     * @param bool|null $message_has_error
     */
    public function setMessageHasError(?bool $message_has_error): void
    {
        $this->message_has_error = $message_has_error;
    }

    /**
     * @param bool|null $message_unread
     */
    public function setMessageUnread(?bool $message_unread): void
    {
        $this->message_unread = $message_unread;
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
     * @param int|null $message_unread_counter
     */
    public function setMessageUnreadCounter(?int $message_unread_counter): void
    {
        $this->message_unread_counter = $message_unread_counter;
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
     * @param bool|null $message_needaction
     */
    public function setMessageNeedaction(?bool $message_needaction): void
    {
        $this->message_needaction = $message_needaction;
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
     * @param int|null $message_needaction_counter
     */
    public function setMessageNeedactionCounter(?int $message_needaction_counter): void
    {
        $this->message_needaction_counter = $message_needaction_counter;
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
     * @return string|null
     *
     * @SerializedName("week_list")
     */
    public function getWeekList(): ?string
    {
        return $this->week_list;
    }

    /**
     * @return int|null
     *
     * @SerializedName("day")
     */
    public function getDay(): ?int
    {
        return $this->day;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param DateTimeInterface|null $stop_date
     */
    public function setStopDate(?DateTimeInterface $stop_date): void
    {
        $this->stop_date = $stop_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("stop_datetime")
     */
    public function getStopDatetime(): ?DateTimeInterface
    {
        return $this->stop_datetime;
    }

    /**
     * @param DateTimeInterface|null $stop_datetime
     */
    public function setStopDatetime(?DateTimeInterface $stop_datetime): void
    {
        $this->stop_datetime = $stop_datetime;
    }

    /**
     * @return string|null
     *
     * @SerializedName("event_tz")
     */
    public function getEventTz(): ?string
    {
        return $this->event_tz;
    }

    /**
     * @param string|null $event_tz
     */
    public function setEventTz(?string $event_tz): void
    {
        $this->event_tz = $event_tz;
    }

    /**
     * @return float|null
     *
     * @SerializedName("duration")
     */
    public function getDuration(): ?float
    {
        return $this->duration;
    }

    /**
     * @param float|null $duration
     */
    public function setDuration(?float $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return string|null
     *
     * @SerializedName("description")
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string|null
     *
     * @SerializedName("privacy")
     */
    public function getPrivacy(): ?string
    {
        return $this->privacy;
    }

    /**
     * @param DateTimeInterface|null $start_datetime
     */
    public function setStartDatetime(?DateTimeInterface $start_datetime): void
    {
        $this->start_datetime = $start_datetime;
    }

    /**
     * @param string|null $privacy
     */
    public function setPrivacy(?string $privacy): void
    {
        $this->privacy = $privacy;
    }

    /**
     * @return string|null
     *
     * @SerializedName("location")
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string|null $location
     */
    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string|null
     *
     * @SerializedName("show_as")
     */
    public function getShowAs(): ?string
    {
        return $this->show_as;
    }

    /**
     * @param string|null $show_as
     */
    public function setShowAs(?string $show_as): void
    {
        $this->show_as = $show_as;
    }

    /**
     * @return int|null
     *
     * @SerializedName("res_id")
     */
    public function getResId(): ?int
    {
        return $this->res_id;
    }

    /**
     * @param int|null $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("res_model_id")
     */
    public function getResModelId(): ?OdooRelation
    {
        return $this->res_model_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("stop_date")
     */
    public function getStopDate(): ?DateTimeInterface
    {
        return $this->stop_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("start_datetime")
     */
    public function getStartDatetime(): ?DateTimeInterface
    {
        return $this->start_datetime;
    }

    /**
     * @return string|null
     *
     * @SerializedName("res_model")
     */
    public function getResModel(): ?string
    {
        return $this->res_model;
    }

    /**
     * @param string|null $display_time
     */
    public function setDisplayTime(?string $display_time): void
    {
        $this->display_time = $display_time;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_attendee")
     */
    public function isIsAttendee(): ?bool
    {
        return $this->is_attendee;
    }

    /**
     * @param bool|null $is_attendee
     */
    public function setIsAttendee(?bool $is_attendee): void
    {
        $this->is_attendee = $is_attendee;
    }

    /**
     * @return string|null
     *
     * @SerializedName("attendee_status")
     */
    public function getAttendeeStatus(): ?string
    {
        return $this->attendee_status;
    }

    /**
     * @param string|null $attendee_status
     */
    public function setAttendeeStatus(?string $attendee_status): void
    {
        $this->attendee_status = $attendee_status;
    }

    /**
     * @return string|null
     *
     * @SerializedName("display_time")
     */
    public function getDisplayTime(): ?string
    {
        return $this->display_time;
    }

    /**
     * @return string|null
     *
     * @SerializedName("display_start")
     */
    public function getDisplayStart(): ?string
    {
        return $this->display_start;
    }

    /**
     * @param DateTimeInterface|null $start_date
     */
    public function setStartDate(?DateTimeInterface $start_date): void
    {
        $this->start_date = $start_date;
    }

    /**
     * @param string|null $display_start
     */
    public function setDisplayStart(?string $display_start): void
    {
        $this->display_start = $display_start;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("start")
     */
    public function getStart(): DateTimeInterface
    {
        return $this->start;
    }

    /**
     * @param DateTimeInterface $start
     */
    public function setStart(DateTimeInterface $start): void
    {
        $this->start = $start;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("stop")
     */
    public function getStop(): DateTimeInterface
    {
        return $this->stop;
    }

    /**
     * @param DateTimeInterface $stop
     */
    public function setStop(DateTimeInterface $stop): void
    {
        $this->stop = $stop;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("allday")
     */
    public function isAllday(): ?bool
    {
        return $this->allday;
    }

    /**
     * @param bool|null $allday
     */
    public function setAllday(?bool $allday): void
    {
        $this->allday = $allday;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("start_date")
     */
    public function getStartDate(): ?DateTimeInterface
    {
        return $this->start_date;
    }

    /**
     * @param OdooRelation|null $res_model_id
     */
    public function setResModelId(?OdooRelation $res_model_id): void
    {
        $this->res_model_id = $res_model_id;
    }

    /**
     * @param string|null $res_model
     */
    public function setResModel(?string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @param string|null $month_by
     */
    public function setMonthBy(?string $month_by): void
    {
        $this->month_by = $month_by;
    }

    /**
     * @param bool|null $we
     */
    public function setWe(?bool $we): void
    {
        $this->we = $we;
    }

    /**
     * @param int|null $interval
     */
    public function setInterval(?int $interval): void
    {
        $this->interval = $interval;
    }

    /**
     * @return int|null
     *
     * @SerializedName("count")
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @param int|null $count
     */
    public function setCount(?int $count): void
    {
        $this->count = $count;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("mo")
     */
    public function isMo(): ?bool
    {
        return $this->mo;
    }

    /**
     * @param bool|null $mo
     */
    public function setMo(?bool $mo): void
    {
        $this->mo = $mo;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("tu")
     */
    public function isTu(): ?bool
    {
        return $this->tu;
    }

    /**
     * @param bool|null $tu
     */
    public function setTu(?bool $tu): void
    {
        $this->tu = $tu;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("we")
     */
    public function isWe(): ?bool
    {
        return $this->we;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("th")
     */
    public function isTh(): ?bool
    {
        return $this->th;
    }

    /**
     * @param string|null $end_type
     */
    public function setEndType(?string $end_type): void
    {
        $this->end_type = $end_type;
    }

    /**
     * @param bool|null $th
     */
    public function setTh(?bool $th): void
    {
        $this->th = $th;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("fr")
     */
    public function isFr(): ?bool
    {
        return $this->fr;
    }

    /**
     * @param bool|null $fr
     */
    public function setFr(?bool $fr): void
    {
        $this->fr = $fr;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("sa")
     */
    public function isSa(): ?bool
    {
        return $this->sa;
    }

    /**
     * @param bool|null $sa
     */
    public function setSa(?bool $sa): void
    {
        $this->sa = $sa;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("su")
     */
    public function isSu(): ?bool
    {
        return $this->su;
    }

    /**
     * @param bool|null $su
     */
    public function setSu(?bool $su): void
    {
        $this->su = $su;
    }

    /**
     * @return string|null
     *
     * @SerializedName("month_by")
     */
    public function getMonthBy(): ?string
    {
        return $this->month_by;
    }

    /**
     * @return int|null
     *
     * @SerializedName("interval")
     */
    public function getInterval(): ?int
    {
        return $this->interval;
    }

    /**
     * @return string|null
     *
     * @SerializedName("end_type")
     */
    public function getEndType(): ?string
    {
        return $this->end_type;
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
     * @param OdooRelation[]|null $activity_ids
     */
    public function setActivityIds(?array $activity_ids): void
    {
        $this->activity_ids = $activity_ids;
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("message_ids")
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
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
     * @return string|null
     *
     * @SerializedName("rrule")
     */
    public function getRrule(): ?string
    {
        return $this->rrule;
    }

    /**
     * @param DateTimeInterface|null $recurrent_id_date
     */
    public function setRecurrentIdDate(?DateTimeInterface $recurrent_id_date): void
    {
        $this->recurrent_id_date = $recurrent_id_date;
    }

    /**
     * @param string|null $rrule
     */
    public function setRrule(?string $rrule): void
    {
        $this->rrule = $rrule;
    }

    /**
     * @return string|null
     *
     * @SerializedName("rrule_type")
     */
    public function getRruleType(): ?string
    {
        return $this->rrule_type;
    }

    /**
     * @param string|null $rrule_type
     */
    public function setRruleType(?string $rrule_type): void
    {
        $this->rrule_type = $rrule_type;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("recurrency")
     */
    public function isRecurrency(): ?bool
    {
        return $this->recurrency;
    }

    /**
     * @param bool|null $recurrency
     */
    public function setRecurrency(?bool $recurrency): void
    {
        $this->recurrency = $recurrency;
    }

    /**
     * @return int|null
     *
     * @SerializedName("recurrent_id")
     */
    public function getRecurrentId(): ?int
    {
        return $this->recurrent_id;
    }

    /**
     * @param int|null $recurrent_id
     */
    public function setRecurrentId(?int $recurrent_id): void
    {
        $this->recurrent_id = $recurrent_id;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("recurrent_id_date")
     */
    public function getRecurrentIdDate(): ?DateTimeInterface
    {
        return $this->recurrent_id_date;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'calendar.event';
    }
}

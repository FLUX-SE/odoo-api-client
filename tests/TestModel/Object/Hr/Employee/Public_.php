<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.employee.public
 * ---
 * Name : hr.employee.public
 * ---
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Public_ extends Base
{
    /**
     * Create Date
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Department
     * ---
     * Relation : many2one (hr.department)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Department
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $department_id;

    /**
     * Job Position
     * ---
     * Relation : many2one (hr.job)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Job
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $job_id;

    /**
     * Job Title
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $job_title;

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
    private $company_id;

    /**
     * Work Address
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $address_id;

    /**
     * Work Mobile
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $mobile_phone;

    /**
     * Work Phone
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $work_phone;

    /**
     * Work Email
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $work_email;

    /**
     * Work Location
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $work_location;

    /**
     * User
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Resource
     * ---
     * Relation : many2one (resource.resource)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Resource_\Resource_
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $resource_id;

    /**
     * Resource Calendar
     * ---
     * Relation : many2one (resource.calendar)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Resource_\Calendar
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $resource_calendar_id;

    /**
     * Timezone
     * ---
     * This field is used in order to define in which timezone the resources will work.
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
     * Sortable : no
     *
     * @var string|null
     */
    private $tz;

    /**
     * Color Index
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $color;

    /**
     * Direct subordinates
     * ---
     * Relation : one2many (hr.employee.public -> parent_id)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee\Public_
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $child_ids;

    /**
     * Original Image
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    private $image_1920;

    /**
     * Image 1024
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    private $image_1024;

    /**
     * Image 512
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    private $image_512;

    /**
     * Image 256
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    private $image_256;

    /**
     * Image 128
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var mixed|null
     */
    private $image_128;

    /**
     * Manager
     * ---
     * Relation : many2one (hr.employee.public)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee\Public_
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $parent_id;

    /**
     * Coach
     * ---
     * Select the "Employee" who is the coach of this employee.
     * The "Coach" has no specific rights or responsibilities by default.
     * ---
     * Relation : many2one (hr.employee.public)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee\Public_
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $coach_id;

    /**
     * User's partner
     * ---
     * Partner-related data of the user
     * ---
     * Relation : many2one (res.partner)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $user_partner_id;

    /**
     * Subordinates
     * ---
     * Direct and indirect subordinates
     * ---
     * Relation : one2many (hr.employee.public)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Hr\Employee\Public_
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $subordinate_ids;

    /**
     * Hr Presence State
     * ---
     * Selection :
     *     -> present (Present)
     *     -> absent (Absent)
     *     -> to_define (To Define)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $hr_presence_state;

    /**
     * Last Activity
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var DateTimeInterface|null
     */
    private $last_activity;

    /**
     * Last Activity Time
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $last_activity_time;

    /**
     * Hr Icon Display
     * ---
     * Selection :
     *     -> presence_present (Present)
     *     -> presence_absent_active (Present but not active)
     *     -> presence_absent (Absent)
     *     -> presence_to_define (To define)
     *     -> presence_undetermined (Undetermined)
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $hr_icon_display;

    /**
     * Indirect Subordinates Count
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $child_all_count;

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
    private $create_uid;

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
     * @SerializedName("parent_id")
     */
    public function getParentId(): ?OdooRelation
    {
        return $this->parent_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("subordinate_ids")
     */
    public function getSubordinateIds(): ?array
    {
        return $this->subordinate_ids;
    }

    /**
     * @param OdooRelation|null $user_partner_id
     */
    public function setUserPartnerId(?OdooRelation $user_partner_id): void
    {
        $this->user_partner_id = $user_partner_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("user_partner_id")
     */
    public function getUserPartnerId(): ?OdooRelation
    {
        return $this->user_partner_id;
    }

    /**
     * @param OdooRelation|null $coach_id
     */
    public function setCoachId(?OdooRelation $coach_id): void
    {
        $this->coach_id = $coach_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("coach_id")
     */
    public function getCoachId(): ?OdooRelation
    {
        return $this->coach_id;
    }

    /**
     * @param OdooRelation|null $parent_id
     */
    public function setParentId(?OdooRelation $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @param mixed|null $image_128
     */
    public function setImage128($image_128): void
    {
        $this->image_128 = $image_128;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSubordinateIds(OdooRelation $item): bool
    {
        if (null === $this->subordinate_ids) {
            return false;
        }

        return in_array($item, $this->subordinate_ids);
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
     * @return mixed|null
     *
     * @SerializedName("image_1024")
     */
    public function getImage1024()
    {
        return $this->image_1024;
    }

    /**
     * @param OdooRelation[]|null $subordinate_ids
     */
    public function setSubordinateIds(?array $subordinate_ids): void
    {
        $this->subordinate_ids = $subordinate_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addSubordinateIds(OdooRelation $item): void
    {
        if ($this->hasSubordinateIds($item)) {
            return;
        }

        if (null === $this->subordinate_ids) {
            $this->subordinate_ids = [];
        }

        $this->subordinate_ids[] = $item;
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
     * @return int|null
     *
     * @SerializedName("child_all_count")
     */
    public function getChildAllCount(): ?int
    {
        return $this->child_all_count;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param int|null $child_all_count
     */
    public function setChildAllCount(?int $child_all_count): void
    {
        $this->child_all_count = $child_all_count;
    }

    /**
     * @param string|null $hr_icon_display
     */
    public function setHrIconDisplay(?string $hr_icon_display): void
    {
        $this->hr_icon_display = $hr_icon_display;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSubordinateIds(OdooRelation $item): void
    {
        if (null === $this->subordinate_ids) {
            $this->subordinate_ids = [];
        }

        if ($this->hasSubordinateIds($item)) {
            $index = array_search($item, $this->subordinate_ids);
            unset($this->subordinate_ids[$index]);
        }
    }

    /**
     * @return string|null
     *
     * @SerializedName("hr_icon_display")
     */
    public function getHrIconDisplay(): ?string
    {
        return $this->hr_icon_display;
    }

    /**
     * @param string|null $last_activity_time
     */
    public function setLastActivityTime(?string $last_activity_time): void
    {
        $this->last_activity_time = $last_activity_time;
    }

    /**
     * @return string|null
     *
     * @SerializedName("last_activity_time")
     */
    public function getLastActivityTime(): ?string
    {
        return $this->last_activity_time;
    }

    /**
     * @param DateTimeInterface|null $last_activity
     */
    public function setLastActivity(?DateTimeInterface $last_activity): void
    {
        $this->last_activity = $last_activity;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("last_activity")
     */
    public function getLastActivity(): ?DateTimeInterface
    {
        return $this->last_activity;
    }

    /**
     * @param string|null $hr_presence_state
     */
    public function setHrPresenceState(?string $hr_presence_state): void
    {
        $this->hr_presence_state = $hr_presence_state;
    }

    /**
     * @return string|null
     *
     * @SerializedName("hr_presence_state")
     */
    public function getHrPresenceState(): ?string
    {
        return $this->hr_presence_state;
    }

    /**
     * @param mixed|null $image_1920
     */
    public function setImage1920($image_1920): void
    {
        $this->image_1920 = $image_1920;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("job_title")
     */
    public function getJobTitle(): ?string
    {
        return $this->job_title;
    }

    /**
     * @return string|null
     *
     * @SerializedName("mobile_phone")
     */
    public function getMobilePhone(): ?string
    {
        return $this->mobile_phone;
    }

    /**
     * @param OdooRelation|null $address_id
     */
    public function setAddressId(?OdooRelation $address_id): void
    {
        $this->address_id = $address_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("address_id")
     */
    public function getAddressId(): ?OdooRelation
    {
        return $this->address_id;
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
     * @param string|null $job_title
     */
    public function setJobTitle(?string $job_title): void
    {
        $this->job_title = $job_title;
    }

    /**
     * @param OdooRelation|null $job_id
     */
    public function setJobId(?OdooRelation $job_id): void
    {
        $this->job_id = $job_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("work_phone")
     */
    public function getWorkPhone(): ?string
    {
        return $this->work_phone;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("job_id")
     */
    public function getJobId(): ?OdooRelation
    {
        return $this->job_id;
    }

    /**
     * @param OdooRelation|null $department_id
     */
    public function setDepartmentId(?OdooRelation $department_id): void
    {
        $this->department_id = $department_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("department_id")
     */
    public function getDepartmentId(): ?OdooRelation
    {
        return $this->department_id;
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
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
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
     * @param string|null $mobile_phone
     */
    public function setMobilePhone(?string $mobile_phone): void
    {
        $this->mobile_phone = $mobile_phone;
    }

    /**
     * @param string|null $work_phone
     */
    public function setWorkPhone(?string $work_phone): void
    {
        $this->work_phone = $work_phone;
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
     * @param OdooRelation|null $resource_calendar_id
     */
    public function setResourceCalendarId(?OdooRelation $resource_calendar_id): void
    {
        $this->resource_calendar_id = $resource_calendar_id;
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
     * @return OdooRelation|null
     *
     * @SerializedName("resource_calendar_id")
     */
    public function getResourceCalendarId(): ?OdooRelation
    {
        return $this->resource_calendar_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("work_email")
     */
    public function getWorkEmail(): ?string
    {
        return $this->work_email;
    }

    /**
     * @param OdooRelation|null $resource_id
     */
    public function setResourceId(?OdooRelation $resource_id): void
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("resource_id")
     */
    public function getResourceId(): ?OdooRelation
    {
        return $this->resource_id;
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
     * @param string|null $work_location
     */
    public function setWorkLocation(?string $work_location): void
    {
        $this->work_location = $work_location;
    }

    /**
     * @return string|null
     *
     * @SerializedName("work_location")
     */
    public function getWorkLocation(): ?string
    {
        return $this->work_location;
    }

    /**
     * @param string|null $work_email
     */
    public function setWorkEmail(?string $work_email): void
    {
        $this->work_email = $work_email;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.employee.public';
    }
}

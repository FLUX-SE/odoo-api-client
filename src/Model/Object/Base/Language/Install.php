<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Language;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : base.language.install
 * Name : base.language.install
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Install extends Base
{
    /**
     * Language
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> sq_AL (Albanian / Shqip)
     *     -> am_ET (Amharic / አምሃርኛ)
     *     -> ar_SY (Arabic (Syria) / الْعَرَبيّة)
     *     -> ar_001 (Arabic / الْعَرَبيّة)
     *     -> eu_ES (Basque / Euskara)
     *     -> bn_IN (Bengali / বাংলা)
     *     -> bs_BA (Bosnian / bosanski jezik)
     *     -> bg_BG (Bulgarian / български език)
     *     -> my_MM (Burmese / ဗမာစာ)
     *     -> ca_ES (Catalan / Català)
     *     -> zh_HK (Chinese (HK))
     *     -> zh_CN (Chinese (Simplified) / 简体中文)
     *     -> zh_TW (Chinese (Traditional) / 正體字)
     *     -> hr_HR (Croatian / hrvatski jezik)
     *     -> cs_CZ (Czech / Čeština)
     *     -> da_DK (Danish / Dansk)
     *     -> nl_BE (Dutch (BE) / Nederlands (BE))
     *     -> nl_NL (Dutch / Nederlands)
     *     -> en_AU (English (AU))
     *     -> en_CA (English (CA))
     *     -> en_GB (English (UK))
     *     -> en_US (English (US))
     *     -> et_EE (Estonian / Eesti keel)
     *     -> fil_PH (Filipino)
     *     -> fi_FI (Finnish / Suomi)
     *     -> fr_BE (French (BE) / Français (BE))
     *     -> fr_CA (French (CA) / Français (CA))
     *     -> fr_CH (French (CH) / Français (CH))
     *     -> fr_FR (French / Français)
     *     -> gl_ES (Galician / Galego)
     *     -> ka_GE (Georgian / ქართული ენა)
     *     -> de_CH (German (CH) / Deutsch (CH))
     *     -> de_DE (German / Deutsch)
     *     -> el_GR (Greek / Ελληνικά)
     *     -> gu_IN (Gujarati / ગુજરાતી)
     *     -> he_IL (Hebrew / עִבְרִי)
     *     -> hi_IN (Hindi / हिंदी)
     *     -> hu_HU (Hungarian / Magyar)
     *     -> id_ID (Indonesian / Bahasa Indonesia)
     *     -> it_IT (Italian / Italiano)
     *     -> ja_JP (Japanese / 日本語)
     *     -> kab_DZ (Kabyle / Taqbaylit)
     *     -> km_KH (Khmer / ភាសាខ្មែរ)
     *     -> ko_KP (Korean (KP) / 한국어 (KP))
     *     -> ko_KR (Korean (KR) / 한국어 (KR))
     *     -> lo_LA (Lao / ພາສາລາວ)
     *     -> lv_LV (Latvian / latviešu valoda)
     *     -> lt_LT (Lithuanian / Lietuvių kalba)
     *     -> lb_LU (Luxembourgish)
     *     -> mk_MK (Macedonian / македонски јазик)
     *     -> mn_MN (Mongolian / монгол)
     *     -> nb_NO (Norwegian Bokmål / Norsk bokmål)
     *     -> fa_IR (Persian / فارس)
     *     -> pl_PL (Polish / Język polski)
     *     -> pt_AO (Portuguese (AO) / Português (AO))
     *     -> pt_BR (Portuguese (BR) / Português (BR))
     *     -> pt_PT (Portuguese / Português)
     *     -> ro_RO (Romanian / română)
     *     -> ru_RU (Russian / русский язык)
     *     -> sr_RS (Serbian (Cyrillic) / српски)
     *     -> sr@latin (Serbian (Latin) / srpski)
     *     -> sk_SK (Slovak / Slovenský jazyk)
     *     -> sl_SI (Slovenian / slovenščina)
     *     -> es_AR (Spanish (AR) / Español (AR))
     *     -> es_BO (Spanish (BO) / Español (BO))
     *     -> es_CL (Spanish (CL) / Español (CL))
     *     -> es_CO (Spanish (CO) / Español (CO))
     *     -> es_CR (Spanish (CR) / Español (CR))
     *     -> es_DO (Spanish (DO) / Español (DO))
     *     -> es_EC (Spanish (EC) / Español (EC))
     *     -> es_GT (Spanish (GT) / Español (GT))
     *     -> es_MX (Spanish (MX) / Español (MX))
     *     -> es_PA (Spanish (PA) / Español (PA))
     *     -> es_PE (Spanish (PE) / Español (PE))
     *     -> es_PY (Spanish (PY) / Español (PY))
     *     -> es_UY (Spanish (UY) / Español (UY))
     *     -> es_VE (Spanish (VE) / Español (VE))
     *     -> es_ES (Spanish / Español)
     *     -> sv_SE (Swedish / Svenska)
     *     -> tl_PH (Tagalog / Filipino)
     *     -> te_IN (Telugu / తెలుగు)
     *     -> th_TH (Thai / ภาษาไทย)
     *     -> tr_TR (Turkish / Türkçe)
     *     -> uk_UA (Ukrainian / українська)
     *     -> vi_VN (Vietnamese / Tiếng Việt)
     *
     *
     * @var string
     */
    private $lang;

    /**
     * Overwrite Existing Terms
     * If you check this box, your customized translations will be overwritten and replaced by the official ones.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $overwrite;

    /**
     * Status
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> init (init)
     *     -> done (done)
     *
     *
     * @var string|null
     */
    private $state;

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
     * @param string $lang Language
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> sq_AL (Albanian / Shqip)
     *            -> am_ET (Amharic / አምሃርኛ)
     *            -> ar_SY (Arabic (Syria) / الْعَرَبيّة)
     *            -> ar_001 (Arabic / الْعَرَبيّة)
     *            -> eu_ES (Basque / Euskara)
     *            -> bn_IN (Bengali / বাংলা)
     *            -> bs_BA (Bosnian / bosanski jezik)
     *            -> bg_BG (Bulgarian / български език)
     *            -> my_MM (Burmese / ဗမာစာ)
     *            -> ca_ES (Catalan / Català)
     *            -> zh_HK (Chinese (HK))
     *            -> zh_CN (Chinese (Simplified) / 简体中文)
     *            -> zh_TW (Chinese (Traditional) / 正體字)
     *            -> hr_HR (Croatian / hrvatski jezik)
     *            -> cs_CZ (Czech / Čeština)
     *            -> da_DK (Danish / Dansk)
     *            -> nl_BE (Dutch (BE) / Nederlands (BE))
     *            -> nl_NL (Dutch / Nederlands)
     *            -> en_AU (English (AU))
     *            -> en_CA (English (CA))
     *            -> en_GB (English (UK))
     *            -> en_US (English (US))
     *            -> et_EE (Estonian / Eesti keel)
     *            -> fil_PH (Filipino)
     *            -> fi_FI (Finnish / Suomi)
     *            -> fr_BE (French (BE) / Français (BE))
     *            -> fr_CA (French (CA) / Français (CA))
     *            -> fr_CH (French (CH) / Français (CH))
     *            -> fr_FR (French / Français)
     *            -> gl_ES (Galician / Galego)
     *            -> ka_GE (Georgian / ქართული ენა)
     *            -> de_CH (German (CH) / Deutsch (CH))
     *            -> de_DE (German / Deutsch)
     *            -> el_GR (Greek / Ελληνικά)
     *            -> gu_IN (Gujarati / ગુજરાતી)
     *            -> he_IL (Hebrew / עִבְרִי)
     *            -> hi_IN (Hindi / हिंदी)
     *            -> hu_HU (Hungarian / Magyar)
     *            -> id_ID (Indonesian / Bahasa Indonesia)
     *            -> it_IT (Italian / Italiano)
     *            -> ja_JP (Japanese / 日本語)
     *            -> kab_DZ (Kabyle / Taqbaylit)
     *            -> km_KH (Khmer / ភាសាខ្មែរ)
     *            -> ko_KP (Korean (KP) / 한국어 (KP))
     *            -> ko_KR (Korean (KR) / 한국어 (KR))
     *            -> lo_LA (Lao / ພາສາລາວ)
     *            -> lv_LV (Latvian / latviešu valoda)
     *            -> lt_LT (Lithuanian / Lietuvių kalba)
     *            -> lb_LU (Luxembourgish)
     *            -> mk_MK (Macedonian / македонски јазик)
     *            -> mn_MN (Mongolian / монгол)
     *            -> nb_NO (Norwegian Bokmål / Norsk bokmål)
     *            -> fa_IR (Persian / فارس)
     *            -> pl_PL (Polish / Język polski)
     *            -> pt_AO (Portuguese (AO) / Português (AO))
     *            -> pt_BR (Portuguese (BR) / Português (BR))
     *            -> pt_PT (Portuguese / Português)
     *            -> ro_RO (Romanian / română)
     *            -> ru_RU (Russian / русский язык)
     *            -> sr_RS (Serbian (Cyrillic) / српски)
     *            -> sr@latin (Serbian (Latin) / srpski)
     *            -> sk_SK (Slovak / Slovenský jazyk)
     *            -> sl_SI (Slovenian / slovenščina)
     *            -> es_AR (Spanish (AR) / Español (AR))
     *            -> es_BO (Spanish (BO) / Español (BO))
     *            -> es_CL (Spanish (CL) / Español (CL))
     *            -> es_CO (Spanish (CO) / Español (CO))
     *            -> es_CR (Spanish (CR) / Español (CR))
     *            -> es_DO (Spanish (DO) / Español (DO))
     *            -> es_EC (Spanish (EC) / Español (EC))
     *            -> es_GT (Spanish (GT) / Español (GT))
     *            -> es_MX (Spanish (MX) / Español (MX))
     *            -> es_PA (Spanish (PA) / Español (PA))
     *            -> es_PE (Spanish (PE) / Español (PE))
     *            -> es_PY (Spanish (PY) / Español (PY))
     *            -> es_UY (Spanish (UY) / Español (UY))
     *            -> es_VE (Spanish (VE) / Español (VE))
     *            -> es_ES (Spanish / Español)
     *            -> sv_SE (Swedish / Svenska)
     *            -> tl_PH (Tagalog / Filipino)
     *            -> te_IN (Telugu / తెలుగు)
     *            -> th_TH (Thai / ภาษาไทย)
     *            -> tr_TR (Turkish / Türkçe)
     *            -> uk_UA (Ukrainian / українська)
     *            -> vi_VN (Vietnamese / Tiếng Việt)
     *       
     */
    public function __construct(string $lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     */
    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return bool|null
     */
    public function isOverwrite(): ?bool
    {
        return $this->overwrite;
    }

    /**
     * @param bool|null $overwrite
     */
    public function setOverwrite(?bool $overwrite): void
    {
        $this->overwrite = $overwrite;
    }

    /**
     * @return string|null
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
     * @return OdooRelation|null
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'base.language.install';
    }
}

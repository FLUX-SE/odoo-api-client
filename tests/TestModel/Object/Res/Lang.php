<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Res;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : res.lang
 * ---
 * Name : res.lang
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
final class Lang extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Locale Code
     * ---
     * This field is used to set/get locales for user
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $code;

    /**
     * ISO code
     * ---
     * This ISO code is the name of po files to use for translations
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $iso_code;

    /**
     * URL Code
     * ---
     * The Lang Code displayed in the URL
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $url_code;

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
     * Direction
     * ---
     * Selection :
     *     -> ltr (Left-to-Right)
     *     -> rtl (Right-to-Left)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $direction;

    /**
     * Date Format
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $date_format;

    /**
     * Time Format
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $time_format;

    /**
     * First Day of Week
     * ---
     * Selection :
     *     -> 1 (Monday)
     *     -> 2 (Tuesday)
     *     -> 3 (Wednesday)
     *     -> 4 (Thursday)
     *     -> 5 (Friday)
     *     -> 6 (Saturday)
     *     -> 7 (Sunday)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $week_start;

    /**
     * Separator Format
     * ---
     * The Separator Format should be like [,n] where 0 < n :starting from Unit digit. -1 will end the separation.
     * e.g. [3,2,-1] will represent 106500 to be 1,06,500; [1,2,-1] will represent it to be 106,50,0;[3] will
     * represent it as 106,500. Provided ',' as the thousand separator in each case.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $grouping;

    /**
     * Decimal Separator
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $decimal_point;

    /**
     * Thousands Separator
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $thousands_sep;

    /**
     * Image
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var mixed|null
     */
    private $flag_image;

    /**
     * Flag Image Url
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $flag_image_url;

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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $code Locale Code
     *        ---
     *        This field is used to set/get locales for user
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $url_code URL Code
     *        ---
     *        The Lang Code displayed in the URL
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $direction Direction
     *        ---
     *        Selection :
     *            -> ltr (Left-to-Right)
     *            -> rtl (Right-to-Left)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $date_format Date Format
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $time_format Time Format
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $week_start First Day of Week
     *        ---
     *        Selection :
     *            -> 1 (Monday)
     *            -> 2 (Tuesday)
     *            -> 3 (Wednesday)
     *            -> 4 (Thursday)
     *            -> 5 (Friday)
     *            -> 6 (Saturday)
     *            -> 7 (Sunday)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $grouping Separator Format
     *        ---
     *        The Separator Format should be like [,n] where 0 < n :starting from Unit digit. -1 will end the separation.
     *        e.g. [3,2,-1] will represent 106500 to be 1,06,500; [1,2,-1] will represent it to be 106,50,0;[3] will
     *        represent it as 106,500. Provided ',' as the thousand separator in each case.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $decimal_point Decimal Separator
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        string $name,
        string $code,
        string $url_code,
        string $direction,
        string $date_format,
        string $time_format,
        string $week_start,
        string $grouping,
        string $decimal_point
    ) {
        $this->name = $name;
        $this->code = $code;
        $this->url_code = $url_code;
        $this->direction = $direction;
        $this->date_format = $date_format;
        $this->time_format = $time_format;
        $this->week_start = $week_start;
        $this->grouping = $grouping;
        $this->decimal_point = $decimal_point;
    }

    /**
     * @param string|null $flag_image_url
     */
    public function setFlagImageUrl(?string $flag_image_url): void
    {
        $this->flag_image_url = $flag_image_url;
    }

    /**
     * @param string $decimal_point
     */
    public function setDecimalPoint(string $decimal_point): void
    {
        $this->decimal_point = $decimal_point;
    }

    /**
     * @return string|null
     *
     * @SerializedName("thousands_sep")
     */
    public function getThousandsSep(): ?string
    {
        return $this->thousands_sep;
    }

    /**
     * @param string|null $thousands_sep
     */
    public function setThousandsSep(?string $thousands_sep): void
    {
        $this->thousands_sep = $thousands_sep;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("flag_image")
     */
    public function getFlagImage()
    {
        return $this->flag_image;
    }

    /**
     * @param mixed|null $flag_image
     */
    public function setFlagImage($flag_image): void
    {
        $this->flag_image = $flag_image;
    }

    /**
     * @return string|null
     *
     * @SerializedName("flag_image_url")
     */
    public function getFlagImageUrl(): ?string
    {
        return $this->flag_image_url;
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
     * @param string $grouping
     */
    public function setGrouping(string $grouping): void
    {
        $this->grouping = $grouping;
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
     * @return string
     *
     * @SerializedName("decimal_point")
     */
    public function getDecimalPoint(): string
    {
        return $this->decimal_point;
    }

    /**
     * @return string
     *
     * @SerializedName("grouping")
     */
    public function getGrouping(): string
    {
        return $this->grouping;
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
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     *
     * @SerializedName("code")
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string|null
     *
     * @SerializedName("iso_code")
     */
    public function getIsoCode(): ?string
    {
        return $this->iso_code;
    }

    /**
     * @param string|null $iso_code
     */
    public function setIsoCode(?string $iso_code): void
    {
        $this->iso_code = $iso_code;
    }

    /**
     * @return string
     *
     * @SerializedName("url_code")
     */
    public function getUrlCode(): string
    {
        return $this->url_code;
    }

    /**
     * @param string $url_code
     */
    public function setUrlCode(string $url_code): void
    {
        $this->url_code = $url_code;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param string $week_start
     */
    public function setWeekStart(string $week_start): void
    {
        $this->week_start = $week_start;
    }

    /**
     * @return string
     *
     * @SerializedName("direction")
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     */
    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }

    /**
     * @return string
     *
     * @SerializedName("date_format")
     */
    public function getDateFormat(): string
    {
        return $this->date_format;
    }

    /**
     * @param string $date_format
     */
    public function setDateFormat(string $date_format): void
    {
        $this->date_format = $date_format;
    }

    /**
     * @return string
     *
     * @SerializedName("time_format")
     */
    public function getTimeFormat(): string
    {
        return $this->time_format;
    }

    /**
     * @param string $time_format
     */
    public function setTimeFormat(string $time_format): void
    {
        $this->time_format = $time_format;
    }

    /**
     * @return string
     *
     * @SerializedName("week_start")
     */
    public function getWeekStart(): string
    {
        return $this->week_start;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'res.lang';
    }
}

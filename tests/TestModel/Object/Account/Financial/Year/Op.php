<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Financial\Year;

use DateTimeInterface;
use FluxSE\OdooApiClient\Model\Object\Base;
use FluxSE\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.financial.year.op
 * ---
 * Name : account.financial.year.op
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Op extends Base
{
    /**
     * Company
     * ---
     * Relation : many2one (res.company)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Opening Move Posted
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $opening_move_posted;

    /**
     * Opening Date
     * ---
     * Date from which the accounting is managed in Odoo. It is the date of the opening entry.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var DateTimeInterface
     */
    private $opening_date;

    /**
     * Fiscalyear Last Day
     * ---
     * The last day of the month will be used if the chosen day doesn't exist.
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var int
     */
    private $fiscalyear_last_day;

    /**
     * Fiscalyear Last Month
     * ---
     * The last day of the month will be used if the chosen day doesn't exist.
     * ---
     * Selection :
     *     -> 1 (January)
     *     -> 2 (February)
     *     -> 3 (March)
     *     -> 4 (April)
     *     -> 5 (May)
     *     -> 6 (June)
     *     -> 7 (July)
     *     -> 8 (August)
     *     -> 9 (September)
     *     -> 10 (October)
     *     -> 11 (November)
     *     -> 12 (December)
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string
     */
    private $fiscalyear_last_month;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Users
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
     * @param OdooRelation $company_id Company
     *        ---
     *        Relation : many2one (res.company)
     *        @see \Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Company
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param DateTimeInterface $opening_date Opening Date
     *        ---
     *        Date from which the accounting is managed in Odoo. It is the date of the opening entry.
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param int $fiscalyear_last_day Fiscalyear Last Day
     *        ---
     *        The last day of the month will be used if the chosen day doesn't exist.
     *        ---
     *        Searchable : yes
     *        Sortable : no
     * @param string $fiscalyear_last_month Fiscalyear Last Month
     *        ---
     *        The last day of the month will be used if the chosen day doesn't exist.
     *        ---
     *        Selection :
     *            -> 1 (January)
     *            -> 2 (February)
     *            -> 3 (March)
     *            -> 4 (April)
     *            -> 5 (May)
     *            -> 6 (June)
     *            -> 7 (July)
     *            -> 8 (August)
     *            -> 9 (September)
     *            -> 10 (October)
     *            -> 11 (November)
     *            -> 12 (December)
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(
        OdooRelation $company_id,
        DateTimeInterface $opening_date,
        int $fiscalyear_last_day,
        string $fiscalyear_last_month
    ) {
        $this->company_id = $company_id;
        $this->opening_date = $opening_date;
        $this->fiscalyear_last_day = $fiscalyear_last_day;
        $this->fiscalyear_last_month = $fiscalyear_last_month;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param string $fiscalyear_last_month
     */
    public function setFiscalyearLastMonth(string $fiscalyear_last_month): void
    {
        $this->fiscalyear_last_month = $fiscalyear_last_month;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("company_id")
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @return string
     *
     * @SerializedName("fiscalyear_last_month")
     */
    public function getFiscalyearLastMonth(): string
    {
        return $this->fiscalyear_last_month;
    }

    /**
     * @param int $fiscalyear_last_day
     */
    public function setFiscalyearLastDay(int $fiscalyear_last_day): void
    {
        $this->fiscalyear_last_day = $fiscalyear_last_day;
    }

    /**
     * @return int
     *
     * @SerializedName("fiscalyear_last_day")
     */
    public function getFiscalyearLastDay(): int
    {
        return $this->fiscalyear_last_day;
    }

    /**
     * @param DateTimeInterface $opening_date
     */
    public function setOpeningDate(DateTimeInterface $opening_date): void
    {
        $this->opening_date = $opening_date;
    }

    /**
     * @return DateTimeInterface
     *
     * @SerializedName("opening_date")
     */
    public function getOpeningDate(): DateTimeInterface
    {
        return $this->opening_date;
    }

    /**
     * @param bool|null $opening_move_posted
     */
    public function setOpeningMovePosted(?bool $opening_move_posted): void
    {
        $this->opening_move_posted = $opening_move_posted;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("opening_move_posted")
     */
    public function isOpeningMovePosted(): ?bool
    {
        return $this->opening_move_posted;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.financial.year.op';
    }
}
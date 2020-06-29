<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Fiscal;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.fiscal.year
 * Name : account.fiscal.year
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Year extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Start Date
     * Start Date, included in the fiscal year.
     *
     * @var DateTimeInterface
     */
    private $date_from;

    /**
     * End Date
     * Ending Date, included in the fiscal year.
     *
     * @var DateTimeInterface
     */
    private $date_to;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param string $name Name
     * @param DateTimeInterface $date_from Start Date
     *        Start Date, included in the fiscal year.
     * @param DateTimeInterface $date_to End Date
     *        Ending Date, included in the fiscal year.
     * @param Company $company_id Company
     */
    public function __construct(
        string $name,
        DateTimeInterface $date_from,
        DateTimeInterface $date_to,
        Company $company_id
    ) {
        $this->name = $name;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->company_id = $company_id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param DateTimeInterface $date_from
     */
    public function setDateFrom(DateTimeInterface $date_from): void
    {
        $this->date_from = $date_from;
    }

    /**
     * @param DateTimeInterface $date_to
     */
    public function setDateTo(DateTimeInterface $date_to): void
    {
        $this->date_to = $date_to;
    }

    /**
     * @param Company $company_id
     */
    public function setCompanyId(Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}

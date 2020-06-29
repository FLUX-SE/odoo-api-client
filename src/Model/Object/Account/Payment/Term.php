<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Payment\Term\Line;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.payment.term
 * Name : account.payment.term
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
final class Term extends Base
{
    /**
     * Payment Terms
     *
     * @var string
     */
    private $name;

    /**
     * Active
     * If the active field is set to False, it will allow you to hide the payment terms without removing it.
     *
     * @var null|bool
     */
    private $active;

    /**
     * Description on the Invoice
     *
     * @var null|string
     */
    private $note;

    /**
     * Terms
     *
     * @var null|Line[]
     */
    private $line_ids;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

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
     * @param string $name Payment Terms
     * @param int $sequence Sequence
     */
    public function __construct(string $name, int $sequence)
    {
        $this->name = $name;
        $this->sequence = $sequence;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|string $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param null|Line[] $line_ids
     */
    public function setLineIds(?array $line_ids): void
    {
        $this->line_ids = $line_ids;
    }

    /**
     * @param Line $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasLineIds(Line $item, bool $strict = true): bool
    {
        if (null === $this->line_ids) {
            return false;
        }

        return in_array($item, $this->line_ids, $strict);
    }

    /**
     * @param Line $item
     */
    public function addLineIds(Line $item): void
    {
        if ($this->hasLineIds($item)) {
            return;
        }

        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        $this->line_ids[] = $item;
    }

    /**
     * @param Line $item
     */
    public function removeLineIds(Line $item): void
    {
        if (null === $this->line_ids) {
            $this->line_ids = [];
        }

        if ($this->hasLineIds($item)) {
            $index = array_search($item, $this->line_ids);
            unset($this->line_ids[$index]);
        }
    }

    /**
     * @param null|Company $company_id
     */
    public function setCompanyId(?Company $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
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

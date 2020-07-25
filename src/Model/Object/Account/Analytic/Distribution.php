<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\Analytic;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : account.analytic.distribution
 * Name : account.analytic.distribution
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
final class Distribution extends Base
{
    /**
     * Analytic Account
     * ---
     * Relation : many2one (account.analytic.account)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Account
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $account_id;

    /**
     * Percentage
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float
     */
    private $percentage;

    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var string|null
     */
    private $name;

    /**
     * Parent tag
     * ---
     * Relation : many2one (account.analytic.tag)
     * @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Tag
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $tag_id;

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
     * @param OdooRelation $account_id Analytic Account
     *        ---
     *        Relation : many2one (account.analytic.account)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Account
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param float $percentage Percentage
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $tag_id Parent tag
     *        ---
     *        Relation : many2one (account.analytic.tag)
     *        @see \Flux\OdooApiClient\Model\Object\Account\Analytic\Tag
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $account_id, float $percentage, OdooRelation $tag_id)
    {
        $this->account_id = $account_id;
        $this->percentage = $percentage;
        $this->tag_id = $tag_id;
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
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation
     */
    public function getAccountId(): OdooRelation
    {
        return $this->account_id;
    }

    /**
     * @param OdooRelation $tag_id
     */
    public function setTagId(OdooRelation $tag_id): void
    {
        $this->tag_id = $tag_id;
    }

    /**
     * @return OdooRelation
     */
    public function getTagId(): OdooRelation
    {
        return $this->tag_id;
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param float $percentage
     */
    public function setPercentage(float $percentage): void
    {
        $this->percentage = $percentage;
    }

    /**
     * @return float
     */
    public function getPercentage(): float
    {
        return $this->percentage;
    }

    /**
     * @param OdooRelation $account_id
     */
    public function setAccountId(OdooRelation $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.analytic.distribution';
    }
}

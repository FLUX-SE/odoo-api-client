<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Base\Partner\Merge;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Base\Partner\Merge\Automatic\Wizard;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : base.partner.merge.line
 * Name : base.partner.merge.line
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Line extends Base
{
    /**
     * Wizard
     *
     * @var null|Wizard
     */
    private $wizard_id;

    /**
     * MinID
     *
     * @var null|int
     */
    private $min_id;

    /**
     * Ids
     *
     * @var string
     */
    private $aggr_ids;

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
     * @param string $aggr_ids Ids
     */
    public function __construct(string $aggr_ids)
    {
        $this->aggr_ids = $aggr_ids;
    }

    /**
     * @param null|Wizard $wizard_id
     */
    public function setWizardId(?Wizard $wizard_id): void
    {
        $this->wizard_id = $wizard_id;
    }

    /**
     * @param null|int $min_id
     */
    public function setMinId(?int $min_id): void
    {
        $this->min_id = $min_id;
    }

    /**
     * @param string $aggr_ids
     */
    public function setAggrIds(string $aggr_ids): void
    {
        $this->aggr_ids = $aggr_ids;
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

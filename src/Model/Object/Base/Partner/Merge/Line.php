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
 *
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
     * @var Wizard
     */
    private $wizard_id;

    /**
     * MinID
     *
     * @var int
     */
    private $min_id;

    /**
     * Ids
     *
     * @var null|string
     */
    private $aggr_ids;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param Wizard $wizard_id
     */
    public function setWizardId(Wizard $wizard_id): void
    {
        $this->wizard_id = $wizard_id;
    }

    /**
     * @param int $min_id
     */
    public function setMinId(int $min_id): void
    {
        $this->min_id = $min_id;
    }

    /**
     * @param null|string $aggr_ids
     */
    public function setAggrIds(?string $aggr_ids): void
    {
        $this->aggr_ids = $aggr_ids;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}

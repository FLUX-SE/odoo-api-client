<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\DemoFailure;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\DemoFailure;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.demo_failure.wizard
 * Name : ir.demo_failure.wizard
 * Info :
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    /**
     * Demo Installation Failures
     *
     * @var null|DemoFailure[]
     */
    private $failure_ids;

    /**
     * Failures Count
     *
     * @var null|int
     */
    private $failures_count;

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
     * @return null|DemoFailure[]
     */
    public function getFailureIds(): ?array
    {
        return $this->failure_ids;
    }

    /**
     * @return null|int
     */
    public function getFailuresCount(): ?int
    {
        return $this->failures_count;
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

<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\DemoFailure;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : ir.demo_failure.wizard
 * Name : ir.demo_failure.wizard
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    /**
     * Demo Installation Failures
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $failure_ids;

    /**
     * Failures Count
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $failures_count;

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
     * @return OdooRelation[]|null
     */
    public function getFailureIds(): ?array
    {
        return $this->failure_ids;
    }

    /**
     * @param OdooRelation[]|null $failure_ids
     */
    public function setFailureIds(?array $failure_ids): void
    {
        $this->failure_ids = $failure_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasFailureIds(OdooRelation $item): bool
    {
        if (null === $this->failure_ids) {
            return false;
        }

        return in_array($item, $this->failure_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addFailureIds(OdooRelation $item): void
    {
        if ($this->hasFailureIds($item)) {
            return;
        }

        if (null === $this->failure_ids) {
            $this->failure_ids = [];
        }

        $this->failure_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeFailureIds(OdooRelation $item): void
    {
        if (null === $this->failure_ids) {
            $this->failure_ids = [];
        }

        if ($this->hasFailureIds($item)) {
            $index = array_search($item, $this->failure_ids);
            unset($this->failure_ids[$index]);
        }
    }

    /**
     * @return int|null
     */
    public function getFailuresCount(): ?int
    {
        return $this->failures_count;
    }

    /**
     * @param int|null $failures_count
     */
    public function setFailuresCount(?int $failures_count): void
    {
        $this->failures_count = $failures_count;
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
        return 'ir.demo_failure.wizard';
    }
}

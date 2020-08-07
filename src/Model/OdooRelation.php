<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo Response wrapper to handle all
 * Odoo Many2one, One2many or Many2many relations
 * given by an Odoo API response
 */
final class OdooRelation extends Base
{
    /**
     * @see https://www.odoo.com/documentation/13.0/reference/orm.html#odoo.models.Model.write
     */
    public const COMMAND_ADD = 0;
    public const COMMAND_UPDATE = 1;
    public const COMMAND_REMOVE_ID_CASCADE = 2;
    public const COMMAND_REMOVE_ID = 3;
    public const COMMAND_ADD_EXISTING = 4;
    public const COMMAND_REMOVE_ALL = 5;
    public const COMMAND_REPLACE_ALL = 6;

    /** @var int|null */
    private $command;

    /** @var int|null */
    private $commandId;

    /** @var BaseInterface|null */
    private $embed_model;

    /** @var int[] */
    private $replace_ids = [];

    /**
     * @param int|null|false $id
     * @param string|null $display_name
     */
    public function __construct(
        $id = null,
        ?string $display_name = null
    ) {
        $this->id = $id;
        $this->display_name = $display_name;
    }

    public function getEmbedModel(): ?BaseInterface
    {
        return $this->embed_model;
    }

    public function setEmbedModel(?BaseInterface $embed_model): void
    {
        $this->embed_model = $embed_model;
    }

    public function getCommand(): ?int
    {
        return $this->command;
    }

    public function setCommand(?int $command): void
    {
        $this->command = $command;
    }

    public function getCommandId(): ?int
    {
        return $this->commandId;
    }

    public function setCommandId(?int $commandId): void
    {
        $this->commandId = $commandId;
    }

    /**
     * @return int[]
     */
    public function getReplaceIds(): array
    {
        return $this->replace_ids;
    }

    /**
     * @param int[] $replace_ids
     */
    public function setReplaceIds(array $replace_ids): void
    {
        $this->replace_ids = $replace_ids;
    }

    public function buildAdd(BaseInterface $embed_model): void
    {
        $this->command = self::COMMAND_ADD;
        $this->commandId = 0;
        $this->embed_model = $embed_model;
        $this->replace_ids = [];
    }

    public function buildUpdate(int $id, BaseInterface $embed_model): void
    {
        $this->command = self::COMMAND_UPDATE;
        $this->commandId = $id;
        $this->embed_model = $embed_model;
        $this->replace_ids = [];
    }

    public function buildRemoveIdCascade(int $id): void
    {
        $this->command = self::COMMAND_REMOVE_ID_CASCADE;
        $this->commandId = $id;
        $this->embed_model = null;
        $this->replace_ids = [];
    }

    public function buildRemoveId(int $id): void
    {
        $this->command = self::COMMAND_REMOVE_ID;
        $this->commandId = $id;
        $this->embed_model = null;
        $this->replace_ids = [];
    }

    public function buildAddExisting(int $id): void
    {
        $this->command = self::COMMAND_ADD_EXISTING;
        $this->commandId = $id;
        $this->embed_model = null;
        $this->replace_ids = [];
    }

    public function buildRemoveAll(): void
    {
        $this->command = self::COMMAND_REMOVE_ALL;
        $this->commandId = 0;
        $this->embed_model = null;
        $this->replace_ids = [];
    }

    /**
     * @param int[] $ids
     */
    public function buildReplaceAll(array $ids): void
    {
        $this->command = self::COMMAND_REPLACE_ALL;
        $this->commandId = 0;
        $this->embed_model = null;
        $this->replace_ids = $ids;
    }
}

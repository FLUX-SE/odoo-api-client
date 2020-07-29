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
    public const COMMAND_ADD_REMOVE_ALL = 5;
    public const COMMAND_REPLACE_ALL = 6;

    /** @var int */
    private $command = self::COMMAND_ADD;

    /** @var int */
    private $commandId = 0;

    /** @var BaseInterface|null */
    private $embed_model;

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

        if (null === $this->getId()) {
            $this->command = self::COMMAND_ADD;
            return;
        }

        if (false === $this->getId()) {
            $this->command = self::COMMAND_ADD;
            return;
        }

        $this->command = self::COMMAND_UPDATE;
        $this->commandId = $this->getId();
    }

    public function getCommand(): int
    {
        return $this->command;
    }

    public function setCommand(int $command): void
    {
        $this->command = $command;
    }

    public function getCommandId(): int
    {
        return $this->commandId;
    }

    public function setCommandId(int $commandId): void
    {
        $this->commandId = $commandId;
    }
}

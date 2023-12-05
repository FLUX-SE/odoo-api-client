<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Model\Object;

use DateTimeInterface;

interface BaseObjectInterface
{
    public function getId(): int|null|false;

    public function getDisplayName(): ?string;

    public function setDisplayName(?string $display_name): void;
}

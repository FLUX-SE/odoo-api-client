<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model;

use DateTimeInterface;

interface BaseInterface
{
    public function getId(): ?int;

    public function setId(?int $id): void;

    public function getDisplayName(): ?string;

    public function setDisplayName(?string $display_name): void;

    public function getLastUpdate(): ?DateTimeInterface;

    public function setLastUpdate(?DateTimeInterface $__last_update): void;

    public static function getOdooModelName(): string;
}
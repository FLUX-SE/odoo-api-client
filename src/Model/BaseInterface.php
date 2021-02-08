<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Model;

use DateTimeInterface;

interface BaseInterface
{
    /**
     * @return int|null|false
     */
    public function getId();

    /**
     * @param int|null|false $id
     */
    public function setId($id): void;

    public function getDisplayName(): ?string;

    public function setDisplayName(?string $display_name): void;

    public function getLastUpdate(): ?DateTimeInterface;

    public function setLastUpdate(?DateTimeInterface $__last_update): void;

    public static function getOdooModelName(): string;
}

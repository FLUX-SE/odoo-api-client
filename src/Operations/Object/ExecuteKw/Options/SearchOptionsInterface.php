<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Options;

interface SearchOptionsInterface extends OptionsInterface
{
    public function getOrder(): ?string;

    public function setLimit(?int $limit): void;

    public function setOffset(int $offset): void;

    public function getOffset(): int;

    public function getLimit(): ?int;

    public function setOrder(?string $order): void;
}

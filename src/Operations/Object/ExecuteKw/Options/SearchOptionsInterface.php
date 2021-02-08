<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options;

interface SearchOptionsInterface extends OptionsInterface
{
    public const FIELD_NAME_ORDER = 'order';
    public const FIELD_NAME_LIMIT = 'limit';
    public const FIELD_NAME_OFFSET = 'offset';

    public function setOrder(?string $order): void;

    public function getOrder(): ?string;

    public function setLimit(?int $limit): void;

    public function getLimit(): ?int;

    public function setOffset(int $offset): void;

    public function getOffset(): int;
}

<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Options;

trait SearchOptionsTrait
{
    /** @var int */
    private $offset = 0;
    /** @var int|null */
    private $limit = null;
    /** @var string|null */
    private $order = null;

    protected function getOptionsMap(): array
    {
        return [
            'offset' => 'getOffset',
            'limit' => 'getLimit',
            'order' => 'getOrder',
        ];
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function setOffset(int $offset): void
    {
        $this->offset = $offset;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    public function getOrder(): ?string
    {
        return $this->order;
    }

    public function setOrder(?string $order): void
    {
        $this->order = $order;
    }
}

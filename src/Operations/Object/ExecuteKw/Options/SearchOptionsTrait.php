<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Options;

use LogicException;

trait SearchOptionsTrait
{
    abstract public function addOption(string $name, $option): void;

    abstract public function getOption(string $name);

    public function __construct()
    {
        $this->setOffset(0);
        $this->setOrder(null);
        $this->setLimit(null);
    }

    public function getOffset(): int
    {
        $offset = $this->getOption(SearchOptionsInterface::FIELD_NAME_OFFSET);

        if (is_int($offset)) {
            return $offset;
        }

        throw new LogicException(sprintf(
            'The offset should be an integer "%s" retrieved !',
            gettype($offset)
        ));
    }

    public function setOffset(int $offset): void
    {
        $this->addOption(SearchOptionsInterface::FIELD_NAME_OFFSET, $offset);
    }

    public function getLimit(): ?int
    {
        $limit = $this->getOption(SearchOptionsInterface::FIELD_NAME_LIMIT);

        if (is_int($limit) || null === $limit) {
            return $limit;
        }

        throw new LogicException(sprintf(
            'The limit should be an integer or null "%s" retrieved !',
            gettype($limit)
        ));
    }

    public function setLimit(?int $limit): void
    {
        $this->addOption(SearchOptionsInterface::FIELD_NAME_LIMIT, $limit);
    }

    public function getOrder(): ?string
    {
        $order = $this->getOption(SearchOptionsInterface::FIELD_NAME_ORDER);

        if (is_string($order) || null === $order) {
            return $order;
        }

        throw new LogicException(sprintf(
            'The order should be an integer or null "%s" retrieved !',
            gettype($order)
        ));
    }

    public function setOrder(?string $order): void
    {
        $this->addOption(SearchOptionsInterface::FIELD_NAME_ORDER, $order);
    }
}

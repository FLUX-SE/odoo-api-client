<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options;

use Webmozart\Assert\Assert;

trait SearchOptionsTrait
{
    public function __construct()
    {
        $this->setOffset(0);
        $this->setOrder(null);
        $this->setLimit(null);
    }

    public function getOffset(): int
    {
        /** @var int $offset */
        $offset = $this->getOption(SearchOptionsInterface::FIELD_NAME_OFFSET);

        Assert::integer($offset, 'The offset should be an integer "%s" retrieved !', );

        return $offset;
    }

    public function setOffset(int $offset): void
    {
        $this->addOption(SearchOptionsInterface::FIELD_NAME_OFFSET, $offset);
    }

    public function getLimit(): ?int
    {
        /** @var int|null $limit */
        $limit = $this->getOption(SearchOptionsInterface::FIELD_NAME_LIMIT);

        Assert::nullOrInteger($limit, 'The limit should be an integer or null "%s" retrieved !');

        return $limit;
    }

    public function setLimit(?int $limit): void
    {
        $this->addOption(SearchOptionsInterface::FIELD_NAME_LIMIT, $limit);
    }

    public function getOrder(): ?string
    {
        /** @var string|null $order */
        $order = $this->getOption(SearchOptionsInterface::FIELD_NAME_ORDER);

        Assert::nullOrString($order, 'The order should be a string or null "%s" retrieved !');

        return $order;
    }

    public function setOrder(?string $order): void
    {
        $this->addOption(SearchOptionsInterface::FIELD_NAME_ORDER, $order);
    }
}

<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Provider;

use FluxSE\OdooApiClient\Model\BaseInterface;

interface ModelFieldsProviderInterface
{
    /**
     * @template T of BaseInterface
     * @param class-string<T> $className
     * @return string[]
     */
    public function provide(string $className, array $context): array;
}

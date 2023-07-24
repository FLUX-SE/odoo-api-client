<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Provider;

use ReflectionClass;

final class ModelFieldsProvider implements ModelFieldsProviderInterface
{
    public function provide(string $className, array $context): array
    {
        $fields = [];
        $reflectionClass = new ReflectionClass($className);
        foreach ($reflectionClass->getProperties() as $property) {
            $fields[] = $property->getName();
        }

        return $fields;
    }
}

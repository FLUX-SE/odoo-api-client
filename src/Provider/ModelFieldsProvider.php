<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Provider;

use Webmozart\Assert\Assert;

final class ModelFieldsProvider implements ModelFieldsProviderInterface
{
    /**
     * @throws \ReflectionException
     */
    public function provide(string $className, array $context): array
    {
        $fields = $context[self::FIELDS_CONTEXT] ?? [];
        Assert::allString($fields, 'The field context should be an array of strings !');
        $fields = (array) $fields;

        $reflectionClass = new \ReflectionClass($className);
        foreach ($reflectionClass->getProperties() as $property) {
            $propertyName = $property->getName();

            if (in_array($propertyName, $fields, true)) {
                continue;
            }

            $fields[] = $propertyName;
        }

        return $fields;
    }
}

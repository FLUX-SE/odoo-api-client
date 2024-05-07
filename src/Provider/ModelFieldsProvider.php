<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Provider;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\ReadOptionsInterface;
use ReflectionClass;
use Webmozart\Assert\Assert;

final class ModelFieldsProvider implements ModelFieldsProviderInterface
{
    public function provide(string $className, array $context): array
    {
        $fields = [];
        if (isset($context[self::FIELDS_CONTEXT])) {
            /** @var string[] $fields */
            $fields = $context[self::FIELDS_CONTEXT];

            Assert::isArray($fields, 'The field context should be an array');
        }

        $reflectionClass = new ReflectionClass($className);
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

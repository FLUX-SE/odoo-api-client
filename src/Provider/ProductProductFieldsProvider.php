<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Provider;

final class ProductProductFieldsProvider implements ModelFieldsProviderInterface
{
    public function __construct(private ModelFieldsProviderInterface $decoratedModelFieldsProvider)
    {
    }

    public function provide(string $className, array $context): array
    {
        $fields = $this->decoratedModelFieldsProvider->provide($className, $context);
        if (call_user_func([$className, 'getOdooModelName']) === 'product.product') {
            return array_values(array_filter($fields, static function (string $field): bool {
                return false === in_array($field, ['product_properties'], true);
            }));
        }

        return $fields;
    }
}

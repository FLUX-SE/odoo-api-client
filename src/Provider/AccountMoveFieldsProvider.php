<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Provider;

final class AccountMoveFieldsProvider implements ModelFieldsProviderInterface
{
    public function __construct(private ModelFieldsProviderInterface $decoratedModelFieldsProvider)
    {
    }

    public function provide(string $className, array $context): array
    {
        $fields = $this->decoratedModelFieldsProvider->provide($className, $context);
        if (call_user_func([$className, 'getOdooModelName']) === 'account.move') {
            return array_values(array_filter($fields, static function (string $field): bool {
                return false === in_array($field, [
                    'needed_terms', // @see https://github.com/odoo/odoo/issues/129493
                    'tax_totals', // @see https://github.com/odoo/odoo/issues/129494
                ], true);
            }));
        }

        return $fields;
    }
}

<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Provider;

final class AccountMoveFieldsProvider implements ModelFieldsProviderInterface
{
    private ModelFieldsProviderInterface $decoratedModelFieldsProvider;

    public function __construct(ModelFieldsProviderInterface $decoratedModelFieldsProvider)
    {
        $this->decoratedModelFieldsProvider = $decoratedModelFieldsProvider;
    }

    public function provide(string $className, array $context): array
    {
        $fields = $this->decoratedModelFieldsProvider->provide($className, $context);
        if (call_user_func([$className, 'getOdooModelName']) === 'account.move') {
            return array_filter($fields, static function (string $field): bool {
                return false === in_array($field, ['needed_terms', 'tax_totals'], true);
            });
        }

        return $fields;
    }
}

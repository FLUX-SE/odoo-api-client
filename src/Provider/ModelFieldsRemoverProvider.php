<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Provider;

final class ModelFieldsRemoverProvider implements ModelFieldsProviderInterface
{
    public function __construct(
        private ModelFieldsProviderInterface $decoratedModelFieldsProvider,
        private string $modelName,
        private array $fieldsToRemove = [],
    ) {
    }

    public function provide(string $className, array $context): array
    {
        $fields = $this->decoratedModelFieldsProvider->provide($className, $context);
        if (call_user_func([$className, 'getOdooModelName']) === $this->modelName) {
            return array_values(array_filter($fields, function (string $field): bool {
                return false === in_array($field, $this->fieldsToRemove, true);
            }));
        }

        return $fields;
    }
}

<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PhpGenerator\ModelFixer;

use FluxSE\OdooApiClient\PhpGenerator\OdooModelsStructureConverterInterface;

final class BaseIdFixer extends AbstractModelFixer
{
    protected function doFix(string $modelName, array &$structure): void
    {
        $structure['id'] = [
            'type' => "integer",
            'readonly' => true,
            'required' => false,
            'searchable' => true,
            'sortable' => true,
            'string' => "ID",
        ];
        $structure['display_name'] = [
            'type' => "char",
            'readonly' => true,
            'required' => false,
            'searchable' => false,
            'sortable' => false,
            'string' => "Display Name",
        ];
        $structure['__last_update'] = [
            'type' => "datetime",
            'readonly' => true,
            'required' => false,
            'searchable' => false,
            'sortable' => true,
            'string' => "Last Modified on",
        ];
    }

    public function supports(string $modelName, array $structure): bool
    {
        return $modelName === OdooModelsStructureConverterInterface::BASE_MODEL_NAME && $structure === [];
    }
}

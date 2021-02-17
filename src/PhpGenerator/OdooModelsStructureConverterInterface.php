<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PhpGenerator;

interface OdooModelsStructureConverterInterface
{
    public const BASE_MODEL_NAME = 'base';

    public function convert(string $modelNamespace): array;
}

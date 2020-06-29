<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\PhpGenerator;

interface OdooModelsStructureConverterInterface
{
    const BASE_MODEL_NAME = 'base';


    public function convert(string $baseModelNamespace): array;
}
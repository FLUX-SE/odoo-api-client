<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PhpGenerator;

use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomainsInterface;

interface OdooModelsStructureConverterInterface
{
    public const BASE_MODEL_NAME = 'base';

    public function convert(string $modelNamespace, SearchDomainsInterface $searchDomains = null): array;
}

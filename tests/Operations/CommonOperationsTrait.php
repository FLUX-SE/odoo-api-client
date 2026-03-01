<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations;

use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Operations\CommonOperationsInterface;

trait CommonOperationsTrait
{
    protected function buildCommonOperations(): CommonOperationsInterface
    {
        /** @var string $host */
        $host = $_ENV['ODOO_API_HOST'] ?? '';

        return (new OdooApiClientBuilder($host))->buildCommonOperations();
    }
}

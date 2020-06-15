<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Builder\OdooApiClientBuilder;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\OperationsInterface;

trait ExecuteKwOperationsTrait
{
    protected function buildExecuteKwOperations(string $operationsClass): OperationsInterface
    {
        $odooApiClientBuilder = new OdooApiClientBuilder($_ENV['ODOO_API_HOST']);

        return $odooApiClientBuilder->buildExecuteKwOperations(
            $operationsClass,
            $_ENV['ODOO_API_DATABASE'],
            $_ENV['ODOO_API_USERNAME'],
            $_ENV['ODOO_API_PASSWORD']
        );
    }
}

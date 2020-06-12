<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Api\OdooApi;
use Flux\OdooApiClient\Builder\OdooHttpMethodsClientBuilder;
use Flux\OdooApiClient\Operations\CommonOperations;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\OperationsInterface;
use Flux\OdooApiClient\Operations\ObjectOperations;

trait ExecuteKwOperationsTrait
{
    protected function buildExecuteKwOperations(string $operationsClass): OperationsInterface
    {
        $httpMethodsClientBuilder = new OdooHttpMethodsClientBuilder(
            $_ENV['ODOO_API_HOST']
        );
        $httpMethodsClient = $httpMethodsClientBuilder->build();

        $odooApi = new OdooApi($httpMethodsClient);

        $commonOperations = new CommonOperations($odooApi);

        $objectOperations = new ObjectOperations(
            $_ENV['ODOO_API_DATABASE'],
            $_ENV['ODOO_API_USERNAME'],
            $_ENV['ODOO_API_PASSWORD'],
            $commonOperations
        );

        return new $operationsClass($objectOperations);
    }
}

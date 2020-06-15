<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Builder\OdooApiClientBuilder;
use Flux\OdooApiClient\Operations\CommonOperations;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\OperationsInterface;
use Flux\OdooApiClient\Operations\ObjectOperations;

trait ExecuteKwOperationsTrait
{
    protected function buildExecuteKwOperations(string $operationsClass): OperationsInterface
    {
        $odooApiClientBuilder = new OdooApiClientBuilder($_ENV['ODOO_API_HOST']);

        $commonOperations = new CommonOperations(
            $odooApiClientBuilder->buildApiRequestMaker(),
            $odooApiClientBuilder->buildRequestBodyFactory(),
            $odooApiClientBuilder->buildXmlRpcSerializerHelper()
        );

        $objectOperations = new ObjectOperations(
            $_ENV['ODOO_API_DATABASE'],
            $_ENV['ODOO_API_USERNAME'],
            $_ENV['ODOO_API_PASSWORD'],
            $commonOperations
        );

        return new $operationsClass($objectOperations);
    }
}

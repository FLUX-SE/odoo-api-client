<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Builder\OdooApiClientBuilderInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\OperationsInterface;
use FluxSE\OdooApiClient\Provider\AccountMoveFieldsProvider;
use FluxSE\OdooApiClient\Provider\ModelFieldsProvider;
use FluxSE\OdooApiClient\Provider\ModelFieldsProviderInterface;
use FluxSE\OdooApiClient\Provider\ProductProductFieldsProvider;

trait ExecuteKwOperationsTrait
{
    /**
     * @template T of OperationsInterface
     * @param class-string<T> $operationsClass
     * @return T
     */
    protected function buildExecuteKwOperations(string $operationsClass): OperationsInterface
    {
        return $this->buildOdooApiClientBuilder()->buildExecuteKwOperations(
            $operationsClass,
            $_ENV['ODOO_API_DATABASE'],
            $_ENV['ODOO_API_USERNAME'],
            $_ENV['ODOO_API_PASSWORD']
        );
    }

    protected function buildOdooApiClientBuilder(): OdooApiClientBuilderInterface
    {
        return new OdooApiClientBuilder($_ENV['ODOO_API_HOST']);
    }

    protected function buildModelFieldsProvider(): ModelFieldsProviderInterface
    {
        return new ProductProductFieldsProvider(
            new AccountMoveFieldsProvider(
                new ModelFieldsProvider()
            )
        );
    }
}

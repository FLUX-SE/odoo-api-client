<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Builder\OdooApiClientBuilderInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\OperationsInterface;
use FluxSE\OdooApiClient\Provider\AccountMoveFieldsProvider;
use FluxSE\OdooApiClient\Provider\ModelFieldsProvider;
use FluxSE\OdooApiClient\Provider\ModelFieldsProviderInterface;

trait ExecuteKwOperationsTrait
{
    protected ?OdooApiClientBuilderInterface $odooApiClientBuilder = null;

    protected ?ModelFieldsProviderInterface $modelFieldsProvider = null;

    /**
     * @template T of OperationsInterface
     * @param class-string<T> $operationsClass
     * @return T
     */
    protected function buildExecuteKwOperations(string $operationsClass): OperationsInterface
    {
        $this->buildOdooApiClientBuilder();

        return $this->odooApiClientBuilder->buildExecuteKwOperations(
            $operationsClass,
            $_ENV['ODOO_API_DATABASE'],
            $_ENV['ODOO_API_USERNAME'],
            $_ENV['ODOO_API_PASSWORD']
        );
    }

    protected function buildOdooApiClientBuilder(): OdooApiClientBuilderInterface
    {
        if (null === $this->odooApiClientBuilder) {
            $this->odooApiClientBuilder = new OdooApiClientBuilder($_ENV['ODOO_API_HOST']);
        }

        return $this->odooApiClientBuilder;
    }

    protected function buildModelFieldsProvider(): ModelFieldsProviderInterface
    {
        if (null === $this->modelFieldsProvider) {
            //$this->modelFieldsProvider = new AccountMoveFieldsProvider(new ModelFieldsProvider());
            $this->modelFieldsProvider = new ModelFieldsProvider();
        }

        return $this->modelFieldsProvider;
    }
}

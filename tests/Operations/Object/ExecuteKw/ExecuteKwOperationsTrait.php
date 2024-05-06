<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Builder\OdooApiClientBuilderInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\OperationsInterface;
use FluxSE\OdooApiClient\Provider\ModelFieldsProvider;
use FluxSE\OdooApiClient\Provider\ModelFieldsProviderInterface;
use FluxSE\OdooApiClient\Provider\ModelFieldsRemoverProvider;

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
        $modelFieldsProvider = new ModelFieldsProvider();

        $modelFieldsToRemove = [
            'account.move.line' => [
                'compute_all_tax', // @see https://github.com/odoo/odoo/issues/164139
            ],
            /*'account.move' => [
                'needed_terms', // @see https://github.com/odoo/odoo/issues/129493
                'tax_totals', // @see https://github.com/odoo/odoo/issues/129494
            ],
            'product.product' => [
                'product_properties', // @see https://github.com/odoo/odoo/issues/145138
            ],*/
        ];

        foreach ($modelFieldsToRemove as $modelName=>$fieldsToRemove) {
            $modelFieldsProvider = new ModelFieldsRemoverProvider(
                $modelFieldsProvider,
                $modelName,
                $fieldsToRemove,
            );
        }

        return $modelFieldsProvider;
    }
}

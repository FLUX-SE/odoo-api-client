<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw;

use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\OperationsInterface;

trait ExecuteKwOperationsTrait
{
    /** @var OdooApiClientBuilder */
    protected $odooApiClientBuilder;

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

    protected function buildOdooApiClientBuilder(): OdooApiClientBuilder
    {
        if (null === $this->odooApiClientBuilder) {
            $this->odooApiClientBuilder = new OdooApiClientBuilder($_ENV['ODOO_API_HOST']);
        }

        return $this->odooApiClientBuilder;
    }
}

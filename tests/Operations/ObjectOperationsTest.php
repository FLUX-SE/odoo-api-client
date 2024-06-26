<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations;

use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Operations\ObjectOperationsInterface;
use PHPUnit\Framework\TestCase;

class ObjectOperationsTest extends TestCase
{
    private ObjectOperationsInterface $objectOperations;

    /**
     *
     */
    protected function setUp(): void
    {
        $odooApiClientBuilder = new OdooApiClientBuilder($_ENV['ODOO_API_HOST']);

        $this->objectOperations = $odooApiClientBuilder->buildObjectOperations(
            $_ENV['ODOO_API_DATABASE'],
            $_ENV['ODOO_API_USERNAME'],
            $_ENV['ODOO_API_PASSWORD']
        );
    }

    public function testExecute_kw(): void
    {
        $response = $this->objectOperations->execute_kw(
            'res.partner',
            'check_access_rights',
            ['read'],
            ['raise_exception' => false]
        );

        $this->assertIsBool($this->objectOperations->deserializeBoolean($response));
    }
}

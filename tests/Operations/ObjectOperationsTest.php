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
        /** @var string $host */
        $host = $_ENV['ODOO_API_HOST'] ?? '';
        $odooApiClientBuilder = new OdooApiClientBuilder($host);

        /** @var string $database */
        $database = $_ENV['ODOO_API_DATABASE'] ?? '';
        /** @var string $username */
        $username = $_ENV['ODOO_API_USERNAME'] ?? '';
        /** @var string $password */
        $password = $_ENV['ODOO_API_PASSWORD'] ?? '';
        $this->objectOperations = $odooApiClientBuilder->buildObjectOperations(
            $database,
            $username,
            $password
        );
    }

    public function testExecute_kw(): void
    {
        $this->expectNotToPerformAssertions();

        $response = $this->objectOperations->execute_kw(
            'res.partner',
            'check_access_rights',
            ['read'],
            ['raise_exception' => false]
        );

        $this->objectOperations->deserializeBoolean($response);
    }
}

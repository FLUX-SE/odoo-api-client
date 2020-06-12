<?php

namespace Tests\Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\Api\OdooApi;
use Flux\OdooApiClient\Builder\OdooHttpMethodsClientBuilder;
use Flux\OdooApiClient\Operations\CommonOperations;
use Flux\OdooApiClient\Operations\ObjectOperations;
use PHPUnit\Framework\TestCase;

class ObjectOperationsTest extends TestCase
{
    /** @var ObjectOperations */
    private $objectOperations;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $httpMethodsClientBuilder = new OdooHttpMethodsClientBuilder(
            $_ENV['ODOO_API_HOST']
        );
        $httpMethodsClient = $httpMethodsClientBuilder->build();

        $odooApi = new OdooApi($httpMethodsClient);

        $commonOperations = new CommonOperations($odooApi);

        $this->objectOperations = new ObjectOperations(
            $_ENV['ODOO_API_DATABASE'],
            $_ENV['ODOO_API_USERNAME'],
            $_ENV['ODOO_API_PASSWORD'],
            $commonOperations,
            $odooApi
        );
    }

    public function testExecute_kw()
    {
        $response = $this->objectOperations->execute_kw(
            'res.partner',
            'check_access_rights',
            ['read'],
            ['raise_exception' => false]
        );

        $this->assertIsBool($response->decodeBool());
    }
}

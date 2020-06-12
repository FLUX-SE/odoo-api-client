<?php

namespace Tests\Flux\OdooApiClient\Api;

use Flux\OdooApiClient\Api\OdooApi;
use Flux\OdooApiClient\Builder\OdooHttpMethodsClientBuilder;
use Flux\OdooApiClient\XmlRpc\RequestBody;
use PHPUnit\Framework\TestCase;

class OdooApiTest extends TestCase
{
    /** @var OdooApi */
    private $odooApi;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $httpMethodsClientBuilder = new OdooHttpMethodsClientBuilder(
            $_ENV['ODOO_API_HOST']
        );
        $httpMethodsClient = $httpMethodsClientBuilder->build();

        $this->odooApi = new OdooApi($httpMethodsClient);
    }

    public function testRequest()
    {
        $requestBody = new RequestBody('about');
        $response = $this->odooApi->request('/common', $requestBody);

        $this->assertSame(200, $response->getResponse()->getStatusCode());
    }
}

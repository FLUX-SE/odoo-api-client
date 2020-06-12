<?php

namespace Tests\Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\Api\OdooApi;
use Flux\OdooApiClient\Builder\OdooHttpMethodsClientBuilder;
use Flux\OdooApiClient\Operations\CommonOperations;
use PHPUnit\Framework\TestCase;

class CommonOperationsTest extends TestCase
{
    /** @var CommonOperations */
    private $commonOperations;

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

        $this->commonOperations = new CommonOperations($odooApi);
    }

    public function testVersion()
    {
        $version = $this->commonOperations->version();

        $this->assertArrayHasKey('server_version', $version);
        $this->assertArrayHasKey('server_version_info', $version);
        $this->assertArrayHasKey('server_serie', $version);
        $this->assertArrayHasKey('protocol_version', $version);
    }

    public function testAbout()
    {
        $about = $this->commonOperations->about();
        $this->assertEquals('See http://openerp.com', $about);
    }

    public function testAboutExtended()
    {
        $about = $this->commonOperations->aboutExtended();
        $this->assertCount(2, $about);
    }

    public function testAuthenticate()
    {
        $uid = $this->commonOperations->authenticate(
            $_ENV['ODOO_API_DATABASE'],
            $_ENV['ODOO_API_USERNAME'],
            $_ENV['ODOO_API_PASSWORD']
        );

        $this->assertIsInt($uid);
    }
}

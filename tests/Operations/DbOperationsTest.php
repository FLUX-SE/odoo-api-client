<?php

namespace Tests\Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\Api\OdooApi;
use Flux\OdooApiClient\Builder\OdooHttpMethodsClientBuilder;
use Flux\OdooApiClient\Operations\DbOperations;
use Http\Client\Common\Exception\ClientErrorException;
use PHPUnit\Framework\TestCase;

class DbOperationsTest extends TestCase
{
    /** @var DbOperations */
    private $dbOperations;

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

        $this->dbOperations = new DbOperations($odooApi);
    }

    public function testServer_version()
    {
        $version = $this->dbOperations->server_version();
        $this->assertIsString($version);
    }

    public function testDb_exist()
    {
        $exist = $this->dbOperations->db_exist($_ENV['ODOO_API_DATABASE']);

        $this->assertTrue($exist);

        $exist = $this->dbOperations->db_exist('fake_database');

        $this->assertFalse($exist);
    }

    public function testList()
    {
        $this->expectException(ClientErrorException::class);
        $dbs = $this->dbOperations->list();
        $this->assertIsArray($dbs);

        $this->expectException(ClientErrorException::class);
        $dbs = $this->dbOperations->list(true);
        $this->assertIsArray($dbs);
    }

    public function testList_countries()
    {
        $countries = $this->dbOperations->list_countries('admin');

        $this->assertIsArray($countries);
    }

    public function testList_lang()
    {
        $languages = $this->dbOperations->list_lang();

        $this->assertIsArray($languages);
    }
}

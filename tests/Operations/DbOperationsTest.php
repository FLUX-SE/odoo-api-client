<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations;

use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Operations\DbOperationsInterface;
use Http\Client\Common\Exception\ClientErrorException;
use PHPUnit\Framework\TestCase;

class DbOperationsTest extends TestCase
{
    private DbOperationsInterface $dbOperations;

    protected function setUp(): void
    {
        $odooApiClientBuilder = new OdooApiClientBuilder($_ENV['ODOO_API_HOST']);

        $this->dbOperations = $odooApiClientBuilder->buildDbOperations();
    }

    public function testServer_version(): void
    {
        $version = $this->dbOperations->server_version();
        $this->assertNotEmpty($version);
    }

    public function testDb_exist(): void
    {
        $exist = $this->dbOperations->db_exist($_ENV['ODOO_API_DATABASE']);

        $this->assertTrue($exist);

        $exist = $this->dbOperations->db_exist('fake_database');

        $this->assertFalse($exist);
    }

    public function testList(): void
    {
        try {
            $dbs = $this->dbOperations->list();
            $this->assertNotEmpty($dbs);
        } catch (ClientErrorException $e) {
            $this->assertStringContainsStringIgnoringCase('Access denied', $e->getMessage());
        }

        try {
            $dbs = $this->dbOperations->list(true);
            $this->assertNotEmpty($dbs);
        } catch (ClientErrorException $e) {
            $this->assertStringContainsStringIgnoringCase('Access denied', $e->getMessage());
        }
    }

    public function testList_countries(): void
    {
        try {
            $countries = $this->dbOperations->list_countries('admin');
            $this->assertNotEmpty($countries);
        } catch (ClientErrorException $e) {
            $this->assertStringContainsStringIgnoringCase('Access denied', $e->getMessage());
        }
    }

    public function testList_lang(): void
    {
        $languages = $this->dbOperations->list_lang();

        $this->assertNotEmpty($languages);
    }
}

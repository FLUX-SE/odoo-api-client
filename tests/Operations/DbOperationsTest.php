<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\Builder\OdooApiClientBuilder;
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
        $odooApiClientBuilder = new OdooApiClientBuilder($_ENV['ODOO_API_HOST']);

        $this->dbOperations = $odooApiClientBuilder->buildDbOperations();
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
        try {
            $dbs = $this->dbOperations->list();
            $this->assertIsArray($dbs);
        } catch (ClientErrorException $e) {
            $this->assertStringContainsStringIgnoringCase('Access denied', $e->getMessage());
        }

        try {
            $dbs = $this->dbOperations->list(true);
            $this->assertIsArray($dbs);
        } catch (ClientErrorException $e) {
            $this->assertStringContainsStringIgnoringCase('Access denied', $e->getMessage());
        }
    }

    public function testList_countries()
    {
        try {
            $countries = $this->dbOperations->list_countries('admin');
            $this->assertIsArray($countries);
        } catch (ClientErrorException $e) {
            $this->assertStringContainsStringIgnoringCase('Access denied', $e->getMessage());
        }
    }

    public function testList_lang()
    {
        $languages = $this->dbOperations->list_lang();

        $this->assertIsArray($languages);
    }
}

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
        /** @var string $host */
        $host = $_ENV['ODOO_API_HOST'] ?? '';
        $odooApiClientBuilder = new OdooApiClientBuilder($host);

        $this->dbOperations = $odooApiClientBuilder->buildDbOperations();
    }

    public function testServer_version(): void
    {
        $version = $this->dbOperations->server_version();
        self::assertNotEmpty($version);
    }

    public function testDb_exist(): void
    {
        /** @var string $database */
        $database = $_ENV['ODOO_API_DATABASE'] ?? '';
        $exist = $this->dbOperations->db_exist($database);

        self::assertTrue($exist);

        $exist = $this->dbOperations->db_exist('fake_database');

        self::assertFalse($exist);
    }

    public function testList(): void
    {
        try {
            $dbs = $this->dbOperations->list();
            self::assertNotEmpty($dbs);
        } catch (ClientErrorException $e) {
            self::assertStringContainsStringIgnoringCase('Access denied', $e->getMessage());
        }

        try {
            $dbs = $this->dbOperations->list(true);
            self::assertNotEmpty($dbs);
        } catch (ClientErrorException $e) {
            self::assertStringContainsStringIgnoringCase('Access denied', $e->getMessage());
        }
    }

    public function testList_countries(): void
    {
        try {
            $countries = $this->dbOperations->list_countries('admin');
            self::assertNotEmpty($countries);
        } catch (ClientErrorException $e) {
            self::assertStringContainsStringIgnoringCase('Access denied', $e->getMessage());
        }
    }

    public function testList_lang(): void
    {
        $languages = $this->dbOperations->list_lang();

        self::assertNotEmpty($languages);
    }
}

<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations;

use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Model\Common\Version;
use FluxSE\OdooApiClient\Operations\CommonOperationsInterface;
use PHPUnit\Framework\TestCase;

class CommonOperationsTest extends TestCase
{
    private CommonOperationsInterface $commonOperations;

    protected function setUp(): void
    {
        /** @var string $host */
        $host = $_ENV['ODOO_API_HOST'] ?? '';
        $odooApiClientBuilder = new OdooApiClientBuilder($host);

        $this->commonOperations = $odooApiClientBuilder->buildCommonOperations();
    }

    public function testVersion(): void
    {
        $version = $this->commonOperations->version();

        self::assertInstanceOf(Version::class, $version);
    }

    public function testAbout(): void
    {
        $about = $this->commonOperations->about();
        self::assertEquals('See http://openerp.com', $about);
    }

    public function testAboutExtended(): void
    {
        $about = $this->commonOperations->aboutExtended();
        self::assertCount(2, $about);
    }

    public function testAuthenticate(): void
    {
        /** @var string $database */
        $database = $_ENV['ODOO_API_DATABASE'] ?? '';
        /** @var string $username */
        $username = $_ENV['ODOO_API_USERNAME'] ?? '';
        /** @var string $password */
        $password = $_ENV['ODOO_API_PASSWORD'] ?? '';
        $uid = $this->commonOperations->authenticate(
            $database,
            $username,
            $password
        );

        self::assertGreaterThan(0, $uid);
    }
}

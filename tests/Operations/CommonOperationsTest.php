<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations;

use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Model\Common\Version;
use FluxSE\OdooApiClient\Operations\CommonOperations;
use PHPUnit\Framework\TestCase;

class CommonOperationsTest extends TestCase
{
    /** @var CommonOperations */
    private $commonOperations;

    /**
     *
     */
    protected function setUp(): void
    {
        $odooApiClientBuilder = new OdooApiClientBuilder($_ENV['ODOO_API_HOST']);

        $this->commonOperations = $odooApiClientBuilder->buildCommonOperations();
    }

    public function testVersion()
    {
        $version = $this->commonOperations->version();

        $this->assertInstanceOf(Version::class, $version);
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

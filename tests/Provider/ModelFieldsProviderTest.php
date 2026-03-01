<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Provider;

use FluxSE\OdooApiClient\Provider\ModelFieldsProviderInterface;
use PHPUnit\Framework\TestCase;
use Tests\FluxSE\OdooApiClient\Operations\CommonOperationsTrait;
use Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw\ExecuteKwOperationsTrait;
use Tests\FluxSE\OdooApiClient\TestModel\OdooVersionedClassProviderTrait;

class ModelFieldsProviderTest extends TestCase
{
    use ExecuteKwOperationsTrait,
        CommonOperationsTrait,
        OdooVersionedClassProviderTrait;

    protected ModelFieldsProviderInterface $modelFieldsProvider;

    private int $odooVersion;

    protected function setUp(): void
    {
        $this->modelFieldsProvider = $this->buildModelFieldsProvider();
        $this->odooVersion = $this->buildCommonOperations()->version()->getServerVersionInfo()[0];
    }

    protected function getOdooVersion(): int
    {
        return $this->odooVersion;
    }

    public function testAccountMoveFields(): void
    {
        $moveClass = $this->getMoveClass();
        $fields = $this->modelFieldsProvider->provide($moveClass, []);

        self::assertArrayNotHasKey('needed_terms', $fields);
        self::assertArrayNotHasKey('tax_totals', $fields);
    }

    public function testResPartnerFields(): void
    {
        $partnerClass = $this->getPartnerClass();
        $fields = $this->modelFieldsProvider->provide($partnerClass, []);

        self::assertContains('id', $fields);
        self::assertContains('email', $fields);
        self::assertContains('display_name', $fields);
    }
}

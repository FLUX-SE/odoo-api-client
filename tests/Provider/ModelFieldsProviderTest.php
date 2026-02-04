<?php

namespace Tests\FluxSE\OdooApiClient\Provider;

use FluxSE\OdooApiClient\Provider\ModelFieldsProviderInterface;
use PHPUnit\Framework\TestCase;
use Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw\ExecuteKwOperationsTrait;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Account\Move;
use Tests\FluxSE\OdooApiClient\TestModel\Object\Res\Partner;

class ModelFieldsProviderTest extends TestCase
{
    use ExecuteKwOperationsTrait;

    protected ModelFieldsProviderInterface $modelFieldsProvider;

    protected function setUp(): void
    {
        $this->modelFieldsProvider = $this->buildModelFieldsProvider();
    }

    public function testAccountMoveFields(): void
    {
        $fields = $this->modelFieldsProvider->provide(Move::class, []);

        self::assertArrayNotHasKey('needed_terms', $fields);
        self::assertArrayNotHasKey('tax_totals', $fields);
    }

    public function testResPartnerFields(): void
    {
        $fields = $this->modelFieldsProvider->provide(Partner::class, []);

        self::assertContains('id', $fields);
        self::assertContains('email', $fields);
        self::assertContains('display_name', $fields);
    }
}

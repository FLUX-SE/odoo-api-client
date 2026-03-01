<?php

namespace Tests\FluxSE\OdooApiClient\Provider;

use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Provider\ModelFieldsProviderInterface;
use PHPUnit\Framework\TestCase;
use Tests\FluxSE\OdooApiClient\Operations\CommonOperationsTrait;
use Tests\FluxSE\OdooApiClient\Operations\Object\ExecuteKw\ExecuteKwOperationsTrait;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Account\Move as MoveV17;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object\Res\Partner as PartnerV17;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Account\Move as MoveV18;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object\Res\Partner as PartnerV18;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Account\Move as MoveV19;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object\Res\Partner as PartnerV19;

class ModelFieldsProviderTest extends TestCase
{
    use ExecuteKwOperationsTrait,
        CommonOperationsTrait;

    protected ModelFieldsProviderInterface $modelFieldsProvider;

    private int $odooVersion;

    protected function setUp(): void
    {
        $this->modelFieldsProvider = $this->buildModelFieldsProvider();
        $this->odooVersion = $this->buildCommonOperations()->version()->getServerVersionInfo()[0];
    }

    /**
     * Get the appropriate Move class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getMoveClass(): string
    {
        /** @var class-string<BaseInterface> $moveClass */
        $moveClass = match (true) {
            $this->odooVersion <= 17 => MoveV17::class,
            $this->odooVersion <= 18 => MoveV18::class,
            default => MoveV19::class,
        };

        return $moveClass;
    }

    /**
     * Get the appropriate Partner class based on Odoo version
     * @return class-string<BaseInterface>
     */
    private function getPartnerClass(): string
    {
        /** @var class-string<BaseInterface> $partnerClass */
        $partnerClass = match (true) {
            $this->odooVersion <= 17 => PartnerV17::class,
            $this->odooVersion <= 18 => PartnerV18::class,
            default => PartnerV19::class,
        };

        return $partnerClass;
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

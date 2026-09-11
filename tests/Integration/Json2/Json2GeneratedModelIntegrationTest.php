<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use FluxSE\OdooApiClient\Model\BaseInterface;
use FluxSE\OdooApiClient\Model\OdooRelation;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration-json2')]
final class Json2GeneratedModelIntegrationTest extends Json2IntegrationTestCase
{
    public function testGeneratedClassesRoundTripDatesAndRelationsThroughManagers(): void
    {
        $environment = $this->requireJson2Environment(true);
        $path = getenv('ODOO_JSON2_GENERATED_PATH');
        if (!is_string($path) || '' === $path) {
            self::markTestSkipped('Generate the isolated models using the Docker runner first.');
        }
        $loader = static function (string $class) use ($path): void {
            if (str_starts_with($class, 'Json2Generated\\')) {
                $file = $path . '/' . str_replace('\\', '/', substr($class, strlen('Json2Generated\\'))) . '.php';
                if (is_file($file)) {
                    require_once $file;
                }
            }
        };
        spl_autoload_register($loader);
        try {
            $class = 'Json2Generated\\Json2\\Fixture';
            self::assertTrue(class_exists($class));
            self::assertTrue(is_a($class, BaseInterface::class, true));
            self::assertSame('json2.fixture', $class::getOdooModelName());
            $builder = $environment->createWriteBuilder();
            $records = $builder->buildRecordOperations();
            $partnerId = $records->create('res.partner', ['name' => 'JSON2 relation ' . $environment->runId()]);
            try {
                $model = $builder->buildSerializer()->denormalize([
                    'name' => 'JSON2 generated ' . $environment->runId(),
                    'day' => '2026-01-02', 'moment' => '2026-01-02 12:34:56',
                    'partner_id' => [$partnerId, 'JSON2 relation'], 'partner_ids' => [$partnerId],
                ], $class);
                self::assertInstanceOf(BaseInterface::class, $model);
                $manager = $builder->buildModelManager();
                $id = $manager->persist($model);
                self::assertGreaterThan(0, $id);
                try {
                    $loaded = $builder->buildModelListManager()->find($class, $id);
                    self::assertInstanceOf(BaseInterface::class, $loaded);
                    self::assertSame($class, $loaded::class);
                    self::assertSame($id, $loaded->getId());
                    $reflection = new \ReflectionObject($loaded);
                    $day = $reflection->getMethod('getDay')->invoke($loaded);
                    $moment = $reflection->getMethod('getMoment')->invoke($loaded);
                    self::assertInstanceOf(\DateTimeInterface::class, $day);
                    self::assertInstanceOf(\DateTimeInterface::class, $moment);
                    self::assertSame('2026-01-02', $day->format('Y-m-d'));
                    self::assertSame('2026-01-02 12:34:56', $moment->format('Y-m-d H:i:s'));
                    $relation = $reflection->getMethod('getPartnerId')->invoke($loaded);
                    self::assertInstanceOf(OdooRelation::class, $relation);
                    self::assertSame($partnerId, $relation->getId());
                    $relations = $reflection->getMethod('getPartnerIds')->invoke($loaded);
                    self::assertIsArray($relations);
                    self::assertCount(1, $relations);
                    self::assertInstanceOf(OdooRelation::class, $relations[0]);
                    self::assertSame($partnerId, $relations[0]->getId());
                    $reflection->getMethod('setName')->invoke($loaded, 'JSON2 updated');
                    self::assertTrue($manager->update($loaded));
                    $updated = $builder->buildModelListManager()->find($class, $id);
                    self::assertNotNull($updated);
                    self::assertSame('JSON2 updated', $reflection->getMethod('getName')->invoke($updated));
                    self::assertTrue($manager->delete($loaded));
                    $id = null;
                } finally {
                    if (null !== $id) {
                        $records->unlink('json2.fixture', [$id]);
                    }
                }
            } finally {
                $records->unlink('res.partner', [$partnerId]);
            }
        } finally {
            spl_autoload_unregister($loader);
        }
    }
}

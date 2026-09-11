<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use FluxSE\OdooApiClient\Api\Json2\Json2ClientInterface;
use FluxSE\OdooApiClient\Builder\Json2\Json2ApiClientBuilder;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration-json2')]
final class Json2WriteIntegrationTest extends Json2IntegrationTestCase
{
    public function testNativeCreateWriteAndUnlinkWithBestEffortCleanup(): void
    {
        $environment = $this->requireJson2Environment(true);
        $client = $environment->createWriteBuilder()->buildJson2Client();
        $id = null;

        try {
            $created = $client->decode($client->call('res.partner', 'create', [
                'vals_list' => [['name' => 'JSON-2 native ' . $environment->runId()]],
            ]));
            self::assertIsArray($created);
            self::assertCount(1, $created);
            self::assertIsInt($created[0]);
            $id = $created[0];

            self::assertTrue($client->decode($client->call('res.partner', 'write', [
                'ids' => [$id],
                'vals' => ['name' => 'JSON-2 native updated ' . $environment->runId()],
            ])));

            $read = $client->decode($client->call('res.partner', 'read', [
                'ids' => [$id],
                'fields' => ['name'],
            ]));
            self::assertIsArray($read);
            self::assertArrayHasKey(0, $read);
            self::assertIsArray($read[0]);
            self::assertSame('JSON-2 native updated ' . $environment->runId(), $read[0]['name'] ?? null);

            self::assertTrue($client->decode($client->call('res.partner', 'unlink', ['ids' => [$id]])));
            $id = null;
        } finally {
            $this->bestEffortUnlink($client, $id);
        }
    }

    public function testCompatibilityCreateWriteAndUnlinkKeepHistoricalTypes(): void
    {
        $environment = $this->requireJson2Environment(true);
        $builder = $environment->createWriteBuilder();
        $records = $builder->buildRecordOperations();
        $nativeClient = $builder->buildObjectOperations()->getJson2Client();
        $id = null;

        try {
            $id = $records->create('res.partner', ['name' => 'JSON-2 facade ' . $environment->runId()]);
            self::assertGreaterThan(0, $id);
            self::assertTrue($records->write(
                'res.partner',
                [$id],
                ['name' => 'JSON-2 facade updated ' . $environment->runId()],
            ));
            self::assertTrue($records->unlink('res.partner', [$id]));
            $id = null;
        } finally {
            $this->bestEffortUnlink($nativeClient, $id);
        }
    }

    private function bestEffortUnlink(Json2ClientInterface $client, ?int $id): void
    {
        if (null === $id) {
            return;
        }

        try {
            $client->call('res.partner', 'unlink', ['ids' => [$id]]);
        } catch (\Throwable) {
            // The disposable instance teardown remains the final cleanup boundary.
        }
    }
}

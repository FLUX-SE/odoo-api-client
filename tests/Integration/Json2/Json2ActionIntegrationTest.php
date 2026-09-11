<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use FluxSE\OdooApiClient\Api\Json2\Json2ClientInterface;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Arguments;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\Options;
use PHPUnit\Framework\Attributes\Group;

#[Group('integration-json2')]
final class Json2ActionIntegrationTest extends Json2IntegrationTestCase
{
    public function testAccountMoveActionPostWhenProvisioned(): void
    {
        $environment = $this->requireJson2Environment(true);
        $id = $environment->optionalPositiveInteger('ODOO_JSON2_ACCOUNT_MOVE_ID');
        if (null === $id) {
            self::markTestSkipped('ODOO_JSON2_ACCOUNT_MOVE_ID is required for the provisioned action_post scenario.');
        }

        $builder = $environment->createWriteBuilder();
        $client = $builder->buildJson2Client();
        $fixture = $environment->accountMoveFixture();
        $fixture->assertDraftMove($this->readMove($client, $fixture->moveId()));

        $result = $builder->buildRecordListOperations()->execute_kw_action(
            'account.move',
            'action_post',
            $this->scalarIdArguments($id),
        );
        $fixture->assertActionPostResult($result);

        $fixture->assertPostedMove($this->readMove($client, $fixture->moveId()));
        self::addToAssertionCount(3);
    }

    public function testPaymentRegisterActionWhenProvisioned(): void
    {
        $environment = $this->requireJson2Environment(true);
        $id = $environment->optionalPositiveInteger('ODOO_JSON2_PAYMENT_REGISTER_ID');
        if (null === $id) {
            self::markTestSkipped(
                'ODOO_JSON2_PAYMENT_REGISTER_ID is required for the provisioned action_create_payments scenario.',
            );
        }

        $builder = $environment->createWriteBuilder();
        $client = $builder->buildJson2Client();
        $fixture = $environment->paymentFixture();
        $fixture->assertUnpaidPostedMove($this->readMove($client, $fixture->moveId()));
        $wizard = $this->readPaymentRegister($client, $fixture->paymentRegisterId());
        self::assertIsArray($wizard['line_ids'] ?? null);
        $lines = $client->decode($client->call('account.move.line', 'read', [
            'ids' => $wizard['line_ids'], 'fields' => ['id', 'move_id'],
        ]));
        self::assertIsArray($lines);
        /** @var list<array<string, mixed>> $lines */
        $fixture->assertPaymentRegister($wizard, $lines);

        $options = new Options();
        $options->addOption('context', [
            'active_model' => 'account.move',
            'active_id' => $fixture->moveId(),
            'active_ids' => [$fixture->moveId()],
        ]);
        $result = $builder->buildRecordListOperations()->execute_kw_action(
            'account.payment.register',
            'action_create_payments',
            $this->scalarIdArguments($id),
            $options,
        );
        $fixture->assertPaymentActionResult($result);

        $payments = $client->decode($client->call('account.payment', 'search_read', [
            'domain' => [['reconciled_invoice_ids', 'in', [$fixture->moveId()]]],
            'fields' => ['id', 'state', 'company_id', 'journal_id'],
        ]));
        self::assertIsArray($payments);
        /** @var list<array<string, mixed>> $payments */
        $fixture->assertPaymentEffects($this->readMove($client, $fixture->moveId()), $payments);
        self::addToAssertionCount(4);
    }

    private function scalarIdArguments(int $id): Arguments
    {
        $arguments = new Arguments();
        $arguments->addArgument($id);

        return $arguments;
    }

    /** @return array<string, mixed> */
    private function readMove(Json2ClientInterface $client, int $id): array
    {
        $records = $client->decode($client->call('account.move', 'read', [
            'ids' => [$id],
            'fields' => ['id', 'ref', 'state', 'payment_state', 'company_id', 'journal_id'],
        ]));
        self::assertIsArray($records);
        self::assertCount(1, $records);
        self::assertIsArray($records[0] ?? null);

        /** @var array<string, mixed> $record */
        $record = $records[0];

        return $record;
    }

    /** @return array<string, mixed> */
    private function readPaymentRegister(Json2ClientInterface $client, int $id): array
    {
        $records = $client->decode($client->call('account.payment.register', 'read', [
            'ids' => [$id],
            'fields' => ['id', 'company_id', 'journal_id', 'amount', 'line_ids'],
        ]));
        self::assertIsArray($records);
        self::assertCount(1, $records);
        self::assertIsArray($records[0] ?? null);

        /** @var array<string, mixed> $record */
        $record = $records[0];

        return $record;
    }
}

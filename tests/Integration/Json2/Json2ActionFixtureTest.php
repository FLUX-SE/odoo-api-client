<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use LogicException;
use PHPUnit\Framework\TestCase;

final class Json2ActionFixtureTest extends TestCase
{
    public function testItRejectsAMoveFromAnotherRunBeforeMutation(): void
    {
        $fixture = $this->paymentFixture();
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('does not match the provisioned run fixture');

        $fixture->assertUnpaidPostedMove($this->move(['ref' => 'json2-payment:another-run']));
    }

    public function testItChecksActionPostResultAndEffectiveState(): void
    {
        $fixture = new Json2ActionFixture(41, 'json2-action-post:run-123', 7, 8);
        $fixture->assertDraftMove($this->move([
            'ref' => 'json2-action-post:run-123',
            'state' => 'draft',
        ]));
        $fixture->assertActionPostResult(false);
        $fixture->assertPostedMove($this->move([
            'ref' => 'json2-action-post:run-123',
            'state' => 'posted',
        ]));

        self::addToAssertionCount(3);
    }

    public function testItChecksPaymentResultAndBusinessEffects(): void
    {
        $fixture = $this->paymentFixture();
        $fixture->assertUnpaidPostedMove($this->move());
        $fixture->assertPaymentRegister([
            'id' => 51,
            'company_id' => [7, 'Fixture company'],
            'journal_id' => [9, 'Fixture bank'],
            'amount' => 25.50,
            'line_ids' => [71],
        ], [['id' => 71, 'move_id' => [41, 'Fixture invoice']]]);
        $fixture->assertPaymentActionResult(['type' => 'ir.actions.act_window_close']);
        $fixture->assertPaymentEffects(
            $this->move(['payment_state' => 'paid']),
            [[
                'id' => 61,
                'company_id' => [7, 'Fixture company'],
                'journal_id' => [9, 'Fixture bank'],
                'state' => 'paid',
            ]],
        );

        self::addToAssertionCount(4);
    }

    public function testItRejectsAResponseOnlyPaymentAssertion(): void
    {
        $fixture = $this->paymentFixture();
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('did not create a linked payment');

        $fixture->assertPaymentEffects($this->move(['payment_state' => 'paid']), []);
    }

    private function paymentFixture(): Json2ActionFixture
    {
        return new Json2ActionFixture(41, 'json2-payment:run-123', 7, 8, 51, 9);
    }

    public function testAWizardPointingAtAnotherInvoiceIsRejectedBeforeMutation(): void
    {
        $this->expectException(LogicException::class);
        $this->paymentFixture()->assertPaymentRegister([
            'id' => 51, 'company_id' => 7, 'journal_id' => 9,
            'amount' => 25.50, 'line_ids' => [71],
        ], [['id' => 71, 'move_id' => [999, 'Wrong invoice']]]);
    }

    /**
     * @param array<string, mixed> $overrides
     *
     * @return array<string, mixed>
     */
    private function move(array $overrides = []): array
    {
        return array_replace([
            'id' => 41,
            'ref' => 'json2-payment:run-123',
            'company_id' => [7, 'Fixture company'],
            'journal_id' => [8, 'Fixture sales'],
            'state' => 'posted',
            'payment_state' => 'not_paid',
        ], $overrides);
    }
}

<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use LogicException;

final class Json2ActionFixture
{
    public function __construct(
        private readonly int $moveId,
        private readonly string $reference,
        private readonly int $companyId,
        private readonly int $moveJournalId,
        private readonly ?int $paymentRegisterId = null,
        private readonly ?int $paymentJournalId = null,
    ) {
    }

    /** @param array<string, mixed> $move */
    public function assertDraftMove(array $move): void
    {
        $this->assertMoveIdentity($move);

        if ('draft' !== ($move['state'] ?? null)) {
            throw new LogicException('The provisioned account move is not in draft state.');
        }
    }

    /** @param array<string, mixed> $move */
    public function assertPostedMove(array $move): void
    {
        $this->assertMoveIdentity($move);

        if ('posted' !== ($move['state'] ?? null)) {
            throw new LogicException('The account move was not posted by the action.');
        }
    }

    /** @param array<string, mixed> $move */
    public function assertUnpaidPostedMove(array $move): void
    {
        $this->assertPostedMove($move);

        if ('not_paid' !== ($move['payment_state'] ?? null)) {
            throw new LogicException('The payment fixture is not an unpaid posted move.');
        }
    }

    /**
     * @param array<string, mixed> $wizard
     * @param list<array<string, mixed>> $lines
     */
    public function assertPaymentRegister(array $wizard, array $lines): void
    {
        if (null === $this->paymentRegisterId || null === $this->paymentJournalId) {
            throw new LogicException('The fixture does not describe a payment register.');
        }

        if ($this->paymentRegisterId !== ($wizard['id'] ?? null)
            || $this->companyId !== $this->relationId($wizard['company_id'] ?? null)
            || $this->paymentJournalId !== $this->relationId($wizard['journal_id'] ?? null)
            || !is_numeric($wizard['amount'] ?? null)
            || (float) $wizard['amount'] <= 0
        ) {
            throw new LogicException('The payment register does not match the provisioned run fixture.');
        }

        $lineIds = $wizard['line_ids'] ?? null;
        if (!is_array($lineIds) || [] === $lineIds || count($lines) !== count($lineIds)) {
            throw new LogicException('The payment register lines must belong to the provisioned invoice.');
        }
        foreach ($lines as $line) {
            if (!in_array($line['id'] ?? null, $lineIds, true)
                || $this->moveId !== $this->relationId($line['move_id'] ?? null)
            ) {
                throw new LogicException('The payment register lines must belong to the provisioned invoice.');
            }
        }
    }

    public function assertActionPostResult(mixed $result): void
    {
        if (false !== $result) {
            throw new LogicException('The action_post result has an unexpected shape for Odoo 19.');
        }
    }

    public function assertPaymentActionResult(mixed $result): void
    {
        if (true === $result) {
            return;
        }

        if (is_array($result)
            && is_string($result['type'] ?? null)
            && str_starts_with($result['type'], 'ir.actions.')
        ) {
            return;
        }

        throw new LogicException('The payment action result has an unexpected shape for Odoo 19.');
    }

    /**
     * @param array<string, mixed> $move
     * @param list<array<string, mixed>> $payments
     */
    public function assertPaymentEffects(array $move, array $payments): void
    {
        $this->assertMoveIdentity($move);
        if ('posted' !== ($move['state'] ?? null)
            || !in_array($move['payment_state'] ?? null, ['in_payment', 'paid'], true)
        ) {
            throw new LogicException('The payment action did not update the invoice payment state.');
        }

        if ([] === $payments || null === $this->paymentJournalId) {
            throw new LogicException('The payment action did not create a linked payment.');
        }

        foreach ($payments as $payment) {
            if ($this->companyId !== $this->relationId($payment['company_id'] ?? null)
                || $this->paymentJournalId !== $this->relationId($payment['journal_id'] ?? null)
                || !in_array($payment['state'] ?? null, ['in_process', 'paid'], true)
            ) {
                throw new LogicException('A linked payment has an unexpected company, journal or state.');
            }
        }
    }

    public function moveId(): int
    {
        return $this->moveId;
    }

    public function paymentRegisterId(): int
    {
        if (null === $this->paymentRegisterId) {
            throw new LogicException('The fixture does not describe a payment register.');
        }

        return $this->paymentRegisterId;
    }

    /** @param array<string, mixed> $move */
    private function assertMoveIdentity(array $move): void
    {
        if ($this->moveId !== ($move['id'] ?? null)
            || $this->reference !== ($move['ref'] ?? null)
            || $this->companyId !== $this->relationId($move['company_id'] ?? null)
            || $this->moveJournalId !== $this->relationId($move['journal_id'] ?? null)
        ) {
            throw new LogicException('The account move does not match the provisioned run fixture.');
        }
    }

    private function relationId(mixed $value): ?int
    {
        if (is_int($value)) {
            return $value;
        }

        return is_array($value) && is_int($value[0] ?? null) ? $value[0] : null;
    }
}

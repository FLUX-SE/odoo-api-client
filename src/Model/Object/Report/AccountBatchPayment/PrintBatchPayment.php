<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Report\AccountBatchPayment;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : report.account_batch_payment.print_batch_payment
 * Name : report.account_batch_payment.print_batch_payment
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
final class PrintBatchPayment extends Base
{
    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'report.account_batch_payment.print_batch_payment';
    }
}

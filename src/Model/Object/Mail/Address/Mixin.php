<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Address;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : mail.address.mixin
 * Name : mail.address.mixin
 *
 * Purpose of this mixin is to store a normalized email based on the primary email field.
 * A normalized email is considered as :
 * - having a left part + @ + a right part (the domain can be without '.something')
 * - being lower case
 * - having no name before the address. Typically, having no 'Name <>'
 * Ex:
 * - Formatted Email : 'Name <NaMe@DoMaIn.CoM>'
 * - Normalized Email : 'name@domain.com'
 * The primary email field can be specified on the parent model, if it differs from the default one ('email')
 * The email_normalized field can than be used on that model to search quickly on emails (by simple comparison
 * and not using time consuming regex anymore).
 */
final class Mixin extends Base
{
    /**
     * Normalized Email
     *
     * @var string
     */
    private $email_normalized;

    /**
     * @return string
     */
    public function getEmailNormalized(): string
    {
        return $this->email_normalized;
    }
}

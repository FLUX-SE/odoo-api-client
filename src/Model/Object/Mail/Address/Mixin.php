<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Address;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : mail.address.mixin
 * Name : mail.address.mixin
 * Info :
 * Purpose of this mixin is to store a normalized email based on the primary email field.
 *         A normalized email is considered as :
 *                 - having a left part + @ + a right part (the domain can be without '.something')
 *                 - being lower case
 *                 - having no name before the address. Typically, having no 'Name <>'
 *         Ex:
 *                 - Formatted Email : 'Name <NaMe@DoMaIn.CoM>'
 *                 - Normalized Email : 'name@domain.com'
 *         The primary email field can be specified on the parent model, if it differs from the default one
 * ('email')
 *         The email_normalized field can than be used on that model to search quickly on emails (by simple
 * comparison
 *         and not using time consuming regex anymore).
 */
final class Mixin extends Base
{
    public const ODOO_MODEL_NAME = 'mail.address.mixin';

    /**
     * Normalized Email
     * This field is used to search on email address as the primary email field can contain more than strictly an
     * email address.
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $email_normalized;

    /**
     * @return string|null
     */
    public function getEmailNormalized(): ?string
    {
        return $this->email_normalized;
    }

    /**
     * @param string|null $email_normalized
     */
    public function setEmailNormalized(?string $email_normalized): void
    {
        $this->email_normalized = $email_normalized;
    }
}

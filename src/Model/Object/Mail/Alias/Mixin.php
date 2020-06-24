<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Alias;

use Flux\OdooApiClient\Model\Object\Mail\Alias;

/**
 * Odoo model : mail.alias.mixin
 * Name : mail.alias.mixin
 *
 * A mixin for models that inherits mail.alias. This mixin initializes the
 * alias_id column in database, and manages the expected one-to-one
 * relation between your model and mail aliases.
 */
final class Mixin extends Alias
{
    /**
     * Alias
     *
     * @var null|Alias
     */
    private $alias_id;

    /**
     * @return null|Alias
     */
    public function getAliasId(): Alias
    {
        return $this->alias_id;
    }
}

<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Alias;

use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Mail\Alias;

/**
 * Odoo model : mail.alias.mixin
 * Name : mail.alias.mixin
 * Info :
 * A mixin for models that inherits mail.alias. This mixin initializes the
 * alias_id column in database, and manages the expected one-to-one
 * relation between your model and mail aliases.
 */
final class Mixin extends Alias
{
    /**
     * Alias
     *
     * @var Alias
     */
    private $alias_id;

    /**
     * @param Alias $alias_id Alias
     * @param Model $alias_model_id Aliased Model
     *        The model (Odoo Document Kind) to which this alias corresponds. Any incoming email that does not reply to an
     *        existing record will cause the creation of a new record of this model (e.g. a Project Task)
     * @param string $alias_defaults Default Values
     *        A Python dictionary that will be evaluated to provide default values when creating new records for this alias.
     * @param array $alias_contact Alias Contact Security
     *        Policy to post a message on the document using the mailgateway.
     *        - everyone: everyone can post
     *        - partners: only authenticated partners
     *        - followers: only followers of the related document or members of following channels
     */
    public function __construct(
        Alias $alias_id,
        Model $alias_model_id,
        string $alias_defaults,
        array $alias_contact
    ) {
        $this->alias_id = $alias_id;
        parent::__construct($alias_model_id, $alias_defaults, $alias_contact);
    }

    /**
     * @return Alias
     */
    public function getAliasId(): Alias
    {
        return $this->alias_id;
    }
}

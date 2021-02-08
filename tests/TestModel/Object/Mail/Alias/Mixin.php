<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Mail\Alias;

use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Tests\Flux\OdooApiClient\TestModel\Object\Mail\Alias;

/**
 * Odoo model : mail.alias.mixin
 * ---
 * Name : mail.alias.mixin
 * ---
 * Info :
 * A mixin for models that inherits mail.alias. This mixin initializes the
 *                 alias_id column in database, and manages the expected one-to-one
 *                 relation between your model and mail aliases.
 */
final class Mixin extends Alias
{
    /**
     * Alias
     * ---
     * Relation : many2one (mail.alias)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Alias
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $alias_id;

    /**
     * @param OdooRelation $alias_id Alias
     *        ---
     *        Relation : many2one (mail.alias)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Mail\Alias
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $alias_model_id Aliased Model
     *        ---
     *        The model (Odoo Document Kind) to which this alias corresponds. Any incoming email that does not reply to an
     *        existing record will cause the creation of a new record of this model (e.g. a Project Task)
     *        ---
     *        Relation : many2one (ir.model)
     *        @see \Tests\Flux\OdooApiClient\TestModel\Object\Ir\Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $alias_defaults Default Values
     *        ---
     *        A Python dictionary that will be evaluated to provide default values when creating new records for this alias.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $alias_contact Alias Contact Security
     *        ---
     *        Policy to post a message on the document using the mailgateway.
     *        - everyone: everyone can post
     *        - partners: only authenticated partners
     *        - followers: only followers of the related document or members of following channels
     *       
     *        ---
     *        Selection :
     *            -> everyone (Everyone)
     *            -> partners (Authenticated Partners)
     *            -> followers (Followers only)
     *            -> employees (Authenticated Employees)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(
        OdooRelation $alias_id,
        OdooRelation $alias_model_id,
        string $alias_defaults,
        string $alias_contact
    ) {
        $this->alias_id = $alias_id;
        parent::__construct($alias_model_id,$alias_defaults,$alias_contact);
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("alias_id")
     */
    public function getAliasId(): OdooRelation
    {
        return $this->alias_id;
    }

    /**
     * @param OdooRelation $alias_id
     */
    public function setAliasId(OdooRelation $alias_id): void
    {
        $this->alias_id = $alias_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.alias.mixin';
    }
}

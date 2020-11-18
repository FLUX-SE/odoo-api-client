<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Documents\Workflow;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : documents.workflow.action
 * ---
 * Name : documents.workflow.action
 * ---
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 *         Odoo models are created by inheriting from this class::
 *
 *                 class user(Model):
 *                         ...
 *
 *         The system will later instantiate the class once per database (on
 *         which the class' module is installed).
 */
final class Action extends Base
{
    /**
     * Workflow Rule
     * ---
     * Relation : many2one (documents.workflow.rule)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Workflow\Rule
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $workflow_rule_id;

    /**
     * Action
     * ---
     * Selection :
     *     -> add (Add)
     *     -> replace (Replace by)
     *     -> remove (Remove)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $action;

    /**
     * Category
     * ---
     * Relation : many2one (documents.facet)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Facet
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $facet_id;

    /**
     * Tag
     * ---
     * Relation : many2one (documents.tag)
     * @see \Flux\OdooApiClient\Model\Object\Documents\Tag
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $tag_id;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $action Action
     *        ---
     *        Selection :
     *            -> add (Add)
     *            -> replace (Replace by)
     *            -> remove (Remove)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $action)
    {
        $this->action = $action;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("write_date")
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("write_uid")
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("create_date")
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("create_uid")
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("workflow_rule_id")
     */
    public function getWorkflowRuleId(): ?OdooRelation
    {
        return $this->workflow_rule_id;
    }

    /**
     * @param OdooRelation|null $tag_id
     */
    public function setTagId(?OdooRelation $tag_id): void
    {
        $this->tag_id = $tag_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("tag_id")
     */
    public function getTagId(): ?OdooRelation
    {
        return $this->tag_id;
    }

    /**
     * @param OdooRelation|null $facet_id
     */
    public function setFacetId(?OdooRelation $facet_id): void
    {
        $this->facet_id = $facet_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("facet_id")
     */
    public function getFacetId(): ?OdooRelation
    {
        return $this->facet_id;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    /**
     * @return string
     *
     * @SerializedName("action")
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param OdooRelation|null $workflow_rule_id
     */
    public function setWorkflowRuleId(?OdooRelation $workflow_rule_id): void
    {
        $this->workflow_rule_id = $workflow_rule_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'documents.workflow.action';
    }
}

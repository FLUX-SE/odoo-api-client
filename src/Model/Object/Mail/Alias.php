<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : mail.alias
 * ---
 * Name : mail.alias
 * ---
 * Info :
 * A Mail Alias is a mapping of an email address with a given Odoo Document
 *               model. It is used by Odoo's mail gateway when processing incoming emails
 *               sent to the system. If the recipient address (To) of the message matches
 *               a Mail Alias, the message will be either processed following the rules
 *               of that alias. If the message is a reply it will be attached to the
 *               existing discussion on the corresponding record, otherwise a new
 *               record of the corresponding model will be created.
 *
 *               This is meant to be used in combination with a catch-all email configuration
 *               on the company's mail server, so that as soon as a new mail.alias is
 *               created, it becomes immediately usable and Odoo will accept email for it.
 */
class Alias extends Base
{
    /**
     * Alias Name
     * ---
     * The name of the email alias, e.g. 'jobs' if you want to catch emails for <jobs@example.odoo.com>
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $alias_name;

    /**
     * Aliased Model
     * ---
     * The model (Odoo Document Kind) to which this alias corresponds. Any incoming email that does not reply to an
     * existing record will cause the creation of a new record of this model (e.g. a Project Task)
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    protected $alias_model_id;

    /**
     * Owner
     * ---
     * The owner of records created upon receiving emails on this alias. If this field is not set the system will
     * attempt to find the right owner based on the sender (From) address, or will use the Administrator account if
     * no system user is found for that address.
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $alias_user_id;

    /**
     * Default Values
     * ---
     * A Python dictionary that will be evaluated to provide default values when creating new records for this alias.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $alias_defaults;

    /**
     * Record Thread ID
     * ---
     * Optional ID of a thread (record) to which all incoming messages will be attached, even if they did not reply
     * to it. If set, this will disable the creation of new records completely.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $alias_force_thread_id;

    /**
     * Alias domain
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    protected $alias_domain;

    /**
     * Parent Model
     * ---
     * Parent model holding the alias. The model holding the alias reference is not necessarily the model given by
     * alias_model_id (example: project (parent_model) and task (model))
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    protected $alias_parent_model_id;

    /**
     * Parent Record Thread ID
     * ---
     * ID of the parent record holding the alias (example: project holding the task creation alias)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    protected $alias_parent_thread_id;

    /**
     * Custom Bounced Message
     * ---
     * If set, this content will automatically be sent out to unauthorized users instead of the default message.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    protected $alias_bounced_content;

    /**
     * Alias Contact Security
     * ---
     * Policy to post a message on the document using the mailgateway.
     * - everyone: everyone can post
     * - partners: only authenticated partners
     * - followers: only followers of the related document or members of following channels
     *
     * ---
     * Selection :
     *     -> everyone (Everyone)
     *     -> partners (Authenticated Partners)
     *     -> followers (Followers only)
     *     -> employees (Authenticated Employees)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    protected $alias_contact;

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
    protected $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $create_date;

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
    protected $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    protected $write_date;

    /**
     * @param OdooRelation $alias_model_id Aliased Model
     *        ---
     *        The model (Odoo Document Kind) to which this alias corresponds. Any incoming email that does not reply to an
     *        existing record will cause the creation of a new record of this model (e.g. a Project Task)
     *        ---
     *        Relation : many2one (ir.model)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Model
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
    public function __construct(OdooRelation $alias_model_id, string $alias_defaults, string $alias_contact)
    {
        $this->alias_model_id = $alias_model_id;
        $this->alias_defaults = $alias_defaults;
        $this->alias_contact = $alias_contact;
    }

    /**
     * @param int|null $alias_parent_thread_id
     */
    public function setAliasParentThreadId(?int $alias_parent_thread_id): void
    {
        $this->alias_parent_thread_id = $alias_parent_thread_id;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param string $alias_contact
     */
    public function setAliasContact(string $alias_contact): void
    {
        $this->alias_contact = $alias_contact;
    }

    /**
     * @return string
     *
     * @SerializedName("alias_contact")
     */
    public function getAliasContact(): string
    {
        return $this->alias_contact;
    }

    /**
     * @param string|null $alias_bounced_content
     */
    public function setAliasBouncedContent(?string $alias_bounced_content): void
    {
        $this->alias_bounced_content = $alias_bounced_content;
    }

    /**
     * @return string|null
     *
     * @SerializedName("alias_bounced_content")
     */
    public function getAliasBouncedContent(): ?string
    {
        return $this->alias_bounced_content;
    }

    /**
     * @return int|null
     *
     * @SerializedName("alias_parent_thread_id")
     */
    public function getAliasParentThreadId(): ?int
    {
        return $this->alias_parent_thread_id;
    }

    /**
     * @return string|null
     *
     * @SerializedName("alias_name")
     */
    public function getAliasName(): ?string
    {
        return $this->alias_name;
    }

    /**
     * @param OdooRelation|null $alias_parent_model_id
     */
    public function setAliasParentModelId(?OdooRelation $alias_parent_model_id): void
    {
        $this->alias_parent_model_id = $alias_parent_model_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("alias_parent_model_id")
     */
    public function getAliasParentModelId(): ?OdooRelation
    {
        return $this->alias_parent_model_id;
    }

    /**
     * @param string|null $alias_domain
     */
    public function setAliasDomain(?string $alias_domain): void
    {
        $this->alias_domain = $alias_domain;
    }

    /**
     * @return string|null
     *
     * @SerializedName("alias_domain")
     */
    public function getAliasDomain(): ?string
    {
        return $this->alias_domain;
    }

    /**
     * @param int|null $alias_force_thread_id
     */
    public function setAliasForceThreadId(?int $alias_force_thread_id): void
    {
        $this->alias_force_thread_id = $alias_force_thread_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("alias_force_thread_id")
     */
    public function getAliasForceThreadId(): ?int
    {
        return $this->alias_force_thread_id;
    }

    /**
     * @param string $alias_defaults
     */
    public function setAliasDefaults(string $alias_defaults): void
    {
        $this->alias_defaults = $alias_defaults;
    }

    /**
     * @return string
     *
     * @SerializedName("alias_defaults")
     */
    public function getAliasDefaults(): string
    {
        return $this->alias_defaults;
    }

    /**
     * @param OdooRelation|null $alias_user_id
     */
    public function setAliasUserId(?OdooRelation $alias_user_id): void
    {
        $this->alias_user_id = $alias_user_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("alias_user_id")
     */
    public function getAliasUserId(): ?OdooRelation
    {
        return $this->alias_user_id;
    }

    /**
     * @param OdooRelation $alias_model_id
     */
    public function setAliasModelId(OdooRelation $alias_model_id): void
    {
        $this->alias_model_id = $alias_model_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("alias_model_id")
     */
    public function getAliasModelId(): OdooRelation
    {
        return $this->alias_model_id;
    }

    /**
     * @param string|null $alias_name
     */
    public function setAliasName(?string $alias_name): void
    {
        $this->alias_name = $alias_name;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'mail.alias';
    }
}

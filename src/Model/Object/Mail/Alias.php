<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.alias
 * Name : mail.alias
 * Info :
 * A Mail Alias is a mapping of an email address with a given Odoo Document
 * model. It is used by Odoo's mail gateway when processing incoming emails
 * sent to the system. If the recipient address (To) of the message matches
 * a Mail Alias, the message will be either processed following the rules
 * of that alias. If the message is a reply it will be attached to the
 * existing discussion on the corresponding record, otherwise a new
 * record of the corresponding model will be created.
 *
 * This is meant to be used in combination with a catch-all email configuration
 * on the company's mail server, so that as soon as a new mail.alias is
 * created, it becomes immediately usable and Odoo will accept email for it.
 */
class Alias extends Base
{
    /**
     * Alias Name
     * The name of the email alias, e.g. 'jobs' if you want to catch emails for <jobs@example.odoo.com>
     *
     * @var null|string
     */
    protected $alias_name;

    /**
     * Aliased Model
     * The model (Odoo Document Kind) to which this alias corresponds. Any incoming email that does not reply to an
     * existing record will cause the creation of a new record of this model (e.g. a Project Task)
     *
     * @var Model
     */
    protected $alias_model_id;

    /**
     * Owner
     * The owner of records created upon receiving emails on this alias. If this field is not set the system will
     * attempt to find the right owner based on the sender (From) address, or will use the Administrator account if
     * no system user is found for that address.
     *
     * @var null|Users
     */
    protected $alias_user_id;

    /**
     * Default Values
     * A Python dictionary that will be evaluated to provide default values when creating new records for this alias.
     *
     * @var string
     */
    protected $alias_defaults;

    /**
     * Record Thread ID
     * Optional ID of a thread (record) to which all incoming messages will be attached, even if they did not reply
     * to it. If set, this will disable the creation of new records completely.
     *
     * @var null|int
     */
    protected $alias_force_thread_id;

    /**
     * Alias domain
     *
     * @var null|string
     */
    protected $alias_domain;

    /**
     * Parent Model
     * Parent model holding the alias. The model holding the alias reference is not necessarily the model given by
     * alias_model_id (example: project (parent_model) and task (model))
     *
     * @var null|Model
     */
    protected $alias_parent_model_id;

    /**
     * Parent Record Thread ID
     * ID of the parent record holding the alias (example: project holding the task creation alias)
     *
     * @var null|int
     */
    protected $alias_parent_thread_id;

    /**
     * Alias Contact Security
     * Policy to post a message on the document using the mailgateway.
     * - everyone: everyone can post
     * - partners: only authenticated partners
     * - followers: only followers of the related document or members of following channels
     *
     * @var array
     */
    protected $alias_contact;

    /**
     * Created by
     *
     * @var null|Users
     */
    protected $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    protected $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    protected $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    protected $write_date;

    /**
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
    public function __construct(Model $alias_model_id, string $alias_defaults, array $alias_contact)
    {
        $this->alias_model_id = $alias_model_id;
        $this->alias_defaults = $alias_defaults;
        $this->alias_contact = $alias_contact;
    }

    /**
     * @param array $alias_contact
     */
    public function setAliasContact(array $alias_contact): void
    {
        $this->alias_contact = $alias_contact;
    }

    /**
     * @return null|Users
     */
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @param mixed $item
     */
    public function removeAliasContact($item): void
    {
        if ($this->hasAliasContact($item)) {
            $index = array_search($item, $this->alias_contact);
            unset($this->alias_contact[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addAliasContact($item): void
    {
        if ($this->hasAliasContact($item)) {
            return;
        }

        $this->alias_contact[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAliasContact($item, bool $strict = true): bool
    {
        return in_array($item, $this->alias_contact, $strict);
    }

    /**
     * @param null|int $alias_parent_thread_id
     */
    public function setAliasParentThreadId(?int $alias_parent_thread_id): void
    {
        $this->alias_parent_thread_id = $alias_parent_thread_id;
    }

    /**
     * @param null|string $alias_name
     */
    public function setAliasName(?string $alias_name): void
    {
        $this->alias_name = $alias_name;
    }

    /**
     * @param null|Model $alias_parent_model_id
     */
    public function setAliasParentModelId(?Model $alias_parent_model_id): void
    {
        $this->alias_parent_model_id = $alias_parent_model_id;
    }

    /**
     * @return null|string
     */
    public function getAliasDomain(): ?string
    {
        return $this->alias_domain;
    }

    /**
     * @param null|int $alias_force_thread_id
     */
    public function setAliasForceThreadId(?int $alias_force_thread_id): void
    {
        $this->alias_force_thread_id = $alias_force_thread_id;
    }

    /**
     * @param string $alias_defaults
     */
    public function setAliasDefaults(string $alias_defaults): void
    {
        $this->alias_defaults = $alias_defaults;
    }

    /**
     * @param null|Users $alias_user_id
     */
    public function setAliasUserId(?Users $alias_user_id): void
    {
        $this->alias_user_id = $alias_user_id;
    }

    /**
     * @param Model $alias_model_id
     */
    public function setAliasModelId(Model $alias_model_id): void
    {
        $this->alias_model_id = $alias_model_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}

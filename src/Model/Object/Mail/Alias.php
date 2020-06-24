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
 *
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
     *
     * @var string
     */
    protected $alias_name;

    /**
     * Aliased Model
     *
     * @var null|Model
     */
    protected $alias_model_id;

    /**
     * Owner
     *
     * @var Users
     */
    protected $alias_user_id;

    /**
     * Default Values
     *
     * @var null|string
     */
    protected $alias_defaults;

    /**
     * Record Thread ID
     *
     * @var int
     */
    protected $alias_force_thread_id;

    /**
     * Alias domain
     *
     * @var string
     */
    protected $alias_domain;

    /**
     * Parent Model
     *
     * @var Model
     */
    protected $alias_parent_model_id;

    /**
     * Parent Record Thread ID
     *
     * @var int
     */
    protected $alias_parent_thread_id;

    /**
     * Alias Contact Security
     *
     * @var null|array
     */
    protected $alias_contact;

    /**
     * Created by
     *
     * @var Users
     */
    protected $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    protected $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    protected $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    protected $write_date;

    /**
     * @param string $alias_name
     */
    public function setAliasName(string $alias_name): void
    {
        $this->alias_name = $alias_name;
    }

    /**
     * @param null|Model $alias_model_id
     */
    public function setAliasModelId(Model $alias_model_id): void
    {
        $this->alias_model_id = $alias_model_id;
    }

    /**
     * @param Users $alias_user_id
     */
    public function setAliasUserId(Users $alias_user_id): void
    {
        $this->alias_user_id = $alias_user_id;
    }

    /**
     * @param null|string $alias_defaults
     */
    public function setAliasDefaults(?string $alias_defaults): void
    {
        $this->alias_defaults = $alias_defaults;
    }

    /**
     * @param int $alias_force_thread_id
     */
    public function setAliasForceThreadId(int $alias_force_thread_id): void
    {
        $this->alias_force_thread_id = $alias_force_thread_id;
    }

    /**
     * @return string
     */
    public function getAliasDomain(): string
    {
        return $this->alias_domain;
    }

    /**
     * @param Model $alias_parent_model_id
     */
    public function setAliasParentModelId(Model $alias_parent_model_id): void
    {
        $this->alias_parent_model_id = $alias_parent_model_id;
    }

    /**
     * @param int $alias_parent_thread_id
     */
    public function setAliasParentThreadId(int $alias_parent_thread_id): void
    {
        $this->alias_parent_thread_id = $alias_parent_thread_id;
    }

    /**
     * @param null|array $alias_contact
     */
    public function setAliasContact(?array $alias_contact): void
    {
        $this->alias_contact = $alias_contact;
    }

    /**
     * @param ?array $alias_contact
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAliasContact(?array $alias_contact, bool $strict = true): bool
    {
        if (null === $this->alias_contact) {
            return false;
        }

        return in_array($alias_contact, $this->alias_contact, $strict);
    }

    /**
     * @param ?array $alias_contact
     */
    public function addAliasContact(?array $alias_contact): void
    {
        if ($this->hasAliasContact($alias_contact)) {
            return;
        }

        if (null === $this->alias_contact) {
            $this->alias_contact = [];
        }

        $this->alias_contact[] = $alias_contact;
    }

    /**
     * @param ?array $alias_contact
     */
    public function removeAliasContact(?array $alias_contact): void
    {
        if ($this->hasAliasContact($alias_contact)) {
            $index = array_search($alias_contact, $this->alias_contact);
            unset($this->alias_contact[$index]);
        }
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getWriteUid(): Users
    {
        return $this->write_uid;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}

<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model as ModelAlias;
use Flux\OdooApiClient\Model\Object\Ir\Model\Access;
use Flux\OdooApiClient\Model\Object\Ir\Model\Fields;
use Flux\OdooApiClient\Model\Object\Ir\Ui\View;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.model
 * Name : ir.model
 *
 * Mixin that overrides the create and write methods to properly generate
 * ir.model.data entries flagged with Studio for the corresponding resources.
 * Doesn't create an ir.model.data if the record is part of a module being
 * currently installed as the ir.model.data will be created automatically
 * afterwards.
 */
final class Model extends Base
{
    /**
     * Model Description
     *
     * @var null|string
     */
    private $name;

    /**
     * Model
     *
     * @var null|string
     */
    private $model;

    /**
     * Information
     *
     * @var string
     */
    private $info;

    /**
     * Fields
     *
     * @var null|Fields
     */
    private $field_id;

    /**
     * Inherited models
     *
     * @var ModelAlias
     */
    private $inherited_model_ids;

    /**
     * Type
     *
     * @var array
     */
    private $state;

    /**
     * Access
     *
     * @var Access
     */
    private $access_ids;

    /**
     * Record Rules
     *
     * @var Rule
     */
    private $rule_ids;

    /**
     * Transient Model
     *
     * @var bool
     */
    private $transient;

    /**
     * In Apps
     *
     * @var string
     */
    private $modules;

    /**
     * Views
     *
     * @var View
     */
    private $view_ids;

    /**
     * Count (Incl. Archived)
     *
     * @var int
     */
    private $count;

    /**
     * Mail Thread
     *
     * @var bool
     */
    private $is_mail_thread;

    /**
     * Mail Activity
     *
     * @var bool
     */
    private $is_mail_activity;

    /**
     * Mail Blacklist
     *
     * @var bool
     */
    private $is_mail_blacklist;

    /**
     * Mail Thread SMS
     *
     * @var bool
     */
    private $is_mail_thread_sms;

    /**
     * Created by
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var DateTimeInterface
     */
    private $write_date;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return bool
     */
    public function isIsMailThreadSms(): bool
    {
        return $this->is_mail_thread_sms;
    }

    /**
     * @param bool $is_mail_blacklist
     */
    public function setIsMailBlacklist(bool $is_mail_blacklist): void
    {
        $this->is_mail_blacklist = $is_mail_blacklist;
    }

    /**
     * @param bool $is_mail_activity
     */
    public function setIsMailActivity(bool $is_mail_activity): void
    {
        $this->is_mail_activity = $is_mail_activity;
    }

    /**
     * @param bool $is_mail_thread
     */
    public function setIsMailThread(bool $is_mail_thread): void
    {
        $this->is_mail_thread = $is_mail_thread;
    }

    /**
     * @return View
     */
    public function getViewIds(): View
    {
        return $this->view_ids;
    }

    /**
     * @param null|string $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getModules(): string
    {
        return $this->modules;
    }

    /**
     * @param bool $transient
     */
    public function setTransient(bool $transient): void
    {
        $this->transient = $transient;
    }

    /**
     * @param Rule $rule_ids
     */
    public function setRuleIds(Rule $rule_ids): void
    {
        $this->rule_ids = $rule_ids;
    }

    /**
     * @param Access $access_ids
     */
    public function setAccessIds(Access $access_ids): void
    {
        $this->access_ids = $access_ids;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @return ModelAlias
     */
    public function getInheritedModelIds(): ModelAlias
    {
        return $this->inherited_model_ids;
    }

    /**
     * @param null|Fields $field_id
     */
    public function setFieldId(Fields $field_id): void
    {
        $this->field_id = $field_id;
    }

    /**
     * @param string $info
     */
    public function setInfo(string $info): void
    {
        $this->info = $info;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}

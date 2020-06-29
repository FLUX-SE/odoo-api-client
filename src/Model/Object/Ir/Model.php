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
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * Model
     *
     * @var string
     */
    private $model;

    /**
     * Information
     *
     * @var null|string
     */
    private $info;

    /**
     * Fields
     *
     * @var Fields[]
     */
    private $field_id;

    /**
     * Inherited models
     * The list of models that extends the current model.
     *
     * @var null|ModelAlias[]
     */
    private $inherited_model_ids;

    /**
     * Type
     *
     * @var null|array
     */
    private $state;

    /**
     * Access
     *
     * @var null|Access[]
     */
    private $access_ids;

    /**
     * Record Rules
     *
     * @var null|Rule[]
     */
    private $rule_ids;

    /**
     * Transient Model
     *
     * @var null|bool
     */
    private $transient;

    /**
     * In Apps
     * List of modules in which the object is defined or inherited
     *
     * @var null|string
     */
    private $modules;

    /**
     * Views
     *
     * @var null|View[]
     */
    private $view_ids;

    /**
     * Count (Incl. Archived)
     * Total number of records in this model
     *
     * @var null|int
     */
    private $count;

    /**
     * Mail Thread
     * Whether this model supports messages and notifications.
     *
     * @var null|bool
     */
    private $is_mail_thread;

    /**
     * Mail Activity
     * Whether this model supports activities.
     *
     * @var null|bool
     */
    private $is_mail_activity;

    /**
     * Mail Blacklist
     * Whether this model supports blacklist.
     *
     * @var null|bool
     */
    private $is_mail_blacklist;

    /**
     * Mail Thread SMS
     * Whether this model supports messages and notifications through SMS
     *
     * @var null|bool
     */
    private $is_mail_thread_sms;

    /**
     * Created by
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Created on
     *
     * @var null|DateTimeInterface
     */
    private $create_date;

    /**
     * Last Updated by
     *
     * @var null|Users
     */
    private $write_uid;

    /**
     * Last Updated on
     *
     * @var null|DateTimeInterface
     */
    private $write_date;

    /**
     * @param string $name Model Description
     * @param string $model Model
     * @param Fields[] $field_id Fields
     */
    public function __construct(string $name, string $model, array $field_id)
    {
        $this->name = $name;
        $this->model = $model;
        $this->field_id = $field_id;
    }

    /**
     * @param Rule $item
     */
    public function addRuleIds(Rule $item): void
    {
        if ($this->hasRuleIds($item)) {
            return;
        }

        if (null === $this->rule_ids) {
            $this->rule_ids = [];
        }

        $this->rule_ids[] = $item;
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
     * @return null|bool
     */
    public function isIsMailThreadSms(): ?bool
    {
        return $this->is_mail_thread_sms;
    }

    /**
     * @param null|bool $is_mail_blacklist
     */
    public function setIsMailBlacklist(?bool $is_mail_blacklist): void
    {
        $this->is_mail_blacklist = $is_mail_blacklist;
    }

    /**
     * @param null|bool $is_mail_activity
     */
    public function setIsMailActivity(?bool $is_mail_activity): void
    {
        $this->is_mail_activity = $is_mail_activity;
    }

    /**
     * @param null|bool $is_mail_thread
     */
    public function setIsMailThread(?bool $is_mail_thread): void
    {
        $this->is_mail_thread = $is_mail_thread;
    }

    /**
     * @return null|int
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @return null|View[]
     */
    public function getViewIds(): ?array
    {
        return $this->view_ids;
    }

    /**
     * @return null|string
     */
    public function getModules(): ?string
    {
        return $this->modules;
    }

    /**
     * @param null|bool $transient
     */
    public function setTransient(?bool $transient): void
    {
        $this->transient = $transient;
    }

    /**
     * @param Rule $item
     */
    public function removeRuleIds(Rule $item): void
    {
        if (null === $this->rule_ids) {
            $this->rule_ids = [];
        }

        if ($this->hasRuleIds($item)) {
            $index = array_search($item, $this->rule_ids);
            unset($this->rule_ids[$index]);
        }
    }

    /**
     * @param Rule $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasRuleIds(Rule $item, bool $strict = true): bool
    {
        if (null === $this->rule_ids) {
            return false;
        }

        return in_array($item, $this->rule_ids, $strict);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Rule[] $rule_ids
     */
    public function setRuleIds(?array $rule_ids): void
    {
        $this->rule_ids = $rule_ids;
    }

    /**
     * @param Access $item
     */
    public function removeAccessIds(Access $item): void
    {
        if (null === $this->access_ids) {
            $this->access_ids = [];
        }

        if ($this->hasAccessIds($item)) {
            $index = array_search($item, $this->access_ids);
            unset($this->access_ids[$index]);
        }
    }

    /**
     * @param Access $item
     */
    public function addAccessIds(Access $item): void
    {
        if ($this->hasAccessIds($item)) {
            return;
        }

        if (null === $this->access_ids) {
            $this->access_ids = [];
        }

        $this->access_ids[] = $item;
    }

    /**
     * @param Access $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAccessIds(Access $item, bool $strict = true): bool
    {
        if (null === $this->access_ids) {
            return false;
        }

        return in_array($item, $this->access_ids, $strict);
    }

    /**
     * @param null|Access[] $access_ids
     */
    public function setAccessIds(?array $access_ids): void
    {
        $this->access_ids = $access_ids;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @return null|ModelAlias[]
     */
    public function getInheritedModelIds(): ?array
    {
        return $this->inherited_model_ids;
    }

    /**
     * @param Fields $item
     */
    public function removeFieldId(Fields $item): void
    {
        if ($this->hasFieldId($item)) {
            $index = array_search($item, $this->field_id);
            unset($this->field_id[$index]);
        }
    }

    /**
     * @param Fields $item
     */
    public function addFieldId(Fields $item): void
    {
        if ($this->hasFieldId($item)) {
            return;
        }

        $this->field_id[] = $item;
    }

    /**
     * @param Fields $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasFieldId(Fields $item, bool $strict = true): bool
    {
        return in_array($item, $this->field_id, $strict);
    }

    /**
     * @param Fields[] $field_id
     */
    public function setFieldId(array $field_id): void
    {
        $this->field_id = $field_id;
    }

    /**
     * @param null|string $info
     */
    public function setInfo(?string $info): void
    {
        $this->info = $info;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}

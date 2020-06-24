<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Mail\Activity;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Mail\Activity\Type as TypeAlias;
use Flux\OdooApiClient\Model\Object\Mail\Template;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : mail.activity.type
 * Name : mail.activity.type
 *
 * Activity Types are used to categorize activities. Each type is a different
 * kind of activity e.g. call, mail, meeting. An activity can be generic i.e.
 * available for all models using activities; or specific to a model in which
 * case res_model_id field should be used.
 */
final class Type extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Default Summary
     *
     * @var string
     */
    private $summary;

    /**
     * Sequence
     *
     * @var int
     */
    private $sequence;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Create Uid
     *
     * @var Users
     */
    private $create_uid;

    /**
     * Scheduled Date
     *
     * @var int
     */
    private $delay_count;

    /**
     * Delay units
     *
     * @var null|array
     */
    private $delay_unit;

    /**
     * Delay Type
     *
     * @var null|array
     */
    private $delay_from;

    /**
     * Icon
     *
     * @var string
     */
    private $icon;

    /**
     * Decoration Type
     *
     * @var array
     */
    private $decoration_type;

    /**
     * Model
     *
     * @var Model
     */
    private $res_model_id;

    /**
     * Default Next Activity
     *
     * @var TypeAlias
     */
    private $default_next_type_id;

    /**
     * Trigger Next Activity
     *
     * @var bool
     */
    private $force_next;

    /**
     * Recommended Next Activities
     *
     * @var TypeAlias
     */
    private $next_type_ids;

    /**
     * Preceding Activities
     *
     * @var TypeAlias
     */
    private $previous_type_ids;

    /**
     * Email templates
     *
     * @var Template
     */
    private $mail_template_ids;

    /**
     * Default User
     *
     * @var Users
     */
    private $default_user_id;

    /**
     * Default Description
     *
     * @var string
     */
    private $default_description;

    /**
     * Initial model
     *
     * @var Model
     */
    private $initial_res_model_id;

    /**
     * Model has change
     *
     * @var bool
     */
    private $res_model_change;

    /**
     * Action to Perform
     *
     * @var array
     */
    private $category;

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
     * @return Model
     */
    public function getInitialResModelId(): Model
    {
        return $this->initial_res_model_id;
    }

    /**
     * @param bool $force_next
     */
    public function setForceNext(bool $force_next): void
    {
        $this->force_next = $force_next;
    }

    /**
     * @param TypeAlias $next_type_ids
     */
    public function setNextTypeIds(TypeAlias $next_type_ids): void
    {
        $this->next_type_ids = $next_type_ids;
    }

    /**
     * @param TypeAlias $previous_type_ids
     */
    public function setPreviousTypeIds(TypeAlias $previous_type_ids): void
    {
        $this->previous_type_ids = $previous_type_ids;
    }

    /**
     * @param Template $mail_template_ids
     */
    public function setMailTemplateIds(Template $mail_template_ids): void
    {
        $this->mail_template_ids = $mail_template_ids;
    }

    /**
     * @param Users $default_user_id
     */
    public function setDefaultUserId(Users $default_user_id): void
    {
        $this->default_user_id = $default_user_id;
    }

    /**
     * @param string $default_description
     */
    public function setDefaultDescription(string $default_description): void
    {
        $this->default_description = $default_description;
    }

    /**
     * @param bool $res_model_change
     */
    public function setResModelChange(bool $res_model_change): void
    {
        $this->res_model_change = $res_model_change;
    }

    /**
     * @param Model $res_model_id
     */
    public function setResModelId(Model $res_model_id): void
    {
        $this->res_model_id = $res_model_id;
    }

    /**
     * @param array $category
     */
    public function setCategory(array $category): void
    {
        $this->category = $category;
    }

    /**
     * @param array $category
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCategory(array $category, bool $strict = true): bool
    {
        return in_array($category, $this->category, $strict);
    }

    /**
     * @param array $category
     */
    public function addCategory(array $category): void
    {
        if ($this->hasCategory($category)) {
            return;
        }

        $this->category[] = $category;
    }

    /**
     * @param array $category
     */
    public function removeCategory(array $category): void
    {
        if ($this->hasCategory($category)) {
            $index = array_search($category, $this->category);
            unset($this->category[$index]);
        }
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
     * @param TypeAlias $default_next_type_id
     */
    public function setDefaultNextTypeId(TypeAlias $default_next_type_id): void
    {
        $this->default_next_type_id = $default_next_type_id;
    }

    /**
     * @param array $decoration_type
     */
    public function removeDecorationType(array $decoration_type): void
    {
        if ($this->hasDecorationType($decoration_type)) {
            $index = array_search($decoration_type, $this->decoration_type);
            unset($this->decoration_type[$index]);
        }
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @param ?array $delay_unit
     */
    public function addDelayUnit(?array $delay_unit): void
    {
        if ($this->hasDelayUnit($delay_unit)) {
            return;
        }

        if (null === $this->delay_unit) {
            $this->delay_unit = [];
        }

        $this->delay_unit[] = $delay_unit;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param Users $create_uid
     */
    public function setCreateUid(Users $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param int $delay_count
     */
    public function setDelayCount(int $delay_count): void
    {
        $this->delay_count = $delay_count;
    }

    /**
     * @param null|array $delay_unit
     */
    public function setDelayUnit(?array $delay_unit): void
    {
        $this->delay_unit = $delay_unit;
    }

    /**
     * @param ?array $delay_unit
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDelayUnit(?array $delay_unit, bool $strict = true): bool
    {
        if (null === $this->delay_unit) {
            return false;
        }

        return in_array($delay_unit, $this->delay_unit, $strict);
    }

    /**
     * @param ?array $delay_unit
     */
    public function removeDelayUnit(?array $delay_unit): void
    {
        if ($this->hasDelayUnit($delay_unit)) {
            $index = array_search($delay_unit, $this->delay_unit);
            unset($this->delay_unit[$index]);
        }
    }

    /**
     * @param array $decoration_type
     */
    public function addDecorationType(array $decoration_type): void
    {
        if ($this->hasDecorationType($decoration_type)) {
            return;
        }

        $this->decoration_type[] = $decoration_type;
    }

    /**
     * @param null|array $delay_from
     */
    public function setDelayFrom(?array $delay_from): void
    {
        $this->delay_from = $delay_from;
    }

    /**
     * @param ?array $delay_from
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDelayFrom(?array $delay_from, bool $strict = true): bool
    {
        if (null === $this->delay_from) {
            return false;
        }

        return in_array($delay_from, $this->delay_from, $strict);
    }

    /**
     * @param ?array $delay_from
     */
    public function addDelayFrom(?array $delay_from): void
    {
        if ($this->hasDelayFrom($delay_from)) {
            return;
        }

        if (null === $this->delay_from) {
            $this->delay_from = [];
        }

        $this->delay_from[] = $delay_from;
    }

    /**
     * @param ?array $delay_from
     */
    public function removeDelayFrom(?array $delay_from): void
    {
        if ($this->hasDelayFrom($delay_from)) {
            $index = array_search($delay_from, $this->delay_from);
            unset($this->delay_from[$index]);
        }
    }

    /**
     * @param string $icon
     */
    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @param array $decoration_type
     */
    public function setDecorationType(array $decoration_type): void
    {
        $this->decoration_type = $decoration_type;
    }

    /**
     * @param array $decoration_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDecorationType(array $decoration_type, bool $strict = true): bool
    {
        return in_array($decoration_type, $this->decoration_type, $strict);
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}

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
 * Info :
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
     * @var string
     */
    private $name;

    /**
     * Default Summary
     *
     * @var null|string
     */
    private $summary;

    /**
     * Sequence
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

    /**
     * Create Uid
     *
     * @var null|Users
     */
    private $create_uid;

    /**
     * Scheduled Date
     * Number of days/week/month before executing the action. It allows to plan the action deadline.
     *
     * @var null|int
     */
    private $delay_count;

    /**
     * Delay units
     * Unit of delay
     *
     * @var array
     */
    private $delay_unit;

    /**
     * Delay Type
     * Type of delay
     *
     * @var array
     */
    private $delay_from;

    /**
     * Icon
     * Font awesome icon e.g. fa-tasks
     *
     * @var null|string
     */
    private $icon;

    /**
     * Decoration Type
     * Change the background color of the related activities of this type.
     *
     * @var null|array
     */
    private $decoration_type;

    /**
     * Model
     * Specify a model if the activity should be specific to a model and not available when managing activities for
     * other models.
     *
     * @var null|Model
     */
    private $res_model_id;

    /**
     * Default Next Activity
     *
     * @var null|TypeAlias
     */
    private $default_next_type_id;

    /**
     * Trigger Next Activity
     *
     * @var null|bool
     */
    private $force_next;

    /**
     * Recommended Next Activities
     *
     * @var null|TypeAlias[]
     */
    private $next_type_ids;

    /**
     * Preceding Activities
     *
     * @var null|TypeAlias[]
     */
    private $previous_type_ids;

    /**
     * Email templates
     *
     * @var null|Template[]
     */
    private $mail_template_ids;

    /**
     * Default User
     *
     * @var null|Users
     */
    private $default_user_id;

    /**
     * Default Description
     *
     * @var null|string
     */
    private $default_description;

    /**
     * Initial model
     * Technical field to keep trace of the model at the beginning of the edition for UX related behaviour
     *
     * @var null|Model
     */
    private $initial_res_model_id;

    /**
     * Model has change
     * Technical field for UX related behaviour
     *
     * @var null|bool
     */
    private $res_model_change;

    /**
     * Action to Perform
     * Actions may trigger specific behavior like opening calendar view or automatically mark as done when a document
     * is uploaded
     *
     * @var null|array
     */
    private $category;

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
     * @param string $name Name
     * @param array $delay_unit Delay units
     *        Unit of delay
     * @param array $delay_from Delay Type
     *        Type of delay
     */
    public function __construct(string $name, array $delay_unit, array $delay_from)
    {
        $this->name = $name;
        $this->delay_unit = $delay_unit;
        $this->delay_from = $delay_from;
    }

    /**
     * @param Template $item
     */
    public function removeMailTemplateIds(Template $item): void
    {
        if (null === $this->mail_template_ids) {
            $this->mail_template_ids = [];
        }

        if ($this->hasMailTemplateIds($item)) {
            $index = array_search($item, $this->mail_template_ids);
            unset($this->mail_template_ids[$index]);
        }
    }

    /**
     * @param TypeAlias $item
     */
    public function removeNextTypeIds(TypeAlias $item): void
    {
        if (null === $this->next_type_ids) {
            $this->next_type_ids = [];
        }

        if ($this->hasNextTypeIds($item)) {
            $index = array_search($item, $this->next_type_ids);
            unset($this->next_type_ids[$index]);
        }
    }

    /**
     * @param null|TypeAlias[] $previous_type_ids
     */
    public function setPreviousTypeIds(?array $previous_type_ids): void
    {
        $this->previous_type_ids = $previous_type_ids;
    }

    /**
     * @param TypeAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPreviousTypeIds(TypeAlias $item, bool $strict = true): bool
    {
        if (null === $this->previous_type_ids) {
            return false;
        }

        return in_array($item, $this->previous_type_ids, $strict);
    }

    /**
     * @param TypeAlias $item
     */
    public function addPreviousTypeIds(TypeAlias $item): void
    {
        if ($this->hasPreviousTypeIds($item)) {
            return;
        }

        if (null === $this->previous_type_ids) {
            $this->previous_type_ids = [];
        }

        $this->previous_type_ids[] = $item;
    }

    /**
     * @param TypeAlias $item
     */
    public function removePreviousTypeIds(TypeAlias $item): void
    {
        if (null === $this->previous_type_ids) {
            $this->previous_type_ids = [];
        }

        if ($this->hasPreviousTypeIds($item)) {
            $index = array_search($item, $this->previous_type_ids);
            unset($this->previous_type_ids[$index]);
        }
    }

    /**
     * @param null|Template[] $mail_template_ids
     */
    public function setMailTemplateIds(?array $mail_template_ids): void
    {
        $this->mail_template_ids = $mail_template_ids;
    }

    /**
     * @param Template $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasMailTemplateIds(Template $item, bool $strict = true): bool
    {
        if (null === $this->mail_template_ids) {
            return false;
        }

        return in_array($item, $this->mail_template_ids, $strict);
    }

    /**
     * @param Template $item
     */
    public function addMailTemplateIds(Template $item): void
    {
        if ($this->hasMailTemplateIds($item)) {
            return;
        }

        if (null === $this->mail_template_ids) {
            $this->mail_template_ids = [];
        }

        $this->mail_template_ids[] = $item;
    }

    /**
     * @param null|Users $default_user_id
     */
    public function setDefaultUserId(?Users $default_user_id): void
    {
        $this->default_user_id = $default_user_id;
    }

    /**
     * @param TypeAlias $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasNextTypeIds(TypeAlias $item, bool $strict = true): bool
    {
        if (null === $this->next_type_ids) {
            return false;
        }

        return in_array($item, $this->next_type_ids, $strict);
    }

    /**
     * @param null|string $default_description
     */
    public function setDefaultDescription(?string $default_description): void
    {
        $this->default_description = $default_description;
    }

    /**
     * @return null|Model
     */
    public function getInitialResModelId(): ?Model
    {
        return $this->initial_res_model_id;
    }

    /**
     * @param null|bool $res_model_change
     */
    public function setResModelChange(?bool $res_model_change): void
    {
        $this->res_model_change = $res_model_change;
    }

    /**
     * @param null|array $category
     */
    public function setCategory(?array $category): void
    {
        $this->category = $category;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCategory($item, bool $strict = true): bool
    {
        if (null === $this->category) {
            return false;
        }

        return in_array($item, $this->category, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addCategory($item): void
    {
        if ($this->hasCategory($item)) {
            return;
        }

        if (null === $this->category) {
            $this->category = [];
        }

        $this->category[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeCategory($item): void
    {
        if (null === $this->category) {
            $this->category = [];
        }

        if ($this->hasCategory($item)) {
            $index = array_search($item, $this->category);
            unset($this->category[$index]);
        }
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @param TypeAlias $item
     */
    public function addNextTypeIds(TypeAlias $item): void
    {
        if ($this->hasNextTypeIds($item)) {
            return;
        }

        if (null === $this->next_type_ids) {
            $this->next_type_ids = [];
        }

        $this->next_type_ids[] = $item;
    }

    /**
     * @param null|TypeAlias[] $next_type_ids
     */
    public function setNextTypeIds(?array $next_type_ids): void
    {
        $this->next_type_ids = $next_type_ids;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param array $delay_from
     */
    public function setDelayFrom(array $delay_from): void
    {
        $this->delay_from = $delay_from;
    }

    /**
     * @param null|string $summary
     */
    public function setSummary(?string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|Users $create_uid
     */
    public function setCreateUid(?Users $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @param null|int $delay_count
     */
    public function setDelayCount(?int $delay_count): void
    {
        $this->delay_count = $delay_count;
    }

    /**
     * @param array $delay_unit
     */
    public function setDelayUnit(array $delay_unit): void
    {
        $this->delay_unit = $delay_unit;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDelayUnit($item, bool $strict = true): bool
    {
        return in_array($item, $this->delay_unit, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addDelayUnit($item): void
    {
        if ($this->hasDelayUnit($item)) {
            return;
        }

        $this->delay_unit[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeDelayUnit($item): void
    {
        if ($this->hasDelayUnit($item)) {
            $index = array_search($item, $this->delay_unit);
            unset($this->delay_unit[$index]);
        }
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDelayFrom($item, bool $strict = true): bool
    {
        return in_array($item, $this->delay_from, $strict);
    }

    /**
     * @param null|bool $force_next
     */
    public function setForceNext(?bool $force_next): void
    {
        $this->force_next = $force_next;
    }

    /**
     * @param mixed $item
     */
    public function addDelayFrom($item): void
    {
        if ($this->hasDelayFrom($item)) {
            return;
        }

        $this->delay_from[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeDelayFrom($item): void
    {
        if ($this->hasDelayFrom($item)) {
            $index = array_search($item, $this->delay_from);
            unset($this->delay_from[$index]);
        }
    }

    /**
     * @param null|string $icon
     */
    public function setIcon(?string $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @param null|array $decoration_type
     */
    public function setDecorationType(?array $decoration_type): void
    {
        $this->decoration_type = $decoration_type;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasDecorationType($item, bool $strict = true): bool
    {
        if (null === $this->decoration_type) {
            return false;
        }

        return in_array($item, $this->decoration_type, $strict);
    }

    /**
     * @param mixed $item
     */
    public function addDecorationType($item): void
    {
        if ($this->hasDecorationType($item)) {
            return;
        }

        if (null === $this->decoration_type) {
            $this->decoration_type = [];
        }

        $this->decoration_type[] = $item;
    }

    /**
     * @param mixed $item
     */
    public function removeDecorationType($item): void
    {
        if (null === $this->decoration_type) {
            $this->decoration_type = [];
        }

        if ($this->hasDecorationType($item)) {
            $index = array_search($item, $this->decoration_type);
            unset($this->decoration_type[$index]);
        }
    }

    /**
     * @param null|Model $res_model_id
     */
    public function setResModelId(?Model $res_model_id): void
    {
        $this->res_model_id = $res_model_id;
    }

    /**
     * @param null|TypeAlias $default_next_type_id
     */
    public function setDefaultNextTypeId(?TypeAlias $default_next_type_id): void
    {
        $this->default_next_type_id = $default_next_type_id;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}

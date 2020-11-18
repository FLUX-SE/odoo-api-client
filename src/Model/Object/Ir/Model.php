<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.model
 * ---
 * Name : ir.model
 * ---
 * Info :
 * Mixin that overrides the create and write methods to properly generate
 *                 ir.model.data entries flagged with Studio for the corresponding resources.
 *                 Doesn't create an ir.model.data if the record is part of a module being
 *                 currently installed as the ir.model.data will be created automatically
 *                 afterwards.
 */
final class Model extends Base
{
    /**
     * Model Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $model;

    /**
     * Information
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $info;

    /**
     * Fields
     * ---
     * Relation : one2many (ir.model.fields -> model_id)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]
     */
    private $field_id;

    /**
     * Inherited models
     * ---
     * The list of models that extends the current model.
     * ---
     * Relation : many2many (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $inherited_model_ids;

    /**
     * Type
     * ---
     * Selection :
     *     -> manual (Custom Object)
     *     -> base (Base Object)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Access
     * ---
     * Relation : one2many (ir.model.access -> model_id)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model\Access
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $access_ids;

    /**
     * Record Rules
     * ---
     * Relation : one2many (ir.rule -> model_id)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Rule
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $rule_ids;

    /**
     * Transient Model
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $transient;

    /**
     * In Apps
     * ---
     * List of modules in which the object is defined or inherited
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $modules;

    /**
     * Views
     * ---
     * Relation : one2many (ir.ui.view)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Ui\View
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $view_ids;

    /**
     * Count (Incl. Archived)
     * ---
     * Total number of records in this model
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $count;

    /**
     * Mail Thread
     * ---
     * Whether this model supports messages and notifications.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_mail_thread;

    /**
     * Mail Activity
     * ---
     * Whether this model supports activities.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_mail_activity;

    /**
     * Mail Blacklist
     * ---
     * Whether this model supports blacklist.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_mail_blacklist;

    /**
     * Mail Thread SMS
     * ---
     * Whether this model supports messages and notifications through SMS
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_mail_thread_sms;

    /**
     * Abstract
     * ---
     * Wheter this model is abstract
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var bool|null
     */
    private $abstract;

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
     * @param string $name Model Description
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $model Model
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation[] $field_id Fields
     *        ---
     *        Relation : one2many (ir.model.fields -> model_id)
     *        @see \Flux\OdooApiClient\Model\Object\Ir\Model\Fields
     *        ---
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(string $name, string $model, array $field_id)
    {
        $this->name = $name;
        $this->model = $model;
        $this->field_id = $field_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_mail_blacklist")
     */
    public function isIsMailBlacklist(): ?bool
    {
        return $this->is_mail_blacklist;
    }

    /**
     * @param string|null $modules
     */
    public function setModules(?string $modules): void
    {
        $this->modules = $modules;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("view_ids")
     */
    public function getViewIds(): ?array
    {
        return $this->view_ids;
    }

    /**
     * @param OdooRelation[]|null $view_ids
     */
    public function setViewIds(?array $view_ids): void
    {
        $this->view_ids = $view_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasViewIds(OdooRelation $item): bool
    {
        if (null === $this->view_ids) {
            return false;
        }

        return in_array($item, $this->view_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addViewIds(OdooRelation $item): void
    {
        if ($this->hasViewIds($item)) {
            return;
        }

        if (null === $this->view_ids) {
            $this->view_ids = [];
        }

        $this->view_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeViewIds(OdooRelation $item): void
    {
        if (null === $this->view_ids) {
            $this->view_ids = [];
        }

        if ($this->hasViewIds($item)) {
            $index = array_search($item, $this->view_ids);
            unset($this->view_ids[$index]);
        }
    }

    /**
     * @return int|null
     *
     * @SerializedName("count")
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @param int|null $count
     */
    public function setCount(?int $count): void
    {
        $this->count = $count;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_mail_thread")
     */
    public function isIsMailThread(): ?bool
    {
        return $this->is_mail_thread;
    }

    /**
     * @param bool|null $is_mail_thread
     */
    public function setIsMailThread(?bool $is_mail_thread): void
    {
        $this->is_mail_thread = $is_mail_thread;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_mail_activity")
     */
    public function isIsMailActivity(): ?bool
    {
        return $this->is_mail_activity;
    }

    /**
     * @param bool|null $is_mail_activity
     */
    public function setIsMailActivity(?bool $is_mail_activity): void
    {
        $this->is_mail_activity = $is_mail_activity;
    }

    /**
     * @param bool|null $is_mail_blacklist
     */
    public function setIsMailBlacklist(?bool $is_mail_blacklist): void
    {
        $this->is_mail_blacklist = $is_mail_blacklist;
    }

    /**
     * @param bool|null $transient
     */
    public function setTransient(?bool $transient): void
    {
        $this->transient = $transient;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_mail_thread_sms")
     */
    public function isIsMailThreadSms(): ?bool
    {
        return $this->is_mail_thread_sms;
    }

    /**
     * @param bool|null $is_mail_thread_sms
     */
    public function setIsMailThreadSms(?bool $is_mail_thread_sms): void
    {
        $this->is_mail_thread_sms = $is_mail_thread_sms;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("abstract")
     */
    public function isAbstract(): ?bool
    {
        return $this->abstract;
    }

    /**
     * @param bool|null $abstract
     */
    public function setAbstract(?bool $abstract): void
    {
        $this->abstract = $abstract;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return string|null
     *
     * @SerializedName("modules")
     */
    public function getModules(): ?string
    {
        return $this->modules;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("transient")
     */
    public function isTransient(): ?bool
    {
        return $this->transient;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasInheritedModelIds(OdooRelation $item): bool
    {
        if (null === $this->inherited_model_ids) {
            return false;
        }

        return in_array($item, $this->inherited_model_ids);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     *
     * @SerializedName("model")
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string|null
     *
     * @SerializedName("info")
     */
    public function getInfo(): ?string
    {
        return $this->info;
    }

    /**
     * @param string|null $info
     */
    public function setInfo(?string $info): void
    {
        $this->info = $info;
    }

    /**
     * @return OdooRelation[]
     *
     * @SerializedName("field_id")
     */
    public function getFieldId(): array
    {
        return $this->field_id;
    }

    /**
     * @param OdooRelation[] $field_id
     */
    public function setFieldId(array $field_id): void
    {
        $this->field_id = $field_id;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasFieldId(OdooRelation $item): bool
    {
        return in_array($item, $this->field_id);
    }

    /**
     * @param OdooRelation $item
     */
    public function addFieldId(OdooRelation $item): void
    {
        if ($this->hasFieldId($item)) {
            return;
        }

        $this->field_id[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeFieldId(OdooRelation $item): void
    {
        if ($this->hasFieldId($item)) {
            $index = array_search($item, $this->field_id);
            unset($this->field_id[$index]);
        }
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("inherited_model_ids")
     */
    public function getInheritedModelIds(): ?array
    {
        return $this->inherited_model_ids;
    }

    /**
     * @param OdooRelation[]|null $inherited_model_ids
     */
    public function setInheritedModelIds(?array $inherited_model_ids): void
    {
        $this->inherited_model_ids = $inherited_model_ids;
    }

    /**
     * @param OdooRelation $item
     */
    public function addInheritedModelIds(OdooRelation $item): void
    {
        if ($this->hasInheritedModelIds($item)) {
            return;
        }

        if (null === $this->inherited_model_ids) {
            $this->inherited_model_ids = [];
        }

        $this->inherited_model_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeRuleIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeInheritedModelIds(OdooRelation $item): void
    {
        if (null === $this->inherited_model_ids) {
            $this->inherited_model_ids = [];
        }

        if ($this->hasInheritedModelIds($item)) {
            $index = array_search($item, $this->inherited_model_ids);
            unset($this->inherited_model_ids[$index]);
        }
    }

    /**
     * @return string|null
     *
     * @SerializedName("state")
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("access_ids")
     */
    public function getAccessIds(): ?array
    {
        return $this->access_ids;
    }

    /**
     * @param OdooRelation[]|null $access_ids
     */
    public function setAccessIds(?array $access_ids): void
    {
        $this->access_ids = $access_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAccessIds(OdooRelation $item): bool
    {
        if (null === $this->access_ids) {
            return false;
        }

        return in_array($item, $this->access_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addAccessIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removeAccessIds(OdooRelation $item): void
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
     * @return OdooRelation[]|null
     *
     * @SerializedName("rule_ids")
     */
    public function getRuleIds(): ?array
    {
        return $this->rule_ids;
    }

    /**
     * @param OdooRelation[]|null $rule_ids
     */
    public function setRuleIds(?array $rule_ids): void
    {
        $this->rule_ids = $rule_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasRuleIds(OdooRelation $item): bool
    {
        if (null === $this->rule_ids) {
            return false;
        }

        return in_array($item, $this->rule_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addRuleIds(OdooRelation $item): void
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.model';
    }
}

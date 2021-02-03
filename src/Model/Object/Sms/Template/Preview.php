<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sms\Template;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sms.template.preview
 * ---
 * Name : sms.template.preview
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Preview extends Base
{
    /**
     * Sms Template
     * ---
     * Relation : many2one (sms.template)
     * @see \Flux\OdooApiClient\Model\Object\Sms\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $sms_template_id;

    /**
     * Template Preview Language
     * ---
     * Selection :
     *     -> en_GB (English (UK))
     *     -> en_US (English (US))
     *     -> fr_FR (French / Français)
     *     -> de_DE (German / Deutsch)
     *     -> ja_JP (Japanese / 日本語)
     *     -> es_ES (Spanish / Español)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $lang;

    /**
     * Applies to
     * ---
     * The type of document this template can be used with
     * ---
     * Relation : many2one (ir.model)
     * @see \Flux\OdooApiClient\Model\Object\Ir\Model
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $model_id;

    /**
     * Body
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $body;

    /**
     * Record reference
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var mixed|null
     */
    private $resource_ref;

    /**
     * No Record
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $no_record;

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
     * @param OdooRelation $sms_template_id Sms Template
     *        ---
     *        Relation : many2one (sms.template)
     *        @see \Flux\OdooApiClient\Model\Object\Sms\Template
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $sms_template_id)
    {
        $this->sms_template_id = $sms_template_id;
    }

    /**
     * @param bool|null $no_record
     */
    public function setNoRecord(?bool $no_record): void
    {
        $this->no_record = $no_record;
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
     * @return bool|null
     *
     * @SerializedName("no_record")
     */
    public function isNoRecord(): ?bool
    {
        return $this->no_record;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("sms_template_id")
     */
    public function getSmsTemplateId(): OdooRelation
    {
        return $this->sms_template_id;
    }

    /**
     * @param mixed|null $resource_ref
     */
    public function setResourceRef($resource_ref): void
    {
        $this->resource_ref = $resource_ref;
    }

    /**
     * @return mixed|null
     *
     * @SerializedName("resource_ref")
     */
    public function getResourceRef()
    {
        return $this->resource_ref;
    }

    /**
     * @param string|null $body
     */
    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return string|null
     *
     * @SerializedName("body")
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param OdooRelation|null $model_id
     */
    public function setModelId(?OdooRelation $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("model_id")
     */
    public function getModelId(): ?OdooRelation
    {
        return $this->model_id;
    }

    /**
     * @param string|null $lang
     */
    public function setLang(?string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @return string|null
     *
     * @SerializedName("lang")
     */
    public function getLang(): ?string
    {
        return $this->lang;
    }

    /**
     * @param OdooRelation $sms_template_id
     */
    public function setSmsTemplateId(OdooRelation $sms_template_id): void
    {
        $this->sms_template_id = $sms_template_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sms.template.preview';
    }
}

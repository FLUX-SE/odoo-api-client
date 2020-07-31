<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use Flux\OdooApiClient\Model\Object\Base;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.translation
 * ---
 * Name : ir.translation
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
final class Translation extends Base
{
    /**
     * Translated field
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Record ID
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $res_id;

    /**
     * Language
     * ---
     * Selection :
     *     -> en_US (English (US))
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $lang;

    /**
     * Type
     * ---
     * Selection :
     *     -> model (Model Field)
     *     -> model_terms (Structured Model Field)
     *     -> code (Code)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $type;

    /**
     * Internal Source
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $src;

    /**
     * Translation Value
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $value;

    /**
     * Module
     * ---
     * Module this term belongs to
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $module;

    /**
     * Status
     * ---
     * Automatically set to let administators find new terms that might need to be translated
     * ---
     * Selection :
     *     -> to_translate (To Translate)
     *     -> inprogress (Translation in Progress)
     *     -> translated (Translated)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $state;

    /**
     * Translation comments
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $comments;

    /**
     * @param string $name Translated field
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     *
     * @SerializedName("value")
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $comments
     */
    public function setComments(?string $comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @return string|null
     *
     * @SerializedName("comments")
     */
    public function getComments(): ?string
    {
        return $this->comments;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
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
     * @param string|null $module
     */
    public function setModule(?string $module): void
    {
        $this->module = $module;
    }

    /**
     * @return string|null
     *
     * @SerializedName("module")
     */
    public function getModule(): ?string
    {
        return $this->module;
    }

    /**
     * @param string|null $value
     */
    public function setValue(?string $value): void
    {
        $this->value = $value;
    }

    /**
     * @param string|null $src
     */
    public function setSrc(?string $src): void
    {
        $this->src = $src;
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
     * @return string|null
     *
     * @SerializedName("src")
     */
    public function getSrc(): ?string
    {
        return $this->src;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     *
     * @SerializedName("type")
     */
    public function getType(): ?string
    {
        return $this->type;
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
     * @param int|null $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return int|null
     *
     * @SerializedName("res_id")
     */
    public function getResId(): ?int
    {
        return $this->res_id;
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
     */
    public static function getOdooModelName(): string
    {
        return 'ir.translation';
    }
}

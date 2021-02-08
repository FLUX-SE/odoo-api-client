<?php

declare(strict_types=1);

namespace Tests\Flux\OdooApiClient\TestModel\Object\Account\InvoiceExtract;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account.invoice_extract.words
 * ---
 * Name : account.invoice_extract.words
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
final class Words extends Base
{
    /**
     * Invoice
     * ---
     * Invoice id
     * ---
     * Relation : many2one (account.move)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Account\Move
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $invoice_id;

    /**
     * Field
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $field;

    /**
     * Invoice extract selected status.
     * ---
     * 0for 'not selected', 1 for 'ocr selected with no user selection' and 2 for 'ocr selected with user selection
     * (user may have selected the same box)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $selected_status;

    /**
     * User Selected
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $user_selected;

    /**
     * Word Text
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $word_text;

    /**
     * Word Page
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $word_page;

    /**
     * Word Box Midx
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $word_box_midX;

    /**
     * Word Box Midy
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $word_box_midY;

    /**
     * Word Box Width
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $word_box_width;

    /**
     * Word Box Height
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $word_box_height;

    /**
     * Word Box Angle
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var float|null
     */
    private $word_box_angle;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @see \Tests\Flux\OdooApiClient\TestModel\Object\Res\Users
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
     * @return OdooRelation|null
     *
     * @SerializedName("invoice_id")
     */
    public function getInvoiceId(): ?OdooRelation
    {
        return $this->invoice_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("word_box_width")
     */
    public function getWordBoxWidth(): ?float
    {
        return $this->word_box_width;
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
     * @param float|null $word_box_angle
     */
    public function setWordBoxAngle(?float $word_box_angle): void
    {
        $this->word_box_angle = $word_box_angle;
    }

    /**
     * @return float|null
     *
     * @SerializedName("word_box_angle")
     */
    public function getWordBoxAngle(): ?float
    {
        return $this->word_box_angle;
    }

    /**
     * @param float|null $word_box_height
     */
    public function setWordBoxHeight(?float $word_box_height): void
    {
        $this->word_box_height = $word_box_height;
    }

    /**
     * @return float|null
     *
     * @SerializedName("word_box_height")
     */
    public function getWordBoxHeight(): ?float
    {
        return $this->word_box_height;
    }

    /**
     * @param float|null $word_box_width
     */
    public function setWordBoxWidth(?float $word_box_width): void
    {
        $this->word_box_width = $word_box_width;
    }

    /**
     * @param float|null $word_box_midY
     */
    public function setWordBoxMidY(?float $word_box_midY): void
    {
        $this->word_box_midY = $word_box_midY;
    }

    /**
     * @param OdooRelation|null $invoice_id
     */
    public function setInvoiceId(?OdooRelation $invoice_id): void
    {
        $this->invoice_id = $invoice_id;
    }

    /**
     * @return float|null
     *
     * @SerializedName("word_box_midY")
     */
    public function getWordBoxMidY(): ?float
    {
        return $this->word_box_midY;
    }

    /**
     * @param float|null $word_box_midX
     */
    public function setWordBoxMidX(?float $word_box_midX): void
    {
        $this->word_box_midX = $word_box_midX;
    }

    /**
     * @return float|null
     *
     * @SerializedName("word_box_midX")
     */
    public function getWordBoxMidX(): ?float
    {
        return $this->word_box_midX;
    }

    /**
     * @param int|null $word_page
     */
    public function setWordPage(?int $word_page): void
    {
        $this->word_page = $word_page;
    }

    /**
     * @return int|null
     *
     * @SerializedName("word_page")
     */
    public function getWordPage(): ?int
    {
        return $this->word_page;
    }

    /**
     * @param string|null $word_text
     */
    public function setWordText(?string $word_text): void
    {
        $this->word_text = $word_text;
    }

    /**
     * @return string|null
     *
     * @SerializedName("word_text")
     */
    public function getWordText(): ?string
    {
        return $this->word_text;
    }

    /**
     * @param bool|null $user_selected
     */
    public function setUserSelected(?bool $user_selected): void
    {
        $this->user_selected = $user_selected;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("user_selected")
     */
    public function isUserSelected(): ?bool
    {
        return $this->user_selected;
    }

    /**
     * @param int|null $selected_status
     */
    public function setSelectedStatus(?int $selected_status): void
    {
        $this->selected_status = $selected_status;
    }

    /**
     * @return int|null
     *
     * @SerializedName("selected_status")
     */
    public function getSelectedStatus(): ?int
    {
        return $this->selected_status;
    }

    /**
     * @param string|null $field
     */
    public function setField(?string $field): void
    {
        $this->field = $field;
    }

    /**
     * @return string|null
     *
     * @SerializedName("field")
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account.invoice_extract.words';
    }
}

<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Account\InvoiceExtract;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Account\Move;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account.invoice_extract.words
 * Name : account.invoice_extract.words
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Words extends Base
{
    /**
     * Invoice
     * Invoice id
     *
     * @var null|Move
     */
    private $invoice_id;

    /**
     * Field
     *
     * @var null|string
     */
    private $field;

    /**
     * Invoice extract selected status.
     * 0for 'not selected', 1 for 'ocr selected with no user selection' and 2 for 'ocr selected with user selection
     * (user may have selected the same box)
     *
     * @var null|int
     */
    private $selected_status;

    /**
     * User Selected
     *
     * @var null|bool
     */
    private $user_selected;

    /**
     * Word Text
     *
     * @var null|string
     */
    private $word_text;

    /**
     * Word Page
     *
     * @var null|int
     */
    private $word_page;

    /**
     * Word Box Midx
     *
     * @var null|float
     */
    private $word_box_midX;

    /**
     * Word Box Midy
     *
     * @var null|float
     */
    private $word_box_midY;

    /**
     * Word Box Width
     *
     * @var null|float
     */
    private $word_box_width;

    /**
     * Word Box Height
     *
     * @var null|float
     */
    private $word_box_height;

    /**
     * Word Box Angle
     *
     * @var null|float
     */
    private $word_box_angle;

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
     * @param null|Move $invoice_id
     */
    public function setInvoiceId(?Move $invoice_id): void
    {
        $this->invoice_id = $invoice_id;
    }

    /**
     * @param null|string $field
     */
    public function setField(?string $field): void
    {
        $this->field = $field;
    }

    /**
     * @param null|int $selected_status
     */
    public function setSelectedStatus(?int $selected_status): void
    {
        $this->selected_status = $selected_status;
    }

    /**
     * @param null|bool $user_selected
     */
    public function setUserSelected(?bool $user_selected): void
    {
        $this->user_selected = $user_selected;
    }

    /**
     * @param null|string $word_text
     */
    public function setWordText(?string $word_text): void
    {
        $this->word_text = $word_text;
    }

    /**
     * @param null|int $word_page
     */
    public function setWordPage(?int $word_page): void
    {
        $this->word_page = $word_page;
    }

    /**
     * @param null|float $word_box_midX
     */
    public function setWordBoxMidX(?float $word_box_midX): void
    {
        $this->word_box_midX = $word_box_midX;
    }

    /**
     * @param null|float $word_box_midY
     */
    public function setWordBoxMidY(?float $word_box_midY): void
    {
        $this->word_box_midY = $word_box_midY;
    }

    /**
     * @param null|float $word_box_width
     */
    public function setWordBoxWidth(?float $word_box_width): void
    {
        $this->word_box_width = $word_box_width;
    }

    /**
     * @param null|float $word_box_height
     */
    public function setWordBoxHeight(?float $word_box_height): void
    {
        $this->word_box_height = $word_box_height;
    }

    /**
     * @param null|float $word_box_angle
     */
    public function setWordBoxAngle(?float $word_box_angle): void
    {
        $this->word_box_angle = $word_box_angle;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}

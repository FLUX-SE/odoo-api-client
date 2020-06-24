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
 *
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
     *
     * @var Move
     */
    private $invoice_id;

    /**
     * Field
     *
     * @var string
     */
    private $field;

    /**
     * Invoice extract selected status.
     *
     * @var int
     */
    private $selected_status;

    /**
     * User Selected
     *
     * @var bool
     */
    private $user_selected;

    /**
     * Word Text
     *
     * @var string
     */
    private $word_text;

    /**
     * Word Page
     *
     * @var int
     */
    private $word_page;

    /**
     * Word Box Midx
     *
     * @var float
     */
    private $word_box_midX;

    /**
     * Word Box Midy
     *
     * @var float
     */
    private $word_box_midY;

    /**
     * Word Box Width
     *
     * @var float
     */
    private $word_box_width;

    /**
     * Word Box Height
     *
     * @var float
     */
    private $word_box_height;

    /**
     * Word Box Angle
     *
     * @var float
     */
    private $word_box_angle;

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
     * @param Move $invoice_id
     */
    public function setInvoiceId(Move $invoice_id): void
    {
        $this->invoice_id = $invoice_id;
    }

    /**
     * @param string $field
     */
    public function setField(string $field): void
    {
        $this->field = $field;
    }

    /**
     * @param int $selected_status
     */
    public function setSelectedStatus(int $selected_status): void
    {
        $this->selected_status = $selected_status;
    }

    /**
     * @param bool $user_selected
     */
    public function setUserSelected(bool $user_selected): void
    {
        $this->user_selected = $user_selected;
    }

    /**
     * @param string $word_text
     */
    public function setWordText(string $word_text): void
    {
        $this->word_text = $word_text;
    }

    /**
     * @param int $word_page
     */
    public function setWordPage(int $word_page): void
    {
        $this->word_page = $word_page;
    }

    /**
     * @param float $word_box_midX
     */
    public function setWordBoxMidX(float $word_box_midX): void
    {
        $this->word_box_midX = $word_box_midX;
    }

    /**
     * @param float $word_box_midY
     */
    public function setWordBoxMidY(float $word_box_midY): void
    {
        $this->word_box_midY = $word_box_midY;
    }

    /**
     * @param float $word_box_width
     */
    public function setWordBoxWidth(float $word_box_width): void
    {
        $this->word_box_width = $word_box_width;
    }

    /**
     * @param float $word_box_height
     */
    public function setWordBoxHeight(float $word_box_height): void
    {
        $this->word_box_height = $word_box_height;
    }

    /**
     * @param float $word_box_angle
     */
    public function setWordBoxAngle(float $word_box_angle): void
    {
        $this->word_box_angle = $word_box_angle;
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

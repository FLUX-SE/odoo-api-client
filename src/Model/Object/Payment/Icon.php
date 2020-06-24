<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : payment.icon
 * Name : payment.icon
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
final class Icon extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Acquirers
     *
     * @var Acquirer
     */
    private $acquirer_ids;

    /**
     * Image
     *
     * @var int
     */
    private $image;

    /**
     * Image displayed on the payment form
     *
     * @var int
     */
    private $image_payment_form;

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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Acquirer $acquirer_ids
     */
    public function setAcquirerIds(Acquirer $acquirer_ids): void
    {
        $this->acquirer_ids = $acquirer_ids;
    }

    /**
     * @param int $image
     */
    public function setImage(int $image): void
    {
        $this->image = $image;
    }

    /**
     * @param int $image_payment_form
     */
    public function setImagePaymentForm(int $image_payment_form): void
    {
        $this->image_payment_form = $image_payment_form;
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

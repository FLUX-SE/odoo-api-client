<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : payment.icon
 * Name : payment.icon
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
final class Icon extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Acquirers
     * List of Acquirers supporting this payment icon.
     *
     * @var null|Acquirer[]
     */
    private $acquirer_ids;

    /**
     * Image
     * This field holds the image used for this payment icon, limited to 1024x1024px
     *
     * @var null|int
     */
    private $image;

    /**
     * Image displayed on the payment form
     *
     * @var null|int
     */
    private $image_payment_form;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Acquirer[] $acquirer_ids
     */
    public function setAcquirerIds(?array $acquirer_ids): void
    {
        $this->acquirer_ids = $acquirer_ids;
    }

    /**
     * @param Acquirer $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasAcquirerIds(Acquirer $item, bool $strict = true): bool
    {
        if (null === $this->acquirer_ids) {
            return false;
        }

        return in_array($item, $this->acquirer_ids, $strict);
    }

    /**
     * @param Acquirer $item
     */
    public function addAcquirerIds(Acquirer $item): void
    {
        if ($this->hasAcquirerIds($item)) {
            return;
        }

        if (null === $this->acquirer_ids) {
            $this->acquirer_ids = [];
        }

        $this->acquirer_ids[] = $item;
    }

    /**
     * @param Acquirer $item
     */
    public function removeAcquirerIds(Acquirer $item): void
    {
        if (null === $this->acquirer_ids) {
            $this->acquirer_ids = [];
        }

        if ($this->hasAcquirerIds($item)) {
            $index = array_search($item, $this->acquirer_ids);
            unset($this->acquirer_ids[$index]);
        }
    }

    /**
     * @param null|int $image
     */
    public function setImage(?int $image): void
    {
        $this->image = $image;
    }

    /**
     * @param null|int $image_payment_form
     */
    public function setImagePaymentForm(?int $image_payment_form): void
    {
        $this->image_payment_form = $image_payment_form;
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

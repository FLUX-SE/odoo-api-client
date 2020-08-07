<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Payment;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : payment.icon
 * ---
 * Name : payment.icon
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
final class Icon extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $name;

    /**
     * Acquirers
     * ---
     * List of Acquirers supporting this payment icon.
     * ---
     * Relation : many2many (payment.acquirer)
     * @see \Flux\OdooApiClient\Model\Object\Payment\Acquirer
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $acquirer_ids;

    /**
     * Image
     * ---
     * This field holds the image used for this payment icon, limited to 1024x1024px
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $image;

    /**
     * Image displayed on the payment form
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var array|null
     */
    private $image_payment_form;

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
     * @return string|null
     *
     * @SerializedName("name")
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasImagePaymentForm($item): bool
    {
        if (null === $this->image_payment_form) {
            return false;
        }

        return in_array($item, $this->image_payment_form);
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
     * @param mixed $item
     */
    public function removeImagePaymentForm($item): void
    {
        if (null === $this->image_payment_form) {
            $this->image_payment_form = [];
        }

        if ($this->hasImagePaymentForm($item)) {
            $index = array_search($item, $this->image_payment_form);
            unset($this->image_payment_form[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addImagePaymentForm($item): void
    {
        if ($this->hasImagePaymentForm($item)) {
            return;
        }

        if (null === $this->image_payment_form) {
            $this->image_payment_form = [];
        }

        $this->image_payment_form[] = $item;
    }

    /**
     * @param array|null $image_payment_form
     */
    public function setImagePaymentForm(?array $image_payment_form): void
    {
        $this->image_payment_form = $image_payment_form;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array|null
     *
     * @SerializedName("image_payment_form")
     */
    public function getImagePaymentForm(): ?array
    {
        return $this->image_payment_form;
    }

    /**
     * @param mixed $item
     */
    public function removeImage($item): void
    {
        if (null === $this->image) {
            $this->image = [];
        }

        if ($this->hasImage($item)) {
            $index = array_search($item, $this->image);
            unset($this->image[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addImage($item): void
    {
        if ($this->hasImage($item)) {
            return;
        }

        if (null === $this->image) {
            $this->image = [];
        }

        $this->image[] = $item;
    }

    /**
     * @param mixed $item
     *
     * @return bool
     */
    public function hasImage($item): bool
    {
        if (null === $this->image) {
            return false;
        }

        return in_array($item, $this->image);
    }

    /**
     * @param array|null $image
     */
    public function setImage(?array $image): void
    {
        $this->image = $image;
    }

    /**
     * @return array|null
     *
     * @SerializedName("image")
     */
    public function getImage(): ?array
    {
        return $this->image;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeAcquirerIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function addAcquirerIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasAcquirerIds(OdooRelation $item): bool
    {
        if (null === $this->acquirer_ids) {
            return false;
        }

        return in_array($item, $this->acquirer_ids);
    }

    /**
     * @param OdooRelation[]|null $acquirer_ids
     */
    public function setAcquirerIds(?array $acquirer_ids): void
    {
        $this->acquirer_ids = $acquirer_ids;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("acquirer_ids")
     */
    public function getAcquirerIds(): ?array
    {
        return $this->acquirer_ids;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'payment.icon';
    }
}

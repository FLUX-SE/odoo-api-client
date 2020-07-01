<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Portal\Wizard;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : portal.wizard.user
 * Name : portal.wizard.user
 * Info :
 * A model to configure users in the portal wizard.
 */
final class User extends Base
{
    public const ODOO_MODEL_NAME = 'portal.wizard.user';

    /**
     * Wizard
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $wizard_id;

    /**
     * Contact
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $partner_id;

    /**
     * Email
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $email;

    /**
     * In Portal
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $in_portal;

    /**
     * Login User
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $user_id;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param OdooRelation $wizard_id Wizard
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $partner_id Contact
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $wizard_id, OdooRelation $partner_id)
    {
        $this->wizard_id = $wizard_id;
        $this->partner_id = $partner_id;
    }

    /**
     * @param OdooRelation|null $user_id
     */
    public function setUserId(?OdooRelation $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return DateTimeInterface|null
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
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getUserId(): ?OdooRelation
    {
        return $this->user_id;
    }

    /**
     * @return OdooRelation
     */
    public function getWizardId(): OdooRelation
    {
        return $this->wizard_id;
    }

    /**
     * @param bool|null $in_portal
     */
    public function setInPortal(?bool $in_portal): void
    {
        $this->in_portal = $in_portal;
    }

    /**
     * @return bool|null
     */
    public function isInPortal(): ?bool
    {
        return $this->in_portal;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param OdooRelation $partner_id
     */
    public function setPartnerId(OdooRelation $partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    /**
     * @return OdooRelation
     */
    public function getPartnerId(): OdooRelation
    {
        return $this->partner_id;
    }

    /**
     * @param OdooRelation $wizard_id
     */
    public function setWizardId(OdooRelation $wizard_id): void
    {
        $this->wizard_id = $wizard_id;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}

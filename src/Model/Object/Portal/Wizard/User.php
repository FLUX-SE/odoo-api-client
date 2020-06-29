<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Portal\Wizard;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Portal\Wizard;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : portal.wizard.user
 * Name : portal.wizard.user
 * Info :
 * A model to configure users in the portal wizard.
 */
final class User extends Base
{
    /**
     * Wizard
     *
     * @var Wizard
     */
    private $wizard_id;

    /**
     * Contact
     *
     * @var Partner
     */
    private $partner_id;

    /**
     * Email
     *
     * @var null|string
     */
    private $email;

    /**
     * In Portal
     *
     * @var null|bool
     */
    private $in_portal;

    /**
     * Login User
     *
     * @var null|Users
     */
    private $user_id;

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
     * @param Wizard $wizard_id Wizard
     * @param Partner $partner_id Contact
     */
    public function __construct(Wizard $wizard_id, Partner $partner_id)
    {
        $this->wizard_id = $wizard_id;
        $this->partner_id = $partner_id;
    }

    /**
     * @param Wizard $wizard_id
     */
    public function setWizardId(Wizard $wizard_id): void
    {
        $this->wizard_id = $wizard_id;
    }

    /**
     * @return Partner
     */
    public function getPartnerId(): Partner
    {
        return $this->partner_id;
    }

    /**
     * @param null|string $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param null|bool $in_portal
     */
    public function setInPortal(?bool $in_portal): void
    {
        $this->in_portal = $in_portal;
    }

    /**
     * @param null|Users $user_id
     */
    public function setUserId(?Users $user_id): void
    {
        $this->user_id = $user_id;
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

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
 *
 * A model to configure users in the portal wizard.
 */
final class User extends Base
{
    /**
     * Wizard
     *
     * @var null|Wizard
     */
    private $wizard_id;

    /**
     * Contact
     *
     * @var null|Partner
     */
    private $partner_id;

    /**
     * Email
     *
     * @var string
     */
    private $email;

    /**
     * In Portal
     *
     * @var bool
     */
    private $in_portal;

    /**
     * Login User
     *
     * @var Users
     */
    private $user_id;

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
     * @param null|Wizard $wizard_id
     */
    public function setWizardId(Wizard $wizard_id): void
    {
        $this->wizard_id = $wizard_id;
    }

    /**
     * @return null|Partner
     */
    public function getPartnerId(): Partner
    {
        return $this->partner_id;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param bool $in_portal
     */
    public function setInPortal(bool $in_portal): void
    {
        $this->in_portal = $in_portal;
    }

    /**
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
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

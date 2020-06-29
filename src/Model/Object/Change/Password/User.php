<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Change\Password;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : change.password.user
 * Name : change.password.user
 * Info :
 * A model to configure users in the change password wizard.
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
     * User
     *
     * @var Users
     */
    private $user_id;

    /**
     * User Login
     *
     * @var null|string
     */
    private $user_login;

    /**
     * New Password
     *
     * @var null|string
     */
    private $new_passwd;

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
     * @param Users $user_id User
     */
    public function __construct(Wizard $wizard_id, Users $user_id)
    {
        $this->wizard_id = $wizard_id;
        $this->user_id = $user_id;
    }

    /**
     * @param Wizard $wizard_id
     */
    public function setWizardId(Wizard $wizard_id): void
    {
        $this->wizard_id = $wizard_id;
    }

    /**
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return null|string
     */
    public function getUserLogin(): ?string
    {
        return $this->user_login;
    }

    /**
     * @param null|string $new_passwd
     */
    public function setNewPasswd(?string $new_passwd): void
    {
        $this->new_passwd = $new_passwd;
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

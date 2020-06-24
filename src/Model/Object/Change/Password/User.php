<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Change\Password;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : change.password.user
 * Name : change.password.user
 *
 * A model to configure users in the change password wizard.
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
     * User
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * User Login
     *
     * @var string
     */
    private $user_login;

    /**
     * New Password
     *
     * @var string
     */
    private $new_passwd;

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
     * @param null|Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getUserLogin(): string
    {
        return $this->user_login;
    }

    /**
     * @param string $new_passwd
     */
    public function setNewPasswd(string $new_passwd): void
    {
        $this->new_passwd = $new_passwd;
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

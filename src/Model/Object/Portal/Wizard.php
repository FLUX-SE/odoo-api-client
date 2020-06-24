<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Portal;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Portal\Wizard\User;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : portal.wizard
 * Name : portal.wizard
 *
 * A wizard to manage the creation/removal of portal users.
 */
final class Wizard extends Base
{
    /**
     * Users
     *
     * @var User
     */
    private $user_ids;

    /**
     * Invitation Message
     *
     * @var string
     */
    private $welcome_message;

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
     * @param User $user_ids
     */
    public function setUserIds(User $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @param string $welcome_message
     */
    public function setWelcomeMessage(string $welcome_message): void
    {
        $this->welcome_message = $welcome_message;
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

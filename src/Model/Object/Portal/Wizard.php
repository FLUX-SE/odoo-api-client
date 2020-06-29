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
 * Info :
 * A wizard to manage the creation/removal of portal users.
 */
final class Wizard extends Base
{
    /**
     * Users
     *
     * @var null|User[]
     */
    private $user_ids;

    /**
     * Invitation Message
     * This text is included in the email sent to new users of the portal.
     *
     * @var null|string
     */
    private $welcome_message;

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
     * @param null|User[] $user_ids
     */
    public function setUserIds(?array $user_ids): void
    {
        $this->user_ids = $user_ids;
    }

    /**
     * @param User $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasUserIds(User $item, bool $strict = true): bool
    {
        if (null === $this->user_ids) {
            return false;
        }

        return in_array($item, $this->user_ids, $strict);
    }

    /**
     * @param User $item
     */
    public function addUserIds(User $item): void
    {
        if ($this->hasUserIds($item)) {
            return;
        }

        if (null === $this->user_ids) {
            $this->user_ids = [];
        }

        $this->user_ids[] = $item;
    }

    /**
     * @param User $item
     */
    public function removeUserIds(User $item): void
    {
        if (null === $this->user_ids) {
            $this->user_ids = [];
        }

        if ($this->hasUserIds($item)) {
            $index = array_search($item, $this->user_ids);
            unset($this->user_ids[$index]);
        }
    }

    /**
     * @param null|string $welcome_message
     */
    public function setWelcomeMessage(?string $welcome_message): void
    {
        $this->welcome_message = $welcome_message;
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

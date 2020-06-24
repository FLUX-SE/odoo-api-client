<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Fetchmail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Model;
use Flux\OdooApiClient\Model\Object\Mail\Mail;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : fetchmail.server
 * Name : fetchmail.server
 *
 * Incoming POP/IMAP mail server account
 */
final class Server extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

    /**
     * Status
     *
     * @var array
     */
    private $state;

    /**
     * Server Name
     *
     * @var string
     */
    private $server;

    /**
     * Port
     *
     * @var int
     */
    private $port;

    /**
     * Server Type
     *
     * @var null|array
     */
    private $server_type;

    /**
     * SSL/TLS
     *
     * @var bool
     */
    private $is_ssl;

    /**
     * Keep Attachments
     *
     * @var bool
     */
    private $attach;

    /**
     * Keep Original
     *
     * @var bool
     */
    private $original;

    /**
     * Last Fetch Date
     *
     * @var DateTimeInterface
     */
    private $date;

    /**
     * Username
     *
     * @var string
     */
    private $user;

    /**
     * Password
     *
     * @var string
     */
    private $password;

    /**
     * Create a New Record
     *
     * @var Model
     */
    private $object_id;

    /**
     * Server Priority
     *
     * @var int
     */
    private $priority;

    /**
     * Messages
     *
     * @var Mail
     */
    private $message_ids;

    /**
     * Configuration
     *
     * @var string
     */
    private $configuration;

    /**
     * Script
     *
     * @var string
     */
    private $script;

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
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
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
    public function getCreateDate(): DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return Users
     */
    public function getCreateUid(): Users
    {
        return $this->create_uid;
    }

    /**
     * @return string
     */
    public function getScript(): string
    {
        return $this->script;
    }

    /**
     * @return string
     */
    public function getConfiguration(): string
    {
        return $this->configuration;
    }

    /**
     * @return Mail
     */
    public function getMessageIds(): Mail
    {
        return $this->message_ids;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param Model $object_id
     */
    public function setObjectId(Model $object_id): void
    {
        $this->object_id = $object_id;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param bool $original
     */
    public function setOriginal(bool $original): void
    {
        $this->original = $original;
    }

    /**
     * @param bool $attach
     */
    public function setAttach(bool $attach): void
    {
        $this->attach = $attach;
    }

    /**
     * @param bool $is_ssl
     */
    public function setIsSsl(bool $is_ssl): void
    {
        $this->is_ssl = $is_ssl;
    }

    /**
     * @param ?array $server_type
     */
    public function removeServerType(?array $server_type): void
    {
        if ($this->hasServerType($server_type)) {
            $index = array_search($server_type, $this->server_type);
            unset($this->server_type[$index]);
        }
    }

    /**
     * @param ?array $server_type
     */
    public function addServerType(?array $server_type): void
    {
        if ($this->hasServerType($server_type)) {
            return;
        }

        if (null === $this->server_type) {
            $this->server_type = [];
        }

        $this->server_type[] = $server_type;
    }

    /**
     * @param ?array $server_type
     * @param bool $strict
     *
     * @return bool
     */
    public function hasServerType(?array $server_type, bool $strict = true): bool
    {
        if (null === $this->server_type) {
            return false;
        }

        return in_array($server_type, $this->server_type, $strict);
    }

    /**
     * @param null|array $server_type
     */
    public function setServerType(?array $server_type): void
    {
        $this->server_type = $server_type;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getServer(): string
    {
        return $this->server;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}

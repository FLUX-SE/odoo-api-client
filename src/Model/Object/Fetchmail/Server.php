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
 * Info :
 * Incoming POP/IMAP mail server account
 */
final class Server extends Base
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

    /**
     * Status
     *
     * @var null|array
     */
    private $state;

    /**
     * Server Name
     * Hostname or IP of the mail server
     *
     * @var null|string
     */
    private $server;

    /**
     * Port
     *
     * @var null|int
     */
    private $port;

    /**
     * Server Type
     *
     * @var array
     */
    private $server_type;

    /**
     * SSL/TLS
     * Connections are encrypted with SSL/TLS through a dedicated port (default: IMAPS=993, POP3S=995)
     *
     * @var null|bool
     */
    private $is_ssl;

    /**
     * Keep Attachments
     * Whether attachments should be downloaded. If not enabled, incoming emails will be stripped of any attachments
     * before being processed
     *
     * @var null|bool
     */
    private $attach;

    /**
     * Keep Original
     * Whether a full original copy of each email should be kept for reference and attached to each processed
     * message. This will usually double the size of your message database.
     *
     * @var null|bool
     */
    private $original;

    /**
     * Last Fetch Date
     *
     * @var null|DateTimeInterface
     */
    private $date;

    /**
     * Username
     *
     * @var null|string
     */
    private $user;

    /**
     * Password
     *
     * @var null|string
     */
    private $password;

    /**
     * Create a New Record
     * Process each incoming mail as part of a conversation corresponding to this document type. This will create new
     * documents for new conversations, or attach follow-up emails to the existing conversations (documents).
     *
     * @var null|Model
     */
    private $object_id;

    /**
     * Server Priority
     * Defines the order of processing, lower values mean higher priority
     *
     * @var null|int
     */
    private $priority;

    /**
     * Messages
     *
     * @var null|Mail[]
     */
    private $message_ids;

    /**
     * Configuration
     *
     * @var null|string
     */
    private $configuration;

    /**
     * Script
     *
     * @var null|string
     */
    private $script;

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
     * @param string $name Name
     * @param array $server_type Server Type
     */
    public function __construct(string $name, array $server_type)
    {
        $this->name = $name;
        $this->server_type = $server_type;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
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
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
    }

    /**
     * @return null|string
     */
    public function getScript(): ?string
    {
        return $this->script;
    }

    /**
     * @return null|string
     */
    public function getConfiguration(): ?string
    {
        return $this->configuration;
    }

    /**
     * @return null|Mail[]
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
    }

    /**
     * @return null|int
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }

    /**
     * @param null|Model $object_id
     */
    public function setObjectId(?Model $object_id): void
    {
        $this->object_id = $object_id;
    }

    /**
     * @return null|string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return null|string
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @param null|bool $original
     */
    public function setOriginal(?bool $original): void
    {
        $this->original = $original;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|bool $attach
     */
    public function setAttach(?bool $attach): void
    {
        $this->attach = $attach;
    }

    /**
     * @param null|bool $is_ssl
     */
    public function setIsSsl(?bool $is_ssl): void
    {
        $this->is_ssl = $is_ssl;
    }

    /**
     * @param mixed $item
     */
    public function removeServerType($item): void
    {
        if ($this->hasServerType($item)) {
            $index = array_search($item, $this->server_type);
            unset($this->server_type[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addServerType($item): void
    {
        if ($this->hasServerType($item)) {
            return;
        }

        $this->server_type[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasServerType($item, bool $strict = true): bool
    {
        return in_array($item, $this->server_type, $strict);
    }

    /**
     * @param array $server_type
     */
    public function setServerType(array $server_type): void
    {
        $this->server_type = $server_type;
    }

    /**
     * @return null|int
     */
    public function getPort(): ?int
    {
        return $this->port;
    }

    /**
     * @return null|string
     */
    public function getServer(): ?string
    {
        return $this->server;
    }

    /**
     * @return null|array
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}

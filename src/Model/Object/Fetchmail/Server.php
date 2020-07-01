<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Fetchmail;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : fetchmail.server
 * Name : fetchmail.server
 * Info :
 * Incoming POP/IMAP mail server account
 */
final class Server extends Base
{
    public const ODOO_MODEL_NAME = 'fetchmail.server';

    /**
     * Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Active
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Status
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> draft (Not Confirmed)
     *     -> done (Confirmed)
     *
     *
     * @var string|null
     */
    private $state;

    /**
     * Server Name
     * Hostname or IP of the mail server
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $server;

    /**
     * Port
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $port;

    /**
     * Server Type
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> pop (POP Server)
     *     -> imap (IMAP Server)
     *     -> local (Local Server)
     *
     *
     * @var string
     */
    private $server_type;

    /**
     * SSL/TLS
     * Connections are encrypted with SSL/TLS through a dedicated port (default: IMAPS=993, POP3S=995)
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $is_ssl;

    /**
     * Keep Attachments
     * Whether attachments should be downloaded. If not enabled, incoming emails will be stripped of any attachments
     * before being processed
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $attach;

    /**
     * Keep Original
     * Whether a full original copy of each email should be kept for reference and attached to each processed
     * message. This will usually double the size of your message database.
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $original;

    /**
     * Last Fetch Date
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $date;

    /**
     * Username
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $user;

    /**
     * Password
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $password;

    /**
     * Create a New Record
     * Process each incoming mail as part of a conversation corresponding to this document type. This will create new
     * documents for new conversations, or attach follow-up emails to the existing conversations (documents).
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $object_id;

    /**
     * Server Priority
     * Defines the order of processing, lower values mean higher priority
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $priority;

    /**
     * Messages
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $message_ids;

    /**
     * Configuration
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $configuration;

    /**
     * Script
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $script;

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
     * @param string $name Name
     *        Searchable : yes
     *        Sortable : yes
     * @param string $server_type Server Type
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> pop (POP Server)
     *            -> imap (IMAP Server)
     *            -> local (Local Server)
     *
     */
    public function __construct(string $name, string $server_type)
    {
        $this->name = $name;
        $this->server_type = $server_type;
    }

    /**
     * @return string|null
     */
    public function getConfiguration(): ?string
    {
        return $this->configuration;
    }

    /**
     * @param OdooRelation|null $object_id
     */
    public function setObjectId(?OdooRelation $object_id): void
    {
        $this->object_id = $object_id;
    }

    /**
     * @return int|null
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }

    /**
     * @param int|null $priority
     */
    public function setPriority(?int $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getMessageIds(): ?array
    {
        return $this->message_ids;
    }

    /**
     * @param OdooRelation[]|null $message_ids
     */
    public function setMessageIds(?array $message_ids): void
    {
        $this->message_ids = $message_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasMessageIds(OdooRelation $item): bool
    {
        if (null === $this->message_ids) {
            return false;
        }

        return in_array($item, $this->message_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addMessageIds(OdooRelation $item): void
    {
        if ($this->hasMessageIds($item)) {
            return;
        }

        if (null === $this->message_ids) {
            $this->message_ids = [];
        }

        $this->message_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeMessageIds(OdooRelation $item): void
    {
        if (null === $this->message_ids) {
            $this->message_ids = [];
        }

        if ($this->hasMessageIds($item)) {
            $index = array_search($item, $this->message_ids);
            unset($this->message_ids[$index]);
        }
    }

    /**
     * @param string|null $configuration
     */
    public function setConfiguration(?string $configuration): void
    {
        $this->configuration = $configuration;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getScript(): ?string
    {
        return $this->script;
    }

    /**
     * @param string|null $script
     */
    public function setScript(?string $script): void
    {
        $this->script = $script;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @return OdooRelation|null
     */
    public function getObjectId(): ?OdooRelation
    {
        return $this->object_id;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getServerType(): string
    {
        return $this->server_type;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     */
    public function getServer(): ?string
    {
        return $this->server;
    }

    /**
     * @param string|null $server
     */
    public function setServer(?string $server): void
    {
        $this->server = $server;
    }

    /**
     * @return int|null
     */
    public function getPort(): ?int
    {
        return $this->port;
    }

    /**
     * @param int|null $port
     */
    public function setPort(?int $port): void
    {
        $this->port = $port;
    }

    /**
     * @param string $server_type
     */
    public function setServerType(string $server_type): void
    {
        $this->server_type = $server_type;
    }

    /**
     * @param string|null $user
     */
    public function setUser(?string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return bool|null
     */
    public function isIsSsl(): ?bool
    {
        return $this->is_ssl;
    }

    /**
     * @param bool|null $is_ssl
     */
    public function setIsSsl(?bool $is_ssl): void
    {
        $this->is_ssl = $is_ssl;
    }

    /**
     * @return bool|null
     */
    public function isAttach(): ?bool
    {
        return $this->attach;
    }

    /**
     * @param bool|null $attach
     */
    public function setAttach(?bool $attach): void
    {
        $this->attach = $attach;
    }

    /**
     * @return bool|null
     */
    public function isOriginal(): ?bool
    {
        return $this->original;
    }

    /**
     * @param bool|null $original
     */
    public function setOriginal(?bool $original): void
    {
        $this->original = $original;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}

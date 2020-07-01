<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : ir.mail_server
 * Name : ir.mail_server
 * Info :
 * Represents an SMTP server, able to send outgoing emails, with SSL and TLS capabilities.
 */
final class MailServer extends Base
{
    public const ODOO_MODEL_NAME = 'ir.mail_server';

    /**
     * Description
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * SMTP Server
     * Hostname or IP of SMTP server
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $smtp_host;

    /**
     * SMTP Port
     * SMTP Port. Usually 465 for SSL, and 25 or 587 for other cases.
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $smtp_port;

    /**
     * Username
     * Optional username for SMTP authentication
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $smtp_user;

    /**
     * Password
     * Optional password for SMTP authentication
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $smtp_pass;

    /**
     * Connection Security
     * Choose the connection encryption scheme:
     * - None: SMTP sessions are done in cleartext.
     * - TLS (STARTTLS): TLS encryption is requested at start of SMTP session (Recommended)
     * - SSL/TLS: SMTP sessions are encrypted with SSL/TLS through a dedicated port (default: 465)
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> none (None)
     *     -> starttls (TLS (STARTTLS))
     *     -> ssl (SSL/TLS)
     *
     *
     * @var string
     */
    private $smtp_encryption;

    /**
     * Debugging
     * If enabled, the full output of SMTP sessions will be written to the server log at DEBUG level (this is very
     * verbose and may include confidential info!)
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $smtp_debug;

    /**
     * Priority
     * When no specific mail server is requested for a mail, the highest priority one is used. Default priority is 10
     * (smaller number = higher priority)
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Active
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

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
     * @param string $name Description
     *        Searchable : yes
     *        Sortable : yes
     * @param string $smtp_host SMTP Server
     *        Hostname or IP of SMTP server
     *        Searchable : yes
     *        Sortable : yes
     * @param int $smtp_port SMTP Port
     *        SMTP Port. Usually 465 for SSL, and 25 or 587 for other cases.
     *        Searchable : yes
     *        Sortable : yes
     * @param string $smtp_encryption Connection Security
     *        Choose the connection encryption scheme:
     *        - None: SMTP sessions are done in cleartext.
     *        - TLS (STARTTLS): TLS encryption is requested at start of SMTP session (Recommended)
     *        - SSL/TLS: SMTP sessions are encrypted with SSL/TLS through a dedicated port (default: 465)
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> none (None)
     *            -> starttls (TLS (STARTTLS))
     *            -> ssl (SSL/TLS)
     *
     */
    public function __construct(string $name, string $smtp_host, int $smtp_port, string $smtp_encryption)
    {
        $this->name = $name;
        $this->smtp_host = $smtp_host;
        $this->smtp_port = $smtp_port;
        $this->smtp_encryption = $smtp_encryption;
    }

    /**
     * @param bool|null $smtp_debug
     */
    public function setSmtpDebug(?bool $smtp_debug): void
    {
        $this->smtp_debug = $smtp_debug;
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
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @return bool|null
     */
    public function isSmtpDebug(): ?bool
    {
        return $this->smtp_debug;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $smtp_encryption
     */
    public function setSmtpEncryption(string $smtp_encryption): void
    {
        $this->smtp_encryption = $smtp_encryption;
    }

    /**
     * @return string
     */
    public function getSmtpEncryption(): string
    {
        return $this->smtp_encryption;
    }

    /**
     * @param string|null $smtp_pass
     */
    public function setSmtpPass(?string $smtp_pass): void
    {
        $this->smtp_pass = $smtp_pass;
    }

    /**
     * @return string|null
     */
    public function getSmtpPass(): ?string
    {
        return $this->smtp_pass;
    }

    /**
     * @param string|null $smtp_user
     */
    public function setSmtpUser(?string $smtp_user): void
    {
        $this->smtp_user = $smtp_user;
    }

    /**
     * @return string|null
     */
    public function getSmtpUser(): ?string
    {
        return $this->smtp_user;
    }

    /**
     * @param int $smtp_port
     */
    public function setSmtpPort(int $smtp_port): void
    {
        $this->smtp_port = $smtp_port;
    }

    /**
     * @return int
     */
    public function getSmtpPort(): int
    {
        return $this->smtp_port;
    }

    /**
     * @param string $smtp_host
     */
    public function setSmtpHost(string $smtp_host): void
    {
        $this->smtp_host = $smtp_host;
    }

    /**
     * @return string
     */
    public function getSmtpHost(): string
    {
        return $this->smtp_host;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }
}

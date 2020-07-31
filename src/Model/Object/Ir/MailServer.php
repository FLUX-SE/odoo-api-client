<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : ir.mail_server
 * ---
 * Name : ir.mail_server
 * ---
 * Info :
 * Represents an SMTP server, able to send outgoing emails, with SSL and TLS capabilities.
 */
final class MailServer extends Base
{
    /**
     * Description
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * SMTP Server
     * ---
     * Hostname or IP of SMTP server
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $smtp_host;

    /**
     * SMTP Port
     * ---
     * SMTP Port. Usually 465 for SSL, and 25 or 587 for other cases.
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int
     */
    private $smtp_port;

    /**
     * Username
     * ---
     * Optional username for SMTP authentication
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $smtp_user;

    /**
     * Password
     * ---
     * Optional password for SMTP authentication
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $smtp_pass;

    /**
     * Connection Security
     * ---
     * Choose the connection encryption scheme:
     * - None: SMTP sessions are done in cleartext.
     * - TLS (STARTTLS): TLS encryption is requested at start of SMTP session (Recommended)
     * - SSL/TLS: SMTP sessions are encrypted with SSL/TLS through a dedicated port (default: 465)
     * ---
     * Selection :
     *     -> none (None)
     *     -> starttls (TLS (STARTTLS))
     *     -> ssl (SSL/TLS)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $smtp_encryption;

    /**
     * Debugging
     * ---
     * If enabled, the full output of SMTP sessions will be written to the server log at DEBUG level (this is very
     * verbose and may include confidential info!)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $smtp_debug;

    /**
     * Priority
     * ---
     * When no specific mail server is requested for a mail, the highest priority one is used. Default priority is 10
     * (smaller number = higher priority)
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $sequence;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * Created by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param string $name Description
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $smtp_host SMTP Server
     *        ---
     *        Hostname or IP of SMTP server
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param int $smtp_port SMTP Port
     *        ---
     *        SMTP Port. Usually 465 for SSL, and 25 or 587 for other cases.
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $smtp_encryption Connection Security
     *        ---
     *        Choose the connection encryption scheme:
     *        - None: SMTP sessions are done in cleartext.
     *        - TLS (STARTTLS): TLS encryption is requested at start of SMTP session (Recommended)
     *        - SSL/TLS: SMTP sessions are encrypted with SSL/TLS through a dedicated port (default: 465)
     *        ---
     *        Selection :
     *            -> none (None)
     *            -> starttls (TLS (STARTTLS))
     *            -> ssl (SSL/TLS)
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $smtp_host, int $smtp_port, string $smtp_encryption)
    {
        $this->name = $name;
        $this->smtp_host = $smtp_host;
        $this->smtp_port = $smtp_port;
        $this->smtp_encryption = $smtp_encryption;
    }

    /**
     * @return int|null
     *
     * @SerializedName("sequence")
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     *
     * @SerializedName("write_date")
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
     *
     * @SerializedName("write_uid")
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
     *
     * @SerializedName("create_date")
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
     *
     * @SerializedName("create_uid")
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
     *
     * @SerializedName("active")
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
     * @param bool|null $smtp_debug
     */
    public function setSmtpDebug(?bool $smtp_debug): void
    {
        $this->smtp_debug = $smtp_debug;
    }

    /**
     * @return string
     *
     * @SerializedName("name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("smtp_debug")
     */
    public function isSmtpDebug(): ?bool
    {
        return $this->smtp_debug;
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
     *
     * @SerializedName("smtp_encryption")
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
     *
     * @SerializedName("smtp_pass")
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
     *
     * @SerializedName("smtp_user")
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
     *
     * @SerializedName("smtp_port")
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
     *
     * @SerializedName("smtp_host")
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
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'ir.mail_server';
    }
}

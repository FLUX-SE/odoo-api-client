<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.mail_server
 * Name : ir.mail_server
 * Info :
 * Represents an SMTP server, able to send outgoing emails, with SSL and TLS capabilities.
 */
final class MailServer extends Base
{
    /**
     * Description
     *
     * @var string
     */
    private $name;

    /**
     * SMTP Server
     * Hostname or IP of SMTP server
     *
     * @var string
     */
    private $smtp_host;

    /**
     * SMTP Port
     * SMTP Port. Usually 465 for SSL, and 25 or 587 for other cases.
     *
     * @var int
     */
    private $smtp_port;

    /**
     * Username
     * Optional username for SMTP authentication
     *
     * @var null|string
     */
    private $smtp_user;

    /**
     * Password
     * Optional password for SMTP authentication
     *
     * @var null|string
     */
    private $smtp_pass;

    /**
     * Connection Security
     * Choose the connection encryption scheme:
     * - None: SMTP sessions are done in cleartext.
     * - TLS (STARTTLS): TLS encryption is requested at start of SMTP session (Recommended)
     * - SSL/TLS: SMTP sessions are encrypted with SSL/TLS through a dedicated port (default: 465)
     *
     * @var array
     */
    private $smtp_encryption;

    /**
     * Debugging
     * If enabled, the full output of SMTP sessions will be written to the server log at DEBUG level (this is very
     * verbose and may include confidential info!)
     *
     * @var null|bool
     */
    private $smtp_debug;

    /**
     * Priority
     * When no specific mail server is requested for a mail, the highest priority one is used. Default priority is 10
     * (smaller number = higher priority)
     *
     * @var null|int
     */
    private $sequence;

    /**
     * Active
     *
     * @var null|bool
     */
    private $active;

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
     * @param string $name Description
     * @param string $smtp_host SMTP Server
     *        Hostname or IP of SMTP server
     * @param int $smtp_port SMTP Port
     *        SMTP Port. Usually 465 for SSL, and 25 or 587 for other cases.
     * @param array $smtp_encryption Connection Security
     *        Choose the connection encryption scheme:
     *        - None: SMTP sessions are done in cleartext.
     *        - TLS (STARTTLS): TLS encryption is requested at start of SMTP session (Recommended)
     *        - SSL/TLS: SMTP sessions are encrypted with SSL/TLS through a dedicated port (default: 465)
     */
    public function __construct(string $name, string $smtp_host, int $smtp_port, array $smtp_encryption)
    {
        $this->name = $name;
        $this->smtp_host = $smtp_host;
        $this->smtp_port = $smtp_port;
        $this->smtp_encryption = $smtp_encryption;
    }

    /**
     * @param mixed $item
     */
    public function removeSmtpEncryption($item): void
    {
        if ($this->hasSmtpEncryption($item)) {
            $index = array_search($item, $this->smtp_encryption);
            unset($this->smtp_encryption[$index]);
        }
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
     * @param null|bool $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param null|int $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param null|bool $smtp_debug
     */
    public function setSmtpDebug(?bool $smtp_debug): void
    {
        $this->smtp_debug = $smtp_debug;
    }

    /**
     * @param mixed $item
     */
    public function addSmtpEncryption($item): void
    {
        if ($this->hasSmtpEncryption($item)) {
            return;
        }

        $this->smtp_encryption[] = $item;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSmtpEncryption($item, bool $strict = true): bool
    {
        return in_array($item, $this->smtp_encryption, $strict);
    }

    /**
     * @param array $smtp_encryption
     */
    public function setSmtpEncryption(array $smtp_encryption): void
    {
        $this->smtp_encryption = $smtp_encryption;
    }

    /**
     * @param null|string $smtp_pass
     */
    public function setSmtpPass(?string $smtp_pass): void
    {
        $this->smtp_pass = $smtp_pass;
    }

    /**
     * @param null|string $smtp_user
     */
    public function setSmtpUser(?string $smtp_user): void
    {
        $this->smtp_user = $smtp_user;
    }

    /**
     * @param int $smtp_port
     */
    public function setSmtpPort(int $smtp_port): void
    {
        $this->smtp_port = $smtp_port;
    }

    /**
     * @param string $smtp_host
     */
    public function setSmtpHost(string $smtp_host): void
    {
        $this->smtp_host = $smtp_host;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}

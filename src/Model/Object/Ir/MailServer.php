<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.mail_server
 * Name : ir.mail_server
 *
 * Represents an SMTP server, able to send outgoing emails, with SSL and TLS capabilities.
 */
final class MailServer extends Base
{
    /**
     * Description
     *
     * @var null|string
     */
    private $name;

    /**
     * SMTP Server
     *
     * @var null|string
     */
    private $smtp_host;

    /**
     * SMTP Port
     *
     * @var null|int
     */
    private $smtp_port;

    /**
     * Username
     *
     * @var string
     */
    private $smtp_user;

    /**
     * Password
     *
     * @var string
     */
    private $smtp_pass;

    /**
     * Connection Security
     *
     * @var null|array
     */
    private $smtp_encryption;

    /**
     * Debugging
     *
     * @var bool
     */
    private $smtp_debug;

    /**
     * Priority
     *
     * @var int
     */
    private $sequence;

    /**
     * Active
     *
     * @var bool
     */
    private $active;

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
     * @param null|string $smtp_host
     */
    public function setSmtpHost(?string $smtp_host): void
    {
        $this->smtp_host = $smtp_host;
    }

    /**
     * @param null|int $smtp_port
     */
    public function setSmtpPort(?int $smtp_port): void
    {
        $this->smtp_port = $smtp_port;
    }

    /**
     * @param string $smtp_user
     */
    public function setSmtpUser(string $smtp_user): void
    {
        $this->smtp_user = $smtp_user;
    }

    /**
     * @param string $smtp_pass
     */
    public function setSmtpPass(string $smtp_pass): void
    {
        $this->smtp_pass = $smtp_pass;
    }

    /**
     * @param null|array $smtp_encryption
     */
    public function setSmtpEncryption(?array $smtp_encryption): void
    {
        $this->smtp_encryption = $smtp_encryption;
    }

    /**
     * @param ?array $smtp_encryption
     * @param bool $strict
     *
     * @return bool
     */
    public function hasSmtpEncryption(?array $smtp_encryption, bool $strict = true): bool
    {
        if (null === $this->smtp_encryption) {
            return false;
        }

        return in_array($smtp_encryption, $this->smtp_encryption, $strict);
    }

    /**
     * @param ?array $smtp_encryption
     */
    public function addSmtpEncryption(?array $smtp_encryption): void
    {
        if ($this->hasSmtpEncryption($smtp_encryption)) {
            return;
        }

        if (null === $this->smtp_encryption) {
            $this->smtp_encryption = [];
        }

        $this->smtp_encryption[] = $smtp_encryption;
    }

    /**
     * @param ?array $smtp_encryption
     */
    public function removeSmtpEncryption(?array $smtp_encryption): void
    {
        if ($this->hasSmtpEncryption($smtp_encryption)) {
            $index = array_search($smtp_encryption, $this->smtp_encryption);
            unset($this->smtp_encryption[$index]);
        }
    }

    /**
     * @param bool $smtp_debug
     */
    public function setSmtpDebug(bool $smtp_debug): void
    {
        $this->smtp_debug = $smtp_debug;
    }

    /**
     * @param int $sequence
     */
    public function setSequence(int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
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

<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sms;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : sms.composer
 * Name : sms.composer
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Composer extends Base
{
    /**
     * Composition Mode
     *
     * @var null|array
     */
    private $composition_mode;

    /**
     * Document Model Name
     *
     * @var string
     */
    private $res_model;

    /**
     * Document ID
     *
     * @var int
     */
    private $res_id;

    /**
     * Document IDs
     *
     * @var string
     */
    private $res_ids;

    /**
     * Visible records count
     *
     * @var int
     */
    private $res_ids_count;

    /**
     * Use active domain
     *
     * @var bool
     */
    private $use_active_domain;

    /**
     * Active domain
     *
     * @var string
     */
    private $active_domain;

    /**
     * Active records count
     *
     * @var int
     */
    private $active_domain_count;

    /**
     * Keep a note on document
     *
     * @var bool
     */
    private $mass_keep_log;

    /**
     * Send directly
     *
     * @var bool
     */
    private $mass_force_send;

    /**
     * Use blacklist
     *
     * @var bool
     */
    private $mass_use_blacklist;

    /**
     * Recipients (Partners)
     *
     * @var string
     */
    private $recipient_description;

    /**
     * # Valid recipients
     *
     * @var int
     */
    private $recipient_count;

    /**
     * # Invalid recipients
     *
     * @var int
     */
    private $recipient_invalid_count;

    /**
     * Field holding number
     *
     * @var string
     */
    private $number_field_name;

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner_ids;

    /**
     * Recipients (Numbers)
     *
     * @var string
     */
    private $numbers;

    /**
     * Sanitized Number
     *
     * @var string
     */
    private $sanitized_numbers;

    /**
     * Use Template
     *
     * @var Template
     */
    private $template_id;

    /**
     * Message
     *
     * @var null|string
     */
    private $body;

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
     * @param null|array $composition_mode
     */
    public function setCompositionMode(?array $composition_mode): void
    {
        $this->composition_mode = $composition_mode;
    }

    /**
     * @return string
     */
    public function getRecipientDescription(): string
    {
        return $this->recipient_description;
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
     * @param null|string $body
     */
    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param Template $template_id
     */
    public function setTemplateId(Template $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @return string
     */
    public function getSanitizedNumbers(): string
    {
        return $this->sanitized_numbers;
    }

    /**
     * @param string $numbers
     */
    public function setNumbers(string $numbers): void
    {
        $this->numbers = $numbers;
    }

    /**
     * @param Partner $partner_ids
     */
    public function setPartnerIds(Partner $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param string $number_field_name
     */
    public function setNumberFieldName(string $number_field_name): void
    {
        $this->number_field_name = $number_field_name;
    }

    /**
     * @return int
     */
    public function getRecipientInvalidCount(): int
    {
        return $this->recipient_invalid_count;
    }

    /**
     * @return int
     */
    public function getRecipientCount(): int
    {
        return $this->recipient_count;
    }

    /**
     * @param bool $mass_use_blacklist
     */
    public function setMassUseBlacklist(bool $mass_use_blacklist): void
    {
        $this->mass_use_blacklist = $mass_use_blacklist;
    }

    /**
     * @param ?array $composition_mode
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCompositionMode(?array $composition_mode, bool $strict = true): bool
    {
        if (null === $this->composition_mode) {
            return false;
        }

        return in_array($composition_mode, $this->composition_mode, $strict);
    }

    /**
     * @param bool $mass_force_send
     */
    public function setMassForceSend(bool $mass_force_send): void
    {
        $this->mass_force_send = $mass_force_send;
    }

    /**
     * @param bool $mass_keep_log
     */
    public function setMassKeepLog(bool $mass_keep_log): void
    {
        $this->mass_keep_log = $mass_keep_log;
    }

    /**
     * @return int
     */
    public function getActiveDomainCount(): int
    {
        return $this->active_domain_count;
    }

    /**
     * @return string
     */
    public function getActiveDomain(): string
    {
        return $this->active_domain;
    }

    /**
     * @param bool $use_active_domain
     */
    public function setUseActiveDomain(bool $use_active_domain): void
    {
        $this->use_active_domain = $use_active_domain;
    }

    /**
     * @return int
     */
    public function getResIdsCount(): int
    {
        return $this->res_ids_count;
    }

    /**
     * @param string $res_ids
     */
    public function setResIds(string $res_ids): void
    {
        $this->res_ids = $res_ids;
    }

    /**
     * @param int $res_id
     */
    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param string $res_model
     */
    public function setResModel(string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @param ?array $composition_mode
     */
    public function removeCompositionMode(?array $composition_mode): void
    {
        if ($this->hasCompositionMode($composition_mode)) {
            $index = array_search($composition_mode, $this->composition_mode);
            unset($this->composition_mode[$index]);
        }
    }

    /**
     * @param ?array $composition_mode
     */
    public function addCompositionMode(?array $composition_mode): void
    {
        if ($this->hasCompositionMode($composition_mode)) {
            return;
        }

        if (null === $this->composition_mode) {
            $this->composition_mode = [];
        }

        $this->composition_mode[] = $composition_mode;
    }

    /**
     * @return DateTimeInterface
     */
    public function getWriteDate(): DateTimeInterface
    {
        return $this->write_date;
    }
}

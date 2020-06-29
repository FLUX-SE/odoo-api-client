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
 * Info :
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
     * @var array
     */
    private $composition_mode;

    /**
     * Document Model Name
     *
     * @var null|string
     */
    private $res_model;

    /**
     * Document ID
     *
     * @var null|int
     */
    private $res_id;

    /**
     * Document IDs
     *
     * @var null|string
     */
    private $res_ids;

    /**
     * Visible records count
     * UX field computing the number of recipients in mass mode without active domain
     *
     * @var null|int
     */
    private $res_ids_count;

    /**
     * Use active domain
     *
     * @var null|bool
     */
    private $use_active_domain;

    /**
     * Active domain
     *
     * @var null|string
     */
    private $active_domain;

    /**
     * Active records count
     * UX field computing the number of recipients in mass mode based on given active domain
     *
     * @var null|int
     */
    private $active_domain_count;

    /**
     * Keep a note on document
     *
     * @var null|bool
     */
    private $mass_keep_log;

    /**
     * Send directly
     *
     * @var null|bool
     */
    private $mass_force_send;

    /**
     * Use blacklist
     *
     * @var null|bool
     */
    private $mass_use_blacklist;

    /**
     * Recipients (Partners)
     *
     * @var null|string
     */
    private $recipient_description;

    /**
     * # Valid recipients
     *
     * @var null|int
     */
    private $recipient_count;

    /**
     * # Invalid recipients
     *
     * @var null|int
     */
    private $recipient_invalid_count;

    /**
     * Field holding number
     *
     * @var null|string
     */
    private $number_field_name;

    /**
     * Partner
     *
     * @var null|Partner[]
     */
    private $partner_ids;

    /**
     * Recipients (Numbers)
     *
     * @var null|string
     */
    private $numbers;

    /**
     * Sanitized Number
     *
     * @var null|string
     */
    private $sanitized_numbers;

    /**
     * Use Template
     *
     * @var null|Template
     */
    private $template_id;

    /**
     * Message
     *
     * @var string
     */
    private $body;

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
     * @param array $composition_mode Composition Mode
     * @param string $body Message
     */
    public function __construct(array $composition_mode, string $body)
    {
        $this->composition_mode = $composition_mode;
        $this->body = $body;
    }

    /**
     * @return null|int
     */
    public function getRecipientCount(): ?int
    {
        return $this->recipient_count;
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
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @param null|Template $template_id
     */
    public function setTemplateId(?Template $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @return null|string
     */
    public function getSanitizedNumbers(): ?string
    {
        return $this->sanitized_numbers;
    }

    /**
     * @param null|string $numbers
     */
    public function setNumbers(?string $numbers): void
    {
        $this->numbers = $numbers;
    }

    /**
     * @param Partner $item
     */
    public function removePartnerIds(Partner $item): void
    {
        if (null === $this->partner_ids) {
            $this->partner_ids = [];
        }

        if ($this->hasPartnerIds($item)) {
            $index = array_search($item, $this->partner_ids);
            unset($this->partner_ids[$index]);
        }
    }

    /**
     * @param Partner $item
     */
    public function addPartnerIds(Partner $item): void
    {
        if ($this->hasPartnerIds($item)) {
            return;
        }

        if (null === $this->partner_ids) {
            $this->partner_ids = [];
        }

        $this->partner_ids[] = $item;
    }

    /**
     * @param Partner $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasPartnerIds(Partner $item, bool $strict = true): bool
    {
        if (null === $this->partner_ids) {
            return false;
        }

        return in_array($item, $this->partner_ids, $strict);
    }

    /**
     * @param null|Partner[] $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param null|string $number_field_name
     */
    public function setNumberFieldName(?string $number_field_name): void
    {
        $this->number_field_name = $number_field_name;
    }

    /**
     * @return null|int
     */
    public function getRecipientInvalidCount(): ?int
    {
        return $this->recipient_invalid_count;
    }

    /**
     * @return null|string
     */
    public function getRecipientDescription(): ?string
    {
        return $this->recipient_description;
    }

    /**
     * @param array $composition_mode
     */
    public function setCompositionMode(array $composition_mode): void
    {
        $this->composition_mode = $composition_mode;
    }

    /**
     * @param null|bool $mass_use_blacklist
     */
    public function setMassUseBlacklist(?bool $mass_use_blacklist): void
    {
        $this->mass_use_blacklist = $mass_use_blacklist;
    }

    /**
     * @param null|bool $mass_force_send
     */
    public function setMassForceSend(?bool $mass_force_send): void
    {
        $this->mass_force_send = $mass_force_send;
    }

    /**
     * @param null|bool $mass_keep_log
     */
    public function setMassKeepLog(?bool $mass_keep_log): void
    {
        $this->mass_keep_log = $mass_keep_log;
    }

    /**
     * @return null|int
     */
    public function getActiveDomainCount(): ?int
    {
        return $this->active_domain_count;
    }

    /**
     * @return null|string
     */
    public function getActiveDomain(): ?string
    {
        return $this->active_domain;
    }

    /**
     * @param null|bool $use_active_domain
     */
    public function setUseActiveDomain(?bool $use_active_domain): void
    {
        $this->use_active_domain = $use_active_domain;
    }

    /**
     * @return null|int
     */
    public function getResIdsCount(): ?int
    {
        return $this->res_ids_count;
    }

    /**
     * @param null|string $res_ids
     */
    public function setResIds(?string $res_ids): void
    {
        $this->res_ids = $res_ids;
    }

    /**
     * @param null|int $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @param null|string $res_model
     */
    public function setResModel(?string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @param mixed $item
     */
    public function removeCompositionMode($item): void
    {
        if ($this->hasCompositionMode($item)) {
            $index = array_search($item, $this->composition_mode);
            unset($this->composition_mode[$index]);
        }
    }

    /**
     * @param mixed $item
     */
    public function addCompositionMode($item): void
    {
        if ($this->hasCompositionMode($item)) {
            return;
        }

        $this->composition_mode[] = $item;
    }

    /**
     * @param mixed $item
     * @param bool $strict
     *
     * @return bool
     */
    public function hasCompositionMode($item, bool $strict = true): bool
    {
        return in_array($item, $this->composition_mode, $strict);
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}

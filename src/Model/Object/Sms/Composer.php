<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sms;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : sms.composer
 * Name : sms.composer
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Composer extends Base
{
    /**
     * Composition Mode
     * Searchable : yes
     * Sortable : yes
     * Selection : (default value, usually null)
     *     -> numbers (Send to numbers)
     *     -> comment (Post on a document)
     *     -> mass (Send SMS in batch)
     *
     *
     * @var string
     */
    private $composition_mode;

    /**
     * Document Model Name
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_model;

    /**
     * Document ID
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $res_id;

    /**
     * Document IDs
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $res_ids;

    /**
     * Visible records count
     * UX field computing the number of recipients in mass mode without active domain
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $res_ids_count;

    /**
     * Use active domain
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $use_active_domain;

    /**
     * Active domain
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $active_domain;

    /**
     * Active records count
     * UX field computing the number of recipients in mass mode based on given active domain
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $active_domain_count;

    /**
     * Keep a note on document
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $mass_keep_log;

    /**
     * Send directly
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $mass_force_send;

    /**
     * Use blacklist
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $mass_use_blacklist;

    /**
     * Recipients (Partners)
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $recipient_description;

    /**
     * # Valid recipients
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $recipient_count;

    /**
     * # Invalid recipients
     * Searchable : no
     * Sortable : no
     *
     * @var int|null
     */
    private $recipient_invalid_count;

    /**
     * Field holding number
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $number_field_name;

    /**
     * Partner
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $partner_ids;

    /**
     * Recipients (Numbers)
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $numbers;

    /**
     * Sanitized Number
     * Searchable : no
     * Sortable : no
     *
     * @var string|null
     */
    private $sanitized_numbers;

    /**
     * Use Template
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $template_id;

    /**
     * Message
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $body;

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
     * @param string $composition_mode Composition Mode
     *        Searchable : yes
     *        Sortable : yes
     *        Selection : (default value, usually null)
     *            -> numbers (Send to numbers)
     *            -> comment (Post on a document)
     *            -> mass (Send SMS in batch)
     *
     * @param string $body Message
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $composition_mode, string $body)
    {
        $this->composition_mode = $composition_mode;
        $this->body = $body;
    }

    /**
     * @param string|null $sanitized_numbers
     */
    public function setSanitizedNumbers(?string $sanitized_numbers): void
    {
        $this->sanitized_numbers = $sanitized_numbers;
    }

    /**
     * @return string|null
     */
    public function getNumberFieldName(): ?string
    {
        return $this->number_field_name;
    }

    /**
     * @param string|null $number_field_name
     */
    public function setNumberFieldName(?string $number_field_name): void
    {
        $this->number_field_name = $number_field_name;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getPartnerIds(): ?array
    {
        return $this->partner_ids;
    }

    /**
     * @param OdooRelation[]|null $partner_ids
     */
    public function setPartnerIds(?array $partner_ids): void
    {
        $this->partner_ids = $partner_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasPartnerIds(OdooRelation $item): bool
    {
        if (null === $this->partner_ids) {
            return false;
        }

        return in_array($item, $this->partner_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addPartnerIds(OdooRelation $item): void
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
     * @param OdooRelation $item
     */
    public function removePartnerIds(OdooRelation $item): void
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
     * @return string|null
     */
    public function getNumbers(): ?string
    {
        return $this->numbers;
    }

    /**
     * @param string|null $numbers
     */
    public function setNumbers(?string $numbers): void
    {
        $this->numbers = $numbers;
    }

    /**
     * @return string|null
     */
    public function getSanitizedNumbers(): ?string
    {
        return $this->sanitized_numbers;
    }

    /**
     * @return OdooRelation|null
     */
    public function getTemplateId(): ?OdooRelation
    {
        return $this->template_id;
    }

    /**
     * @return int|null
     */
    public function getRecipientInvalidCount(): ?int
    {
        return $this->recipient_invalid_count;
    }

    /**
     * @param OdooRelation|null $template_id
     */
    public function setTemplateId(?OdooRelation $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @param int|null $recipient_invalid_count
     */
    public function setRecipientInvalidCount(?int $recipient_invalid_count): void
    {
        $this->recipient_invalid_count = $recipient_invalid_count;
    }

    /**
     * @param int|null $recipient_count
     */
    public function setRecipientCount(?int $recipient_count): void
    {
        $this->recipient_count = $recipient_count;
    }

    /**
     * @return string
     */
    public function getCompositionMode(): string
    {
        return $this->composition_mode;
    }

    /**
     * @param bool|null $use_active_domain
     */
    public function setUseActiveDomain(?bool $use_active_domain): void
    {
        $this->use_active_domain = $use_active_domain;
    }

    /**
     * @param string $composition_mode
     */
    public function setCompositionMode(string $composition_mode): void
    {
        $this->composition_mode = $composition_mode;
    }

    /**
     * @return string|null
     */
    public function getResModel(): ?string
    {
        return $this->res_model;
    }

    /**
     * @param string|null $res_model
     */
    public function setResModel(?string $res_model): void
    {
        $this->res_model = $res_model;
    }

    /**
     * @return int|null
     */
    public function getResId(): ?int
    {
        return $this->res_id;
    }

    /**
     * @param int|null $res_id
     */
    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    /**
     * @return string|null
     */
    public function getResIds(): ?string
    {
        return $this->res_ids;
    }

    /**
     * @param string|null $res_ids
     */
    public function setResIds(?string $res_ids): void
    {
        $this->res_ids = $res_ids;
    }

    /**
     * @return int|null
     */
    public function getResIdsCount(): ?int
    {
        return $this->res_ids_count;
    }

    /**
     * @param int|null $res_ids_count
     */
    public function setResIdsCount(?int $res_ids_count): void
    {
        $this->res_ids_count = $res_ids_count;
    }

    /**
     * @return bool|null
     */
    public function isUseActiveDomain(): ?bool
    {
        return $this->use_active_domain;
    }

    /**
     * @return string|null
     */
    public function getActiveDomain(): ?string
    {
        return $this->active_domain;
    }

    /**
     * @return int|null
     */
    public function getRecipientCount(): ?int
    {
        return $this->recipient_count;
    }

    /**
     * @param string|null $active_domain
     */
    public function setActiveDomain(?string $active_domain): void
    {
        $this->active_domain = $active_domain;
    }

    /**
     * @return int|null
     */
    public function getActiveDomainCount(): ?int
    {
        return $this->active_domain_count;
    }

    /**
     * @param int|null $active_domain_count
     */
    public function setActiveDomainCount(?int $active_domain_count): void
    {
        $this->active_domain_count = $active_domain_count;
    }

    /**
     * @return bool|null
     */
    public function isMassKeepLog(): ?bool
    {
        return $this->mass_keep_log;
    }

    /**
     * @param bool|null $mass_keep_log
     */
    public function setMassKeepLog(?bool $mass_keep_log): void
    {
        $this->mass_keep_log = $mass_keep_log;
    }

    /**
     * @return bool|null
     */
    public function isMassForceSend(): ?bool
    {
        return $this->mass_force_send;
    }

    /**
     * @param bool|null $mass_force_send
     */
    public function setMassForceSend(?bool $mass_force_send): void
    {
        $this->mass_force_send = $mass_force_send;
    }

    /**
     * @return bool|null
     */
    public function isMassUseBlacklist(): ?bool
    {
        return $this->mass_use_blacklist;
    }

    /**
     * @param bool|null $mass_use_blacklist
     */
    public function setMassUseBlacklist(?bool $mass_use_blacklist): void
    {
        $this->mass_use_blacklist = $mass_use_blacklist;
    }

    /**
     * @return string|null
     */
    public function getRecipientDescription(): ?string
    {
        return $this->recipient_description;
    }

    /**
     * @param string|null $recipient_description
     */
    public function setRecipientDescription(?string $recipient_description): void
    {
        $this->recipient_description = $recipient_description;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sms.composer';
    }
}

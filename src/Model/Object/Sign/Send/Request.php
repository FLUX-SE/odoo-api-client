<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Sign\Send;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : sign.send.request
 * ---
 * Name : sign.send.request
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Request extends Base
{
    /**
     * Template
     * ---
     * Relation : many2one (sign.template)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $template_id;

    /**
     * Signers
     * ---
     * Relation : one2many (sign.send.request.signer -> sign_send_request_id)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Send\Request\Signer
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $signer_ids;

    /**
     * Send To
     * ---
     * Relation : many2one (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $signer_id;

    /**
     * Signers Count
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var int|null
     */
    private $signers_count;

    /**
     * Copy to
     * ---
     * Relation : many2many (res.partner)
     * @see \Flux\OdooApiClient\Model\Object\Res\Partner
     * ---
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $follower_ids;

    /**
     * Is User Signer
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var bool|null
     */
    private $is_user_signer;

    /**
     * Subject
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $subject;

    /**
     * Message
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $message;

    /**
     * Filename
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $filename;

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
     * @param OdooRelation $template_id Template
     *        ---
     *        Relation : many2one (sign.template)
     *        @see \Flux\OdooApiClient\Model\Object\Sign\Template
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $subject Subject
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $filename Filename
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(OdooRelation $template_id, string $subject, string $filename)
    {
        $this->template_id = $template_id;
        $this->subject = $subject;
        $this->filename = $filename;
    }

    /**
     * @param bool|null $is_user_signer
     */
    public function setIsUserSigner(?bool $is_user_signer): void
    {
        $this->is_user_signer = $is_user_signer;
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
     * @param string $filename
     */
    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }

    /**
     * @return string
     *
     * @SerializedName("filename")
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string|null
     *
     * @SerializedName("message")
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     *
     * @SerializedName("subject")
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("is_user_signer")
     */
    public function isIsUserSigner(): ?bool
    {
        return $this->is_user_signer;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("template_id")
     */
    public function getTemplateId(): OdooRelation
    {
        return $this->template_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("signer_id")
     */
    public function getSignerId(): ?OdooRelation
    {
        return $this->signer_id;
    }

    /**
     * @param OdooRelation $template_id
     */
    public function setTemplateId(OdooRelation $template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("signer_ids")
     */
    public function getSignerIds(): ?array
    {
        return $this->signer_ids;
    }

    /**
     * @param OdooRelation[]|null $signer_ids
     */
    public function setSignerIds(?array $signer_ids): void
    {
        $this->signer_ids = $signer_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasSignerIds(OdooRelation $item): bool
    {
        if (null === $this->signer_ids) {
            return false;
        }

        return in_array($item, $this->signer_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addSignerIds(OdooRelation $item): void
    {
        if ($this->hasSignerIds($item)) {
            return;
        }

        if (null === $this->signer_ids) {
            $this->signer_ids = [];
        }

        $this->signer_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeSignerIds(OdooRelation $item): void
    {
        if (null === $this->signer_ids) {
            $this->signer_ids = [];
        }

        if ($this->hasSignerIds($item)) {
            $index = array_search($item, $this->signer_ids);
            unset($this->signer_ids[$index]);
        }
    }

    /**
     * @param OdooRelation|null $signer_id
     */
    public function setSignerId(?OdooRelation $signer_id): void
    {
        $this->signer_id = $signer_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeFollowerIds(OdooRelation $item): void
    {
        if (null === $this->follower_ids) {
            $this->follower_ids = [];
        }

        if ($this->hasFollowerIds($item)) {
            $index = array_search($item, $this->follower_ids);
            unset($this->follower_ids[$index]);
        }
    }

    /**
     * @return int|null
     *
     * @SerializedName("signers_count")
     */
    public function getSignersCount(): ?int
    {
        return $this->signers_count;
    }

    /**
     * @param int|null $signers_count
     */
    public function setSignersCount(?int $signers_count): void
    {
        $this->signers_count = $signers_count;
    }

    /**
     * @return OdooRelation[]|null
     *
     * @SerializedName("follower_ids")
     */
    public function getFollowerIds(): ?array
    {
        return $this->follower_ids;
    }

    /**
     * @param OdooRelation[]|null $follower_ids
     */
    public function setFollowerIds(?array $follower_ids): void
    {
        $this->follower_ids = $follower_ids;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasFollowerIds(OdooRelation $item): bool
    {
        if (null === $this->follower_ids) {
            return false;
        }

        return in_array($item, $this->follower_ids);
    }

    /**
     * @param OdooRelation $item
     */
    public function addFollowerIds(OdooRelation $item): void
    {
        if ($this->hasFollowerIds($item)) {
            return;
        }

        if (null === $this->follower_ids) {
            $this->follower_ids = [];
        }

        $this->follower_ids[] = $item;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'sign.send.request';
    }
}

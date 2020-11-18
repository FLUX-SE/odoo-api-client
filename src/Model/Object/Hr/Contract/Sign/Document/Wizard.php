<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Hr\Contract\Sign\Document;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : hr.contract.sign.document.wizard
 * ---
 * Name : hr.contract.sign.document.wizard
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Wizard extends Base
{
    /**
     * Contract
     * ---
     * Relation : many2one (hr.contract)
     * @see \Flux\OdooApiClient\Model\Object\Hr\Contract
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $contract_id;

    /**
     * Employee
     * ---
     * Relation : many2one (hr.employee)
     * @see \Flux\OdooApiClient\Model\Object\Hr\Employee
     * ---
     * Searchable : no
     * Sortable : no
     *
     * @var OdooRelation|null
     */
    private $employee_id;

    /**
     * Responsible
     * ---
     * Relation : many2one (res.users)
     * @see \Flux\OdooApiClient\Model\Object\Res\Users
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $responsible_id;

    /**
     * Employee Role
     * ---
     * Relation : many2one (sign.item.role)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Item\Role
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $employee_role_id;

    /**
     * Document to Sign
     * ---
     * Document that the employee will have to sign.
     * ---
     * Relation : many2one (sign.template)
     * @see \Flux\OdooApiClient\Model\Object\Sign\Template
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $sign_template_id;

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
     * @param OdooRelation $responsible_id Responsible
     *        ---
     *        Relation : many2one (res.users)
     *        @see \Flux\OdooApiClient\Model\Object\Res\Users
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $employee_role_id Employee Role
     *        ---
     *        Relation : many2one (sign.item.role)
     *        @see \Flux\OdooApiClient\Model\Object\Sign\Item\Role
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $sign_template_id Document to Sign
     *        ---
     *        Document that the employee will have to sign.
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
     */
    public function __construct(
        OdooRelation $responsible_id,
        OdooRelation $employee_role_id,
        OdooRelation $sign_template_id,
        string $subject
    ) {
        $this->responsible_id = $responsible_id;
        $this->employee_role_id = $employee_role_id;
        $this->sign_template_id = $sign_template_id;
        $this->subject = $subject;
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
     * @param OdooRelation[]|null $follower_ids
     */
    public function setFollowerIds(?array $follower_ids): void
    {
        $this->follower_ids = $follower_ids;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("contract_id")
     */
    public function getContractId(): ?OdooRelation
    {
        return $this->contract_id;
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
     * @param OdooRelation $sign_template_id
     */
    public function setSignTemplateId(OdooRelation $sign_template_id): void
    {
        $this->sign_template_id = $sign_template_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("sign_template_id")
     */
    public function getSignTemplateId(): OdooRelation
    {
        return $this->sign_template_id;
    }

    /**
     * @param OdooRelation $employee_role_id
     */
    public function setEmployeeRoleId(OdooRelation $employee_role_id): void
    {
        $this->employee_role_id = $employee_role_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("employee_role_id")
     */
    public function getEmployeeRoleId(): OdooRelation
    {
        return $this->employee_role_id;
    }

    /**
     * @param OdooRelation $responsible_id
     */
    public function setResponsibleId(OdooRelation $responsible_id): void
    {
        $this->responsible_id = $responsible_id;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("responsible_id")
     */
    public function getResponsibleId(): OdooRelation
    {
        return $this->responsible_id;
    }

    /**
     * @param OdooRelation|null $employee_id
     */
    public function setEmployeeId(?OdooRelation $employee_id): void
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @return OdooRelation|null
     *
     * @SerializedName("employee_id")
     */
    public function getEmployeeId(): ?OdooRelation
    {
        return $this->employee_id;
    }

    /**
     * @param OdooRelation|null $contract_id
     */
    public function setContractId(?OdooRelation $contract_id): void
    {
        $this->contract_id = $contract_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'hr.contract.sign.document.wizard';
    }
}

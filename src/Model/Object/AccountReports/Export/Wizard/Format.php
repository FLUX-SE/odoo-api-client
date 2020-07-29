<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\AccountReports\Export\Wizard;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : account_reports.export.wizard.format
 * ---
 * Name : account_reports.export.wizard.format
 * ---
 * Info :
 * Model super-class for transient records, meant to be temporarily
 *         persistent, and regularly vacuum-cleaned.
 *
 *         A TransientModel has a simplified access rights management, all users can
 *         create new records, and may only access the records they created. The
 *         superuser has unrestricted access to all TransientModel records.
 */
final class Format extends Base
{
    /**
     * Name
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $name;

    /**
     * Function to Call
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string
     */
    private $fun_to_call;

    /**
     * Parent Wizard
     * ---
     * Relation : many2one (account_reports.export.wizard)
     * @see \Flux\OdooApiClient\Model\Object\AccountReports\Export\Wizard
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $export_wizard_id;

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
     * @param string $name Name
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param string $fun_to_call Function to Call
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $export_wizard_id Parent Wizard
     *        ---
     *        Relation : many2one (account_reports.export.wizard)
     *        @see \Flux\OdooApiClient\Model\Object\AccountReports\Export\Wizard
     *        ---
     *        Searchable : yes
     *        Sortable : yes
     */
    public function __construct(string $name, string $fun_to_call, OdooRelation $export_wizard_id)
    {
        $this->name = $name;
        $this->fun_to_call = $fun_to_call;
        $this->export_wizard_id = $export_wizard_id;
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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     *
     * @SerializedName("fun_to_call")
     */
    public function getFunToCall(): string
    {
        return $this->fun_to_call;
    }

    /**
     * @param string $fun_to_call
     */
    public function setFunToCall(string $fun_to_call): void
    {
        $this->fun_to_call = $fun_to_call;
    }

    /**
     * @return OdooRelation
     *
     * @SerializedName("export_wizard_id")
     */
    public function getExportWizardId(): OdooRelation
    {
        return $this->export_wizard_id;
    }

    /**
     * @param OdooRelation $export_wizard_id
     */
    public function setExportWizardId(OdooRelation $export_wizard_id): void
    {
        $this->export_wizard_id = $export_wizard_id;
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
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
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
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
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
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
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
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'account_reports.export.wizard.format';
    }
}

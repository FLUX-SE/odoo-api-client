<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\AccountReports\Export\Wizard;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\AccountReports\Export\Wizard;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : account_reports.export.wizard.format
 * Name : account_reports.export.wizard.format
 *
 * Model super-class for transient records, meant to be temporarily
 * persistent, and regularly vacuum-cleaned.
 *
 * A TransientModel has a simplified access rights management, all users can
 * create new records, and may only access the records they created. The
 * superuser has unrestricted access to all TransientModel records.
 */
final class Format extends Base
{
    /**
     * Name
     *
     * @var null|string
     */
    private $name;

    /**
     * Function to Call
     *
     * @var null|string
     */
    private $fun_to_call;

    /**
     * Parent Wizard
     *
     * @var null|Wizard
     */
    private $export_wizard_id;

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
     * @param null|string $fun_to_call
     */
    public function setFunToCall(?string $fun_to_call): void
    {
        $this->fun_to_call = $fun_to_call;
    }

    /**
     * @param null|Wizard $export_wizard_id
     */
    public function setExportWizardId(Wizard $export_wizard_id): void
    {
        $this->export_wizard_id = $export_wizard_id;
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

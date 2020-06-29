<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Ir\Ui\View;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Ir\Ui\View;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : ir.ui.view.custom
 * Name : ir.ui.view.custom
 * Info :
 * Main super-class for regular database-persisted Odoo models.
 *
 * Odoo models are created by inheriting from this class::
 *
 * class user(Model):
 * ...
 *
 * The system will later instantiate the class once per database (on
 * which the class' module is installed).
 */
final class Custom extends Base
{
    /**
     * Original View
     *
     * @var View
     */
    private $ref_id;

    /**
     * User
     *
     * @var Users
     */
    private $user_id;

    /**
     * View Architecture
     *
     * @var string
     */
    private $arch;

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
     * @param View $ref_id Original View
     * @param Users $user_id User
     * @param string $arch View Architecture
     */
    public function __construct(View $ref_id, Users $user_id, string $arch)
    {
        $this->ref_id = $ref_id;
        $this->user_id = $user_id;
        $this->arch = $arch;
    }

    /**
     * @param View $ref_id
     */
    public function setRefId(View $ref_id): void
    {
        $this->ref_id = $ref_id;
    }

    /**
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param string $arch
     */
    public function setArch(string $arch): void
    {
        $this->arch = $arch;
    }

    /**
     * @return null|Users
     */
    public function getCreateUid(): ?Users
    {
        return $this->create_uid;
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
    public function getWriteUid(): ?Users
    {
        return $this->write_uid;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }
}

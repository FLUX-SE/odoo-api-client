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
 *
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
     * @var null|View
     */
    private $ref_id;

    /**
     * User
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * View Architecture
     *
     * @var null|string
     */
    private $arch;

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
     * @param null|View $ref_id
     */
    public function setRefId(View $ref_id): void
    {
        $this->ref_id = $ref_id;
    }

    /**
     * @param null|Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param null|string $arch
     */
    public function setArch(?string $arch): void
    {
        $this->arch = $arch;
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

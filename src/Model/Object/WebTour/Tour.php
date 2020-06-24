<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\WebTour;

use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : web_tour.tour
 * Name : web_tour.tour
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
final class Tour extends Base
{
    /**
     * Tour name
     *
     * @var null|string
     */
    private $name;

    /**
     * Consumed by
     *
     * @var Users
     */
    private $user_id;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Users $user_id
     */
    public function setUserId(Users $user_id): void
    {
        $this->user_id = $user_id;
    }
}

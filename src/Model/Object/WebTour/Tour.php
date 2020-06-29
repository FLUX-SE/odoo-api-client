<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\WebTour;

use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Users;

/**
 * Odoo model : web_tour.tour
 * Name : web_tour.tour
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
final class Tour extends Base
{
    /**
     * Tour name
     *
     * @var string
     */
    private $name;

    /**
     * Consumed by
     *
     * @var null|Users
     */
    private $user_id;

    /**
     * @param string $name Tour name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|Users $user_id
     */
    public function setUserId(?Users $user_id): void
    {
        $this->user_id = $user_id;
    }
}

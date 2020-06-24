<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource;

use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;

/**
 * Odoo model : resource.mixin
 * Name : resource.mixin
 *
 * The base model, which is implicitly inherited by all models.
 */
final class Mixin extends Base
{
    /**
     * Resource
     *
     * @var null|Resource
     */
    private $resource_id;

    /**
     * Company
     *
     * @var Company
     */
    private $company_id;

    /**
     * Working Hours
     *
     * @var Calendar
     */
    private $resource_calendar_id;

    /**
     * Timezone
     *
     * @var array
     */
    private $tz;

    /**
     * @return null|Resource
     */
    public function getResourceId(): Resource
    {
        return $this->resource_id;
    }

    /**
     * @return Company
     */
    public function getCompanyId(): Company
    {
        return $this->company_id;
    }

    /**
     * @return Calendar
     */
    public function getResourceCalendarId(): Calendar
    {
        return $this->resource_calendar_id;
    }

    /**
     * @return array
     */
    public function getTz(): array
    {
        return $this->tz;
    }
}

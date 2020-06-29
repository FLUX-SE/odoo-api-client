<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Resource_;

use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\Object\Res\Company;

/**
 * Odoo model : resource.mixin
 * Name : resource.mixin
 * Info :
 * The base model, which is implicitly inherited by all models.
 */
final class Mixin extends Base
{
    /**
     * Resource
     *
     * @var Resource_
     */
    private $resource_id;

    /**
     * Company
     *
     * @var null|Company
     */
    private $company_id;

    /**
     * Working Hours
     * Define the schedule of resource
     *
     * @var null|Calendar
     */
    private $resource_calendar_id;

    /**
     * Timezone
     * This field is used in order to define in which timezone the resources will work.
     *
     * @var null|array
     */
    private $tz;

    /**
     * @param Resource_ $resource_id Resource
     */
    public function __construct(Resource_ $resource_id)
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @return Resource_
     */
    public function getResourceId(): Resource_
    {
        return $this->resource_id;
    }

    /**
     * @return null|Company
     */
    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    /**
     * @return null|Calendar
     */
    public function getResourceCalendarId(): ?Calendar
    {
        return $this->resource_calendar_id;
    }

    /**
     * @return null|array
     */
    public function getTz(): ?array
    {
        return $this->tz;
    }
}

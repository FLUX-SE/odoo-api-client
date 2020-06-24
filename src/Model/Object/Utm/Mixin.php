<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Utm;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : utm.mixin
 * Name : utm.mixin
 *
 * Mixin class for objects which can be tracked by marketing.
 */
final class Mixin extends Base
{
    /**
     * Campaign
     *
     * @var Campaign
     */
    private $campaign_id;

    /**
     * Source
     *
     * @var Source
     */
    private $source_id;

    /**
     * Medium
     *
     * @var Medium
     */
    private $medium_id;

    /**
     * @return Campaign
     */
    public function getCampaignId(): Campaign
    {
        return $this->campaign_id;
    }

    /**
     * @return Source
     */
    public function getSourceId(): Source
    {
        return $this->source_id;
    }

    /**
     * @return Medium
     */
    public function getMediumId(): Medium
    {
        return $this->medium_id;
    }
}

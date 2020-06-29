<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Utm;

use Flux\OdooApiClient\Model\Object\Base;

/**
 * Odoo model : utm.mixin
 * Name : utm.mixin
 * Info :
 * Mixin class for objects which can be tracked by marketing.
 */
final class Mixin extends Base
{
    /**
     * Campaign
     * This is a name that helps you keep track of your different campaign efforts, e.g. Fall_Drive,
     * Christmas_Special
     *
     * @var null|Campaign
     */
    private $campaign_id;

    /**
     * Source
     * This is the source of the link, e.g. Search Engine, another domain, or name of email list
     *
     * @var null|Source
     */
    private $source_id;

    /**
     * Medium
     * This is the method of delivery, e.g. Postcard, Email, or Banner Ad
     *
     * @var null|Medium
     */
    private $medium_id;

    /**
     * @return null|Campaign
     */
    public function getCampaignId(): ?Campaign
    {
        return $this->campaign_id;
    }

    /**
     * @return null|Source
     */
    public function getSourceId(): ?Source
    {
        return $this->source_id;
    }

    /**
     * @return null|Medium
     */
    public function getMediumId(): ?Medium
    {
        return $this->medium_id;
    }
}

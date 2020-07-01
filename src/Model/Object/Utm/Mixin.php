<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Utm;

use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : utm.mixin
 * Name : utm.mixin
 * Info :
 * Mixin class for objects which can be tracked by marketing.
 */
final class Mixin extends Base
{
    public const ODOO_MODEL_NAME = 'utm.mixin';

    /**
     * Campaign
     * This is a name that helps you keep track of your different campaign efforts, e.g. Fall_Drive,
     * Christmas_Special
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $campaign_id;

    /**
     * Source
     * This is the source of the link, e.g. Search Engine, another domain, or name of email list
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $source_id;

    /**
     * Medium
     * This is the method of delivery, e.g. Postcard, Email, or Banner Ad
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $medium_id;

    /**
     * @return OdooRelation|null
     */
    public function getCampaignId(): ?OdooRelation
    {
        return $this->campaign_id;
    }

    /**
     * @param OdooRelation|null $campaign_id
     */
    public function setCampaignId(?OdooRelation $campaign_id): void
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getSourceId(): ?OdooRelation
    {
        return $this->source_id;
    }

    /**
     * @param OdooRelation|null $source_id
     */
    public function setSourceId(?OdooRelation $source_id): void
    {
        $this->source_id = $source_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getMediumId(): ?OdooRelation
    {
        return $this->medium_id;
    }

    /**
     * @param OdooRelation|null $medium_id
     */
    public function setMediumId(?OdooRelation $medium_id): void
    {
        $this->medium_id = $medium_id;
    }
}

<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\Google\Calendar;

use Flux\OdooApiClient\Model\Object\Base;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Odoo model : google.calendar.sync
 * ---
 * Name : google.calendar.sync
 * ---
 * Info :
 * Updates the base class to support setting xids directly in create by
 *         providing an "id" key (otherwise stripped by create) during an import
 *         (which should strip 'id' from the input data anyway)
 */
final class Sync extends Base
{
    /**
     * Google Calendar Id
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var string|null
     */
    private $google_id;

    /**
     * Need Sync
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $need_sync;

    /**
     * Active
     * ---
     * Searchable : yes
     * Sortable : yes
     *
     * @var bool|null
     */
    private $active;

    /**
     * @return string|null
     *
     * @SerializedName("google_id")
     */
    public function getGoogleId(): ?string
    {
        return $this->google_id;
    }

    /**
     * @param string|null $google_id
     */
    public function setGoogleId(?string $google_id): void
    {
        $this->google_id = $google_id;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("need_sync")
     */
    public function isNeedSync(): ?bool
    {
        return $this->need_sync;
    }

    /**
     * @param bool|null $need_sync
     */
    public function setNeedSync(?bool $need_sync): void
    {
        $this->need_sync = $need_sync;
    }

    /**
     * @return bool|null
     *
     * @SerializedName("active")
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'google.calendar.sync';
    }
}

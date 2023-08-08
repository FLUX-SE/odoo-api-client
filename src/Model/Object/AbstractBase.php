<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Model\Object;

use DateTimeInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

abstract class AbstractBase implements BaseObjectInterface
{
    /**
     * ID
     * ---
     * Searchable : yes
     * Sortable : yes
     */
    protected int|null|false $id;

    /**
     * Display Name
     * ---
     * Searchable : no
     * Sortable : no
     */
    protected string|null $display_name;

    /**
     * Last Modified on
     * ---
     * Searchable : no
     * Sortable : no
     */
    protected ?DateTimeInterface $__last_update;

    public function getId(): int|null|false
    {
        return $this->id;
    }

    public function setId(int|null|false $id): void
    {
        $this->id = $id;
    }

    public function getDisplayName(): ?string
    {
        return $this->display_name;
    }

    public function setDisplayName(?string $display_name): void
    {
        $this->display_name = $display_name;
    }

    /**
     * @SerializedName("__last_update")
     */
    public function getLastUpdate(): ?DateTimeInterface
    {
        return $this->__last_update;
    }

    /**
     */
    public function setLastUpdate(?DateTimeInterface $__last_update): void
    {
        $this->__last_update = $__last_update;
    }
}

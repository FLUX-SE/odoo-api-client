<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Model\Object;

abstract class AbstractBase implements BaseObjectInterface
{
    /**
     * ID
     * ---
     * Searchable : yes
     * Sortable : yes
     */
    protected int|null|false $id = null;

    /**
     * Display Name
     * ---
     * Searchable : no
     * Sortable : no
     */
    protected string|null $display_name = null;

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
}

<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Model\Object\L10nEuService;

use DateTimeInterface;
use Flux\OdooApiClient\Model\Object\Base;
use Flux\OdooApiClient\Model\OdooRelation;

/**
 * Odoo model : l10n_eu_service.wizard
 * Name : l10n_eu_service.wizard
 * Info :
 * Create fiscal positions for EU Service VAT
 */
final class Wizard extends Base
{
    /**
     * Company
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $company_id;

    /**
     * Fiscal Position
     * Optional fiscal position to use as template for general account mapping. Should usually be your current
     * Intra-EU B2B fiscal position. If not set, no general account mapping will be configured for EU fiscal
     * positions.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $fiscal_position_id;

    /**
     * Service VAT
     * Select your current VAT tax for services. This is the tax that will be mapped to the corresponding VAT tax in
     * each EU country selected below.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation
     */
    private $tax_id;

    /**
     * Tax Collection Account
     * Optional account to use for collecting tax amounts when selling services in each EU country selected below. If
     * not set, the current collecting account of your Service VAT will be used.
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $account_collected_id;

    /**
     * Already Supported
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]|null
     */
    private $done_country_ids;

    /**
     * EU Customers From
     * Searchable : yes
     * Sortable : no
     *
     * @var OdooRelation[]
     */
    private $todo_country_ids;

    /**
     * Created by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $create_uid;

    /**
     * Created on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $create_date;

    /**
     * Last Updated by
     * Searchable : yes
     * Sortable : yes
     *
     * @var OdooRelation|null
     */
    private $write_uid;

    /**
     * Last Updated on
     * Searchable : yes
     * Sortable : yes
     *
     * @var DateTimeInterface|null
     */
    private $write_date;

    /**
     * @param OdooRelation $company_id Company
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation $tax_id Service VAT
     *        Select your current VAT tax for services. This is the tax that will be mapped to the corresponding VAT tax in
     *        each EU country selected below.
     *        Searchable : yes
     *        Sortable : yes
     * @param OdooRelation[] $todo_country_ids EU Customers From
     *        Searchable : yes
     *        Sortable : no
     */
    public function __construct(OdooRelation $company_id, OdooRelation $tax_id, array $todo_country_ids)
    {
        $this->company_id = $company_id;
        $this->tax_id = $tax_id;
        $this->todo_country_ids = $todo_country_ids;
    }

    /**
     * @param OdooRelation[] $todo_country_ids
     */
    public function setTodoCountryIds(array $todo_country_ids): void
    {
        $this->todo_country_ids = $todo_country_ids;
    }

    /**
     * @param DateTimeInterface|null $write_date
     */
    public function setWriteDate(?DateTimeInterface $write_date): void
    {
        $this->write_date = $write_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getWriteDate(): ?DateTimeInterface
    {
        return $this->write_date;
    }

    /**
     * @param OdooRelation|null $write_uid
     */
    public function setWriteUid(?OdooRelation $write_uid): void
    {
        $this->write_uid = $write_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getWriteUid(): ?OdooRelation
    {
        return $this->write_uid;
    }

    /**
     * @param DateTimeInterface|null $create_date
     */
    public function setCreateDate(?DateTimeInterface $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreateDate(): ?DateTimeInterface
    {
        return $this->create_date;
    }

    /**
     * @param OdooRelation|null $create_uid
     */
    public function setCreateUid(?OdooRelation $create_uid): void
    {
        $this->create_uid = $create_uid;
    }

    /**
     * @return OdooRelation|null
     */
    public function getCreateUid(): ?OdooRelation
    {
        return $this->create_uid;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeTodoCountryIds(OdooRelation $item): void
    {
        if ($this->hasTodoCountryIds($item)) {
            $index = array_search($item, $this->todo_country_ids);
            unset($this->todo_country_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addTodoCountryIds(OdooRelation $item): void
    {
        if ($this->hasTodoCountryIds($item)) {
            return;
        }

        $this->todo_country_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasTodoCountryIds(OdooRelation $item): bool
    {
        return in_array($item, $this->todo_country_ids);
    }

    /**
     * @return OdooRelation[]
     */
    public function getTodoCountryIds(): array
    {
        return $this->todo_country_ids;
    }

    /**
     * @return OdooRelation
     */
    public function getCompanyId(): OdooRelation
    {
        return $this->company_id;
    }

    /**
     * @param OdooRelation $item
     */
    public function removeDoneCountryIds(OdooRelation $item): void
    {
        if (null === $this->done_country_ids) {
            $this->done_country_ids = [];
        }

        if ($this->hasDoneCountryIds($item)) {
            $index = array_search($item, $this->done_country_ids);
            unset($this->done_country_ids[$index]);
        }
    }

    /**
     * @param OdooRelation $item
     */
    public function addDoneCountryIds(OdooRelation $item): void
    {
        if ($this->hasDoneCountryIds($item)) {
            return;
        }

        if (null === $this->done_country_ids) {
            $this->done_country_ids = [];
        }

        $this->done_country_ids[] = $item;
    }

    /**
     * @param OdooRelation $item
     *
     * @return bool
     */
    public function hasDoneCountryIds(OdooRelation $item): bool
    {
        if (null === $this->done_country_ids) {
            return false;
        }

        return in_array($item, $this->done_country_ids);
    }

    /**
     * @param OdooRelation[]|null $done_country_ids
     */
    public function setDoneCountryIds(?array $done_country_ids): void
    {
        $this->done_country_ids = $done_country_ids;
    }

    /**
     * @return OdooRelation[]|null
     */
    public function getDoneCountryIds(): ?array
    {
        return $this->done_country_ids;
    }

    /**
     * @param OdooRelation|null $account_collected_id
     */
    public function setAccountCollectedId(?OdooRelation $account_collected_id): void
    {
        $this->account_collected_id = $account_collected_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getAccountCollectedId(): ?OdooRelation
    {
        return $this->account_collected_id;
    }

    /**
     * @param OdooRelation $tax_id
     */
    public function setTaxId(OdooRelation $tax_id): void
    {
        $this->tax_id = $tax_id;
    }

    /**
     * @return OdooRelation
     */
    public function getTaxId(): OdooRelation
    {
        return $this->tax_id;
    }

    /**
     * @param OdooRelation|null $fiscal_position_id
     */
    public function setFiscalPositionId(?OdooRelation $fiscal_position_id): void
    {
        $this->fiscal_position_id = $fiscal_position_id;
    }

    /**
     * @return OdooRelation|null
     */
    public function getFiscalPositionId(): ?OdooRelation
    {
        return $this->fiscal_position_id;
    }

    /**
     * @param OdooRelation $company_id
     */
    public function setCompanyId(OdooRelation $company_id): void
    {
        $this->company_id = $company_id;
    }

    /**
     * @return string
     */
    public static function getOdooModelName(): string
    {
        return 'l10n_eu_service.wizard';
    }
}

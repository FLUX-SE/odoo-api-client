<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient;

use FluxSE\OdooApiClient\Model\BaseInterface;
use Tests\FluxSE\OdooApiClient\TestModel\V17\Object as V17;
use Tests\FluxSE\OdooApiClient\TestModel\V18\Object as V18;
use Tests\FluxSE\OdooApiClient\TestModel\V19\Object as V19;

trait OdooVersionedClassProviderTrait
{
    abstract protected function getOdooVersion(): int;

    /** @return class-string<BaseInterface> */
    protected function getPartnerClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Res\Partner::class,
            18 => V18\Res\Partner::class,
            default => V19\Res\Partner::class,
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getAccountClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Account::class,
            18 => V18\Account\Account::class,
            default => V19\Account\Account::class,
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getUomClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Uom\Uom::class,
            18 => V18\Uom\Uom::class,
            default => V19\Uom\Uom::class,
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getCategoryClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Product\Category::class,
            18 => V18\Product\Category::class,
            default => V19\Product\Category::class,
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getMoveClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Move::class,
            18 => V18\Account\Move::class,
            default => V19\Account\Move::class,
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getJournalClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Journal::class,
            18 => V18\Account\Journal::class,
            default => V19\Account\Journal::class,
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getCurrencyClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Res\Currency::class,
            18 => V18\Res\Currency::class,
            default => V19\Res\Currency::class,
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getProductClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Product\Product::class,
            18 => V18\Product\Product::class,
            default => V19\Product\Product::class,
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getTaxClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Tax::class,
            18 => V18\Account\Tax::class,
            default => V19\Account\Tax::class,
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getPaymentMethodClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Payment\Method::class,
            18 => V18\Account\Payment\Method::class,
            default => V19\Account\Payment\Method::class,
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getPaymentClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Payment::class,
            18 => V18\Account\Payment::class,
            default => V19\Account\Payment::class,
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getTemplateClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Product\Template::class,
            18 => V18\Product\Template::class,
            default => V19\Product\Template::class,
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getLineClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Move\Line::class,
            18 => V18\Account\Move\Line::class,
            default => V19\Account\Move\Line::class,
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getRegisterClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Payment\Register::class,
            18 => V18\Account\Payment\Register::class,
            default => V19\Account\Payment\Register::class,
        };
    }
}


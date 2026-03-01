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
    protected function getResPartnerClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Res\Partner::class,
            18 => V18\Res\Partner::class,
            19 => V19\Res\Partner::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "res.partner" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getAccountAccountClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Account::class,
            18 => V18\Account\Account::class,
            19 => V19\Account\Account::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "account.account" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getUomUomClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Uom\Uom::class,
            18 => V18\Uom\Uom::class,
            19 => V19\Uom\Uom::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "uom.uom" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getProductCategoryClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Product\Category::class,
            18 => V18\Product\Category::class,
            19 => V19\Product\Category::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "product.category" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getAccountMoveClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Move::class,
            18 => V18\Account\Move::class,
            19 => V19\Account\Move::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "account.move" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getAccountJournalClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Journal::class,
            18 => V18\Account\Journal::class,
            19 => V19\Account\Journal::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "account.journal" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getResCurrencyClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Res\Currency::class,
            18 => V18\Res\Currency::class,
            19 => V19\Res\Currency::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "res.currency" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getProductProductClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Product\Product::class,
            18 => V18\Product\Product::class,
            19 => V19\Product\Product::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "product.product" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getAccountTaxClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Tax::class,
            18 => V18\Account\Tax::class,
            19 => V19\Account\Tax::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "account.tax" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getAccountPaymentMethodClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Payment\Method::class,
            18 => V18\Account\Payment\Method::class,
            19 => V19\Account\Payment\Method::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "account.payment.method" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getAccountPaymentClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Payment::class,
            18 => V18\Account\Payment::class,
            19 => V19\Account\Payment::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "account.payment" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getProductTemplateClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Product\Template::class,
            18 => V18\Product\Template::class,
            19 => V19\Product\Template::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "product.template" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getAccountMoveLineClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Move\Line::class,
            18 => V18\Account\Move\Line::class,
            19 => V19\Account\Move\Line::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "account.move.line" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }

    /** @return class-string<BaseInterface> */
    protected function getAccountPaymentRegisterClass(): string
    {
        /** @var class-string<BaseInterface> */
        return match ($this->getOdooVersion()) {
            17 => V17\Account\Payment\Register::class,
            18 => V18\Account\Payment\Register::class,
            19 => V19\Account\Payment\Register::class,
            default => throw new \InvalidArgumentException(
                sprintf('No "account.payment.register" class available for Odoo version %d', $this->getOdooVersion())
            ),
        };
    }
}

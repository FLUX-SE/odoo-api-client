<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Model;

interface OdooAwareInterface
{
    public static function getOdooModelName(): string;
}

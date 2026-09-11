<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2\Mapping;

enum ReturnRule: string
{
    case IDENTITY = 'identity';
    case CREATED_IDS = 'created_ids';
    case SINGLE_CREATED_ID = 'single_created_id';
}

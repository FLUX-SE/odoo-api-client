<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2\Mapping;

enum MethodScope: string
{
    case MODEL = 'model';
    case RECORDSET = 'recordset';
}

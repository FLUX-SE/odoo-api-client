<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api\Json2\Exception;

final class Json2TransportException extends Json2Exception
{
    public function __construct()
    {
        // Do not retain the PSR-18 exception: it may itself retain the authorized request.
        parent::__construct('The JSON-2 request could not be completed.');
    }
}

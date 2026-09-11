<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api\Json2\Exception;

final class Json2DecodingException extends Json2Exception
{
    public function __construct()
    {
        parent::__construct('The JSON-2 response body is empty or invalid.');
    }
}

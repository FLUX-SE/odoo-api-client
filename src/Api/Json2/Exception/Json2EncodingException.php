<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Api\Json2\Exception;

final class Json2EncodingException extends Json2Exception
{
    public function __construct()
    {
        parent::__construct('The JSON-2 request parameters could not be encoded.');
    }
}

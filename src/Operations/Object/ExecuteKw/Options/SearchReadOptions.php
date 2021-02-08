<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options;

final class SearchReadOptions extends AbstractOptions implements SearchReadOptionsInterface
{
    use SearchOptionsTrait {
        SearchOptionsTrait::__construct as private _searchGetConstruct;
    }
    use ReadOptionsTrait {
        ReadOptionsTrait::__construct as private _readGetConstruct;
    }

    public function __construct()
    {
        $this->_searchGetConstruct();
        $this->_readGetConstruct();
    }
}

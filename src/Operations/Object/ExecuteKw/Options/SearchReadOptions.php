<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw\Options;

final class SearchReadOptions extends AbstractOptions implements SearchReadOptionsInterface
{
    use SearchOptionsTrait {
        SearchOptionsTrait::getOptionsMap as private _searchGetOptionsMap;
    }
    use ReadOptionsTrait {
        ReadOptionsTrait::getOptionsMap as private _readGetOptionsMap;
    }

    protected function getOptionsMap(): array
    {
        return array_merge(
            $this->_searchGetOptionsMap(),
            $this->_readGetOptionsMap()
        );
    }
}

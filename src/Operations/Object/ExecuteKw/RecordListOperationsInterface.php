<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations\Object\ExecuteKw;

use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\ArgumentsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomainsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\OptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\ReadOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchOptionsInterface;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptionsInterface;
use Psr\Http\Message\ResponseInterface;

interface RecordListOperationsInterface extends OperationsInterface
{
    public function execute_kw(
        string $modelName,
        string $methodName,
        ?ArgumentsInterface $arguments = null,
        ?OptionsInterface $options = null
    ): ResponseInterface;

    public function search(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchOptionsInterface $searchOptions = null
    ): array;

    public function search_count(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null
    ): int;

    public function search_read(
        string $modelName,
        ?SearchDomainsInterface $searchDomains = null,
        ?SearchReadOptionsInterface $searchReadOptions = null
    ): array;

    /**
     * @param string $modelName
     * @param int[] $ids
     * @param ReadOptionsInterface|null $readOptions
     *
     * @return array
     */
    public function read(
        string $modelName,
        array $ids = [],
        ?ReadOptionsInterface $readOptions = null
    ): array;
}

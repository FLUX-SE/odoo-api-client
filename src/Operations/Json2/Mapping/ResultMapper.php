<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2\Mapping;

use FluxSE\OdooApiClient\Operations\Json2\Mapping\Exception\InvalidMappedResultException;

final class ResultMapper implements ResultMapperInterface
{
    public function map(MappedCall $call, mixed $result): mixed
    {
        return match ($call->getReturnRule()) {
            ReturnRule::IDENTITY => $result,
            ReturnRule::CREATED_IDS => $this->createdIds($result, $call),
            ReturnRule::SINGLE_CREATED_ID => $this->singleCreatedId($result, $call),
        };
    }

    /** @return list<int> */
    private function createdIds(mixed $result, MappedCall $call): array
    {
        if (!is_array($result) || !array_is_list($result)) {
            throw $this->invalidCreateResult($call);
        }

        $ids = [];
        foreach ($result as $id) {
            if (!is_int($id)) {
                throw $this->invalidCreateResult($call);
            }

            $ids[] = $id;
        }

        return $ids;
    }

    private function singleCreatedId(mixed $result, MappedCall $call): int
    {
        $ids = $this->createdIds($result, $call);
        if (1 !== count($ids)) {
            throw new InvalidMappedResultException(sprintf(
                'JSON-2 call "%s/%s" must return exactly one created identifier.',
                $call->getModel(),
                $call->getMethod(),
            ));
        }

        return $ids[0];
    }

    private function invalidCreateResult(MappedCall $call): InvalidMappedResultException
    {
        return new InvalidMappedResultException(sprintf(
            'JSON-2 call "%s/%s" must return a list containing only integer identifiers.',
            $call->getModel(),
            $call->getMethod(),
        ));
    }
}

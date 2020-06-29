<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\PhpGenerator\ModelFixer;

final class ResUsersModelFixer extends AbstractModelFixer implements ResUsersModelFixerInterface
{
    protected function doFix(string $modelName, array &$structure): void
    {
        if (false === isset($structure['company_id'])) {
            return;
        }

        if (false === isset($structure['company_id']['required'])) {
            return;
        }

        // The company id is not required within the inherited model
        // So we fix it because it really not a required field
        $structure['company_id']['required'] = false;
    }

    public function supports(string $modelName, array $structure): bool
    {
        if ('res.users' === $modelName) {
            return true;
        }

        return false;
    }
}
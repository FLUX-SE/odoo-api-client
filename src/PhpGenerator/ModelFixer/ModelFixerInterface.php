<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\PhpGenerator\ModelFixer;

interface ModelFixerInterface
{
    /** @param array<string, array<string, mixed>> $structure */
    public function supports(string $modelName, array $structure): bool;

    /** @param array<string, array<string, mixed>>$structure */
    public function fix(string $modelName, array &$structure): void;
}

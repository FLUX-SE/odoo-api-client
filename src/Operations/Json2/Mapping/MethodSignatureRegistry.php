<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations\Json2\Mapping;

use FluxSE\OdooApiClient\Operations\Json2\Mapping\Exception\UnknownMethodSignatureException;

final class MethodSignatureRegistry implements MethodSignatureRegistryInterface
{
    private const ODOO_19_PROVENANCE = 'odoo/odoo@cd992ceebbaf343c03e1941d39cfe423d35ba6c6 (19.0) ORM and account signatures';

    /** @var array<string, MethodSignature> */
    private array $genericSignatures = [];

    /** @var array<string, MethodSignature> */
    private array $exactSignatures = [];

    /**
     * Custom signatures replace entries having the same model/method key.
     *
     * @param iterable<MethodSignature> $signatures
     */
    public function __construct(iterable $signatures = [])
    {
        foreach (self::defaultSignatures() as $signature) {
            $this->register($signature);
        }

        foreach ($signatures as $signature) {
            $this->register($signature);
        }
    }

    public function register(MethodSignature $signature): void
    {
        if ($signature->isGeneric()) {
            $this->genericSignatures[$signature->getMethod()] = $signature;

            return;
        }

        $this->exactSignatures[$this->exactKey((string) $signature->getModel(), $signature->getMethod())] = $signature;
    }

    public function resolve(string $model, string $method): MethodSignature
    {
        $exact = $this->exactSignatures[$this->exactKey($model, $method)] ?? null;
        if (null !== $exact) {
            return $exact;
        }

        $generic = $this->genericSignatures[$method] ?? null;
        if (null !== $generic) {
            return $generic;
        }

        throw UnknownMethodSignatureException::forCall($model, $method);
    }

    /** @return MethodSignature[] */
    public static function defaultSignatures(): array
    {
        $model = MethodScope::MODEL;
        $recordset = MethodScope::RECORDSET;
        $identity = ReturnRule::IDENTITY;
        $createdIds = ReturnRule::CREATED_IDS;
        $source = self::ODOO_19_PROVENANCE;

        return [
            new MethodSignature(null, 'search', $model, ['domain', 'offset', 'limit', 'order'], ['domain', 'offset', 'limit', 'order', 'context'], ['domain'], $identity, $source),
            new MethodSignature(null, 'search_count', $model, ['domain', 'limit'], ['domain', 'limit', 'context'], ['domain'], $identity, $source),
            new MethodSignature(null, 'search_read', $model, ['domain', 'fields', 'offset', 'limit', 'order'], ['domain', 'fields', 'offset', 'limit', 'order', 'load', 'context'], [], $identity, $source),
            new MethodSignature(null, 'read', $recordset, ['ids', 'fields', 'load'], ['ids', 'fields', 'load', 'context'], ['ids'], $identity, $source),
            new MethodSignature(null, 'create', $model, ['vals_list'], ['vals_list', 'context'], ['vals_list'], $createdIds, $source),
            new MethodSignature(null, 'write', $recordset, ['ids', 'vals'], ['ids', 'vals', 'context'], ['ids', 'vals'], $identity, $source),
            new MethodSignature(null, 'unlink', $recordset, ['ids'], ['ids', 'context'], ['ids'], $identity, $source),
            new MethodSignature(null, 'fields_get', $model, ['allfields', 'attributes'], ['allfields', 'attributes', 'context'], [], $identity, $source),
            new MethodSignature(null, 'default_get', $model, ['fields'], ['fields', 'context'], ['fields'], $identity, $source),
            new MethodSignature(null, 'check_access_rights', $model, ['operation', 'raise_exception'], ['operation', 'raise_exception', 'context'], ['operation'], $identity, $source),
            new MethodSignature('account.move', 'action_post', $recordset, ['ids'], ['ids', 'context'], ['ids'], $identity, $source),
            new MethodSignature('account.payment.register', 'action_create_payments', $recordset, ['ids'], ['ids', 'context'], ['ids'], $identity, $source),
        ];
    }

    private function exactKey(string $model, string $method): string
    {
        return $model . "\0" . $method;
    }
}

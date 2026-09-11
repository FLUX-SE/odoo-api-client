<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Operations\Json2\Mapping;

use FluxSE\OdooApiClient\Operations\Json2\Mapping\Exception\InvalidCallMappingException;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\Exception\UnknownMethodSignatureException;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodScope;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignature;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignatureRegistry;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\ReturnRule;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class MethodSignatureRegistryTest extends TestCase
{
    private const ODOO_19_REVISION = 'cd992ceebbaf343c03e1941d39cfe423d35ba6c6';

    #[DataProvider('defaultSignatureProvider')]
    public function testItContainsTheCompleteOdoo19Matrix(
        string $model,
        string $method,
        MethodScope $scope,
        ReturnRule $returnRule,
    ): void {
        $signature = (new MethodSignatureRegistry())->resolve($model, $method);

        self::assertSame($method, $signature->getMethod());
        self::assertSame($scope, $signature->getScope());
        self::assertSame($returnRule, $signature->getReturnRule());
        self::assertStringContainsString('19.0', $signature->getProvenance());
    }

    /** @return iterable<string, array{string, string, MethodScope, ReturnRule}> */
    public static function defaultSignatureProvider(): iterable
    {
        yield 'search' => ['res.partner', 'search', MethodScope::MODEL, ReturnRule::IDENTITY];
        yield 'search_count' => ['res.partner', 'search_count', MethodScope::MODEL, ReturnRule::IDENTITY];
        yield 'search_read' => ['res.partner', 'search_read', MethodScope::MODEL, ReturnRule::IDENTITY];
        yield 'read' => ['res.partner', 'read', MethodScope::RECORDSET, ReturnRule::IDENTITY];
        yield 'create' => ['res.partner', 'create', MethodScope::MODEL, ReturnRule::CREATED_IDS];
        yield 'write' => ['res.partner', 'write', MethodScope::RECORDSET, ReturnRule::IDENTITY];
        yield 'unlink' => ['res.partner', 'unlink', MethodScope::RECORDSET, ReturnRule::IDENTITY];
        yield 'fields_get' => ['res.partner', 'fields_get', MethodScope::MODEL, ReturnRule::IDENTITY];
        yield 'default_get' => ['res.partner', 'default_get', MethodScope::MODEL, ReturnRule::IDENTITY];
        yield 'check_access_rights' => [
            'res.partner',
            'check_access_rights',
            MethodScope::MODEL,
            ReturnRule::IDENTITY,
        ];
        yield 'action_post' => ['account.move', 'action_post', MethodScope::RECORDSET, ReturnRule::IDENTITY];
        yield 'action_create_payments' => [
            'account.payment.register',
            'action_create_payments',
            MethodScope::RECORDSET,
            ReturnRule::IDENTITY,
        ];
    }

    /**
     * @param string[] $positionals
     * @param string[] $allowed
     */
    #[DataProvider('searchSignatureProvider')]
    public function testSearchSignaturesMatchThePinnedOdoo19Revision(
        string $method,
        array $positionals,
        array $allowed,
    ): void {
        $signature = (new MethodSignatureRegistry())->resolve('res.partner', $method);

        self::assertSame($positionals, $signature->getPositionalParameters());
        self::assertSame($allowed, $signature->getAllowedParameters());
        self::assertStringContainsString(self::ODOO_19_REVISION, $signature->getProvenance());
    }

    /** @return iterable<string, array{string, string[], string[]}> */
    public static function searchSignatureProvider(): iterable
    {
        yield 'search' => [
            'search',
            ['domain', 'offset', 'limit', 'order'],
            ['domain', 'offset', 'limit', 'order', 'context'],
        ];
        yield 'search_count' => [
            'search_count',
            ['domain', 'limit'],
            ['domain', 'limit', 'context'],
        ];
        yield 'search_read' => [
            'search_read',
            ['domain', 'fields', 'offset', 'limit', 'order'],
            ['domain', 'fields', 'offset', 'limit', 'order', 'load', 'context'],
        ];
    }

    public function testAnExactSignatureTakesPriorityOverTheGenericOrmSignature(): void
    {
        $exact = new MethodSignature(
            'res.partner',
            'search',
            MethodScope::MODEL,
            ['expression'],
            ['expression'],
            ['expression'],
            provenance: 'custom module 1.2',
        );
        $registry = new MethodSignatureRegistry([$exact]);

        self::assertSame($exact, $registry->resolve('res.partner', 'search'));
        self::assertSame(
            ['domain', 'offset', 'limit', 'order'],
            $registry->resolve('res.users', 'search')->getPositionalParameters(),
        );
    }

    public function testRegisterCanReplaceAnExistingExactSignature(): void
    {
        $registry = new MethodSignatureRegistry();
        $replacement = new MethodSignature(
            'account.move',
            'action_post',
            MethodScope::RECORDSET,
            ['ids', 'soft'],
            ['ids', 'soft', 'context'],
            ['ids'],
            provenance: 'custom account override',
        );

        $registry->register($replacement);

        self::assertSame($replacement, $registry->resolve('account.move', 'action_post'));
    }

    public function testAnUnknownSignatureIsRejectedByTheRegistry(): void
    {
        $this->expectException(UnknownMethodSignatureException::class);

        (new MethodSignatureRegistry())->resolve('res.partner', 'action_unregistered');
    }

    public function testARecordsetSignatureMustDeclareIds(): void
    {
        $this->expectException(InvalidCallMappingException::class);

        new MethodSignature('x.model', 'do_it', MethodScope::RECORDSET, [], ['context']);
    }

    public function testAModelSignatureCannotDeclareReservedIds(): void
    {
        $this->expectException(InvalidCallMappingException::class);

        new MethodSignature('x.model', 'do_it', MethodScope::MODEL, ['ids'], ['ids']);
    }
}

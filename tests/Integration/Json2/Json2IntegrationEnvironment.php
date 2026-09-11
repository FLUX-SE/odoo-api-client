<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Integration\Json2;

use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use FluxSE\OdooApiClient\Builder\Json2\Json2ApiClientBuilder;
use LogicException;
use Psr\Http\Client\ClientInterface;

final class Json2IntegrationEnvironment
{
    private const DATABASE_PREFIX = 'json2_test_';

    /** @param array<string, mixed> $variables */
    private function __construct(private readonly array $variables)
    {
    }

    /** @param array<string, mixed>|null $variables */
    public static function fromEnvironment(?array $variables = null): self
    {
        if (null !== $variables) {
            return new self($variables);
        }

        $processEnvironment = getenv();

        /** @var array<string, mixed> $environment */
        $environment = array_merge($processEnvironment, $_SERVER, $_ENV);

        return new self($environment);
    }

    public function getMissingReason(bool $requiresWrites = false): ?string
    {
        if ('1' !== $this->read('ODOO_JSON2_INTEGRATION')) {
            return 'Set ODOO_JSON2_INTEGRATION=1 to opt in to the isolated Odoo 19 JSON-2 suite.';
        }

        foreach (['ODOO_JSON2_HOST', 'ODOO_JSON2_DATABASE', 'ODOO_JSON2_API_KEY'] as $name) {
            if (null === $this->read($name)) {
                return sprintf('The required integration variable %s is absent.', $name);
            }
        }

        if (null === $this->read('ODOO_JSON2_EXPECTED_MAJOR')) {
            return 'The required integration variable ODOO_JSON2_EXPECTED_MAJOR is absent.';
        }

        if (null === $this->read('ODOO_JSON2_DISPOSABLE_DATABASE')) {
            return 'The disposable database confirmation is absent.';
        }

        if (!$requiresWrites) {
            return null;
        }

        if ('1' !== $this->read('ODOO_JSON2_ALLOW_WRITES')) {
            return 'Set ODOO_JSON2_ALLOW_WRITES=1 to opt in to write scenarios.';
        }

        if (null === $this->read('ODOO_JSON2_RUN_ID')) {
            return 'ODOO_JSON2_RUN_ID is required to tag records created by this run.';
        }

        return null;
    }

    public function assertSafe(bool $requiresWrites = false): void
    {
        $missingReason = $this->getMissingReason($requiresWrites);
        if (null !== $missingReason) {
            throw new LogicException($missingReason);
        }

        if ('19' !== $this->read('ODOO_JSON2_EXPECTED_MAJOR')) {
            throw new LogicException('The JSON-2 integration suite is restricted to Odoo major version 19.');
        }

        $database = $this->database();
        if ($database !== $this->read('ODOO_JSON2_DISPOSABLE_DATABASE')) {
            throw new LogicException('The disposable database confirmation must exactly match ODOO_JSON2_DATABASE.');
        }

        if (!str_starts_with($database, self::DATABASE_PREFIX)) {
            throw new LogicException(sprintf(
                'The disposable integration database must start with "%s".',
                self::DATABASE_PREFIX,
            ));
        }

        if ($requiresWrites && 1 !== preg_match('/\A[A-Za-z0-9][A-Za-z0-9_.-]*\z/D', $this->runId())) {
            throw new LogicException('ODOO_JSON2_RUN_ID must be a non-empty safe record tag.');
        }

        // Reuse production validation for origin, credential and database header safety.
        $this->createConnection();
    }

    public function createConnection(): Json2Connection
    {
        return new Json2Connection($this->host(), $this->apiKey(), $this->database());
    }

    public function createBuilder(?ClientInterface $httpClient = null): Json2ApiClientBuilder
    {
        $builder = new Json2ApiClientBuilder($this->createConnection(), '', $this->apiKey());
        if (null !== $httpClient) {
            $builder->setHttpClient($httpClient);
        }

        $builder->setHttpClient(new Json2WritePreflightHttpClient(
            $builder->buildHttpClient(),
            $builder->buildStreamFactory(),
            $this->isSafeForWrites(),
            $this->createConnection(),
        ));

        return $builder;
    }

    public function createWriteBuilder(?ClientInterface $httpClient = null): Json2ApiClientBuilder
    {
        $this->assertSafe(true);

        return $this->createBuilder($httpClient);
    }

    public function accountMoveFixture(): Json2ActionFixture
    {
        return new Json2ActionFixture(
            $this->requiredPositiveInteger('ODOO_JSON2_ACCOUNT_MOVE_ID'),
            'json2-action-post:' . $this->runId(),
            $this->requiredPositiveInteger('ODOO_JSON2_ACCOUNT_MOVE_COMPANY_ID'),
            $this->requiredPositiveInteger('ODOO_JSON2_ACCOUNT_MOVE_JOURNAL_ID'),
        );
    }

    public function paymentFixture(): Json2ActionFixture
    {
        return new Json2ActionFixture(
            $this->requiredPositiveInteger('ODOO_JSON2_PAYMENT_MOVE_ID'),
            'json2-payment:' . $this->runId(),
            $this->requiredPositiveInteger('ODOO_JSON2_PAYMENT_COMPANY_ID'),
            $this->requiredPositiveInteger('ODOO_JSON2_PAYMENT_MOVE_JOURNAL_ID'),
            $this->requiredPositiveInteger('ODOO_JSON2_PAYMENT_REGISTER_ID'),
            $this->requiredPositiveInteger('ODOO_JSON2_PAYMENT_JOURNAL_ID'),
        );
    }

    public function optionalPositiveInteger(string $name): ?int
    {
        $value = $this->read($name);
        if (null === $value) {
            return null;
        }

        if (1 !== preg_match('/\A[1-9][0-9]*\z/D', $value)) {
            throw new LogicException(sprintf('%s must be a positive integer identifier.', $name));
        }

        return (int) $value;
    }

    public function host(): string
    {
        return $this->required('ODOO_JSON2_HOST');
    }

    public function database(): string
    {
        return $this->required('ODOO_JSON2_DATABASE');
    }

    public function runId(): string
    {
        return $this->required('ODOO_JSON2_RUN_ID');
    }

    private function apiKey(): string
    {
        return $this->required('ODOO_JSON2_API_KEY');
    }

    private function requiredPositiveInteger(string $name): int
    {
        $value = $this->optionalPositiveInteger($name);
        if (null === $value) {
            throw new LogicException(sprintf('The required integration variable %s is absent.', $name));
        }

        return $value;
    }

    private function isSafeForWrites(): bool
    {
        try {
            $this->assertSafe(true);

            return true;
        } catch (LogicException) {
            return false;
        }
    }

    private function required(string $name): string
    {
        $value = $this->read($name);
        if (null === $value) {
            throw new LogicException(sprintf('The required integration variable %s is absent.', $name));
        }

        return $value;
    }

    private function read(string $name): ?string
    {
        $value = $this->variables[$name] ?? null;

        return is_string($value) && '' !== $value ? $value : null;
    }
}

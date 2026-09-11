<?php

declare(strict_types=1);

namespace Tests\FluxSE\OdooApiClient\Command\Json2;

use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\Builder\Json2\Json2ApiClientBuilder;
use FluxSE\OdooApiClient\Command\GeneratorCommand;
use FluxSE\OdooApiClient\Operations\Json2\Json2ObjectOperations;
use FluxSE\OdooApiClient\Operations\ObjectOperationsInterface;
use FluxSE\OdooApiClient\PhpGenerator\OdooModelsStructureConverterInterface;
use GuzzleHttp\Psr7\HttpFactory;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Prometee\PhpClassGenerator\PhpGeneratorInterface;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\ApplicationTester;
use Symfony\Component\Console\Tester\CommandTester;

final class GeneratorCommandTest extends TestCase
{
    private const SECRET_SENTINEL = 'SECRET_MUST_NOT_APPEAR';

    public function testHelpKeepsRpcAsTheDefaultAndNeverDisplaysTheCredential(): void
    {
        $command = $this->command($this->legacyObjectOperations());
        $application = new Application();
        $application->setAutoExit(false);
        $application->add($command);
        $tester = new ApplicationTester($application);

        self::assertSame(Command::SUCCESS, $tester->run([
            'command' => $command->getName(),
            '--help' => true,
        ]));

        $display = $tester->getDisplay();
        self::assertStringContainsString('--api=API', $display);
        self::assertStringContainsString('historical default', $display);
        self::assertStringContainsString('ODOO_JSON2_API_KEY', $display);
        self::assertStringNotContainsString(self::SECRET_SENTINEL, $display);
    }

    public function testTheHistoricalRpcPathRemainsTheDefault(): void
    {
        $objectOperations = $this->legacyObjectOperations();
        $converter = $this->createMock(OdooModelsStructureConverterInterface::class);
        $converter->expects(self::once())->method('convert')->with('Generated\\Model')->willReturn([]);
        $generator = $this->createMock(PhpGeneratorInterface::class);
        $path = $this->temporaryDirectory();
        $generator->expects(self::once())->method('configure')->with($path, 'Generated\\Model', []);
        $generator->expects(self::once())->method('generate')->willReturn(true);
        $tester = new CommandTester($this->command($objectOperations, $converter, $generator));

        try {
            self::assertSame(Command::SUCCESS, $tester->execute([
                'path' => $path,
                'namespace' => 'Generated\\Model',
            ]));
        } finally {
            rmdir($path);
        }

        self::assertStringContainsString('API : rpc', $tester->getDisplay());
        self::assertStringNotContainsString('Password :', $tester->getDisplay());
        self::assertStringNotContainsString(self::SECRET_SENTINEL, $tester->getDisplay());
    }

    public function testAJson2CommandRejectsTheHistoricalPasswordOptionWithoutEchoingIt(): void
    {
        $converter = $this->createMock(OdooModelsStructureConverterInterface::class);
        $converter->expects(self::never())->method('convert');
        $tester = new CommandTester($this->command($this->json2ObjectOperations(), $converter));

        $status = $tester->execute([
            'path' => '/unused',
            'namespace' => 'Generated\\Model',
            '--api' => 'json2',
            '--password' => self::SECRET_SENTINEL,
        ]);

        self::assertSame(Command::INVALID, $status);
        self::assertStringContainsString('ODOO_JSON2_API_KEY', $tester->getDisplay());
        self::assertStringNotContainsString(self::SECRET_SENTINEL, $tester->getDisplay());
    }

    public function testTheSelectedProtocolMustMatchTheCompositionRoot(): void
    {
        $converter = $this->createMock(OdooModelsStructureConverterInterface::class);
        $converter->expects(self::never())->method('convert');
        $tester = new CommandTester($this->command($this->legacyObjectOperations(), $converter));

        $status = $tester->execute([
            'path' => '/unused',
            'namespace' => 'Generated\\Model',
            '--api' => 'json2',
        ]);

        self::assertSame(Command::INVALID, $status);
        self::assertStringContainsString('assembled for rpc', $tester->getDisplay());
    }

    public function testAnUnknownProtocolIsRejectedBeforeGeneration(): void
    {
        $converter = $this->createMock(OdooModelsStructureConverterInterface::class);
        $converter->expects(self::never())->method('convert');
        $tester = new CommandTester($this->command($this->legacyObjectOperations(), $converter));

        $status = $tester->execute([
            'path' => '/unused',
            'namespace' => 'Generated\\Model',
            '--api' => 'soap',
        ]);

        self::assertSame(Command::INVALID, $status);
        self::assertStringContainsString('Unsupported API protocol', $tester->getDisplay());
    }

    public function testChangingAJson2HostPreservesTheProxyPrefixWithoutAddingJsonRpc(): void
    {
        $objectOperations = $this->json2ObjectOperations();
        $converter = $this->createMock(OdooModelsStructureConverterInterface::class);
        $converter->expects(self::once())->method('convert')->willReturn([]);
        $generator = $this->createMock(PhpGeneratorInterface::class);
        $generator->expects(self::once())->method('generate')->willReturn(true);
        $path = $this->temporaryDirectory();
        $tester = new CommandTester($this->command($objectOperations, $converter, $generator));

        try {
            self::assertSame(Command::SUCCESS, $tester->execute([
                'path' => $path,
                'namespace' => 'Generated\\Model',
                '--api' => 'json2',
                '--host' => 'https://new.example.test/reverse-proxy',
            ]));
        } finally {
            rmdir($path);
        }

        $baseUri = (string) $objectOperations->getApiRequestMaker()->getBaseUri();
        self::assertSame('https://new.example.test/reverse-proxy', $baseUri);
        self::assertStringNotContainsString('jsonrpc', $baseUri);
        self::assertStringContainsString('API : json2', $tester->getDisplay());
        self::assertStringNotContainsString(self::SECRET_SENTINEL, $tester->getDisplay());
    }

    private function command(
        ObjectOperationsInterface $objectOperations,
        ?OdooModelsStructureConverterInterface $converter = null,
        ?PhpGeneratorInterface $generator = null,
    ): GeneratorCommand {
        return new GeneratorCommand(
            $objectOperations,
            $converter ?? $this->createMock(OdooModelsStructureConverterInterface::class),
            $generator ?? $this->createMock(PhpGeneratorInterface::class),
            'odoo-model-classes-generator',
        );
    }

    /** @return ObjectOperationsInterface&MockObject */
    private function legacyObjectOperations(): ObjectOperationsInterface
    {
        $requestMaker = $this->createMock(OdooApiRequestMakerInterface::class);
        $requestMaker->method('getBaseUri')->willReturn(new Uri('https://legacy.example.test/jsonrpc'));
        $objectOperations = $this->createMock(ObjectOperationsInterface::class);
        $objectOperations->method('getApiRequestMaker')->willReturn($requestMaker);
        $objectOperations->method('getDatabase')->willReturn('legacy_database');
        $objectOperations->method('getUsername')->willReturn('legacy@example.test');
        $objectOperations->method('getPassword')->willReturn(self::SECRET_SENTINEL);

        return $objectOperations;
    }

    private function json2ObjectOperations(): Json2ObjectOperations
    {
        $builder = new Json2ApiClientBuilder(
            new Json2Connection(
                'https://old.example.test/reverse-proxy',
                self::SECRET_SENTINEL,
                'json2_test_cli',
            ),
            'json2@example.test',
            self::SECRET_SENTINEL,
        );
        $factory = new HttpFactory();
        $builder->setHttpClient($this->createMock(ClientInterface::class));
        $builder->setRequestFactory($factory);
        $builder->setResponseFactory($factory);
        $builder->setStreamFactory($factory);
        $builder->setUriFactory($factory);

        return $builder->buildObjectOperations();
    }

    private function temporaryDirectory(): string
    {
        $path = sprintf('%s/odoo-json2-generator-%s', sys_get_temp_dir(), bin2hex(random_bytes(8)));
        self::assertTrue(mkdir($path));

        return $path;
    }
}

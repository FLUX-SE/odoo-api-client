<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Command;

use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\Operations\Json2\Json2ObjectOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;
use FluxSE\OdooApiClient\Operations\ObjectOperationsInterface;
use FluxSE\OdooApiClient\PhpGenerator\OdooModelsStructureConverterInterface;
use Http\Discovery\Psr17FactoryDiscovery;
use Prometee\PhpClassGenerator\PhpGeneratorInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class GeneratorCommand extends Command
{
    private const API_RPC = 'rpc';

    private const API_JSON2 = 'json2';

    public function __construct(
        private ObjectOperationsInterface $objectOperations,
        private OdooModelsStructureConverterInterface $odooModelsStructureConverter,
        private PhpGeneratorInterface $phpClassesGenerator,
        ?string $name = null
    ) {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $defaultHost = $this->getDefaultHost();
        $defaultDatabase = $this->objectOperations->getDatabase();
        $defaultUsername = $this->objectOperations->getUsername();
        $defaultApi = $this->isJson2() ? self::API_JSON2 : self::API_RPC;

        $this
            ->addArgument(
                'path',
                InputArgument::REQUIRED,
                'The path where classes will be generated (ex: ./src/Odoo/Model/Object)'
            )
            ->addArgument(
                'namespace',
                InputArgument::REQUIRED,
                'The base namespace of the generated classes (ex: "App\\Odoo\Model\\Object")'
            )
            ->addOption(
                'api',
                null,
                InputOption::VALUE_REQUIRED,
                'API protocol: "rpc" (historical default) or "json2" (Odoo 19 opt-in).',
                $defaultApi
            )
            ->addOption(
                'host',
                null,
                InputOption::VALUE_OPTIONAL,
                sprintf('Your Odoo base host (default: %s)', $defaultHost),
                $defaultHost
            )
            ->addOption(
                'database',
                null,
                InputOption::VALUE_OPTIONAL,
                sprintf('Your Odoo database name (default: %s)', $defaultDatabase),
                $defaultDatabase
            )
            ->addOption(
                'username',
                null,
                InputOption::VALUE_OPTIONAL,
                sprintf('Your Odoo account username. (default: %s)', $defaultUsername),
                $defaultUsername
            )
            ->addOption(
                'password',
                null,
                InputOption::VALUE_OPTIONAL,
                'Your Odoo RPC account password or API key. JSON-2 uses ODOO_JSON2_API_KEY only.'
            )
            ->addOption(
                'only-model',
                null,
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Filter the model list with the model you will set in this option.'
            )
            ->addOption(
                'exclude-model',
                null,
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Filter the model list excluding the model you will set in this option.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var string $api */
        $api = $input->getOption('api');
        /** @var string $host */
        $host = $input->getOption('host');
        /** @var string $database */
        $database = $input->getOption('database');
        /** @var string $username */
        $username = $input->getOption('username');
        /** @var string|null $password */
        $password = $input->getOption('password');
        /** @var array<int, string> $onlyModels */
        $onlyModels = $input->getOption('only-model');
        /** @var array<int, string> $excludeModels */
        $excludeModels = $input->getOption('exclude-model');

        /** @var string $path */
        $path = $input->getArgument('path');
        /** @var string $namespace */
        $namespace = $input->getArgument('namespace');

        $expectedApi = $this->isJson2() ? self::API_JSON2 : self::API_RPC;
        if (!in_array($api, [self::API_RPC, self::API_JSON2], true)) {
            $output->writeln('<error>Unsupported API protocol. Use "rpc" or "json2".</error>');

            return Command::INVALID;
        }

        if ($expectedApi !== $api) {
            $output->writeln(sprintf(
                '<error>The command was assembled for %s but --api=%s was requested.</error>',
                $expectedApi,
                $api,
            ));

            return Command::INVALID;
        }

        if (self::API_JSON2 === $api && null !== $password) {
            $output->writeln(
                '<error>--password is not accepted with JSON-2; provide ODOO_JSON2_API_KEY securely.</error>',
            );

            return Command::INVALID;
        }

        $output->writeln('<comment>');
        $output->writeln('Generating Odoo model class from the Odoo instance :');
        $output->writeln(sprintf('API : %s', $api));
        $output->writeln(sprintf('Host : <href=%1$s>%1$s</>', $host));
        $output->writeln(sprintf('Database : %s', $database));
        $output->writeln(sprintf('Username : %s', $username));
        $output->writeln(sprintf('Base path : %s', $path));
        $output->writeln(sprintf('Base namespace : %s', $namespace));

        $searchDomains = new SearchDomains();
        if ([] !== $onlyModels) {
            $output->writeln(sprintf('List only those models : %s', implode(', ', $onlyModels)));
            $onlyModels[] = 'base';
            $searchDomains->addCriterion(Criterion::in('model', $onlyModels));
        }
        if ([] !== $excludeModels) {
            $output->writeln(sprintf('Exclude those models : %s', implode(', ', $excludeModels)));
            $searchDomains->addCriterion(Criterion::not_in('model', $excludeModels));
        }
        $output->writeln('</comment>');

        $this->reconfigureServices(
            $host,
            $database,
            $username,
            $password
        );

        $output->write('Converting model structure to a class generator config array ... ');
        $config = $this->odooModelsStructureConverter->convert($namespace, $searchDomains);
        $output->writeln('DONE');

        $output->write('Generating model classes base on the generated config ... ');
        $this->phpClassesGenerator->configure(
            $path,
            $namespace,
            $config
        );
        $result = $this->phpClassesGenerator->generate();

        $output->writeln($result ? 'DONE' : 'FAIL');

        return $result ? 0 : 1;
    }

    private function reconfigureServices(
        string $host,
        string $database,
        string $username,
        ?string $password
    ): void {
        $defaultHost = $this->getDefaultHost();
        $defaultDatabase = $this->objectOperations->getDatabase();
        $defaultUsername = $this->objectOperations->getUsername();
        $defaultPassword = $this->objectOperations->getPassword();

        if ($defaultHost !== $host) {
            $odooApiRequestMaker = $this->objectOperations->getApiRequestMaker();
            $uriFactory = Psr17FactoryDiscovery::findUriFactory();
            $baseUri = $uriFactory->createUri($this->isJson2()
                ? $host
                : sprintf('%s/%s', $host, OdooApiRequestMakerInterface::BASE_JSONRPC_PATH));
            $odooApiRequestMaker->setBaseUri($baseUri);
        }

        if ($defaultDatabase !== $database) {
            $this->objectOperations->setDatabase($database);
        }

        if ($defaultUsername !== $username) {
            $this->objectOperations->setUsername($username);
        }

        if (null !== $password && $defaultPassword !== $password) {
            $this->objectOperations->setPassword($password);
        }
    }

    private function getDefaultHost(): string
    {
        $uri = $this->objectOperations->getApiRequestMaker()->getBaseUri()->__toString();
        if ($this->isJson2()) {
            return $uri;
        }

        $pattern = sprintf('#/%s$#', OdooApiRequestMakerInterface::BASE_JSONRPC_PATH);
        $host = preg_replace($pattern, '', $uri);

        return (string) $host;
    }

    private function isJson2(): bool
    {
        return $this->objectOperations instanceof Json2ObjectOperations;
    }
}

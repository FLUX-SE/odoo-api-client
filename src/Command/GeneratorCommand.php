<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Command;

use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
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
    public function __construct(
        private ObjectOperationsInterface $objectOperations,
        private OdooModelsStructureConverterInterface $odooModelsStructureConverter,
        private PhpGeneratorInterface $phpClassesGenerator,
        string $name = null
    ) {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $defaultHost = $this->getDefaultHost();
        $defaultDatabase = $this->objectOperations->getDatabase();
        $defaultUsername = $this->objectOperations->getUsername();
        $defaultPassword = $this->objectOperations->getPassword();

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
                sprintf('Your Odoo account password or API key (since Odoo v14, default: %s)', $defaultPassword),
                $defaultPassword
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
            ->addOption(
                'password',
                null,
                InputOption::VALUE_OPTIONAL,
                sprintf('Your Odoo account password or API key (since Odoo v14, default: %s)', $defaultPassword),
                $defaultPassword
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var string $host */
        $host = $input->getOption('host');
        /** @var string $database */
        $database = $input->getOption('database');
        /** @var string $username */
        $username = $input->getOption('username');
        /** @var string $password */
        $password = $input->getOption('password');
        /** @var string[] $onlyModels */
        $onlyModels = $input->getOption('only-model');
        /** @var string[] $excludeModels */
        $excludeModels = $input->getOption('exclude-model');

        /** @var string $path */
        $path = $input->getArgument('path');
        /** @var string $namespace */
        $namespace = $input->getArgument('namespace');

        $output->writeln('<comment>');
        $output->writeln('Generating Odoo model class from the Odoo instance :');
        $output->writeln(sprintf('Host : <href=%1$s>%1$s</>', $host));
        $output->writeln(sprintf('Database : %s', $database));
        $output->writeln(sprintf('Username : %s', $username));
        $output->writeln(sprintf('Password : %s', $password));
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
        string $password
    ): void {
        $defaultHost = $this->getDefaultHost();
        $defaultDatabase = $this->objectOperations->getDatabase();
        $defaultUsername = $this->objectOperations->getUsername();
        $defaultPassword = $this->objectOperations->getPassword();

        if ($defaultHost !== $host) {
            $odooApiRequestMaker = $this->objectOperations->getApiRequestMaker();
            $uriFactory = Psr17FactoryDiscovery::findUriFactory();
            $baseUri = $uriFactory->createUri(sprintf(
                '%s/%s',
                $host,
                OdooApiRequestMakerInterface::BASE_JSONRPC_PATH
            ));
            $odooApiRequestMaker->setBaseUri($baseUri);
        }

        if ($defaultDatabase !== $database) {
            $this->objectOperations->setDatabase($database);
        }

        if ($defaultUsername !== $username) {
            $this->objectOperations->setUsername($username);
        }

        if ($defaultPassword !== $password) {
            $this->objectOperations->setPassword($password);
        }
    }

    private function getDefaultHost(): string
    {
        $uri = $this->objectOperations->getApiRequestMaker()->getBaseUri()->__toString();
        $pattern = sprintf('#/%s$#', OdooApiRequestMakerInterface::BASE_JSONRPC_PATH);
        $host = preg_replace($pattern, '', $uri);

        return (string) $host;
    }
}

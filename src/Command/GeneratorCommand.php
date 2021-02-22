<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Command;

use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
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
    /** @var ObjectOperationsInterface */
    private $objectOperations;

    /** @var PhpGeneratorInterface */
    private $phpClassesGenerator;

    /** @var OdooModelsStructureConverterInterface */
    private $odooModelsStructureConverter;

    public function __construct(
        ObjectOperationsInterface $objectOperations,
        OdooModelsStructureConverterInterface $odooModelStructureConverter,
        PhpGeneratorInterface $phpClassesGenerator,
        string $name = null
    ) {
        $this->objectOperations = $objectOperations;
        $this->odooModelsStructureConverter = $odooModelStructureConverter;
        $this->phpClassesGenerator = $phpClassesGenerator;

        parent::__construct($name);
    }

    protected function configure(): void
    {
        $defaultHost = $this->objectOperations->getApiRequestMaker()->getBaseUri()->__toString();
        $defaultDatabase = $this->objectOperations->getDatabase();
        $defaultUsername = $this->objectOperations->getUsername();
        $defaultPassword = $this->objectOperations->getPassword();

        $this
            ->addArgument(
                'path',
                InputArgument::REQUIRED,
                'The path where classes will be generated (ex: ./src/OdooModel/Object)'
            )
            ->addArgument(
                'namespace',
                InputArgument::REQUIRED,
                'The base namespace of the generated classes (ex: "App\\OdooModel\\Object")'
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
                sprintf('Your Odoo account password (default: %s)', $defaultPassword),
                $defaultPassword
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $host = $this->getStringOption($input, 'host');
        $database = $this->getStringOption($input, 'database');
        $username = $this->getStringOption($input, 'username');
        $password = $this->getStringOption($input, 'password');
        $path = $this->getStringArgument($input, 'path');
        $namespace = $this->getStringArgument($input, 'namespace');

        $output->writeln('<comment>');
        $output->writeln('Generating Odoo model class from the Odoo instance :');
        $output->writeln(sprintf('Host : <href=%1$s>%1$s</>', $host));
        $output->writeln(sprintf('Database : %s', $database));
        $output->writeln(sprintf('Username : %s', $username));
        $output->writeln(sprintf('Password : %s', $password));
        $output->writeln(sprintf('Base path : %s', $path));
        $output->writeln(sprintf('Base namespace : %s', $namespace));
        $output->writeln('</comment>');

        $this->reconfigureServices(
            $host,
            $database,
            $username,
            $password
        );

        $output->write('Converting model structure to a class generator config array ... ');
        $config = $this->odooModelsStructureConverter->convert($namespace);
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

    private function getStringOption(InputInterface $input, string $name): string
    {
        return $input->getOption($name);
    }

    private function getStringArgument(InputInterface $input, string $name): string
    {
        return $input->getArgument($name);
    }

    private function reconfigureServices(
        string $host,
        string $database,
        string $username,
        string $password
    ): void {
        $odooApiRequestMaker = $this->objectOperations->getApiRequestMaker();

        $uriFactory = Psr17FactoryDiscovery::findUriFactory();
        $baseUri = $uriFactory->createUri(sprintf(
            '%s/%s',
            $host,
            OdooApiRequestMakerInterface::BASE_PATH
        ));
        $odooApiRequestMaker->setBaseUri($baseUri);
        $this->objectOperations->setDatabase($database);
        $this->objectOperations->setUsername($username);
        $this->objectOperations->setPassword($password);
    }
}

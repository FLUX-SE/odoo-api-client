<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Command;

use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
use FluxSE\OdooApiClient\Operations\ObjectOperationsInterface;
use FluxSE\OdooApiClient\PhpGenerator\OdooModelsStructureConverterInterface;
use FluxSE\OdooApiClient\PhpGenerator\OdooPhpClassesGeneratorInterface;
use Http\Discovery\Psr17FactoryDiscovery;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class GeneratorCommand extends Command
{
    /** @var ObjectOperationsInterface */
    private $objectOperations;
    /** @var OdooPhpClassesGeneratorInterface */
    private $odooPhpClassesGenerator;
    /** @var OdooModelsStructureConverterInterface */
    private $odooModelsStructureConverter;
    /** @var string */
    private $host;
    /** @var string */
    private $database;
    /** @var string */
    private $username;
    /** @var string */
    private $password;
    /** @var string */
    private $basePath;
    /** @var string */
    private $baseNamespace;

    public function __construct(
        ObjectOperationsInterface $objectOperations,
        OdooModelsStructureConverterInterface $odooModelStructureConverter,
        OdooPhpClassesGeneratorInterface $odooPhpClassesGenerator,
        string $name = null
    ) {
        $this->objectOperations = $objectOperations;
        $this->odooModelsStructureConverter = $odooModelStructureConverter;
        $this->odooPhpClassesGenerator = $odooPhpClassesGenerator;

        parent::__construct($name);
    }

    protected function configure(): void
    {
        $defaultOdooApiHost = getenv('ODOO_API_HOST') ?: 'http://localhost:8069';
        $defaultOdooApiDatabase = getenv('ODOO_API_DATABASE') ?: 'odoo-master';
        $defaultOdooApiUsername = getenv('ODOO_API_USERNAME') ?: 'admin';
        $defaultOdooApiPassword = getenv('ODOO_API_PASSWORD') ?: 'admin';

        $this
            ->addArgument(
                'basePath', InputArgument::REQUIRED,
                'The path where classes will be generated (ex: ./src/OdooModel/Object)'
            )
            ->addArgument(
                'baseNamespace', InputArgument::REQUIRED,
                'The base namespace of the generated classes (ex: "App\\OdooModel\\Object")'
            )
            ->addOption(
                'host', null, InputOption::VALUE_OPTIONAL,
                sprintf('Your Odoo base host (default: %s)', $defaultOdooApiHost), $defaultOdooApiHost
            )
            ->addOption(
                'database', null, InputOption::VALUE_OPTIONAL,
                sprintf('Your Odoo database name (default: %s)', $defaultOdooApiDatabase), $defaultOdooApiDatabase
            )
            ->addOption(
                'username', null, InputOption::VALUE_OPTIONAL,
                sprintf('Your Odoo account username. (default: %s)', $defaultOdooApiUsername), $defaultOdooApiUsername
            )
            ->addOption(
                'password', null, InputOption::VALUE_OPTIONAL,
                sprintf('Your Odoo account password (default: %s)', $defaultOdooApiPassword), $defaultOdooApiPassword
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->host = $this->getStringOption($input, 'host');
        $this->database = $this->getStringOption($input, 'database');
        $this->username = $this->getStringOption($input, 'username');
        $this->password = $this->getStringOption($input, 'password');
        $this->basePath = $this->getStringArgument($input, 'basePath');
        $this->baseNamespace = $this->getStringArgument($input, 'baseNamespace');

        $output->writeln('<comment>');
        $output->writeln('Generating Odoo model class from the Odoo instance :');
        $output->writeln(sprintf('Host : <href=%1$s>%1$s</>', $this->host));
        $output->writeln(sprintf('Database : %s', $this->database));
        $output->writeln(sprintf('Username : %s', $this->username));
        $output->writeln(sprintf('Password : %s', $this->password));
        $output->writeln(sprintf('Base path : %s', $this->basePath));
        $output->writeln(sprintf('Base namespace : %s', $this->baseNamespace));
        $output->writeln('</comment>');

        $this->reconfigureServices();

        $output->write('Processing ...');
        $this->generateModels($this->baseNamespace, $this->basePath);
        $output->writeln(' End');

        return 0;
    }

    private function getStringOption(InputInterface $input, string $name): string
    {
        return $input->getOption($name);
    }

    private function getStringArgument(InputInterface $input, string $name): string
    {
        return $input->getArgument($name);
    }

    private function reconfigureServices(): void
    {
        $odooApiRequestMaker = $this->objectOperations->getApiRequestMaker();

        $uriFactory = Psr17FactoryDiscovery::findUriFactory();
        $baseUri = $uriFactory->createUri(sprintf(
            '%s/%s',
            $this->host,
            OdooApiRequestMakerInterface::BASE_PATH
        ));
        $odooApiRequestMaker->setBaseUri($baseUri);
        $this->objectOperations->setDatabase($this->database);
        $this->objectOperations->setUsername($this->username);
        $this->objectOperations->setPassword($this->password);

        $this->odooPhpClassesGenerator->setBasePath($this->basePath);
        $this->odooPhpClassesGenerator->setBaseNamespace($this->baseNamespace);
    }

    protected function generateModels(string $namespace, string $path): bool
    {
        $config = $this->odooModelsStructureConverter->convert($namespace);

        $this->odooPhpClassesGenerator->setBaseNamespace($namespace);
        $this->odooPhpClassesGenerator->setBasePath($path);
        $this->odooPhpClassesGenerator->setClassesConfig($config);
        return $this->odooPhpClassesGenerator->generate();
    }
}

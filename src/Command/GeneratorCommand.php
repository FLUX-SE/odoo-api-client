<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Command;

use Flux\OdooApiClient\Api\OdooApiRequestMakerInterface;
use Flux\OdooApiClient\Operations\ObjectOperationsInterface;
use Flux\OdooApiClient\PhpGenerator\OdooModelsStructureConverterInterface;
use Flux\OdooApiClient\PhpGenerator\OdooPhpClassesGeneratorInterface;
use Http\Discovery\Psr17FactoryDiscovery;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
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
    private $baseUrl;
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

    /**
     * {@inheritDoc}
     */
    protected function configure(): void
    {
        $this
            ->addArgument('baseUrl', InputArgument::REQUIRED, 'Your Odoo base URL (ex: https://myinstance.odoo.com.')
            ->addArgument('database', InputArgument::REQUIRED, 'Your Odoo database name.')
            ->addArgument('username', InputArgument::REQUIRED, 'Your Odoo account username.')
            ->addArgument('password', InputArgument::REQUIRED, 'Your Odoo account password')
            ->addArgument('basePath', InputArgument::OPTIONAL, 'The path where classes will be generated', dirname(__DIR__) . '/Model/Object')
            ->addArgument('baseNamespace', InputArgument::OPTIONAL, 'The base namespace of the generated classes', 'Flux\\OdooApiClient\\Model\\Object');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->baseUrl = $input->getArgument('baseUrl');
        $this->database = $input->getArgument('database');
        $this->username = $input->getArgument('username');
        $this->password = $input->getArgument('password');
        $this->basePath = $input->getArgument('basePath');
        $this->baseNamespace = $input->getArgument('baseNamespace');

        $this->reconfigureServices();

        $this->generateModels($this->baseNamespace, $this->basePath);

        return Command::SUCCESS;
    }

    private function reconfigureServices(): void
    {
        $odooApiRequestMaker = $this->objectOperations->getApiRequestMaker();
        $uriFactory = Psr17FactoryDiscovery::findUrlFactory();
        $baseUri = $uriFactory->createUri(sprintf(
            '%s/%s',
            $this->baseUrl,
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